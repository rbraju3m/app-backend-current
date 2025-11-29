<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\ApkBuildRequest;
use App\Http\Requests\AppNameRequest;
use App\Http\Requests\BuildNotificationRequest;
use App\Http\Requests\IosBuildRequest;
use App\Models\AppVersion;
use App\Models\BuildDomain;
use App\Models\FluentInfo;
use App\Models\FluentLicenseInfo;
use App\Models\Lead;
use App\Services\IosBuildValidationService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApkBuildResourceController extends Controller
{
    protected $authorization;
    protected $domain;
    protected $pluginName;
    protected $iosBuildValidationService;


    public function __construct(Request $request,IosBuildValidationService $iosBuildValidationService){
        $data = Lead::checkAuthorization($request);
        $this->authorization = ($data && $data['auth_type'])?$data['auth_type']:false;
        $this->domain = ($data && $data['domain'])?$data['domain']:'';
        $this->pluginName = ($data && $data['plugin_name'])?$data['plugin_name']:'';
        $this->iosBuildValidationService = $iosBuildValidationService;
    }

    protected function normalizeUrl($url)
    {
        if (!preg_match('#^https?://#i', $url)) {
            $url = 'https://' . ltrim($url, '/');
        }

        $parsed = parse_url($url);
        $scheme = $parsed['scheme'] ?? 'https';
        $host = strtolower($parsed['host'] ?? '');

        return $host ? "{$scheme}://{$host}" : null;
    }

    protected function getFluentErrorMessage($code, $default = 'License validation failed.')
    {
        $messages = [
            'validation_error' => "Please provide the license key, URL, and item ID.",
            'key_mismatch' => "This license key doesn't match the product. Please check your key.",
            'license_error' => "Invalid license key for this product. Please verify your key.",
            'license_not_found' => "License key not found. Please make sure it is correct.",
            'license_expired' => "Your license key has expired. Please renew or buy a new one.",
            'activation_error' => "Unable to activate. Your license may be expired.",
            'activation_limit_exceeded' => "Activation limit reached. Please upgrade or get a new license.",
            'site_not_found' => "This website is not registered under your license.",
            'deactivation_error' => "Unable to deactivate the license. Please try again later.",
            'product_not_found' => "Product not found. Please check the product ID.",
            'license_settings_not_found' => "License settings not configured for this product.",
            'license_not_enabled' => "Licensing hasn’t been enabled for this product.",
            'invalid_package_data' => "The package data is invalid. Please check the details.",
            'expired_license' => "Your license key is invalid or expired.",
            'downloadable_file_not_found' => "No downloadable file available for this product."
        ];

        return $messages[$code] ?? $default;
    }


    public function buildResource(ApkBuildRequest $request){

        $input = $request->validated();

        $jsonResponse = function ($statusCode, $message, $additionalData = []) use ($request) {
            return new JsonResponse(array_merge([
                'status' => $statusCode,
                'url' => $request->getUri(),
                'method' => $request->getMethod(),
                'message' => $message,
            ], $additionalData), $statusCode);
        };

        if (!$this->authorization){
            return $jsonResponse(Response::HTTP_UNAUTHORIZED, 'Unauthorized.');
        }

        if ($this->pluginName == 'lazy_task'){
            return $jsonResponse(Response::HTTP_LOCKED, 'Build process off for lazy task.');
        }

        $siteUrl = $this->normalizeUrl($input["site_url"]);
        $findSiteUrl = BuildDomain::where('site_url',$siteUrl)->where('license_key',$input['license_key'])->first();

        if (!$findSiteUrl){
            return $jsonResponse(Response::HTTP_NOT_FOUND, 'Domain Not found.');
        }

        if (!$findSiteUrl->fluent_item_id){
            return $jsonResponse(Response::HTTP_NOT_FOUND, 'Item id not found.');
        }

        $activationHash = FluentLicenseInfo::where('license_key', $input['license_key'])->where('site_url', $siteUrl)->value('activation_hash');

        if (is_null($activationHash)) {
            return $this->jsonResponse($request, Response::HTTP_NOT_FOUND, 'License record not found for this site.');
        }

        $params = [
            'fluent-cart' => 'check_license',
            'license_key' => $input['license_key'],
            'activation_hash' => $activationHash,
            'item_id' => $findSiteUrl->fluent_item_id,
            'site_url' => $siteUrl,
        ];

        // Send API Request
        $getFluentInfo = FluentInfo::where('product_slug', $findSiteUrl->plugin_name)->where('is_active',true)->first();
        if (!$getFluentInfo) {
            return $jsonResponse(Response::HTTP_UNPROCESSABLE_ENTITY, 'The fluent information not set in the configuration.');
        }

        $fluentApiUrl = $getFluentInfo->api_url;
        $response = Http::timeout(10)->get($fluentApiUrl, $params);
        $data = $response->json();

        if (!is_array($data) || !($data['success'] ?? false) || ($data['status'] ?? 'invalid') !== 'valid') {
            $error = $data['error_type'] ?? $data['error'] ?? null;
            $message = $this->getFluentErrorMessage($error, $data['message'] ?? 'License is not valid.');
            return $jsonResponse(Response::HTTP_NOT_FOUND, $message);
        }

        // Upload Logo to R2
        if (!empty($input['app_logo'])) {

            $path = $this->uploadFromUrlToR2(
                $input['app_logo'],
                'app-file/logo',
                'r2'
            );

            if (!$path) {
                return $jsonResponse(Response::HTTP_BAD_REQUEST, 'App logo invalid or cannot be downloaded.');
            }

            $appLogo = config('app.image_public_path').$path;
        }

        // Upload Splash Screen to R2
        if (!empty($input['app_splash_screen_image'])) {

            $path = $this->uploadFromUrlToR2(
                $input['app_splash_screen_image'],
                'app-file/splash',
                'r2'
            );

            if (!$path) {
                return $jsonResponse(Response::HTTP_BAD_REQUEST, 'App splash invalid or cannot be downloaded.');
            }

            $splash_screen_image = config('app.image_public_path').$path;
        }


        $findAppVersion = AppVersion::where('is_active', 1)->latest()->first();

        // First, extract the platform array from the request
        $platforms = $request->input('platform', []);

        // Set the boolean values based on whether the array contains these values
        $isAndroid = in_array('android', $platforms);
        $isIos = in_array('ios', $platforms);

        $findSiteUrl->update([
            'plugin_name' => $this->pluginName,
            'version_id' => $findAppVersion->id,
            'build_domain_id' => $findSiteUrl->id,
            'fluent_id' => $findSiteUrl->fluent_item_id,
            'app_name' => $request->input('app_name'),
            'app_logo' => $appLogo,
            'app_splash_screen_image' => $splash_screen_image,
            'is_android' => $isAndroid,
            'is_ios' => $isIos,
            'confirm_email' => $request->input('email'),
            'build_plugin_slug' => $request->input('plugin_slug'),
        ]);

        // for response
        $status = Response::HTTP_OK;
        $payload = [
            'status' => $status,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'message' => 'App selection for build requests is confirmed.',
            'data' => [
                'package_name' => $findSiteUrl->package_name,
                'bundle_name' => $findSiteUrl->package_name,
            ]
        ];
        // Log the response
//        Log::info("=============================================================================================================");
//        Log::info('Build resource response:', ['status' => $status, 'response' => $payload,'payload' => $request->validated()]);
        // Return it
        return response()->json($payload, $status);
    }

    private function uploadFromUrlToR2(string $url, string $directory, string $disk = 'r2')
    {
        // Check URL valid or 404
        $fileHeaders = @get_headers($url);
        if (!$fileHeaders || strpos($fileHeaders[0], '404') !== false) {
            return false;
        }

        // Download file content
        $fileContent = @file_get_contents($url);
        if ($fileContent === false) {
            return false;
        }

        // Generate unique filename
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        $fileName = bin2hex(random_bytes(5)) . '_' . basename($url);

        $path = $directory . '/' . $fileName;

        // Upload file to R2
        Storage::disk($disk)->put($path, $fileContent);

        return $path; // return path for DB
    }


    public function iosResourceAndVerify(IosBuildRequest $request)
    {
        $input = $request->validated();
        $jsonResponse = fn($status, $message, $data = []) => response()->json(array_merge([
            'status' => $status,
            'url' => $request->fullUrl(),
            'method' => $request->getMethod(),
            'message' => $message,
        ], $data), $status);

        $siteUrl = $this->normalizeUrl($input['site_url']);

        $findSiteUrl = BuildDomain::where('site_url', $siteUrl)
            ->where('license_key', $input['license_key'])->first();

        if (!$findSiteUrl) {
            return $jsonResponse(Response::HTTP_NOT_FOUND, 'Domain or license key is incorrect');
        }

        $directory = 'app-file/p8file';
        $disk = 'r2';

        // Generate file name
        $p8FileName = 'key_' . uniqid() . '.p8';

        // Upload the .p8 content to R2
        Storage::disk($disk)->put(
            $directory . '/' . $p8FileName,
            $input['ios_p8_file_content']
        );

        // Save filename in DB
        $findSiteUrl->update([
            'ios_issuer_id' => $input['ios_issuer_id'],
            'ios_key_id' => $input['ios_key_id'],
            'team_id' => $input['ios_team_id'],
            'ios_p8_file_content' => config('app.image_public_path').$directory . '/' . $p8FileName,
        ]);

        $findSiteUrl->refresh();

        $service = app(IosBuildValidationService::class);
        $result = $service->iosBuildProcessValidation($findSiteUrl);

        if ($result['success'] === false) {
            Log::warning('IOS validation failed', $result);
            return $jsonResponse($result['status'], $result['message']);
        }

        return $jsonResponse($result['status'], $result['message'], [
            'data' => [
                'package_name' => $findSiteUrl->package_name,
                'bundle_name' => $result['data'] ?? $findSiteUrl->package_name
            ]
        ]);
    }

    public function iosCheckAppName(AppNameRequest $request)
    {
        $input = $request->validated();
        $jsonResponse = fn($status, $message, $data = []) => response()->json(array_merge([
            'status' => $status,
            'url' => $request->fullUrl(),
            'method' => $request->getMethod(),
            'message' => $message,
        ], $data), $status);

        $siteUrl = $this->normalizeUrl($input['site_url']);

        $findSiteUrl = BuildDomain::where('site_url', $siteUrl)
            ->where('license_key', $input['license_key'])->first();

        if (!$findSiteUrl) {
            return $jsonResponse(Response::HTTP_NOT_FOUND, 'Domain or license key is incorrect');
        }

        $service = app(IosBuildValidationService::class);
        $result = $service->iosBuildProcessValidation2($findSiteUrl);

        if ($result['success'] === false) {
            return $jsonResponse($result['status'], $result['message'], [
                'data' => [
                    'package_name' => $findSiteUrl->package_name,
                    'bundle_name' => $findSiteUrl->package_name,
                    'ios_app_name' => null,
                ]
            ]);
        }

        $findSiteUrl->update(['ios_app_name' => $result['app_name']]);

        return $jsonResponse(Response::HTTP_OK, $result['message'], [
            'data' => [
                'package_name' => $findSiteUrl->package_name,
                'bundle_name' => $findSiteUrl->package_name,
                'ios_app_name' => $result['app_name'],
            ]
        ]);
    }


    public function notificationResource(BuildNotificationRequest $request)
    {
        $input = $request->validated();

        $jsonResponse = fn($status, $message, $data = []) => response()->json(array_merge([
            'status' => $status,
            'url' => $request->fullUrl(),
            'method' => $request->getMethod(),
            'message' => $message,
        ], $data), $status);

        $siteUrl = $this->normalizeUrl($input['site_url']);

        $findSiteUrl = BuildDomain::where('site_url', $siteUrl)
            ->where('license_key', $input['license_key'])
            ->first();

        if (!$findSiteUrl) {
            return $jsonResponse(Response::HTTP_NOT_FOUND, 'Domain or license key is incorrect');
        }

        $directory = 'app-file/push-notification';
        $disk = 'r2';

        $fileNameAndroid = null;
        $fileNameIos = null;

        /*
        |--------------------------------------------------------------------------
        | DELETE OLD ANDROID FILE IF EXISTS
        |--------------------------------------------------------------------------
        */
        if (!empty($input['android_notification_content'])) {

            if ($findSiteUrl->android_push_notification_url) {

                // Extract R2 path from full URL
                $oldAndroidPath = str_replace(config('app.image_public_path'), '', $findSiteUrl->android_push_notification_url);

                // Delete from R2 if exists
                if (Storage::disk($disk)->exists($oldAndroidPath)) {
                    Storage::disk($disk)->delete($oldAndroidPath);
                }
            }

            // Upload new android file
            $fileNameAndroid = 'push_notification_' . uniqid() . '.json';
            Storage::disk($disk)->put(
                "$directory/android/$fileNameAndroid",
                $input['android_notification_content']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DELETE OLD IOS FILE IF EXISTS
        |--------------------------------------------------------------------------
        */
        if (!empty($input['ios_notification_content'])) {

            if ($findSiteUrl->ios_push_notification_url) {

                // Extract path
                $oldIosPath = str_replace(config('app.image_public_path'), '', $findSiteUrl->ios_push_notification_url);

                if (Storage::disk($disk)->exists($oldIosPath)) {
                    Storage::disk($disk)->delete($oldIosPath);
                }
            }

            // Upload new iOS file
            $fileNameIos = 'push_notification_' . uniqid() . '.plist';
            Storage::disk($disk)->put(
                "$directory/ios/$fileNameIos",
                $input['ios_notification_content']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE ONLY NEW FILES
        |--------------------------------------------------------------------------
        */
        $updateData = [];

        if ($fileNameAndroid) {
            $updateData['android_push_notification_url'] = config('app.image_public_path') . "$directory/android/$fileNameAndroid";
        }

        if ($fileNameIos) {
            $updateData['ios_push_notification_url'] = config('app.image_public_path') . "$directory/ios/$fileNameIos";
        }

        $findSiteUrl->update($updateData);
        $findSiteUrl->refresh();

        return $jsonResponse(Response::HTTP_OK, "Successfully pushed notification information updated.");
    }



}
