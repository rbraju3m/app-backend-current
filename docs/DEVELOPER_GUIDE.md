# Appza Backend - Developer Guide

Welcome to the Appza Backend development documentation. This guide will help you understand the project structure, setup your development environment, and contribute effectively.

## Table of Contents

1. [Project Overview](#project-overview)
2. [Technology Stack](#technology-stack)
3. [Getting Started](#getting-started)
4. [Project Structure](#project-structure)
5. [Development Workflow](#development-workflow)
6. [Additional Resources](#additional-resources)

## Project Overview

Appza Backend is a Laravel-based application that serves as the backend API for the Appza mobile app builder platform. It manages:

- **License Management**: Free trial and premium (Fluent) license activation, validation, and deactivation
- **Mobile App Building**: APK generation and build history tracking
- **Content Management**: Themes, pages, components, and layouts
- **Firebase Integration**: Push notifications and Firebase configuration
- **Domain Management**: Website/domain registration and tracking
- **Global Configuration**: App-level settings and configurations

### Key Features

- Multi-version API support ( v1, v2)
- License lifecycle management with external Fluent API integration
- APK build orchestration
- Theme and component management system
- Activity logging with Spatie Laravel ActivityLog
- Cloud storage integration with Cloudflare R2
- Backup system with Spatie Laravel Backup
- API documentation generation with Scribe

## Technology Stack

### Core Framework
- **Laravel**: 11.45.2
- **PHP**: ^8.2

### Key Dependencies

#### Production
- **cviebrock/eloquent-sluggable**: Automatic slug generation for models
- **firebase/php-jwt**: JWT token handling
- **laravel/sanctum**: API authentication
- **league/flysystem-aws-s3-v3**: S3-compatible storage (Cloudflare R2)
- **spatie/laravel-activitylog**: Activity and audit logging
- **spatie/laravel-backup**: Database and file backup automation
- **spatie/laravel-html**: HTML/Form builder
- **sentry/sentry-laravel**: Error tracking and monitoring

#### Development
- **barryvdh/laravel-debugbar**: Debug toolbar
- **knuckleswtf/scribe**: API documentation generator
- **laravel/pint**: Code style fixer
- **phpunit/phpunit**: Testing framework

### Infrastructure
- **Database**: MySQL
- **Queue**: Database driver
- **Cache**: File driver
- **Storage**: Cloudflare R2 (S3-compatible)
- **Mail**: SMTP (Zoho)

## Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL 5.7+ or 8.0+
- Node.js and npm (for asset compilation)
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url> appza-backend
   cd appza-backend
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure environment variables**
   
   Edit `.env` file and configure:
   
   **Database**:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=appza_backend_dev
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```
   
   **Application**:
   ```env
   APP_NAME=appza-local
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://localhost
   APP_TIMEZONE=Asia/Dhaka
   ```
   
   **Mail** (Optional for development):
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.zoho.com
   MAIL_PORT=587
   MAIL_USERNAME=your_email@domain.com
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email@domain.com
   MAIL_FROM_NAME="${APP_NAME}"
   ```
   
   **Cloudflare R2** (for file storage):
   ```env
   CLOUDFLARE_R2_ACCESS_KEY_ID=your_access_key
   CLOUDFLARE_R2_SECRET_ACCESS_KEY=your_secret_key
   CLOUDFLARE_R2_BUCKET=appza-backend-dev
   CLOUDFLARE_R2_ENDPOINT=https://your-account-id.r2.cloudflarestorage.com
   IMAGE_PUBLIC_PATH=https://pub-your-bucket-id.r2.dev/
   ```
   
   **JWT**:
   ```env
   JWT_SECRET=your_generated_secret_key
   ```
   
   **Feature Flags**:
   ```env
   IS_SHOW_SCANNER=true  //Show QR scanner in app
   IS_SEND_MAIL=true  //Build success/failure emails
   IS_BUILDER_ON=true  //Build server on/off manual toggle
   IS_FLUENT_CHECK=true  //License validation with Fluent API or manual response (for testing)
   IS_IMAGE_UPDATE=true  //Allow image update in R2
   IS_HASH_AUTHORIZATION=false  //Use hashed authorization token ON/OFF
   IS_REQUEST_LOG=true  //Log API requests
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed the database** (if seeders are available)
   ```bash
   php artisan db:seed
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```
   
   The application will be available at `http://localhost:8000`

### Running Tests

```bash
php artisan test
```

Or with PHPUnit directly:
```bash
vendor/bin/phpunit
```

### Code Style

The project uses Laravel Pint for code formatting:

```bash
./vendor/bin/pint
```

## Project Structure

```
appza-backend/
├── app/
│   ├── Console/           # Artisan commands
│   ├── Enums/             # Enumeration classes
│   ├── Http/
│   │   ├── Controllers/   # Application controllers
│   │   │   ├── Api/       # API controllers (versioned)
│   │   │   │   ├── V1/    # API version 1
│   │   │   │   ├── V2/    # API version 2
│   │   │   │   └── VersionsController.php
│   │   │   └── ...        # Web controllers
│   │   ├── Middleware/    # HTTP middleware
│   │   └── Requests/      # Form requests
│   ├── Jobs/              # Queue jobs
│   ├── Mail/              # Mail classes
│   ├── Models/            # Eloquent models
│   ├── Notifications/     # Notification classes
│   ├── Providers/         # Service providers
│   ├── Services/          # Business logic services
│   └── Traits/            # Reusable traits
├── bootstrap/             # Framework bootstrap
├── config/                # Configuration files
├── database/
│   ├── factories/         # Model factories
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── docs/                  # Project documentation
├── public/                # Public assets and entry point
├── resources/
│   ├── views/             # Blade templates
│   ├── js/                # JavaScript assets
│   └── css/               # CSS assets
├── routes/
│   ├── api.php            # Main API routes
│   ├── api_v1.php         # API version 1 routes
│   ├── api_v2.php         # API version 2 routes
│   ├── console.php        # Console routes
│   └── web.php            # Web routes
├── storage/               # Application storage
├── tests/                 # Application tests
└── vendor/                # Composer dependencies
```

### Key Directories

#### `app/Http/Controllers/`
Controllers are organized by type:
- **Web Controllers**: Handle web interface requests
- **Api Controllers**: Handle API requests, organized by version (V1, V2)

#### `app/Models/`
Eloquent models representing database tables. Key models include:
- `Addon`: Addon/plugin management
- `AddonVersion`: Addon version management
- `Lead`: Customer/lead management
- `Component`: Core component management
- `ComponentStyleGroup`: Component style group management
- `ComponentStyleGroupProperties`: Component style group properties management
- `GlobalConfig`: Application-wide configuration
- `GlobalConfigComponent`: Application-wide configuration component
- `FluentInfo`: Fluent product configuration
- `FreeTrial`: Free trial license management
- `FluentLicenseInfo`: Fluent license metadata
- `Theme`, `ThemeConfig`, `ThemeComponent`, `ThemeComponentStyle`, `ThemePage`, `ThemePhotoGallery`: Theme Content management
- `BuildDomain`: Domain and license registration
- `BuildDomainHistory`: Build history tracking but currently unnecessary
- `BuildOrder`: currently Build history tracking through this model
- `MobileVersionMapping`: Version check for APK generation
- `LicenseLogic`: Handles all license validation rules for version 2
- `LicenseMessage`: Maps validation results to message keys for version 2
- `LicenseMessage`: Stores message content and metadata for version 2

#### `app/Services/`
Business logic services that separate concerns from controllers:
- License validation and management
- Build orchestration
- External API integrations

#### `routes/`
Multiple route files for organization:
- `web.php`: Web interface routes
- `api.php`: General API routes
- `api_v1.php`: Version 1 API routes (included in api.php)
- `api_v2.php`: Version 2 API routes (included in api.php)

## Development Workflow

### Feature Development

1. **Create a feature branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Make your changes**
   - Write clean, documented code
   - Follow Laravel best practices
   - Add tests for new functionality

3. **Test your changes**
   ```bash
   php artisan test
   ./vendor/bin/pint
   ```

4. **Commit your changes**
   ```bash
   git add .
   git commit -m "feat: description of your feature"
   ```

5. **Push and create a pull request**
   ```bash
   git push origin feature/your-feature-name
   ```

### Database Changes

1. **Create a migration**
   ```bash
   php artisan make:migration create_your_table_name
   ```

2. **Edit the migration file** in `database/migrations/`

3. **Run the migration**
   ```bash
   php artisan migrate
   ```

4. **Rollback if needed**
   ```bash
   php artisan migrate:rollback
   ```

### Creating New API Endpoints

1. **Determine API version** (v1, v2, or new version)

2. **Create controller**
   ```bash
   php artisan make:controller Api/V1/YourController
   ```

3. **Add routes** in appropriate route file (`routes/api_v1.php`, etc.)

4. **Document the API** using Scribe annotations
   ```php
   /**
    * @group Resource Management
    * 
    * APIs for managing resources
    */
   ```

5. **Generate API documentation**
   ```bash
   php artisan scribe:generate
   ```

### Working with Queue Jobs

1. **Create a job**
   ```bash
   php artisan make:job ProcessYourTask
   ```

2. **Dispatch the job**
   ```php
   ProcessYourTask::dispatch($data);
   ```

3. **Run the queue worker** (in development)
   ```bash
   php artisan queue:work
   ```

### Debugging

- Use **Laravel Debugbar** (enabled in development)
- Check logs in `storage/logs/laravel.log`
- Use **Laravel Telescope** (if installed) for request inspection
- Use `dd()` and `dump()` for quick debugging
- Monitor errors with **Sentry** (configured in production)

### Best Practices

1. **Follow Laravel conventions**
   - Use Eloquent relationships properly
   - Use form requests for validation
   - Use resource classes for API responses

2. **Keep controllers thin**
   - Move business logic to services
   - Use repository pattern when appropriate

3. **Write tests**
   - Unit tests for services
   - Feature tests for API endpoints

4. **Document your code**
   - Add PHPDoc blocks
   - Use Scribe annotations for API endpoints
   - Update this documentation when needed

5. **Security**
   - Validate all inputs
   - Use Laravel's built-in security features
   - Never commit `.env` file
   - Use environment variables for secrets

## Additional Resources

- [API Documentation](./API.md) - Complete API reference
- [License System](./license-api.md) - License management details
- [Architecture Guide](./ARCHITECTURE.md) - System architecture and design patterns
- [Deployment Guide](./DEPLOYMENT.md) - Production deployment instructions
- [Troubleshooting](./TROUBLESHOOTING.md) - Common issues and solutions

### External Documentation

- [Laravel Documentation](https://laravel.com/docs/11.x)
- [Laravel API Documentation](https://laravel.com/api/11.x/)
- [Spatie Packages](https://spatie.be/docs)
- [Scribe Documentation](https://scribe.knuckles.wtf/)

## Support

For questions or issues:
1. Check existing documentation in `docs/` directory
2. Review project issues in version control
3. Contact the development team

---

**Last Updated**: January 2026
**Laravel Version**: 11.45.2
**PHP Version**: 8.2+
