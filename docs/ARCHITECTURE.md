# System Architecture

This document describes the architecture, design patterns, and key technical decisions in the Appza Backend system.

## Table of Contents

1. [Architecture Overview](#architecture-overview)
2. [Design Patterns](#design-patterns)
3. [API Versioning](#api-versioning)
4. [Database Schema](#database-schema)
5. [External Integrations](#external-integrations)
6. [Storage Architecture](#storage-architecture)
7. [Queue System](#queue-system)
8. [Security](#security)

## Architecture Overview

Appza Backend follows a **layered architecture** pattern with clear separation of concerns:

```
┌─────────────────────────────────────────┐
│          Client Applications            │
│   (Mobile Apps, Web Dashboard, CLI)    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│         API Layer (Routes)              │
│  ┌──────────┬──────────┬──────────┐    │
│  │  API v0  │  API v1  │  API v2  │    │
│  └──────────┴──────────┴──────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Controllers (HTTP Layer)           │
│  - Request validation                   │
│  - Response formatting                  │
│  - Authorization checks                 │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│     Services (Business Logic)           │
│  - License management                   │
│  - Build orchestration                  │
│  - External API communication           │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Models (Data Layer)                │
│  - Eloquent ORM                         │
│  - Database interactions                │
│  - Relationships                        │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│         Database (MySQL)                │
└─────────────────────────────────────────┘
```

### Request Flow

1. **Client** sends HTTP request to API endpoint
2. **Middleware** processes authentication, authorization, logging
3. **Controller** validates request and delegates to service
4. **Service** executes business logic, interacts with models
5. **Model** performs database operations
6. **Response** formatted and returned to client

## Design Patterns

### 1. Service Layer Pattern

Business logic is extracted from controllers into dedicated service classes:

```php
app/Services/
├── LicenseService.php          # License validation and management
├── BuildService.php             # APK build orchestration
├── FluentApiService.php         # External API communication
└── StorageService.php           # File storage operations
```

**Benefits**:
- Thin controllers
- Reusable business logic
- Easier testing
- Single Responsibility Principle

### 2. Repository Pattern (Partial)

While not fully implemented, certain complex queries are abstracted into model scopes and methods:

```php
// Model scope example
class FreeTrial extends Model
{
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeExpiredTrials($query)
    {
        return $query->where('grace_period_date', '<', now());
    }
}
```

### 3. Factory Pattern

Used for creating test data and seeding:

```php
database/factories/
├── UserFactory.php
├── LeadFactory.php
└── BuildDomainFactory.php
```

### 4. Observer Pattern

Laravel's event system is used for:
- Activity logging (via Spatie ActivityLog)
- Model lifecycle events
- Queue job dispatching

### 5. Strategy Pattern

Used in license validation to handle different license types:

```php
// Pseudo-code example
interface LicenseValidator
{
    public function validate($domain, $licenseKey): bool;
}

class FreeTrialValidator implements LicenseValidator { }
class FluentLicenseValidator implements LicenseValidator { }
```

## API Versioning

The system uses **URL-based versioning** with separate route files:

### Version Structure

```
routes/
├── api.php           # Main API router (includes versioned routes)
├── api_v0.php        # Legacy endpoints
├── api_v1.php        # Stable v1 endpoints
└── api_v2.php        # Latest v2 endpoints
```

### Versioning Strategy

- **v0**: Legacy endpoints (deprecated, maintained for backward compatibility)
- **v1**: Stable production endpoints
- **v2**: New features and breaking changes

### URL Format

```
/api/v1/license/activate
/api/v2/license/activate
```

### Version Configuration

API versions are configured in `config/api_versions.php`:

```php
return [
    'current' => 'v2',
    'supported' => ['v1', 'v2'],
    'deprecated' => ['v0'],
];
```

### Handling Breaking Changes

1. Create new controller in appropriate version directory
2. Add routes to version-specific route file
3. Update API documentation
4. Deprecate old endpoints with sunset headers
5. Maintain old version for transition period


## External Integrations

### Fluent License API

**Purpose**: Premium license management

**Integration Points**:
1. License activation
2. License validation
3. License deactivation
4. Version checking

**Architecture**:
```
FluentApiService
    │
    ├── activateLicense()
    ├── checkLicense()
    ├── deactivateLicense()
    └── getVersion()
         │
         └─── HTTP Client (Guzzle)
                 │
                 └─── Fluent API (External)
```

**Error Handling**:
- Retry logic for transient failures
- Graceful degradation for service unavailability
- Comprehensive error logging

### Firebase

**Purpose**: Push notifications and real-time features

**Integration**: Firebase Admin SDK for server-side operations

### Cloudflare R2

**Purpose**: File storage (images, APK files, themes)

**Integration**: AWS S3-compatible API via Laravel Flysystem

## Storage Architecture

### File Storage Strategy

```
Storage Disks:
├── local          # Local development files
├── public         # Publicly accessible files
└── r2             # Cloudflare R2 (production)
```

### R2 Configuration

```php
// config/filesystems.php
'r2' => [
    'driver' => 's3',
    'key' => env('CLOUDFLARE_R2_ACCESS_KEY_ID'),
    'secret' => env('CLOUDFLARE_R2_SECRET_ACCESS_KEY'),
    'region' => 'auto',
    'bucket' => env('CLOUDFLARE_R2_BUCKET'),
    'endpoint' => env('CLOUDFLARE_R2_ENDPOINT'),
    'visibility' => 'public',
];
```

### File Organization

```
r2://bucket/
├── addons/
├── android-aab/
├── android-apk/
├── android-build-output/
├── app-file/
├── appza-database/
├── build-zips/
├── component-image/
├── global-config/
├── ios-build-output/
├── plugins/
├── runner-file/
├── static-screen-image/
├── static/
├── theme-gallery/
├── theme/
```

### CDN Integration

Files are served via Cloudflare R2's public URL:
```
https://pub-{bucket-id}.r2.dev/{path}
```

## Queue System

### Queue Configuration

- **Driver**: Database
- **Connection**: MySQL
- **Table**: `jobs`

### Job Types

1. **Build Jobs**: APK generation and processing
2. **Notification Jobs**: Email and push notifications
3. **Cleanup Jobs**: Temporary file removal (optional)
4. **Backup Jobs**: Database and file backups

### Queue Workers

```bash
# Development
php artisan queue:work

# Production (with Supervisor)
php artisan queue:work --tries=3 --timeout=300
```

### Failed Jobs

Failed jobs are stored in `failed_jobs` table for retry:

```bash
php artisan queue:retry all
```

## Security

### Authentication

- **API Authentication**: JWT tokens (firebase/php-jwt)
- **Session Authentication**: Laravel Sanctum for web dashboard

### Authorization

- **Custom Authorization**: `Lead::checkAuthorization()`
- **Middleware-based**: Route protection

### Input Validation

- **Form Requests**: Request validation classes
- **Manual Validation**: Controller-level validation
- **Database Constraints**: Foreign keys, unique indexes

### Data Protection

1. **Environment Variables**: Sensitive configuration in `.env`
2. **Encryption**: Laravel's encryption for sensitive data
3. **SQL Injection**: Eloquent ORM (parameterized queries)
4. **XSS Protection**: Blade template escaping
5. **CSRF Protection**: Token-based (web routes)

### API Security

1. **Rate Limiting**: Throttle middleware
2. **CORS**: Configured in `config/cors.php`
3. **Request Logging**: `IS_REQUEST_LOG` feature flag
4. **Authorization Hash**: `IS_HASH_AUTHORIZATION` feature flag

### Monitoring

- **Sentry**: Error tracking and performance monitoring
- **Activity Log**: Audit trail via Spatie ActivityLog
- **Request Logs**: Custom logging in `request_logs` table

## Scalability Considerations

### Current Architecture

- Monolithic application
- Single database instance
- File storage on Cloudflare R2 (CDN-backed)

### Future Improvements

1. **Horizontal Scaling**:
   - Load balancer with multiple app servers
   - Stateless sessions (database or Redis)

2. **Database Optimization**:
   - Read replicas for reporting queries
   - Connection pooling
   - Query optimization

3. **Caching Layer**:
   - Redis for session and cache
   - API response caching
   - Database query caching

4. **Microservices** (if needed):
   - License service
   - Build service
   - Storage service

## Deployment Architecture

### Development
```
Local Machine → PHP Built-in Server → MySQL (local)
```

### Staging/Production
```
Load Balancer
    │
    ├─ App Server 1 (PHP-FPM + Nginx)
    ├─ App Server 2 (PHP-FPM + Nginx)
    └─ App Server N (PHP-FPM + Nginx)
         │
         ├─ MySQL (Primary)
         ├─ Redis (Cache/Queue)
         └─ Cloudflare R2 (Storage)
```

## Performance Best Practices

1. **Database**:
   - Use eager loading to prevent N+1 queries
   - Index frequently queried columns
   - Use database transactions for data consistency

2. **Caching**:
   - Cache expensive queries
   - Use model caching where appropriate
   - Implement HTTP caching headers

3. **API**:
   - Paginate large result sets
   - Use resource transformers for consistent responses
   - Implement API rate limiting

4. **Files**:
   - Store files on CDN (R2)
   - Optimize image sizes
   - Use lazy loading for resources

---

**Last Updated**: January 2026
