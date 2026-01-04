# Troubleshooting Guide

Common issues and solutions for Appza Backend development and deployment.

## Table of Contents

1. [Installation Issues](#installation-issues)
2. [Database Issues](#database-issues)
3. [API Issues](#api-issues)
4. [License System Issues](#license-system-issues)
5. [File Storage Issues](#file-storage-issues)
6. [Queue & Jobs Issues](#queue--jobs-issues)
7. [Performance Issues](#performance-issues)
8. [Deployment Issues](#deployment-issues)

## Installation Issues

### Composer Install Fails

**Problem**: `composer install` fails with memory errors

**Solution**:
```bash
php -d memory_limit=-1 /usr/local/bin/composer install
```

Or increase PHP memory limit in `php.ini`:
```ini
memory_limit = 512M
```

---

### Missing PHP Extensions

**Problem**: Error about missing PHP extensions

**Solution**:
```bash
# Check installed extensions
php -m

# Install missing extensions (Ubuntu/Debian)
sudo apt install php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip

# Restart PHP-FPM
sudo systemctl restart php8.2-fpm
```

---

### Key Generation Error

**Problem**: `php artisan key:generate` fails

**Solution**:
```bash
# Ensure .env file exists
cp .env.example .env

# Make sure it's writable
chmod 644 .env

# Generate key
php artisan key:generate
```

---

## Database Issues

### Connection Refused

**Problem**: `SQLSTATE[HY000] [2002] Connection refused`

**Solutions**:

1. **Check MySQL is running**:
   ```bash
   sudo systemctl status mysql
   sudo systemctl start mysql
   ```

2. **Verify credentials in `.env`**:
   ```env
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=appza_backend_dev
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

3. **Test connection manually**:
   ```bash
   mysql -h 127.0.0.1 -u root -p
   ```

4. **Clear config cache**:
   ```bash
   php artisan config:clear
   ```

---

### Migration Fails

**Problem**: Migration errors during `php artisan migrate`

**Solutions**:

1. **Check database exists**:
   ```sql
   SHOW DATABASES;
   CREATE DATABASE IF NOT EXISTS appza_backend_dev;
   ```

2. **Rollback and retry**:
   ```bash
   php artisan migrate:rollback
   php artisan migrate
   ```

3. **Fresh migration (⚠️ Deletes all data)**:
   ```bash
   php artisan migrate:fresh
   ```

4. **Check migration status**:
   ```bash
   php artisan migrate:status
   ```

---

### Too Many Connections

**Problem**: `SQLSTATE[HY000] [1040] Too many connections`

**Solution**:

1. **Check current connections**:
   ```sql
   SHOW PROCESSLIST;
   ```

2. **Increase max connections in MySQL**:
   ```sql
   SET GLOBAL max_connections = 500;
   ```

3. **Make permanent** in `/etc/mysql/my.cnf`:
   ```ini
   [mysqld]
   max_connections = 500
   ```

4. **Restart MySQL**:
   ```bash
   sudo systemctl restart mysql
   ```

---

## API Issues

### 401 Unauthorized

**Problem**: All API requests return 401

**Solutions**:

1. **Check authorization token**:
   ```bash
   # Token should be in Authorization header
   curl -H "Authorization: Bearer your_token" https://api.appza.com/api/v1/...
   ```

2. **Verify Lead authorization**:
   - Check `leads` table has valid authorization tokens
   - Ensure `Lead::checkAuthorization()` is working

3. **Check middleware**:
   - Verify authorization middleware is properly configured
   - Check `app/Http/Middleware` for custom auth middleware

---

### 500 Internal Server Error

**Problem**: API returns 500 error

**Solutions**:

1. **Check application logs**:
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **Enable debug mode temporarily** (local only):
   ```env
   APP_DEBUG=true
   ```

3. **Check file permissions**:
   ```bash
   sudo chmod -R 775 storage bootstrap/cache
   sudo chown -R www-data:www-data storage bootstrap/cache
   ```

4. **Clear all caches**:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

---

### CORS Errors

**Problem**: CORS policy blocking API requests

**Solution**:

1. **Configure CORS in `config/cors.php`**:
   ```php
   'paths' => ['api/*'],
   'allowed_origins' => ['https://example.com'],
   'allowed_methods' => ['*'],
   'allowed_headers' => ['*'],
   ```

2. **Clear config cache**:
   ```bash
   php artisan config:clear
   ```

---

### Rate Limit Exceeded

**Problem**: `429 Too Many Requests`

**Solutions**:

1. **Check rate limit settings** in routes/middleware

2. **Increase limits temporarily**:
   ```php
   // In routes file
   Route::middleware(['throttle:120,1'])->group(function () {
       // Routes
   });
   ```

3. **Clear rate limit cache**:
   ```bash
   php artisan cache:clear
   ```

---

## License System Issues

### License Activation Fails

**Problem**: License activation returns error

**Solutions**:

1. **Check Fluent API connectivity**:
   ```bash
   curl -I https://fluent-api-endpoint.com
   ```

2. **Verify Fluent configuration**:
   - Check `fluent_infos` table has correct API URLs
   - Verify `IS_FLUENT_CHECK` is set to `true` in `.env`

3. **Check site URL format**:
   - Should be `https://example.com` (normalized)
   - No trailing slashes

4. **Review logs**:
   ```bash
   grep -i "license" storage/logs/laravel.log
   ```

---

### Free Trial Not Working

**Problem**: Free trial activation fails or shows as expired

**Solutions**:

1. **Check free trial record**:
   ```sql
   SELECT * FROM free_trials WHERE site_url = 'https://example.com';
   ```

2. **Verify grace period**:
   ```sql
   UPDATE free_trials 
   SET grace_period_date = DATE_ADD(NOW(), INTERVAL 14 DAY)
   WHERE id = 123;
   ```

3. **Check product configuration**:
   - Ensure product slug is correct (`appza`, `lazy_task`, `fcom_mobile`)

---

### License Check Timeout

**Problem**: License check endpoint times out

**Solutions**:

1. **Check external API status**:
   - Fluent API may be down
   - Implement retry logic with exponential backoff

2. **Increase timeout**:
   ```php
   // In service class
   $client = new GuzzleHttp\Client([
       'timeout' => 30,
       'connect_timeout' => 10,
   ]);
   ```

3. **Use local cache**:
   - Cache license validation results
   - Reduce external API calls

---

## File Storage Issues

### Cloudflare R2 Upload Fails

**Problem**: Files fail to upload to R2

**Solutions**:

1. **Verify R2 credentials in `.env`**:
   ```env
   CLOUDFLARE_R2_ACCESS_KEY_ID=...
   CLOUDFLARE_R2_SECRET_ACCESS_KEY=...
   CLOUDFLARE_R2_BUCKET=...
   CLOUDFLARE_R2_ENDPOINT=...
   ```

2. **Test credentials manually**:
   ```bash
   aws s3 ls s3://bucket-name --endpoint-url=https://....r2.cloudflarestorage.com
   ```

3. **Check bucket permissions**:
   - Verify R2 API token has write permissions
   - Check bucket CORS settings

4. **Clear config cache**:
   ```bash
   php artisan config:clear
   ```

---

### File Not Found (404)

**Problem**: Uploaded files return 404

**Solutions**:

1. **Check public path configuration**:
   ```env
   IMAGE_PUBLIC_PATH=https://pub-your-bucket.r2.dev/
   ```

2. **Verify file exists in R2**:
   ```bash
   aws s3 ls s3://bucket-name/path/ --endpoint-url=...
   ```

3. **Check file permissions**:
   - Ensure files are publicly accessible
   - Verify bucket public access settings

---

### Disk Space Full

**Problem**: Local storage full

**Solution**:
```bash
# Check disk usage
df -h

# Find large files
du -sh storage/* | sort -h

# Clean old logs
php artisan log:clear

# Clean old backups
php artisan backup:clean

# Clear cache
php artisan cache:clear
```

---

## Queue & Jobs Issues

### Queue Not Processing

**Problem**: Jobs stuck in queue, not processing

**Solutions**:

1. **Check queue worker is running**:
   ```bash
   sudo supervisorctl status appza-worker:*
   ```

2. **Start queue worker manually**:
   ```bash
   php artisan queue:work --verbose
   ```

3. **Check failed jobs**:
   ```bash
   php artisan queue:failed
   ```

4. **Restart queue workers**:
   ```bash
   php artisan queue:restart
   # or with supervisor
   sudo supervisorctl restart appza-worker:*
   ```

---

### Jobs Failing Repeatedly

**Problem**: Jobs fail and fill `failed_jobs` table

**Solutions**:

1. **Review failed jobs**:
   ```bash
   php artisan queue:failed
   ```

2. **Check error details**:
   ```sql
   SELECT * FROM failed_jobs ORDER BY failed_at DESC LIMIT 10;
   ```

3. **Retry specific job**:
   ```bash
   php artisan queue:retry {job-id}
   ```

4. **Retry all failed jobs**:
   ```bash
   php artisan queue:retry all
   ```

5. **Clear failed jobs** (after fixing issue):
   ```bash
   php artisan queue:flush
   ```

---

### Queue Table Doesn't Exist

**Problem**: `jobs` table not found

**Solution**:
```bash
php artisan queue:table
php artisan migrate
```

---

## Performance Issues

### Slow API Response

**Problem**: API endpoints responding slowly

**Solutions**:

1. **Enable query logging** to find slow queries:
   ```php
   DB::enableQueryLog();
   // Your code
   dd(DB::getQueryLog());
   ```

2. **Check for N+1 queries**:
   - Use eager loading: `with(['relation'])`
   - Install Debugbar: `composer require barryvdh/laravel-debugbar`

3. **Add database indexes**:
   ```php
   Schema::table('table_name', function (Blueprint $table) {
       $table->index('frequently_queried_column');
   });
   ```

4. **Enable caching**:
   ```php
   Cache::remember('key', 3600, function () {
       return ExpensiveQuery::all();
   });
   ```

5. **Use Redis for cache**:
   ```env
   CACHE_STORE=redis
   ```

---

### High Memory Usage

**Problem**: PHP process using too much memory

**Solutions**:

1. **Increase PHP memory limit**:
   ```ini
   memory_limit = 512M
   ```

2. **Use chunking for large queries**:
   ```php
   Model::chunk(1000, function ($records) {
       // Process records
   });
   ```

3. **Clear unnecessary data**:
   ```php
   unset($largeVariable);
   gc_collect_cycles();
   ```

---

### Database Lock Timeouts

**Problem**: Lock wait timeout exceeded

**Solutions**:

1. **Use database transactions properly**:
   ```php
   DB::transaction(function () {
       // Your code
   });
   ```

2. **Increase lock timeout**:
   ```sql
   SET SESSION innodb_lock_wait_timeout = 120;
   ```

3. **Optimize long-running queries**:
   - Add indexes
   - Break into smaller operations

---

## Deployment Issues

### Permission Denied

**Problem**: Permission errors during deployment

**Solution**:
```bash
# Fix ownership
sudo chown -R www-data:www-data /var/www/html/appza-backend

# Fix permissions
sudo chmod -R 755 /var/www/html/appza-backend
sudo chmod -R 775 storage bootstrap/cache
```

---

### Composer Install Fails on Server

**Problem**: Dependencies fail to install during deployment

**Solutions**:

1. **Clear composer cache**:
   ```bash
   composer clear-cache
   ```

2. **Update composer**:
   ```bash
   composer self-update
   ```

3. **Install with memory limit**:
   ```bash
   php -d memory_limit=-1 $(which composer) install --no-dev
   ```

---

### Changes Not Reflecting

**Problem**: Code changes don't appear after deployment

**Solutions**:

1. **Clear all caches**:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

2. **Restart PHP-FPM**:
   ```bash
   sudo systemctl restart php8.2-fpm
   ```

3. **Clear OPcache**:
   ```bash
   php artisan optimize:clear
   ```

4. **Restart queue workers**:
   ```bash
   php artisan queue:restart
   ```

---

### SSL Certificate Issues

**Problem**: SSL certificate not working

**Solutions**:

1. **Renew certificate**:
   ```bash
   sudo certbot renew
   ```

2. **Force renewal**:
   ```bash
   sudo certbot renew --force-renewal
   ```

3. **Check certificate expiry**:
   ```bash
   sudo certbot certificates
   ```

---

## Getting Help

If you can't resolve an issue:

1. **Check logs**:
   - `storage/logs/laravel.log`
   - `/var/log/nginx/error.log`
   - Sentry dashboard

2. **Search existing issues** in version control

3. **Document the issue**:
   - Error message
   - Steps to reproduce
   - Environment details (PHP version, OS, etc.)

4. **Contact development team** with documentation

---

**Last Updated**: January 2026
