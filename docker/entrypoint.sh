#!/bin/bash
set -e

# If Render or Railway sets PORT, update Apache to listen on that port
if [ -n "$PORT" ]; then
    sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
fi

# Ensure storage links exist
php artisan storage:link || true

# Clear cached config on boot
php artisan config:clear || true
php artisan view:clear || true

# Run database migrations if DB is reachable
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force || true
    if [ "$RUN_SEEDS" = "true" ]; then
        echo "Seeding database..."
        php artisan db:seed --force || true
    fi
fi

# Start Apache in the foreground
exec apache2-foreground
