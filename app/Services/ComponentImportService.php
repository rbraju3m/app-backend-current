<?php
namespace App\Services;

use App\Models\Component;
use App\Models\ComponentStyleGroup;
use App\Models\ComponentStyleGroupProperties;
use App\Models\Page;
use App\Models\StyleGroup;
use App\Models\StyleGroupProperties;
use App\Models\StyleProperties;
use App\Models\SupportsPlugin;
use App\Models\LayoutType;
use App\Models\Scope;
use App\Models\ComponentType;
use App\Models\ClassType;
use App\Models\ComponentImportLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ComponentImportService
{
    protected string $componentName = '';
    protected string $componentSlug = '';
    protected string $source = '';
    protected array $logs = []; // store all logs for single entry

    /**
     * Import component JSON payload
     */
    public function import(array $payload, bool $overwrite = false): array
    {
        $this->componentName = $payload['component']['name'] ?? 'Unknown';
        $this->componentSlug = $payload['component']['slug'] ?? 'unknown';
        $this->source = $payload['meta']['source'] ?? 'unknown';

        $this->addLog('Import started', true, [
            'overwrite' => $overwrite,
            'file_size' => strlen(json_encode($payload))
        ]);

        DB::beginTransaction();
        $success = true;

        try {
            $pluginSlug = $payload['plugin']['slug'] ?? null;

            // --- Import reference data ---
            $this->addLog('Importing reference data', true);
            $referenceData = $this->importReferenceData($payload);

            $payload['component']['layout_type_id'] = $referenceData['layout_type_id'] ?? null;
            $payload['component']['component_type_id'] = $referenceData['component_type_id'] ?? null;

            // --- Import component ---
            $this->addLog('Importing component', true);
            $component = $this->importComponent($payload['component'], $overwrite);

            // --- Import style groups ---
            $styleGroups = $payload['style_groups'] ?? [];
            $componentProperties = $payload['properties'] ?? [];
            $this->addLog('Importing style groups', true, ['count' => count($styleGroups)]);
            $this->importComponentStyleGroups($component->id, $styleGroups, $componentProperties, $pluginSlug);

            // --- Import component properties ---
            $this->addLog('Importing component properties', true, ['count' => count($componentProperties)]);
            $this->importComponentProperties($component->id, $componentProperties);

            /*// --- Import component scopes ---
            $scopes = $payload['scopes'] ?? [];
            $this->addLog('Importing component scopes', true, ['count' => count($scopes)]);
            $this->importComponentScopes($component, $scopes);*/

            DB::commit();
            $this->addLog('Import completed successfully', true);

        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $this->addLog('Import failed: ' . $e->getMessage(), false, [
                'exception' => $e->getTraceAsString()
            ]);
        }

        // Save a single ComponentImportLog for this component
        ComponentImportLog::create([
            'component_name' => $this->componentName,
            'success' => $success,
            'source' => $this->source,
            'message' => json_encode($this->logs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        ]);

        return [
            'success' => $success,
            'message' => $success ? 'Component imported successfully' : 'Import failed',
            'component_id' => $component->id ?? null
        ];
    }

    /**
     * Add step to log array
     */
    protected function addLog(string $message, bool $success, $data = null): void
    {
        $this->logs[] = [
            'step' => $message,
            'success' => $success,
            'data' => $data,
            'time' => now()->toDateTimeString()
        ];
    }

    /**
     * Import reference data (plugins, layout types, etc.)
     */
    protected function importReferenceData(array $payload): array
    {
        $layoutType = null;
        $componentType = null;

        if (!empty($payload['plugin'])) {
            $this->addLog('Importing plugin: ' . $payload['plugin']['slug'], true, $payload['plugin']);
            SupportsPlugin::updateOrCreate(
                ['slug' => $payload['plugin']['slug']],
                [
                    'name' => $payload['plugin']['name'] ?? null,
                    'prefix' => $payload['plugin']['prefix'] ?? null,
                    'status' => $payload['plugin']['status'] ?? null,
                    'title' => $payload['plugin']['title'] ?? null,
                    'description' => $payload['plugin']['description'] ?? null,
                    'others' => $payload['plugin']['others'] ?? null,
                    'is_disable' => $payload['plugin']['is_disable'] ?? null,
                    'sort_order' => $payload['plugin']['sort_order'] ?? null
                ]
            );
        }

        if (!empty($payload['layout_type'])) {
            $this->addLog('Importing layout type: ' . $payload['layout_type']['slug'], true, $payload['layout_type']);
            $layoutType = LayoutType::updateOrCreate(
                ['slug' => $payload['layout_type']['slug']],
                [
                    'name' => $payload['layout_type']['name'] ?? null,
                    'slug' => $payload['layout_type']['slug'] ?? null,
                    'is_active' => $payload['layout_type']['is_active'] ?? null
                ]
            );
        }

        if (!empty($payload['component_type'])) {
            $this->addLog('Importing component type: ' . $payload['component_type']['slug'], true, $payload['component_type']);
            $componentType = ComponentType::updateOrCreate(
                ['slug' => $payload['component_type']['slug']],
                $payload['component_type']
            );
        }

        // Import scopes
        if (!empty($payload['scopes'])) {
            foreach ($payload['scopes'] as $scope) {
                $pageId = null;
                if (!empty($scope['page_id']) && !empty($scope['page'])) {
                    $page = Page::firstOrCreate(
                        ['slug' => $scope['page']['slug']],
                        [
                            'name' => $scope['page']['name'],
                            'plugin_slug' => $scope['page']['plugin_slug'] ?? $payload['plugin']['slug'],
                        ]
                    );
                    $pageId = $page->id;
                }

                if ($scope['slug'] != 'appbar' && $scope['slug'] != 'navbar' && $scope['slug'] != 'drawer') {
                    Scope::updateOrCreate(
                        ['slug' => $scope['slug'], 'plugin_slug' => $payload['plugin']['slug']],
                        [
                            'name' => $scope['name'],
                            'is_global' => $scope['is_global'],
                            'page_id' => $pageId,
                        ]
                    );
                }
            }
            $this->addLog('Scopes imported', true, ['count' => count($payload['scopes'])]);
        }

        if ($payload['class_types']){
            ClassType::updateOrCreate(
                ['slug' => $payload['component']['product_type']],
                $payload['class_types']
            );
        }

        return [
            'layout_type_id' => $layoutType?->id ?? null,
            'component_type_id' => $componentType?->id ?? null
        ];
    }

    /**
     * Import component
     */
    protected function importComponent(array $componentData, bool $overwrite)
    {
        $existing = Component::where('slug', $componentData['slug'])->first();

        if ($existing && !$overwrite) {
            throw new \Exception('Component already exists. Enable overwrite to replace.');
        }

        $data = $this->prepareComponentData($componentData);
        return Component::updateOrCreate(
            ['slug' => $data['slug']],
            $data
        );
    }

    /**
     * Prepare component data and handle image
     */
    protected function prepareComponentData(array $data): array
    {
        // Encode JSON fields
        $jsonFields = ['scope', 'items', 'dev_data', 'filters', 'pagination'];
        foreach ($jsonFields as $field) {
            if (!empty($data[$field]) && is_array($data[$field])) {
                $data[$field] = json_encode($data[$field]);
            }
        }

        // Handle image
        if (!empty($data['image'])) {
            $fileName = $data['image'];
            $imageUrl = $fileName;

            $this->addLog("Downloading image: $imageUrl", true);

            try {
                $response = Http::timeout(30)->get($imageUrl);
                if ($response->successful()) {
                    $imageContent = $response->body();
                    $extension = pathinfo($fileName, PATHINFO_EXTENSION) ?: 'jpg';
                    $newFileName = 'component-image/' . uniqid('img_') . '.' . $extension;
                    Storage::disk('r2')->put($newFileName, $imageContent);
                    $data['image'] = $newFileName;
                    $this->addLog('Image uploaded to R2', true, ['url' => $newFileName]);
                } else {
                    $data['image'] = null;
                    $this->addLog('Failed to download image', false, ['url' => $imageUrl, 'status' => $response->status()]);
                }
            } catch (\Exception $e) {
                $this->addLog('Image download/upload failed', false, ['url' => $imageUrl, 'error' => $e->getMessage()]);
            }
        }

        return $data;
    }

    /**
     * Import style groups
     */
    protected function importComponentStyleGroups(int $componentId, array $styleGroups, array $componentProperties, string $pluginSlug): void
    {
        foreach ($styleGroups as $group) {
            if (empty($group['style_group']['slug'])) continue;

            $styleGroup = StyleGroup::where('slug', $group['style_group']['slug'])->first();

            if (!$styleGroup) {
                $styleGroup = StyleGroup::create([
                    'slug'        => $group['style_group']['slug'] ?? null,
                    'name'        => $group['style_group']['name'] ?? null,
                    'plugin_slug' => [$pluginSlug],
                    'is_active'   => $group['style_group']['is_active'] ?? 1,
                ]);
            } else {
                $exPluginSlug = $styleGroup->plugin_slug ?? [];

                if (!in_array($pluginSlug, $exPluginSlug)) {
                    $exPluginSlug[] = $pluginSlug;
                    $styleGroup->update(['plugin_slug' => array_values($exPluginSlug)]);
                }
            }

            // Now VALID model is always passed here
            $this->updateStyleGroupProperties($styleGroup, $group['style_group']['properties'] ?? []);

            ComponentStyleGroup::updateOrCreate(
                [
                    'component_id' => $componentId,
                    'style_group_id' => $styleGroup->id
                ],
                ['is_checked' => $group['is_checked'] ?? false]
            );
        }
    }


    protected function updateStyleGroupProperties(StyleGroup $styleGroup, array $properties): void
    {
        foreach ($properties as $property) {
            if (empty($property['name']) || empty($property['input_type'])) continue;

            $styleProperty = StyleProperties::updateOrCreate(
                ['name' => $property['name'], 'input_type' => $property['input_type']],
                [
                    'value' => $property['value'] ?? null,
                    'default_value' => $property['default_value'] ?? null,
                    'is_active' => $property['is_active'] ?? true
                ]
            );

            StyleGroupProperties::updateOrCreate(
                [
                    'style_group_id' => $styleGroup->id,
                    'style_property_id' => $styleProperty->id
                ],
                []
            );
        }
    }

    /**
     * Import component properties
     */
    protected function importComponentProperties(int $componentId, array $properties): void
    {
        foreach ($properties as $property) {
            $findStyleGroup = StyleGroup::where('slug', $property['style_group']['slug'] ?? '')->first();
            if (!$findStyleGroup) continue;

            $componentStyleGroup = ComponentStyleGroup::where('component_id', $componentId)
                ->where('style_group_id', $findStyleGroup->id)
                ->first();
            if (!$componentStyleGroup) continue;

            ComponentStyleGroupProperties::updateOrCreate(
                [
                    'component_id' => $componentId,
                    'style_group_id' => $findStyleGroup->id,
                    'name' => $property['name'] ?? '',
                    'input_type' => $property['input_type'] ?? ''
                ],
                [
                    'value' => $property['value'] ?? null,
                    'default_value' => $property['default_value'] ?? null,
                    'is_active' => $property['is_active'] ?? true
                ]
            );
        }
    }

    /**
     * Import component scopes
     */
    protected function importComponentScopes(Component $component, array $scopes): void
    {
        $scopeSlugs = array_column($scopes, 'slug');
        $component->scope = json_encode($scopeSlugs);
        $component->save();
    }
}
