# Deployment Guide

This guide covers deployment procedures for Appza Backend to staging and production environments.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Server Requirements](#server-requirements)
3. [Deployment Process](#deployment-process)
4. [Environment Configuration](#environment-configuration)
5. [Zero-Downtime Deployment](#zero-downtime-deployment)
6. [Post-Deployment](#post-deployment)
7. [Rollback Procedure](#rollback-procedure)
8. [Monitoring](#monitoring)

## Prerequisites

### Required Tools

- Git
- Composer 2.x
- PHP 8.2+
- MySQL client
- SSH access to servers

### Required Credentials

- Server SSH keys
- Database credentials
- Cloudflare R2 API keys
- Sentry DSN (for error tracking)
- SMTP credentials (for email)

## Server Requirements

### Minimum Specifications

#### Production
- **CPU**: 4 cores
- **RAM**: 8 GB
- **Storage**: 100 GB SSD
- **PHP**: 8.2 with required extensions
- **Database**: MySQL 8.0+ or MariaDB 10.5+
- **Web Server**: Nginx or Apache with PHP-FPM

#### Staging
- **CPU**: 2 cores
- **RAM**: 4 GB
- **Storage**: 50 GB SSD
- Same software requirements as production

### PHP Extensions

Required PHP extensions:
```bash
php8.2-cli
php8.2-fpm
php8.2-mysql
php8.2-mbstring
php8.2-xml
php8.2-curl
php8.2-zip
php8.2-gd
php8.2-bcmath
php8.2-intl
php8.2-redis (optional, for caching)
```

Install on Ubuntu:
```bash
sudo apt update
sudo apt install php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml \
  php8.2-curl php8.2-zip php8.2-gd php8.2-bcmath php8.2-intl
```

## Deployment Process

### 1. Initial Server Setup

#### a. Clone Repository

```bash
cd /var/www/html
git clone <repository-url> appza-backend
cd appza-backend
```

#### b. Set Permissions

```bash
sudo chown -R www-data:www-data /var/www/html/appza-backend
sudo chmod -R 755 /var/www/html/appza-backend
sudo chmod -R 775 /var/www/html/appza-backend/storage
sudo chmod -R 775 /var/www/html/appza-backend/bootstrap/cache
```

#### c. Install Dependencies

```bash
composer install --no-dev --optimize-autoloader
```

### 2. Configure Environment

#### a. Create Environment File

```bash
cp .env.example .env
php artisan key:generate
```

#### b. Edit `.env` File

See [Environment Configuration](#environment-configuration) section below.

### 3. Database Setup

#### a. Create Database

```bash
mysql -u root -p
```

```sql
CREATE DATABASE appza_backend_production CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'appza_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON appza_backend_production.* TO 'appza_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### b. Run Migrations

```bash
php artisan migrate --force
```

#### c. Seed Database (if needed)

```bash
php artisan db:seed --force
```

### 4. Configure Web Server

#### Nginx Configuration

Create `/etc/nginx/sites-available/appza-backend`:

```nginx
server {
    listen 80;
    server_name api.appza.com;
    root /var/www/html/appza-backend/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable site:
```bash
sudo ln -s /etc/nginx/sites-available/appza-backend /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

#### SSL Configuration (Let's Encrypt)

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d api.appza.com
```

### 5. Configure Queue Worker

#### Using Supervisor

Create `/etc/supervisor/conf.d/appza-worker.conf`:

```ini
[program:appza-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/html/appza-backend/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=4
redirect_stderr=true
stdout_logfile=/var/www/html/appza-backend/storage/logs/worker.log
stopwaitsecs=3600
```

Start supervisor:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start appza-worker:*
```

### 6. Configure Scheduled Tasks

Add to crontab:
```bash
sudo crontab -e -u www-data
```

Add line:
```
* * * * * cd /var/www/html/appza-backend && php artisan schedule:run >> /dev/null 2>&1
```

## Environment Configuration

### Production `.env` Example

```env
APP_NAME=Appza
APP_ENV=production
APP_KEY=base64:your_generated_key_here
APP_DEBUG=false
APP_URL=https://api.appza.com
APP_TIMEZONE=Asia/Dhaka

LOG_CHANNEL=stack
LOG_STACK=daily
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=appza_backend_production
DB_USERNAME=appza_user
DB_PASSWORD=secure_password

CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=database

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.zoho.com
MAIL_PORT=587
MAIL_USERNAME=info@lazycoders.co
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@lazycoders.co
MAIL_FROM_NAME="${APP_NAME}"

CLOUDFLARE_R2_ACCESS_KEY_ID=your_access_key
CLOUDFLARE_R2_SECRET_ACCESS_KEY=your_secret_key
CLOUDFLARE_R2_BUCKET=appza-backend
CLOUDFLARE_R2_ENDPOINT=https://your-account.r2.cloudflarestorage.com
IMAGE_PUBLIC_PATH=https://pub-your-bucket.r2.dev/

JWT_SECRET=your_jwt_secret

COMPANY_NAME="Lazycoders Ltd"
IS_SHOW_SCANNER=true
IS_SEND_MAIL=true
IS_BUILDER_ON=true
IS_FLUENT_CHECK=true
IS_IMAGE_UPDATE=true
IS_HASH_AUTHORIZATION=true
IS_REQUEST_LOG=true

SENTRY_LARAVEL_DSN=https://your-sentry-dsn
SENTRY_TRACES_SAMPLE_RATE=0.1
```

### Staging `.env` Differences

```env
APP_ENV=staging
APP_DEBUG=true
APP_URL=https://staging-api.appza.com
LOG_LEVEL=debug

DB_DATABASE=appza_backend_staging

CLOUDFLARE_R2_BUCKET=appza-backend-staging
IMAGE_PUBLIC_PATH=https://pub-staging-bucket.r2.dev/

SENTRY_TRACES_SAMPLE_RATE=1.0
```

## Zero-Downtime Deployment

### Using Git Deployment Script

Create `deploy.sh`:

```bash
#!/bin/bash

set -e

APP_DIR="/var/www/html/appza-backend"
BRANCH="${1:-main}"

echo "Starting deployment from branch: $BRANCH"

# Navigate to app directory
cd $APP_DIR

# Enable maintenance mode
php artisan down || true

# Pull latest code
git fetch origin
git checkout $BRANCH
git pull origin $BRANCH

# Install/update dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Optimize application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Restart queue workers
sudo supervisorctl restart appza-worker:*

# Disable maintenance mode
php artisan up

echo "Deployment completed successfully!"
```

Make executable:
```bash
chmod +x deploy.sh
```

Run deployment:
```bash
./deploy.sh main
```

### Using Laravel Deployer (Alternative)

Install Deployer:
```bash
composer require --dev deployer/deployer
```

See Deployer documentation for configuration.

## Post-Deployment

### 1. Verify Deployment

```bash
# Check application status
php artisan about

# Check database connection
php artisan db:show

# Check queue workers
sudo supervisorctl status appza-worker:*

# Check scheduled tasks
php artisan schedule:list
```

### 2. Test Critical Endpoints

```bash
# Health check
curl https://api.appza.com/api/health

# License check
curl -X POST https://api.appza.com/api/v1/license/check \
  -H "Authorization: Bearer your_token" \
  -H "Content-Type: application/json" \
  -d '{"site_url":"https://example.com","license_key":"test-key"}'
```

### 3. Monitor Logs

```bash
# Application logs
tail -f storage/logs/laravel.log

# Nginx access logs
tail -f /var/log/nginx/access.log

# Nginx error logs
tail -f /var/log/nginx/error.log

# Queue worker logs
tail -f storage/logs/worker.log
```

### 4. Clear CDN Cache (if applicable)

```bash
# Cloudflare cache purge
curl -X POST "https://api.cloudflare.com/client/v4/zones/{zone_id}/purge_cache" \
  -H "Authorization: Bearer {api_token}" \
  -H "Content-Type: application/json" \
  --data '{"purge_everything":true}'
```

## Rollback Procedure

### Quick Rollback

```bash
# Navigate to app directory
cd /var/www/html/appza-backend

# Enable maintenance mode
php artisan down

# Checkout previous commit/tag
git checkout <previous-commit-hash>

# Rollback migrations (if needed)
php artisan migrate:rollback --step=1

# Install dependencies
composer install --no-dev --optimize-autoloader

# Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache

# Restart workers
sudo supervisorctl restart appza-worker:*

# Disable maintenance mode
php artisan up
```

### Database Rollback

Always backup before deployment:

```bash
# Create backup
php artisan backup:run --only-db

# Restore from backup (if needed)
mysql -u appza_user -p appza_backend_production < backup.sql
```

## Monitoring

### Application Monitoring

1. **Sentry**: Error tracking and performance monitoring
   - Configure DSN in `.env`
   - Set appropriate sample rate

2. **Laravel Logs**: 
   ```bash
   tail -f storage/logs/laravel.log
   ```

3. **Activity Log**: Review via admin dashboard
   ```bash
   php artisan activitylog:clean
   ```

### Server Monitoring

1. **Disk Space**:
   ```bash
   df -h
   ```

2. **Memory Usage**:
   ```bash
   free -h
   ```

3. **CPU Usage**:
   ```bash
   top
   ```

4. **Database Size**:
   ```sql
   SELECT 
     table_schema AS 'Database',
     ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'Size (MB)'
   FROM information_schema.tables
   WHERE table_schema = 'appza_backend_production'
   GROUP BY table_schema;
   ```

### Performance Monitoring

1. **OPcache Status**:
   - Check PHP OPcache is enabled
   - Monitor hit rate

2. **Query Performance**:
   ```bash
   php artisan telescope:install  # If using Telescope
   ```

3. **Queue Monitoring**:
   ```bash
   php artisan queue:monitor
   ```

## Backup Strategy

### Automated Backups

Configure in `config/backup.php` and schedule:

```bash
# Daily backup at 2 AM
0 2 * * * cd /var/www/html/appza-backend && php artisan backup:run --only-db
0 3 * * * cd /var/www/html/appza-backend && php artisan backup:clean
```

### Manual Backup

```bash
# Full backup (database + files)
php artisan backup:run

# Database only
php artisan backup:run --only-db

# Files only
php artisan backup:run --only-files
```

## Security Best Practices

1. **Keep software updated**:
   ```bash
   composer update
   php artisan --version
   ```

2. **File permissions**:
   - Storage: 775
   - Other files: 755
   - `.env`: 600

3. **Disable debug mode** in production:
   ```env
   APP_DEBUG=false
   ```

4. **Use HTTPS** everywhere

5. **Regular security audits**:
   ```bash
   composer audit
   ```

---

**Last Updated**: January 2026
