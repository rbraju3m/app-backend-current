# API Reference

Complete API documentation for Appza Backend. For detailed license endpoint documentation, see [License API](./license-api.md).

## Table of Contents

1. [Authentication](#authentication)
2. [API Versioning](#api-versioning)
3. [Response Format](#response-format)
4. [Error Handling](#error-handling)
5. [Rate Limiting](#rate-limiting)
6. [Endpoints](#endpoints)

## Authentication

### Authorization Header

All API requests require authorization via custom token:

```http
Appza-Hash(depend on lead api response): {your_authorization_token}
```

### Token Validation

The system uses `Lead::checkAuthorization()` to validate tokens. Invalid or missing tokens return:

```json
{
  "success": false,
  "message": "Unauthorized",
  "status": 401
}
```

## API Versioning

The API uses URL-based versioning:

- **v0**: `/api/v0/...` - Legacy (deprecated)
- **v1**: `/api/v1/...` - Stable production version
- **v2**: `/api/v2/...` - Latest version with new features

## Response Format

### Success Response

```json
{
  "success": true,
  "data": {
    // Response data
  },
  "message": "Operation successful"
}
```

### Error Response

```json
{
  "success": false,
  "message": "Error description",
  "errors": {
    // Validation errors (if applicable)
  },
  "status": 400
}
```

## Error Handling

### HTTP Status Codes

- `200 OK`: Successful request
- `201 Created`: Resource created successfully
- `400 Bad Request`: Invalid request data
- `401 Unauthorized`: Missing or invalid authentication
- `403 Forbidden`: Insufficient permissions
- `404 Not Found`: Resource not found
- `422 Unprocessable Entity`: Validation error
- `500 Internal Server Error`: Server error
- `503 Service Unavailable`: External service unavailable

### Error Messages

Errors include descriptive messages:

```json
{
  "success": false,
  "message": "Validation failed",
  "errors": {
    "site_url": ["The site url field is required."],
    "license_key": ["The license key must be valid."]
  },
  "status": 422
}
```

## Rate Limiting

Rate limits vary by endpoint:
- **Standard endpoints**: 60 requests/minute
- **License validation**: 120 requests/minute
- **Build endpoints**: 10 requests/minute

Rate limit headers are included in responses:

```http
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
X-RateLimit-Reset: 1640000000
```

## Endpoints

### License Management

See [License API Documentation](./license-api.md) for complete details.

#### POST /api/appza/v1/license/activate
Activate a new license for a website.

#### GET /api/appza/v1/license/check
Check License is valid or not.

#### GET /api/appza/v1/app/license-check
Check License is valid or not.

#### POST /api/appza/v1/license/deactivate
Deactivate a license or mark plugin as deleted.

#### POST /api/appza/v1/license/version-check
Get latest version information.

---

### Lead Management

#### POST /api/appza/v1/lead/store/appza
Create a new lead for communication with core applicaton lead/store/{type}. available types: ['appza', 'lazy_task','fcom_mobile']

**Request Body:**
```json
{
    "first_name" : "Rashedul",
    "last_name" : "Raju",
    "email" : "rbraju3m@gmail.com",
    "domain" : "https://test.appza.net",
    "note" : "This is for appza"
}

```

**Response:**
```json
{
    "status": 200,
    "message": "Created Successfully",
    "data": {
        "appza_hash": "$2y$12$L.cEU8ISKZGOPo1AGgnlqukqku7aZUtfwz1Y/IbdbNdHzvjN/CEfu",
        "appza_buy_premium_url": "https://lazycoders.co/appza/"
    }
}
```

---

### Theme Management

#### GET /api/appza/v1/themes
Get list of available themes.

**Query Parameters:**
- `plugin_slug[]`: plugin slug as array

**Response:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Default",
            "slug": "default",
            "plugin_slug": "woocommerce",
            "created": "12-Dec-2024",
            "background_color": "#fff5f5",
            "font_family": "Poppins",
            "text_color": "#000000",
            "font_size": "24.00",
            "is_transparent_background": false,
            "dashboard_page": "dashboard-page-three",
            "login_page": "login-page-one",
            "login_modal": "login-modal-one",
            "image_url": "https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/theme/0wiXTparfRcP8ouqSeXHdump8CKaoxdy4hx5b8qZ.jpg",
            "pages_preview": [
                "https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/theme-gallery/pIgBoicpaSS2bF1o8OK46Aa430zXe7DNk1z7eabx.png",
                "https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/theme-gallery/CKea4AUZhs8QN0epAx4CwdXH2YmhJ9zuUCdU1tFV.png"
            ],
            "default_active_page_slug": "home-page"
        }	],
    "status": 200,
    "url": "http://www.appza-backend.local/api/appza/v1/themes?plugin_slug%5B0%5D=wordpress&plugin_slug%5B1%5D=tutor-lms&plugin_slug%5B2%5D=woocommerce&plugin_slug%5B3%5D=fluent-community",
    "method": "GET",
    "message": "Data Found"
}
```

#### GET /api/appza/v1/themes/get-theme
Get specific theme details.

**Query Parameters:**
- `plugin_slug`: specific plugin slug 
- `slug`: specific theme slug 

**Response:**
```json
{
    "status": 200,
    "url": "http://www.appza-backend.local/api/appza/v1/themes/get-theme?plugin_slug=tutor-lms&slug=default",
    "method": "GET",
    "message": "Data Found",
    "data": {
        "theme_name": "Default",
        "theme_slug": "default",
        "plugin_slug": "tutor-lms",
        "default_active_page_slug": "home-page",
        "background_color": "#000000",
        "font_family": "Arial",
        "text_color": "#000000",
        "font_size": 14,
        "is_transparent_background": false,
        "image_url": "https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/theme/1ggU0OWWbyK8CujULSkeFtW0nk5OcqzXabZ6lLNs.jpg",
        "dashboard_page": null,
        "login_page": null,
        "login_modal": null,
        "is_show_scanner": true,
        "theme_status": "active",
        "global_config": [
            {},
            {}
        ],
        "pages": [
            {},
            {}
        ]
    }
}
```
---

### Global Configuration

#### GET /api/appza/v1/global-config
Get application-wide configuration.

**Query Parameters:**
- `plugin_slug[]` (required): Plugin slugs as array
- `mode` (required): appbar/navbar/drawer

**Response:**
```json
{
    "status": 200,
    "url": "http://www.appza-backend.local/api/appza/v1/global-config?mode=drawer&plugin_slug%5B0%5D=fluent-community",
    "method": "GET",
    "message": "Data Found",
    "data": [
        {},{}
    ]
}
```

---

### Page & Component Management

#### GET /api/appza/v1/page-component
Get list of component by page slug.

**Query Parameters:**
- `plugin_slug[]` (required): plugin slugs as array
- `page_slug` (required): specific page slug

**Response:**
```json
{
    "status": 200,
    "url": "http://www.appza-backend.local/api/appza/v1/page-component?page_slug=home-page&plugin_slug%5B0%5D=tutor-lms",
    "method": "GET",
    "message": "Data Found",
    "data": [
        {
            "name": "Course Thumbnail",
            "icon": "IconListDetails",
            "items": [
                {},
                {}
            ]
        }
    ]
}
```

---

### Plugin Management

#### GET /api/appza/v1/plugins
Get list of available plugins.

**Response:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Wordpress",
            "slug": "wordpress",
            "prefix": "WP_",
            "title": null,
            "description": null,
            "others": null,
            "created": "08-Dec-2024",
            "is_disable": false,
            "image": "https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/RgOGXyEsPzgzpHb15TQtHjHkYFERJCdAeymOeh1L.png"
        }
    ],
    "status": 200,
    "url": "http://www.appza-backend.local/api/appza/v1/plugins",
    "method": "GET",
    "message": "Data Found"
}
```
---

### APK Build Management

#### POST /api/appza/v1/build/resource
Create a new APK build resource.

**Request Body:**
```json
{
    "site_url": "https://test.com",
    "app_logo": "https://fastly.picsum.photos/id/872/200/200.jpg?hmac=m0AwAUFkEiEz2KW58n6a5RVkKaClHNylfppYjE3a0v4",
    "app_splash_screen_image": "https://fastly.picsum.photos/id/872/200/200.jpg?hmac=m0AwAUFkEiEz2KW58n6a5RVkKaClHNylfppYjE3a0v4",
    "license_key": "appza9598d42351dba8d7d88226ee6f6bf370",
    "app_name": "test",
    "is_android": true,
    "is_ios": false,
    "email": "test.rightbrainsolution@gmail.com",
    "plugin_slug": "fluent-community",
    "platform" : ["android"]
}
```

**Response:**
```json
{
    "status": 200,
    "url": "https://dev-app.appza.net/api/appza/v1/build/resource",
    "method": "POST",
    "message": "App selection for build requests is confirmed.",
    "data": {
        "package_name": "com.thesohel.live",
        "bundle_name": "com.thesohel.live"
    }
}
```

#### POST /api/v1/appza/build/ios-keys-verify
IOS build verification endpoint for ios-keys.

**Request Body:**
```json
{
    "site_url": "https://prothomalo.com/",
    "license_key": "appza v-180e3251c7f579deb7f885d1df30ff135",
    "ios_issuer_id": "a1ead579-73d7-4227-b9d6-1aeccf17edb4",
    "ios_key_id": "77HLG2C29P",
    "ios_team_id": "785R8UTSWS",
    "ios_p8_file_content": "-----BEGIN PRIVATE KEY-----\nMIGTAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBHkwdwIBAQQgAOlEV9MXLVSpc/rs\nqS+SpKRIAWExlsn4EnvDfalwEYqgCgYIKoZIzj0DAQehRANCAASUjxe0wPCOP4lM\nNLREQ8xJQmUuy1QKvNuTqa65igDy1EKbKuf1A9PakIPHaE/m0J+jSZkcHIJpKVjQ\nrfgKNmSG\n-----END PRIVATE KEY-----"
}
```

**Response:**
```json
{
    "status": 200,
    "url": "https://dev-app.appza.net/api/appza/v1/build/ios-keys-verify",
    "method": "POST",
    "message": "IOS Resource information is valid.",
    "data": {
        "package_name": "com.test.buildflow",
        "bundle_name": "com.test.buildflow"
    }
}
```

#### POST /api/v1/appza/build/ios-check-app-name
IOS build check app name endpoint for ios-keys.

**Request Body:**
```json
{
    "site_url": "https://saiful.appza.net",
    "license_key": "appzadb5589f16289e74521abe216863532ee"
}
```

**Response:**
```json
{
    "status": 200,
    "url": "https://dev-app.appza.net/api/appza/v1/build/ios-check-app-name",
    "method": "POST",
    "message": "Your ios app name has been taken from your app store.",
    "data": {
        "package_name": "com.test.buildflow",
        "bundle_name": "com.test.buildflow",
        "ios_app_name": "Test Build Flow Push"
    }
}
```

#### POST /api/v1/appza/build/push-notification-resource
Push notification resource endpoint.

**Request Body:**
```json
{
    "site_url": "https://saiful.appza.net",
    "license_key": "appzadb5589f16289e74521abe216863532ee",
    "android_notification_content": {
        "project_info": {
            "project_number": "721464505632",
            "project_id": "test-build-flow",
            "storage_bucket": "test-build-flow.firebasestorage.app"
        },
        "client": [
        ],
        "configuration_version": "1"
    },
    "ios_notification_content": ""
}
```

**Response:**
```json
{
    "status": 200,
    "url": "https://dev-app.appza.net/api/appza/v1/build/push-notification-resource",
    "method": "POST",
    "message": "Successfully pushed notification information updated."
}
```

**Status Values:**
- `pending`: Build is queued
- `processing`: Build is in progress
- `completed`: Build completed successfully
- `failed`: Build failed
- `delete`: after build and files were removed after a defined retention period

#### POST /api/appza/v1/build
Place a build request.

**Request Body:**
```json
{
    "site_url": "https://test.appza.net",
    "license_key": "appzadb5589f16289e74521abe216863532ee",
    "is_push_notification" : false
}
```

**Response:**
```json
{
    "status": 200,
    "url": "https://dev-app.appza.net/api/appza/v1/build",
    "method": "POST",
    "message": "Your App building process has been started successfully.",
    "data": {
        "id": 40,
        "version_id": 1,
        "build_domain_id": 82,
        "app_name": "fluent-community",
        "ios_app_name": "Test Build Flow Push",
        "build_id": 58
    }
}
```

---

### License Management

#### POST /api/appza/v1/license/activate
Activate license for a site.

**Request Body:**
```json
{
    "site_url": "https://test.appza.net/",
    "license_key": "FCTrial6528afb53494e85532fc63a23d6f365b",
    "email" : "test@gmail.com"
}
```

**Response:**
```json
{
    "status": 200,
    "message": "Your License key has been activated successfully.",
    "data": {
        "status": "valid",
        "activation_limit": "0",
        "activation_hash": "d9acec222425ef6996cafa9cc89eb772",
        "activations_count": 2,
        "license_key": "appzadb5589f16289e74521abe216863532ee",
        "expiration_date": "2026-11-11 00:00:00",
        "product_id": "7520",
        "variation_id": "17",
        "variation_title": "Fluent Community",
        "product_title": "Appza Dev",
        "created_at": {
            "date": "2025-11-27 05:00:38.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2025-11-30 10:04:02.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "next_billing_date": null,
        "success": true
    }
}
```

#### GET /api/appza/v1/license/check
License Check for plugin.

**Query Parameters:**
- `site_url` (required): Website URL
- `license_key` (required): license key

  **Response:**
```json
{
    "status": 200,
    "message": "Your License key is valid.",
    "data": {
        "status": "valid",
        "activation_limit": "0",
        "activation_hash": "d9acec222425ef6996cafa9cc89eb772",
        "activations_count": 2,
        "license_key": "appzadb5589f16289e74521abe216863532ee",
        "expiration_date": "2026-11-11 00:00:00",
        "product_id": "7520",
        "variation_id": "17",
        "variation_title": "Fluent Community",
        "product_title": "Appza Dev",
        "created_at": {
            "date": "2025-11-27 05:00:38.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2025-11-30 10:04:02.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "next_billing_date": null,
        "success": true
    }
}
```

#### GET /api/appza/v1/app/license-check
License Check for plugin.

**Query Parameters:**
- `site_url` (required): Website URL
- `product` (required): product slug

  **Response:**
```json
{
    "status": 200,
    "message": "Your License key is valid.",
    "data": {
        "status": "valid",
        "activation_limit": "0",
        "activation_hash": "d9acec222425ef6996cafa9cc89eb772",
        "activations_count": 2,
        "license_key": "appzadb5589f16289e74521abe216863532ee",
        "expiration_date": "2026-11-11 00:00:00",
        "product_id": "7520",
        "variation_id": "17",
        "variation_title": "Fluent Community",
        "product_title": "Appza Dev",
        "created_at": {
            "date": "2025-11-27 05:00:38.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2025-11-30 10:04:02.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "next_billing_date": null,
        "success": true
    }
}
```

---

## API v2 Changes

Version 2 includes the following improvements over v1:

### Breaking Changes
- 
- 
- 

### New Features
- Enhanced license reporting endpoints

### Migrating from v1 to v2

1. **Update Base URL**: Change `/api/v1/` to `/api/v2/`
2. **Update Error Handling**: Check for new error code structure

---

## Best Practices

### 1. Use Appropriate HTTP Methods
- `GET`: Retrieve data
- `POST`: Create new resources
- `PUT`/`PATCH`: Update existing resources
- `DELETE`: Remove resources

### 2. Handle Errors Gracefully
Always check the `success` field in responses:

```javascript
if (response.success) {
  // Handle success
} else {
  // Handle error with response.message
}
```

## Support

For API support or to report issues:
- Review the error message and status code
- Check the [Troubleshooting Guide](./TROUBLESHOOTING.md)
- Review API logs in the admin dashboard
- Contact development team

---

**Last Updated**: January 2026
**Current Version**: v2
**Supported Versions**: v1, v2
