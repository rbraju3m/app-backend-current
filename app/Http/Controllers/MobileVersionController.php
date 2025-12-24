<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddonRequest;
use App\Http\Requests\MobileAppVersionRequest;
use App\Http\Requests\VersionAddedRequest;
use App\Models\Addon;
use App\Models\AddonVersion;
use App\Models\FluentInfo;
use App\Models\MobileSupportApp;
use App\Models\MobileVersionMapping;
use App\Traits\HandlesFileUploads;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class MobileVersionController extends Controller
{
    use ValidatesRequests, HandlesFileUploads;

    /**
     * Display a listing of the resource (latest active version per addon).
     */
    public function index(): Renderable
    {
        $mobileVersions = MobileVersionMapping::query()
            ->select([
                'appza_mobile_version_mapping.id',
                'appza_mobile_version_mapping.mobile_app_id',
                'appza_support_mobile_apps.name as mobile_app_name',
                'appza_mobile_version_mapping.mobile_version',
                'appza_mobile_version_mapping.minimum_plugin_version',
                'appza_mobile_version_mapping.latest_plugin_version',
                'appza_mobile_version_mapping.force_update',
                'appza_mobile_version_mapping.optional_message',
            ])
            ->join('appza_support_mobile_apps','appza_support_mobile_apps.id','=','appza_mobile_version_mapping.mobile_app_id')
            ->where('appza_mobile_version_mapping.is_active', 1)
            ->orderByDesc('appza_mobile_version_mapping.id')
            ->paginate(20);

        return view('mobile-version.index', compact('mobileVersions'));
    }

    /**
     * Show the form for creating a new addon.
     */
    public function create(): Renderable
    {
        $mobileApps = MobileSupportApp::pluck('name', 'id')->all();
        return view('mobile-version.add', compact('mobileApps'));
    }

    /**
     * Store a new addon and its first version.
     */
    public function store(MobileAppVersionRequest $request): RedirectResponse
    {
        $inputs = $request->validated();

        $findApp = MobileSupportApp::where('id', $inputs['mobile_app_id'])->first();
        if (empty($findApp)) {
            return redirect()->back()->with('validate', 'Invalid mobile app. Please try again.');
        }

        try {
            DB::beginTransaction();

            MobileVersionMapping::create($inputs);

            DB::commit();

            return redirect()->route('mobile_version_list')->with('message', 'Mobile version created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error creating addon: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('mobile_version_list')
                ->with('validate', 'Failed to create mobile version. Please try again.');
        }
    }


    public function edit($id): Renderable
    {
        $mobileApps = MobileSupportApp::pluck('name', 'id')->all();
        $data = MobileVersionMapping::find($id);
        return view('mobile-version.edit', compact('data','mobileApps'));
    }

    public function update(MobileAppVersionRequest $request, $id): RedirectResponse
    {
        $inputs = $request->validated();

        $findApp = MobileSupportApp::where('id', $inputs['mobile_app_id'])->first();
        if (empty($findApp)) {
            return redirect()->back()->with('validate', 'Invalid mobile app. Please try again.');
        }

        $findMobileVersion = MobileVersionMapping::find($id);

        try {
            DB::beginTransaction();

            $findMobileVersion->update($inputs);

            DB::commit();

            return redirect()->route('mobile_version_list')->with('message', 'Mobile version update successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error creating addon: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('mobile_version_list')
                ->with('validate', 'Failed to update mobile version. Please try again.');
        }
    }

}
