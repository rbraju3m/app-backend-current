# Complete API Endpoints Reference

Comprehensive documentation for all API endpoints in Appza Backend.

## Table of Contents

1. [Base URLs](#base-urls)
2. [Authentication](#authentication)
3. [Lead Management](#lead-management)
4. [Theme Management](#theme-management)
5. [Page Components](#page-components)
6. [Global Configuration](#global-configuration)
7. [Free Trial](#free-trial)
8. [License Management](#license-management)
9. [APK Build](#apk-build)
10. [Plugin Management](#plugin-management)
11. [Firebase Integration](#firebase-integration)
12. [Mobile Version Check](#mobile-version-check)

---

## Base URLs

### API Version URLs
- **v1**: `/appza/v1/...`
- **v2**: `/appza/v2/...`

### Middleware Applied
All routes include:
- `LogRequestResponse` - Request/response logging
- `LogActivity` - Activity logging
- `ApiVersionDeprecationMiddleware` - Version deprecation warnings

---

## Authentication

All endpoints require authorization via hash headers:

### Headers
```http
appza-hash: {your_hash_token}
lazy-task-hash: {your_hash_token}
Fcom-mobile-hash: {your_hash_token}
```

Use the appropriate header based on your product.

---

## Lead Management

### Create Lead

**POST** `/appza/v1/lead/store/{product}`  
**POST** `/appza/v2/lead/store/{product}`

Create a new customer lead.

#### Path Parameters
- `product` (required) - Product type: `appza`, `lazy_task`, `fcom_mobile`

#### Request Body
```json
{
  "first_name": "John",
  "last_name": "Doe",
  "email": "john@example.com",
  "mobile": "+1234567890",
  "domain": "https://example.com",
  "note": "Interested in premium features"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "Lead created successfully",
  "data": {
    "id": 123,
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@example.com",
    "domain": "https://example.com",
    "plugin_name": "appza",
    "appza_hash": "generated_hash_token",
    "created_at": "2026-01-01T00:00:00.000000Z"
  }
}
```

#### Response Error (422)
```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "email": ["The email field is required."],
    "domain": ["The domain field is required."]
  }
}
```

---

## Theme Management

### Get All Themes

**GET** `/appza/v1/themes`  
**GET** `/appza/v2/themes`

Retrieve list of available themes.

#### Query Parameters
- `page` (optional) - Page number for pagination
- `per_page` (optional) - Items per page (default: 15)
- `plugin_slug` (optional) - Filter by plugin (appza, lazy_task, fcom_mobile)

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "Modern Theme",
        "slug": "modern-theme",
        "image": "https://cdn.../themes/1/image.png",
        "background_color": "#FFFFFF",
        "font_family": "Roboto",
        "text_color": "#000000",
        "font_size": 14,
        "plugin_slug": "appza",
        "is_active": true,
        "created_at": "2025-01-01T00:00:00.000000Z"
      }
    ],
    "total": 50,
    "per_page": 15,
    "last_page": 4
  }
}
```

---

### Get Single Theme

**GET** `/appza/v1/themes/get-theme`  
**GET** `/appza/v2/themes/get-theme`

Get detailed information about a specific theme.

#### Query Parameters
- `theme_id` (required) - Theme ID
- `site_url` (optional) - Site URL for context

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Modern Theme",
    "slug": "modern-theme",
    "image": "https://cdn.../themes/1/image.png",
    "appbar": {
      "id": 1,
      "name": "Default AppBar",
      "background_color": "#2196F3"
    },
    "navbar": {
      "id": 2,
      "name": "Bottom NavBar",
      "selected_color": "#2196F3"
    },
    "drawer": {
      "id": 3,
      "name": "Side Drawer"
    },
    "pages": [
      {
        "id": 1,
        "name": "Home",
        "slug": "home",
        "components": []
      }
    ],
    "components": [],
    "photo_gallery": []
  }
}
```

---

## Page Components

### Get Page Components

**GET** `/appza/v1/page-component`  
**GET** `/appza/v2/page-component`

Get components for a specific page.

#### Query Parameters
- `page_id` (required) - Page ID
- `theme_id` (optional) - Theme ID for theme-specific components

#### Response Success (200)
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "page_id": 1,
      "component_id": 5,
      "component_name": "Product Grid",
      "sort_order": 1,
      "config_data": {
        "columns": 2,
        "spacing": 10
      },
      "is_active": true
    }
  ]
}
```

---

## Global Configuration

### Get Global Config

**GET** `/appza/v1/global-config`  
**GET** `/appza/v2/global-config`

Get application-wide configuration.

#### Query Parameters
- `site_url` (required) - Website URL
- `product` (optional) - Product slug

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "app_name": "My App",
    "app_version": "1.0.0",
    "build_version": "1",
    "theme": {
      "id": 1,
      "name": "Modern Theme"
    },
    "features": {
      "push_notifications": true,
      "in_app_purchase": false
    },
    "colors": {
      "primary": "#2196F3",
      "secondary": "#FFC107"
    }
  }
}
```

---

## Free Trial

### Activate Free Trial

**POST** `/appza/v1/free/trial/{product}`  
**POST** `/appza/v2/free/trial/{product}`

Activate a free trial for a website.

#### Path Parameters
- `product` (required) - Product type: `appza`, `lazy_task`, `fcom_mobile`

#### Request Body
```json
{
  "site_url": "https://example.com",
  "name": "John Doe",
  "email": "john@example.com"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "Free trial activated successfully",
  "data": {
    "id": 123,
    "product_slug": "appza",
    "site_url": "https://example.com",
    "email": "john@example.com",
    "grace_period_date": "2026-01-15T00:00:00.000000Z",
    "is_fluent_license_check": false,
    "created_at": "2026-01-01T00:00:00.000000Z"
  }
}
```

#### Response Error (422)
```json
{
  "success": false,
  "message": "Free trial already exists for this site",
  "errors": {
    "site_url": ["This site already has an active free trial."]
  }
}
```

---

## License Management

### Check License (Web)

**GET** `/appza/v1/license/check`  
**GET** `/appza/v2/license/check` (V2 uses different controller)

Check if a license is valid.

#### Query Parameters
- `site_url` (required) - Website URL
- `license_key` (required) - License key

#### Response Success (200)
```json
{
  "success": true,
  "message": "License is valid",
  "data": {
    "license_key": "XXXX-XXXX-XXXX-XXXX",
    "site_url": "https://example.com",
    "product_title": "Appza Premium",
    "activation_limit": 1,
    "activations_count": 1,
    "expiration_date": "2027-01-01T00:00:00.000000Z",
    "is_active": true
  }
}
```

#### Response Error (404)
```json
{
  "success": false,
  "message": "License not found",
  "status": 404
}
```

---

### Check App License

**GET** `/appza/v1/app/license-check`  
**GET** `/appza/v2/app/license-check`

Check license status for mobile app (includes free trial check).

#### Query Parameters
- `site_url` (required) - Website URL
- `product` (required) - Product slug

#### Response Success - Free Trial (200)
```json
{
  "success": true,
  "license_type": "free_trial",
  "message": "Free trial is active",
  "data": {
    "site_url": "https://example.com",
    "product": "appza",
    "grace_period_date": "2026-01-15T00:00:00.000000Z",
    "days_remaining": 14
  }
}
```

#### Response Success - Premium (200)
```json
{
  "success": true,
  "license_type": "premium",
  "message": "Premium license is active",
  "data": {
    "license_key": "XXXX-XXXX-XXXX-XXXX",
    "site_url": "https://example.com",
    "product_title": "Appza Premium",
    "expiration_date": "2027-01-01T00:00:00.000000Z"
  }
}
```

#### Response Error - Expired (403)
```json
{
  "success": false,
  "message": "License has expired",
  "license_type": "expired",
  "status": 403
}
```

---

### Activate License

**POST** `/appza/v1/license/activate`  
**POST** `/appza/v2/license/activate`

Activate a premium license for a website.

#### Request Body
```json
{
  "site_url": "https://example.com",
  "license_key": "XXXX-XXXX-XXXX-XXXX",
  "email": "user@example.com"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "License activated successfully",
  "data": {
    "activation_hash": "generated_hash",
    "site_url": "https://example.com",
    "license_key": "XXXX-XXXX-XXXX-XXXX",
    "product_id": 123,
    "product_title": "Appza Premium",
    "activation_limit": 1,
    "activations_count": 1,
    "expiration_date": "2027-01-01T00:00:00.000000Z"
  }
}
```

#### Response Error (422)
```json
{
  "success": false,
  "message": "License activation failed",
  "errors": {
    "license_key": ["Invalid license key"],
    "site_url": ["This site is already activated"]
  }
}
```

---

### Deactivate License

**GET** `/appza/v1/license/deactivate`  
**GET** `/appza/v2/license/deactivate`

Deactivate a license or mark plugin as deleted.

#### Query Parameters
- `site_url` (required) - Website URL
- `product` (required) - Product slug
- `appza_action` (required) - Action: `license_deactivate` or `plugin_delete`
- `license_key` (conditional) - Required if action is `license_deactivate`

#### Response Success (200)
```json
{
  "success": true,
  "message": "License deactivated successfully"
}
```

---

### Version Check

**POST** `/appza/v1/license/version/check`  
**POST** `/appza/v2/license/version/check`

Get latest version information for a licensed product.

#### Request Body
```json
{
  "license_key": "XXXX-XXXX-XXXX-XXXX",
  "current_version": "1.0.0"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "latest_version": "1.2.0",
    "download_url": "https://cdn.../plugin-v1.2.0.zip",
    "changelog": "Bug fixes and improvements",
    "requires_update": true
  }
}
```

---

## APK Build

### Create Build Resource

**POST** `/appza/v1/build/resource`  
**POST** `/appza/v2/build/resource`

Create build resources (icons, splash screens, etc.).

#### Request Body
```json
{
  "site_url": "https://example.com",
  "app_logo": "base64_encoded_image",
  "app_splash_screen": "base64_encoded_image",
  "app_name": "My App",
  "package_name": "com.example.app"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "Build resources created successfully",
  "data": {
    "app_logo_url": "https://cdn.../logo.png",
    "app_splash_url": "https://cdn.../splash.png"
  }
}
```

---

### iOS Keys Verify

**POST** `/appza/v1/build/ios-keys-verify`  
**POST** `/appza/v2/build/ios-keys-verify`

Verify iOS signing certificates and keys.

#### Request Body
```json
{
  "site_url": "https://example.com",
  "ios_issuer_id": "xxxx-xxxx-xxxx",
  "ios_key_id": "XXXXXXXXXX",
  "ios_p8_file_content": "-----BEGIN PRIVATE KEY-----...",
  "team_id": "XXXXXXXXXX"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "iOS keys verified successfully",
  "data": {
    "valid": true
  }
}
```

---

### iOS Check App Name

**POST** `/appza/v1/build/ios-check-app-name`  
**POST** `/appza/v2/build/ios-check-app-name`

Check if iOS app name is available.

#### Request Body
```json
{
  "site_url": "https://example.com",
  "ios_app_name": "My App"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "available": true,
    "app_name": "My App"
  }
}
```

---

### Create APK Build

**POST** `/appza/v1/build`  
**POST** `/appza/v2/build`

Initiate a new APK/IPA build.

#### Request Body
```json
{
  "site_url": "https://example.com",
  "package_name": "com.example.app",
  "app_name": "My App",
  "theme_id": 1,
  "version_id": 1,
  "build_version": "1.0.0",
  "is_android": true,
  "is_ios": false,
  "firebase_config": {
    "api_key": "...",
    "project_id": "..."
  }
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "Build started successfully",
  "data": {
    "build_id": 123,
    "status": "queued",
    "created_at": "2026-01-01T00:00:00.000000Z"
  }
}
```

---

### Get Build History

**GET** `/appza/v1/build/history`  
**GET** `/appza/v2/build/history`

Get build history for a site.

#### Query Parameters
- `site_url` (required) - Website URL
- `page` (optional) - Page number

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 123,
        "app_name": "My App",
        "build_version": "1.0.0",
        "build_status": "completed",
        "download_url": "https://cdn.../app.apk",
        "created_at": "2026-01-01T00:00:00.000000Z"
      }
    ],
    "total": 10
  }
}
```

---

### Push Notification Resource

**POST** `/appza/v1/build/push-notification-resource`  
**POST** `/appza/v2/build/push-notification-resource`

Configure push notification settings.

#### Request Body
```json
{
  "site_url": "https://example.com",
  "android_push_notification_url": "https://fcm.googleapis.com/...",
  "ios_push_notification_url": "https://api.push.apple.com/..."
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "Push notification configured successfully"
}
```

---

### Build Response (Builder App)

**POST** `/appza/v1/build/response/{id}`  
**POST** `/appza/v2/build/response/{id}`

Callback endpoint for builder application to report build status.

#### Path Parameters
- `id` (required) - Build ID

#### Request Body
```json
{
  "status": "completed",
  "download_url": "https://cdn.../app.apk",
  "build_log": "Build completed successfully"
}
```

#### Response Success (200)
```json
{
  "success": true,
  "message": "Build status updated"
}
```

---

### Process Start (Builder App)

**POST** `/appza/v1/build/process-start/{id}`  
**POST** `/appza/v2/build/process-start/{id}`

Mark build process as started.

#### Path Parameters
- `id` (required) - Build ID

#### Response Success (200)
```json
{
  "success": true,
  "message": "Build process started"
}
```

---

## Plugin Management

### Get All Plugins

**GET** `/appza/v1/plugins`  
**GET** `/appza/v2/plugins`

Get list of available plugins/addons.

#### Query Parameters
- `product` (optional) - Filter by product slug

#### Response Success (200)
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "addon_name": "Payment Gateway",
      "addon_slug": "payment-gateway",
      "is_active": true,
      "is_premium_plugin": true,
      "addon_json_info": {
        "version": "1.0.0",
        "description": "Payment integration"
      }
    }
  ]
}
```

---

### Check Disabled Plugin

**GET** `/appza/v1/plugin/check-disable`  
**GET** `/appza/v2/plugin/check-disable`

Check if a plugin is disabled for a site.

#### Query Parameters
- `site_url` (required) - Website URL
- `plugin_slug` (required) - Plugin slug

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "is_disabled": false,
    "plugin_slug": "payment-gateway"
  }
}
```

---

### Plugin Version Check

**GET** `/appza/v1/plugin/version-check`  
**GET** `/appza/v2/plugin/version-check`

Check for plugin updates.

#### Query Parameters
- `plugin_slug` (required) - Plugin slug
- `current_version` (required) - Current version

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "latest_version": "1.2.0",
    "current_version": "1.0.0",
    "update_available": true,
    "changelog": "New features and bug fixes"
  }
}
```

---

### Plugin Install Latest Version

**GET** `/appza/v1/plugin/install-latest-version`  
**GET** `/appza/v2/plugin/install-latest-version`

Get download link for latest plugin version.

#### Query Parameters
- `plugin_slug` (required) - Plugin slug
- `license_key` (optional) - License key for premium plugins

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "version": "1.2.0",
    "download_url": "https://cdn.../plugin-v1.2.0.zip",
    "requires_license": true
  }
}
```

---

## Firebase Integration

### Get Firebase Credentials

**GET** `/appza/v1/firebase/credential/{product}`  
**GET** `/appza/v2/firebase/credential/{product}`

Get Firebase configuration for a product.

#### Path Parameters
- `product` (required) - Product slug: `appza`, `lazy_task`, `fcom_mobile`

#### Query Parameters
- `site_url` (optional) - Website URL for site-specific config

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "api_key": "AIzaSy...",
    "auth_domain": "project.firebaseapp.com",
    "project_id": "project-id",
    "storage_bucket": "project.appspot.com",
    "messaging_sender_id": "123456789",
    "app_id": "1:123456789:web:abcdef",
    "measurement_id": "G-XXXXXXXXXX"
  }
}
```

---

## Mobile Version Check

### Check Mobile Version

**GET** `/appza/v1/app/version-check`  
**GET** `/appza/v2/app/version-check`

Check for mobile app updates.

#### Query Parameters
- `platform` (required) - Platform: `android` or `ios`
- `current_version` (required) - Current app version
- `package_name` (optional) - Package name

#### Response Success - Update Available (200)
```json
{
  "success": true,
  "data": {
    "update_available": true,
    "latest_version": "1.2.0",
    "current_version": "1.0.0",
    "download_url": "https://cdn.../app-v1.2.0.apk",
    "force_update": false,
    "release_notes": "Bug fixes and improvements",
    "min_supported_version": "1.0.0"
  }
}
```

#### Response Success - Up to Date (200)
```json
{
  "success": true,
  "data": {
    "update_available": false,
    "latest_version": "1.0.0",
    "current_version": "1.0.0"
  }
}
```

---

## API Version Information

### Get API Versions

**GET** `/appza/versions`

Get information about all API versions.

#### Response Success (200)
```json
{
  "success": true,
  "data": {
    "current_version": "v2",
    "recommended_version": "v2",
    "versions": {
      "v1": {
        "status": "stable",
        "deprecated": false,
        "sunset_date": null
      },
      "v2": {
        "status": "stable",
        "deprecated": false,
        "sunset_date": null
      },
      "v0": {
        "status": "deprecated",
        "deprecated": true,
        "sunset_date": "2026-06-01"
      }
    }
  }
}
```

---

## Error Responses

### Common Error Codes

#### 401 Unauthorized
```json
{
  "success": false,
  "message": "Unauthorized access",
  "status": 401
}
```

#### 404 Not Found
```json
{
  "success": false,
  "message": "Resource not found",
  "status": 404
}
```

#### 422 Validation Error
```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "field_name": ["Error message"]
  },
  "status": 422
}
```

#### 500 Server Error
```json
{
  "success": false,
  "message": "Internal server error",
  "status": 500
}
```

#### 503 Service Unavailable
```json
{
  "success": false,
  "message": "External service unavailable",
  "status": 503
}
```

---

## Rate Limiting

- **Standard endpoints**: 60 requests/minute
- **License endpoints**: 120 requests/minute
- **Build endpoints**: 10 requests/minute

Rate limit headers:
```http
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
X-RateLimit-Reset: 1640000000
```

---

## Best Practices

1. **Always check `success` field** in responses
2. **Handle rate limiting** with exponential backoff
3. **Use appropriate product hash header** for your product
4. **Validate input** before sending requests
5. **Log errors** for debugging
6. **Cache responses** where appropriate (themes, configs)
7. **Use v2 endpoints** for new implementations

---

**Last Updated**: January 2026  
**Current Version**: v2  
**Supported Versions**: v1, v2
