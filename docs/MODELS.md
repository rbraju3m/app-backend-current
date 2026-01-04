# Database Models Reference

Complete documentation for all Eloquent models in the Appza Backend application.

## Table of Contents

1. [License & Authorization Models](#license--authorization-models)
2. [Build & Domain Models](#build--domain-models)
3. [Theme & Component Models](#theme--component-models)
4. [Plugin & Addon Models](#plugin--addon-models)
5. [Configuration Models](#configuration-models)
6. [System Models](#system-models)

---

## License & Authorization Models

### Lead
**Table**: `appfiy_customer_leads`  
**Purpose**: Customer/lead management and API authorization

#### Fields
- `id` - Primary key
- `first_name` - Customer first name
- `last_name` - Customer last name
- `email` - Customer email
- `mobile` - Customer phone number
- `domain` - Customer's domain/website URL
- `customer_id` - External customer ID reference
- `license_id` - Associated license ID
- `note` - Additional notes
- `appza_hash` - Authorization hash token
- `plugin_name` - Product/plugin name (appza, lazy_task, fcom_mobile)
- `is_active` - Active status (1 = active, 0 = inactive)
- `is_close` - Lead closed status
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Key Methods
```php
// Check API authorization from request headers
Lead::checkAuthorization(Request $request): array

// Scope: Get active and open leads
Lead::activeAndOpen()
```

#### Usage
```php
// Authorization check
$auth = Lead::checkAuthorization($request);
if (!$auth['auth_type']) {
    return response()->json(['error' => 'Unauthorized'], 401);
}

// Get active leads
$leads = Lead::activeAndOpen()->get();
```

#### Authorization Headers
- `appza-hash` - For Appza product
- `lazy-task-hash` - For Lazy Task product
- `Fcom-mobile-hash` - For Fcom Mobile product

---

### FreeTrial
**Table**: `appza_free_trial_request`  
**Purpose**: Free trial license management

#### Fields
- `id` - Primary key
- `product_slug` - Product identifier (appza, lazy_task, fcom_mobile)
- `site_url` - Customer's website URL
- `name` - Customer name
- `email` - Customer email
- `product_id` - Fluent product ID
- `variation_id` - Product variation ID
- `license_key` - Trial license key
- `activation_hash` - License activation hash
- `product_title` - Product name
- `activation_limit` - Max number of activations allowed
- `activations_count` - Current activation count
- `expiration_date` - Trial expiration date
- `grace_period_date` - Grace period end date
- `is_fluent_license_check` - Whether to check Fluent license (0 = free trial, 1 = premium)
- `premium_license_id` - Associated premium license ID
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Casts
- `created_at` → datetime
- `expiration_date` → datetime
- `grace_period_date` → datetime

#### Usage
```php
// Create free trial
$trial = FreeTrial::create([
    'product_slug' => 'appza',
    'site_url' => 'https://example.com',
    'email' => 'user@example.com',
    'grace_period_date' => now()->addDays(14),
    'is_fluent_license_check' => 0
]);

// Check if trial is expired
$isExpired = $trial->grace_period_date < now();

// Get active premium licenses
$premium = FreeTrial::where('is_fluent_license_check', 1)->get();
```

---

### FluentInfo
**Table**: `appza_fluent_informations`  
**Purpose**: Fluent product configuration and metadata

#### Fields
- `id` - Primary key
- `product_name` - Product display name
- `product_slug` - Product identifier
- `item_id` - Fluent item ID
- `api_url` - Fluent API endpoint URL
- `is_active` - Active status
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Key Methods
```php
// Get dropdown options
FluentInfo::getProductDropdown(): array

// Get product tabs (active products)
FluentInfo::getProductTab()
```

#### Usage
```php
// Get product configuration
$product = FluentInfo::where('product_slug', 'appza')->first();

// Get all active products
$products = FluentInfo::getProductTab();

// Product dropdown for admin panel
$dropdown = FluentInfo::getProductDropdown();
```

---

### FluentLicenseInfo
**Table**: `appza_fluent_license_info`  
**Purpose**: Premium (Fluent) license metadata storage

#### Fields
- `id` - Primary key
- `build_domain_id` - Associated build domain ID
- `site_url` - Licensed website URL
- `product_id` - Fluent product ID
- `variation_id` - Product variation ID
- `license_key` - License key
- `activation_hash` - Activation hash from Fluent API
- `product_title` - Product name
- `variation_title` - Variation name
- `activation_limit` - Maximum activations
- `activations_count` - Current activation count
- `expiration_date` - License expiration date
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Usage
```php
// Store Fluent license
$license = FluentLicenseInfo::create([
    'build_domain_id' => $domain->id,
    'site_url' => $siteUrl,
    'license_key' => $key,
    'activation_hash' => $response['activation_hash'],
    'product_id' => $response['product_id'],
    'expiration_date' => $response['expires_at']
]);

// Get license by site
$license = FluentLicenseInfo::where('site_url', $url)->first();
```

---

### BuildDomain
**Table**: `appfiy_build_domain`  
**Purpose**: Domain and build configuration storage

#### Fields
- `id` - Primary key
- `site_url` - Website URL
- `package_name` - Android package name (com.example.app)
- `email` - Customer email
- `plugin_name` - Product name
- `license_key` - Associated license key
- `version_id` - App version ID
- `fluent_id` - Fluent product ID
- `fluent_item_id` - Fluent item ID
- `app_name` - Application name
- `app_logo` - Application logo URL
- `app_splash_screen_image` - Splash screen image URL
- `build_version` - Build version number
- `build_plugin_slug` - Plugin slug for build
- `is_android` - Android build enabled
- `is_ios` - iOS build enabled
- `is_app_license_check` - Enable app license checking
- `is_deactivated` - License deactivation status
- `confirm_email` - Email confirmation status
- `ios_issuer_id` - Apple issuer ID
- `ios_key_id` - Apple key ID
- `ios_p8_file_content` - Apple P8 certificate content
- `ios_app_name` - iOS app name
- `team_id` - Apple team ID
- `android_push_notification_url` - Android FCM URL
- `ios_push_notification_url` - iOS APNS URL
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Usage
```php
// Create build domain
$domain = BuildDomain::create([
    'site_url' => 'https://example.com',
    'package_name' => 'com.example.app',
    'email' => 'user@example.com',
    'plugin_name' => 'appza',
    'app_name' => 'My App',
    'is_android' => 1,
    'is_ios' => 0
]);

// Get domain by URL
$domain = BuildDomain::where('site_url', $url)->first();

// Update license status
$domain->update(['is_deactivated' => 1]);
```

---

## Build & Domain Models

### ApkBuildHistory
**Table**: `appfiy_apk_build_history`  
**Purpose**: APK/IPA build history and tracking

#### Fields
- `id` - Primary key
- `version_id` - App version ID
- `build_domain_id` - Associated build domain ID
- `fluent_id` - Fluent product ID
- `app_name` - Application name
- `app_logo` - Logo URL
- `app_splash_screen_image` - Splash screen URL
- `build_version` - Build version number
- `build_status` - Build status (pending, processing, completed, failed)
- `build_log` - Build process logs
- `download_url` - Download URL for completed build
- `ios_issuer_id` - Apple issuer ID
- `ios_key_id` - Apple key ID
- `ios_team_id` - Apple team ID
- `ios_p8_file_content` - Apple certificate
- `ios_app_name` - iOS app name
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Usage
```php
// Create build record
$build = ApkBuildHistory::create([
    'build_domain_id' => $domain->id,
    'version_id' => $version->id,
    'app_name' => 'My App',
    'build_status' => 'pending',
    'build_version' => '1.0.0'
]);

// Update build status
$build->update([
    'build_status' => 'completed',
    'download_url' => 'https://cdn.../app.apk'
]);

// Get build history
$history = ApkBuildHistory::where('build_domain_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();
```

---

## Theme & Component Models

### Theme
**Table**: `appfiy_theme`  
**Purpose**: App theme definitions and configurations

#### Fields
- `id` - Primary key
- `name` - Theme name
- `slug` - URL-friendly slug
- `image` - Theme preview image
- `appbar_id` - AppBar configuration ID
- `navbar_id` - Navigation bar configuration ID
- `drawer_id` - Drawer configuration ID
- `appbar_navbar_drawer` - Combined component JSON
- `background_color` - Default background color
- `font_family` - Default font family
- `text_color` - Default text color
- `font_size` - Default font size
- `transparent` - Transparency settings
- `dashboard_page` - Dashboard page ID
- `login_page` - Login page ID
- `login_modal` - Login modal configuration
- `sort_order` - Display order
- `plugin_slug` - Associated plugin
- `default_page` - Default page ID
- `is_active` - Active status
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp
- `deleted_at` - Soft delete timestamp

#### Relationships
```php
$theme->appbar()       // belongsTo GlobalConfig
$theme->navbar()       // belongsTo GlobalConfig
$theme->drawer()       // belongsTo GlobalConfig
$theme->component()    // hasMany ThemeComponent
$theme->page()         // hasMany ThemePage
$theme->globalConfig() // hasMany ThemeConfig
$theme->componentStyle() // hasMany ThemeComponentStyle
$theme->photoGallery() // hasMany ThemePhotoGallery
```

#### Scopes
```php
Theme::active() // Get only active themes
```

#### Usage
```php
// Get active themes
$themes = Theme::active()->get();

// Get theme with relationships
$theme = Theme::with(['page', 'component', 'appbar'])
    ->find($id);

// Theme will auto-delete images on deletion
$theme->delete();
```

---

### Page
**Table**: `appfiy_page`  
**Purpose**: Page definitions for app screens

#### Fields
- `id` - Primary key
- `name` - Page name
- `slug` - URL-friendly slug
- `plugin_slug` - Associated plugin
- `background_color` - Page background color
- `border_color` - Border color
- `border_radius` - Border radius
- `component_limit` - Max components allowed
- `persistent_footer_buttons` - Footer button config
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp
- `deleted_at` - Soft delete timestamp

#### Usage
```php
// Create page
$page = Page::create([
    'name' => 'Home',
    'slug' => 'home',
    'plugin_slug' => 'appza',
    'background_color' => '#FFFFFF'
]);

// Get pages by plugin
$pages = Page::where('plugin_slug', 'appza')->get();
```

---

### Component
**Table**: `appfiy_component`  
**Purpose**: Reusable UI components

#### Fields
- `id` - Primary key
- `parent_id` - Parent component ID (for nested components)
- `name` - Component name
- `slug` - URL-friendly slug
- `label` - Display label
- `layout_type_id` - Layout type ID
- `component_type_id` - Component type ID
- `icon_code` - Icon code/identifier
- `app_icon` - Mobile app icon
- `web_icon` - Web icon
- `image` - Component image
- `image_url` - Image URL
- `event` - Event handler
- `scope` - Component scope
- `class_type` - Component class
- `product_type` - Product association
- `selected_design` - Selected design variant
- `details_page` - Details page configuration
- `transparent` - Transparency setting
- `is_active` - Active status
- `is_upcoming` - Upcoming feature flag
- `is_multiple` - Multiple instances allowed
- `plugin_slug` - Associated plugin
- `items` - Items configuration (JSON)
- `dev_data` - Development data (JSON)
- `pagination` - Pagination settings (JSON)
- `filters` - Filter configuration (JSON)
- `show_no_data_view` - Show empty state
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp
- `deleted_at` - Soft delete timestamp

#### Casts
- `items` → array
- `dev_data` → array
- `filters` → array
- `pagination` → array

#### Relationships
```php
$component->componentStyleGroup() // hasMany ComponentStyleGroup
$component->componentLayout()     // belongsTo LayoutType
```

#### Features
- Auto-generates slug from name
- Soft deletes enabled

#### Usage
```php
// Create component
$component = Component::create([
    'name' => 'Product Grid',
    'layout_type_id' => 1,
    'plugin_slug' => 'appza',
    'items' => ['item1', 'item2'],
    'pagination' => ['per_page' => 10]
]);

// Get with relationships
$component = Component::with(['componentLayout', 'componentStyleGroup'])
    ->find($id);
```

---

### GlobalConfig
**Table**: `appfiy_global_config`  
**Purpose**: Global configuration components (AppBar, NavBar, Drawer, etc.)

#### Fields
- `id` - Primary key
- `mode` - Config mode (appbar, navbar, drawer, etc.)
- `name` - Configuration name
- `slug` - URL-friendly slug
- `selected_color` - Selected state color
- `unselected_color` - Unselected state color
- `background_color` - Background color
- `layout` - Layout type
- `icon_theme_size` - Icon size
- `icon_theme_color` - Icon color
- `shadow` - Shadow configuration
- `icon` - Icon identifier
- `image` - Image URL
- `automatically_imply_leading` - Auto leading
- `center_title` - Center title flag
- `flexible_space` - Flexible space config
- `bottom` - Bottom configuration
- `shape_type` - Shape type
- `shape_border_radius` - Border radius
- `toolbar_opacity` - Toolbar opacity
- `actions_icon_theme_color` - Action icon color
- `actions_icon_theme_size` - Action icon size
- `title_spacing` - Title spacing
- `text_properties_color` - Text color
- `icon_properties_*` - Icon properties (size, color, shape, padding, margin)
- `image_properties_*` - Image properties (height, width, shape, padding, margin)
- `padding_x/y` - Padding horizontal/vertical
- `margin_x/y` - Margin horizontal/vertical
- `is_active` - Active status
- `is_upcoming` - Upcoming feature
- `float` - Float value
- `currency_id` - Currency ID
- `plugin_slug` - Associated plugin
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp
- `deleted_at` - Soft delete timestamp

#### Key Methods
```php
// Get dropdown by mode and plugin
GlobalConfig::getDropdown($mode, $pluginSlug)
```

#### Relationships
```php
$config->currency() // hasOne Currency
```

#### Usage
```php
// Get appbar configurations
$appbars = GlobalConfig::where('mode', 'appbar')
    ->where('is_active', 1)
    ->get();

// Get dropdown for admin
$dropdown = GlobalConfig::getDropdown('navbar', 'appza');
```

---

## Plugin & Addon Models

### Addon
**Table**: `appza_product_addons`  
**Purpose**: Plugin/addon management

#### Fields
- `id` - Primary key
- `product_id` - Associated product ID
- `addon_name` - Addon name
- `addon_slug` - URL-friendly slug
- `addon_json_info` - Addon information (JSON)
- `is_active` - Active status
- `is_premium_plugin` - Premium plugin flag
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Usage
```php
// Get active addons
$addons = Addon::where('is_active', 1)->get();

// Get premium addons
$premium = Addon::where('is_premium_plugin', 1)->get();

// Get addon by slug
$addon = Addon::where('addon_slug', 'payment-gateway')->first();
```

---

### SupportsPlugin
**Table**: `appza_supports_plugin`  
**Purpose**: Plugin support definitions

#### Fields
- `id` - Primary key
- `name` - Plugin name
- `slug` - URL-friendly slug
- `is_active` - Active status
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

---

## Configuration Models

### ThemeConfig
**Table**: `appfiy_theme_config`  
**Purpose**: Theme-specific configuration overrides

#### Fields
- `id` - Primary key
- `theme_id` - Associated theme ID
- `global_config_id` - Global config ID to override
- `config_data` - Configuration data (JSON)
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

---

### ThemePage
**Table**: `appfiy_theme_page`  
**Purpose**: Pages associated with themes

#### Fields
- `id` - Primary key
- `theme_id` - Associated theme ID
- `page_id` - Associated page ID
- `sort_order` - Display order
- `is_active` - Active status
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

---

### ThemeComponent
**Table**: `appfiy_theme_component`  
**Purpose**: Components used in themes

#### Fields
- `id` - Primary key
- `theme_id` - Associated theme ID
- `component_id` - Associated component ID
- `page_id` - Associated page ID
- `sort_order` - Display order
- `config_data` - Component configuration (JSON)
- `is_active` - Active status
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

---

## System Models

### RequestLog
**Table**: `appza_request_logs`  
**Purpose**: API request/response logging

#### Fields
- `id` - Primary key
- `method` - HTTP method (GET, POST, etc.)
- `url` - Request URL
- `headers` - Request headers (JSON)
- `request_data` - Request payload (JSON)
- `response_status` - HTTP response status
- `response_data` - Response payload (JSON)
- `ip_address` - Client IP address
- `user_agent` - Client user agent
- `user_id` - Associated user ID (if authenticated)
- `execution_time` - Request execution time (seconds)
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Casts
- `headers` → array
- `request_data` → array
- `response_data` → array
- `execution_time` → float

#### Relationships
```php
$log->user() // belongsTo User
```

#### Usage
```php
// Log API request
RequestLog::create([
    'method' => 'POST',
    'url' => '/api/v1/license/check',
    'headers' => $request->headers->all(),
    'request_data' => $request->all(),
    'response_status' => 200,
    'response_data' => $response,
    'ip_address' => $request->ip(),
    'user_agent' => $request->userAgent(),
    'execution_time' => $executionTime
]);

// Get logs by URL
$logs = RequestLog::where('url', 'like', '%license%')->get();
```

---

### User
**Table**: `users`  
**Purpose**: Admin/user authentication

#### Fields
- `id` - Primary key
- `name` - User name
- `email` - User email (unique)
- `email_verified_at` - Email verification timestamp
- `password` - Hashed password
- `remember_token` - Remember me token
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Usage
```php
// Standard Laravel user model
$user = User::where('email', $email)->first();

// Check password
if (Hash::check($password, $user->password)) {
    // Login
}
```

---

### PopupMessage
**Table**: `appza_popup_message`  
**Purpose**: User-facing popup messages and notifications

#### Fields
- `id` - Primary key
- `title` - Message title
- `message` - Message content
- `type` - Message type (info, warning, error, success)
- `product_slug` - Target product
- `is_active` - Active status
- `start_date` - Display start date
- `end_date` - Display end date
- `created_at` - Creation timestamp
- `updated_at` - Last update timestamp

#### Usage
```php
// Get active messages
$messages = PopupMessage::where('is_active', 1)
    ->where('start_date', '<=', now())
    ->where('end_date', '>=', now())
    ->get();

// Get messages for product
$messages = PopupMessage::where('product_slug', 'appza')
    ->where('is_active', 1)
    ->get();
```

---

## Model Relationships Summary

```
Lead (1) ────────────── (∞) BuildDomain
                              │
                              ├─── (1) FluentLicenseInfo
                              └─── (∞) ApkBuildHistory

Theme (1) ───┬─── (∞) ThemePage ────── (1) Page
             ├─── (∞) ThemeComponent ─ (1) Component
             ├─── (∞) ThemeConfig ──── (1) GlobalConfig
             └─── (∞) ThemePhotoGallery

Component (1) ───┬─── (∞) ComponentStyleGroup
                 └─── (1) LayoutType

GlobalConfig (1) ─── (1) Currency

FreeTrial (1:1) ────── BuildDomain (via site_url)

RequestLog (∞) ─────── (1) User
```

---

## Common Query Patterns

### License Checking
```php
// Check if site has valid license
$trial = FreeTrial::where('site_url', $url)->first();
if ($trial && $trial->grace_period_date >= now()) {
    // Valid trial
} elseif ($trial && $trial->is_fluent_license_check == 1) {
    // Check premium license via Fluent API
}
```

### Build Creation
```php
// Create complete build record
$domain = BuildDomain::create([/*...*/]);
$build = ApkBuildHistory::create([
    'build_domain_id' => $domain->id,
    /*...*/
]);
```

### Theme Loading
```php
// Load theme with all relationships
$theme = Theme::with([
    'page',
    'component',
    'appbar',
    'navbar',
    'drawer',
    'globalConfig'
])->find($id);
```

---

**Last Updated**: January 2026
