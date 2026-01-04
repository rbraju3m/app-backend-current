# Appza Backend

Backend API for the Appza mobile app builder platform. Built with Laravel 11.

## Overview

Appza Backend is a comprehensive Laravel application that powers the Appza mobile app builder ecosystem, providing:

- **License Management**: Free trial and premium license activation, validation, and management
- **Mobile App Building**: APK generation and build orchestration
- **Content Management**: Themes, pages, components, and layouts
- **Firebase Integration**: Push notifications and configuration
- **Domain Management**: Site registration and tracking
- **Global Configuration**: Application-wide settings

## Quick Start

### Prerequisites

- PHP 8.2+
- Composer
- MySQL 5.7+ or 8.0+
- Node.js and npm

### Installation

```bash
# Clone repository
git clone <repository-url> appza-backend
cd appza-backend

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env, then run migrations
php artisan migrate

# Start development server
php artisan serve
```

For detailed setup instructions, see the [Developer Guide](./docs/DEVELOPER_GUIDE.md).

## Documentation

Comprehensive developer documentation is available in the `docs/` directory:

- **[Developer Guide](./docs/DEVELOPER_GUIDE.md)** - Setup, project structure, and development workflow
- **[Architecture](./docs/ARCHITECTURE.md)** - System architecture, design patterns, and technical decisions
- **[API Reference](./docs/API.md)** - Complete API documentation with endpoints and examples
- **[License API](./docs/license-api.md)** - Detailed license system documentation
- **[Deployment Guide](./docs/DEPLOYMENT.md)** - Production deployment procedures
- **[Troubleshooting](./docs/TROUBLESHOOTING.md)** - Common issues and solutions

## Technology Stack

- **Framework**: Laravel 11.45.2
- **PHP**: 8.2+
- **Database**: MySQL
- **Storage**: Cloudflare R2 (S3-compatible)
- **Queue**: Database driver
- **Authentication**: Laravel Sanctum
- **Error Tracking**: Sentry
- **Activity Logging**: Spatie Laravel ActivityLog
- **Backup**: Spatie Laravel Backup

## Key Features

### Multi-Version API Support
- v1: Stable production version
- v2: Latest version with new features (License Management)

### License Management
- Free trial activation and tracking
- Premium (Fluent) license integration
- License validation and deactivation
- Grace period management

### APK Build System
- Automated build orchestration
- Build history tracking
- Firebase integration

### Content Management
- Theme management
- Page and component builder
- Style group & property customization
- Layout system
- Reusable components

## Development

### API Documentation Generation

```bash
php artisan scribe:generate
```

### Queue Workers

```bash
php artisan queue:work
```

## Project Structure

```
appza-backend/
├── app/
│   ├── Http/Controllers/   # API and web controllers
│   ├── Models/             # Eloquent models
│   ├── Services/           # Business logic
│   └── Traits/             # Reusable traits
├── config/                 # Configuration files
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── docs/                   # Developer documentation
├── routes/
│   ├── api_v1.php         # API v1 routes
│   ├── api_v2.php         # API v2 routes
│   └── web.php            # Web routes
└── tests/                  # Application tests
```

## Contributing

Please read the [Developer Guide](./docs/DEVELOPER_GUIDE.md) for contribution guidelines and development workflow.

## Security

For security vulnerabilities, please contact the development team directly. Do not create public issues.

## License

Proprietary - All rights reserved

---

**Version**: 1.0.0  
**Last Updated**: January 2026  
**Maintained by**: Lazycoders Ltd
