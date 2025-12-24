<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MobileVersionMapping;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MobileVersionCheckController extends Controller
{
    /**
     * Check version compatibility
     * @param Request $request
     * @return JsonResponse
     */

    public function check(Request $request)
    {
        try {
            $validated = $request->validate([
                'app_name'        => 'required|string',
                'mobile_version'  => 'required|regex:/^\d+\.\d+\.\d+$/',
                'plugin_version'  => 'required|regex:/^\d+\.\d+\.\d+$/',
            ]);

            $appName       = $validated['app_name'];
            $mobileVersion = $validated['mobile_version'];
            $pluginVersion = $validated['plugin_version'];

            /**
             * Exact mobile version mapping
             */
            $mapping = MobileVersionMapping::whereHas('mobile_app', function ($q) use ($appName) {
                $q->where('slug', $appName);
            })
                ->where('is_active', 1)
                ->where('mobile_version', $mobileVersion)
                ->first();

            /**
             * Mobile version not found
             */
            if (!$mapping) {
                return $this->buildResponse(
                    'force_update',
                    'Please update your app to continue.',
                    $this->latestMobileForPlugin($appName, $pluginVersion),
                    $pluginVersion
                );
            }

            /**
             * Force update flag
             */
            if ($mapping->force_update) {
                return $this->buildResponse(
                    'force_update',
                    $mapping->optional_message ?? 'Please update your app to continue.',
                    $mapping->mobile_version,
                    $mapping->latest_plugin_version
                );
            }

            /**
             * Plugin compatible?
             */
            $pluginCompatible =
                version_compare($pluginVersion, $mapping->minimum_plugin_version, '>=') &&
                version_compare($pluginVersion, $mapping->latest_plugin_version, '<=');

            if ($pluginCompatible) {

                // Is there a newer mobile version that also supports this plugin?
                $latestMobileForPlugin = $this->latestMobileForPlugin($appName, $pluginVersion);

                if ($latestMobileForPlugin &&
                    version_compare($latestMobileForPlugin, $mobileVersion, '>')
                ) {
                    return $this->buildResponse(
                        'optional_update',
                        'A newer version is available for better compatibility.',
                        $latestMobileForPlugin,
                        $pluginVersion
                    );
                }

                return $this->buildResponse(
                    'ok',
                    'Application is compatible.'
                );
            }

            /**
             * Plugin not supported by this mobile → FORCE UPDATE
             */
            $latestMobileForPlugin = $this->latestMobileForPlugin($appName, $pluginVersion);

            $message = $latestMobileForPlugin
                ? 'Please update your app to continue.'
                : 'This plugin version is no longer supported.';

            return $this->buildResponse(
                'force_update',
                $message,
                $latestMobileForPlugin,
                $pluginVersion
            );

        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->buildResponse(
                'error',
                'Validation failed.',
                null,
                null,
                422,
                $e->errors()
            );
        } catch (\Exception $e) {
            Log::error('App version check failed', [
                'error'   => $e->getMessage(),
                'request' => $request->all(),
            ]);

            return $this->buildResponse(
                'error',
                'An internal server error occurred.',
                null,
                null,
                500
            );
        }
    }



    private function buildResponse(
        string $status,
        string $message,
        ?string $latestMobile = null,
        ?string $latestPlugin = null,
        int $httpCode = 200,
        $errors = null
    ) {
        $response = [
            'status'  => $status,
            'message' => $message,
        ];

        if ($latestMobile) {
            $response['latest_mobile'] = $latestMobile;
        }

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $httpCode);
    }


    private function latestMobileForPlugin(string $appName, string $pluginVersion): ?string
    {
        return MobileVersionMapping::whereHas('mobile_app', function ($q) use ($appName) {
            $q->where('slug', $appName);
        })
            ->where('is_active', 1)
            ->where('minimum_plugin_version', '<=', $pluginVersion)
            ->where('latest_plugin_version', '>=', $pluginVersion)
            ->orderByDesc('mobile_version_code')
            ->value('mobile_version');
    }
}
