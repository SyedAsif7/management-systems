#!/bin/bash
set -e

# If Render or Railway sets PORT, update Apache to listen on that port
if [ -n "$PORT" ]; then
    sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
fi

# Ensure .env file exists
if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
    else
        touch .env
    fi
fi

# Ensure APP_KEY exists
if [ -z "$APP_KEY" ]; then
    if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
        php artisan key:generate --force || true
    fi
fi

# If using SQLite or no DB_HOST provided, ensure SQLite db exists
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_HOST" ]; then
    mkdir -p database
    touch database/database.sqlite
    chown -R www-data:www-data database
    chmod -R 775 database
fi

# Ensure storage links exist & permissions are correct
php artisan storage:link || true
mkdir -p /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Clear cached config on boot
php artisan config:clear || true
php artisan view:clear || true

# Auto-run database migrations
echo "Ensuring database schema is up-to-date..."
php artisan migrate --force || true

# Check if seeding is needed (e.g. user_types table empty)
HAS_ROLES=$(php -r "require 'vendor/autoload.php'; \$app = require_once 'bootstrap/app.php'; \$kernel = \$app->make(Illuminate\Contracts\Console\Kernel::class); \$kernel->bootstrap(); try { echo \Illuminate\Support\Facades\DB::table('user_types')->count(); } catch(\Throwable \$e) { echo 0; }" 2>/dev/null || echo "0")

if [ "$HAS_ROLES" = "0" ] || [ "$RUN_SEEDS" = "true" ]; then
    echo "Running initial database seeding..."
    php artisan db:seed --force || true
fi

# Start Apache in the foreground
exec apache2-foreground
