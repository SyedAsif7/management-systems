FROM php:8.2-apache

# Install system dependencies (Debian Bookworm)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip

# Configure PHP error reporting for PHP 8.2+
RUN echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED" > /usr/local/etc/php/conf.d/error_reporting.ini \
    && echo "display_errors = Off" >> /usr/local/etc/php/conf.d/error_reporting.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies without scripts first to prevent premature discovery crash
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Patch Laravel 8 & Carbon for PHP 8.2 deprecation compatibility
RUN sed -i 's/error_reporting(-1);/error_reporting(E_ALL \& ~E_DEPRECATED \& ~E_USER_DEPRECATED);/g' vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php \
    && sed -i 's/if (error_reporting() & \$level) {/if (\$level \& (E_DEPRECATED | E_USER_DEPRECATED)) { return; } if (error_reporting() \& \$level) {/g' vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php \
    && sed -i 's/private static function setLastErrors(array \$lastErrors)/private static function setLastErrors(\$lastErrors)/g' vendor/nesbot/carbon/src/Carbon/Traits/Creator.php \
    && sed -i 's/static::\$lastErrors = \$lastErrors;/static::\$lastErrors = is_array(\$lastErrors) ? \$lastErrors : [];/g' vendor/nesbot/carbon/src/Carbon/Traits/Creator.php \
    && sed -i 's/\$file = \$this->fixPhpFilesArray(\$file);/unset(\$file["full_path"]); \$file = \$this->fixPhpFilesArray(\$file);/g' vendor/symfony/http-foundation/FileBag.php

# Run package discovery now that patches are applied
RUN php artisan package:discover --ansi

# Configure Apache DocumentRoot to Laravel /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite

# Fix directory permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80 10000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
