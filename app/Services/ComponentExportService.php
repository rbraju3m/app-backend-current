<?php
namespace App\Services;

use App\Models\Component;
use App\Models\ComponentStyleGroup;
use App\Models\ComponentStyleGroupProperties;
use App\Models\SupportsPlugin;
use App\Models\LayoutType;
use App\Models\Scope;
use App\Models\ComponentType;
use App\Models\ClassType;

class ComponentExportService
{
    /**
     * Export single component and all related data
     * @param int $id
     * @return array
     */
    public function export(int $id)
    {
        $component = Component::findOrFail($id);

        // Get all related data
        $styleGroups = $this->exportComponentStyleGroups($id);
        $properties = $this->exportComponentProperties($id);
        $plugin = SupportsPlugin::where('slug', $component->plugin_slug)->first();
        $layoutType = LayoutType::find($component->layout_type_id);
        $componentType = ComponentType::find($component->component_type_id);
        $scopes = $this->exportScopes($component);
        $classTypes = $this->exportClassTypes($component);

        return [
            'meta' => [
                'exported_at' => now()->toDateTimeString(),
                'version' => config('app.version', '1.0'),
                'source' => config('app.url'),
                'component_id' => $id,
                'checksum' => md5(json_encode($component))
            ],
            'component' => $this->sanitizeComponent($component),
            'plugin' => $plugin ? $plugin->toArray() : null,
            'layout_type' => $layoutType ? $layoutType->toArray() : null,
            'component_type' => $componentType ? $componentType->toArray() : null,
            'style_groups' => $styleGroups,
            'properties' => $properties,
            'scopes' => $scopes,
            'class_types' => $classTypes,
        ];
    }
    protected function exportComponentStyleGroups(int $componentId): array
    {
        $componentStyleGroups = ComponentStyleGroup::where('component_id', $componentId)
            ->with([
                'styleGroup:id,name,slug',
                'styleGroup.groupProperties.styleProperty'
            ])
            ->get()
            ->toArray();

        // Transform the data to include properties in a more usable format
        return $this->transformStyleGroupData($componentStyleGroups);
    }

    /**
     * Transform style group data to include properties in a flattened structure
     */
    protected function transformStyleGroupData(array $componentStyleGroups): array
    {
        return array_map(function ($componentStyleGroup) {
            // Extract style group data
            $styleGroup = $componentStyleGroup['style_group'];

            // Extract properties
            $properties = [];
            if (!empty($styleGroup['group_properties'])) {
                foreach ($styleGroup['group_properties'] as $property) {
                    if (!empty($property['style_property'])) {
                        $properties[] = $property['style_property'];
                    }
                }
            }

            // Return transformed data
            return [
                'id' => $componentStyleGroup['id'],
                'component_id' => $componentStyleGroup['component_id'],
                'style_group_id' => $componentStyleGroup['style_group_id'],
                'is_checked' => $componentStyleGroup['is_checked'],
                'style_group' => [
                    'id' => $styleGroup['id'],
                    'name' => $styleGroup['name'],
                    'slug' => $styleGroup['slug'],
                    'properties' => $properties
                ]
            ];
        }, $componentStyleGroups);
    }

    /**
     * Export component properties
     */
    protected function exportComponentProperties(int $componentId): array
    {
        return ComponentStyleGroupProperties::with('styleGroup')->where('component_id', $componentId)
            ->get()
            ->toArray();
    }

    /**
     * Export scopes related to component with page data
     */
    protected function exportScopes(Component $component): array
    {
        $scopeArray = json_decode($component->scope, true) ?? [];
        $scopes = Scope::whereIn('slug', $scopeArray)
            ->with(['page:id,name,slug,plugin_slug,background_color,border_color,border_radius,component_limit,persistent_footer_buttons'])
            ->get(['id', 'name', 'slug', 'is_global', 'page_id'])
            ->toArray();

        return $scopes;
    }

    /**
     * Export class types related to component
     */

    protected function exportClassTypes(Component $component)
    {
        if (!$component->plugin_slug) {
            return [];
        }

        return ClassType::whereJsonContains('plugin', $component->plugin_slug)
            ->where('slug', $component->product_type)
            ->get(['id', 'name', 'slug', 'plugin']) // Include plugin field
            ->first();
    }

    /**
     * Sanitize component data for export
     */
    protected function sanitizeComponent(Component $component): array
    {
        $data = $component->toArray();

        // Remove sensitive or auto-generated fields
        unset($data['id'], $data['created_at'], $data['updated_at']);

        // Ensure JSON fields are properly decoded
        $jsonFields = ['scope', 'items', 'dev_data', 'filters', 'pagination'];
        foreach ($jsonFields as $field) {
            if (!empty($data[$field])) {
                $data[$field] = json_decode($data[$field], true) ?? $data[$field];
            }
        }

        $data['image'] = config('app.image_public_path') . $component->image;

        return $data;
    }
}
