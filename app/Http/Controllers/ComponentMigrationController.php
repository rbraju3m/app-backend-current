<?php
namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\ComponentImportLog;
use App\Services\ComponentExportService;
use App\Services\ComponentImportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComponentMigrationController extends Controller
{
    protected $exportService;
    protected $importService;

    public function __construct(
        ComponentExportService $exportService,
        ComponentImportService $importService
    ) {
        $this->exportService = $exportService;
        $this->importService = $importService;
    }

    // DEV: List all components with export options
    public function index(Request $request)
    {
        // Get the search term from the request
        $search = $request->input('search');

        // Fetch and paginate components, applying the search condition if provided
        $components = Component::query()
            ->join('appza_supports_plugin', 'appza_supports_plugin.slug', '=', 'appfiy_component.plugin_slug')
            ->select('appfiy_component.*','appza_supports_plugin.name as plugin_name')
            ->when($search, function ($query, $search) {
                $query->where('appfiy_component.name', 'like', '%' . $search . '%')
                    ->orWhere('appfiy_component.slug', 'like', '%' . $search . '%')
                    ->orWhere('appfiy_component.label', 'like', '%' . $search . '%')
                    ->orWhere('appza_supports_plugin.slug', 'like', '%' . $search . '%')
                    ->orWhere('appza_supports_plugin.name', 'like', '%' . $search . '%')
                    ->orWhere('appfiy_component.scope', 'like', '%' . $search . '%');
            })
            ->orderByDesc('appfiy_component.id')
            ->paginate(20);

        // Include the search query in the pagination links
        $components->appends(['search' => $search]);

        // Return components to view
        return view('component.migration.index', [
            'components' => $components,
            'search' => $search, // Pass search term back to the view for repopulating the search input
        ]);
    }

    // DEV: Download component as JSON
    public function downloadExport($id)
    {
        $is_component_export = config('app.is_component_export');
        if (!$is_component_export || auth()->user()->user_type != 'DEVELOPER') {
            return redirect()->route('component_migration_index')->with('validate', 'You are not allowed to download this component export.');
        }

        $findComponent = Component::find($id);
        $payload = $this->exportService->export((int)$id);
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $filename = "{$findComponent->slug}_component_{$id}_" . now()->format('Ymd_His') . '.json';

        return response()->streamDownload(function () use ($json) {
            echo $json;
        }, $filename, [
            'Content-Type' => 'application/json'
        ]);
    }

    /**
     * Show import logs page
     */
    public function showImportLogs(Request $request)
    {
        $query = ComponentImportLog::query();

        // Apply filters
        if ($request->filled('component_name')) {
            $query->where('component_name', 'like', '%' . $request->component_name . '%');
        }

        if ($request->filled('success') && $request->success !== '') {
            $query->where('success', $request->success);
        }

        if ($request->filled('source')) {
            $query->where('source', 'like', '%' . $request->source . '%');
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Get logs with pagination
        $logs = $query->latest()->paginate(20);
        $logs->appends($request->query());


        // Get unique component names for filter dropdown
        $componentNames = ComponentImportLog::distinct()
            ->pluck('component_name')
            ->sort()
            ->values();

        // Get unique sources for filter dropdown
        $sources = ComponentImportLog::distinct()
            ->pluck('source')
            ->sort()
            ->values();

        return view('component.migration.logs', compact('logs', 'componentNames', 'sources'));
    }

    // DEV: Send directly to production via API
    public function sendToProduction(Request $request, $id)
    {
        $request->validate([
            'overwrite' => 'sometimes|boolean'
        ]);

        $payload = $this->exportService->export((int)$id);
        $overwrite = $request->input('overwrite', false);

        $prodUrl = config('component_sync.production_url');
        $token = config('component_sync.api_token');

        if (! $prodUrl || ! $token) {
            return response()->json([
                'success' => false,
                'message' => 'Production sync is not configured.'
            ], 422);
        }

        try {
            $response = Http::withToken($token)
                ->post(rtrim($prodUrl, '/') . '/api/component/migrate/import', [
                    'payload' => $payload,
                    'overwrite' => $overwrite
                ]);

            if ($response->ok()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Sent to production successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Production responded with error',
                'details' => $response->json()
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to connect to production: ' . $e->getMessage()
            ], 500);
        }
    }

    // PROD: Show import form
    public function showImportForm()
    {
        $recentLogs = ComponentImportLog::latest()->paginate(10);
        return view('component.migration.import', compact('recentLogs'));
    }


    // PROD: Upload and import JSON file
    public function importFromFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:json,txt',
            'overwrite' => 'sometimes|nullable'
        ]);

        $overwrite = $request->input('overwrite', false);

        $json = file_get_contents($request->file('file')->getRealPath());
        $payload = json_decode($json, true);

        if (!is_array($payload)) {
            return back()->with('error', 'Invalid JSON file');
        }

        $result = $this->importService->import($payload, $overwrite);
        return back()->with($result['success'] ? 'success' : 'error', $result['message']);
    }

    // PROD: API endpoint for direct import
    public function importFromApi(Request $request)
    {
        $token = request()->bearerToken();
        if ($token !== config('component_sync.api_token')) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $request->validate([
            'payload' => 'required|array',
            'overwrite' => 'sometimes|boolean'
        ]);

        $result = $this->importService->import(
            $request->input('payload'),
            $request->input('overwrite', false)
        );

        return response()->json($result, $result['success'] ? 200 : 422);
    }
}
