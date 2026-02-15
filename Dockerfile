FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project files
COPY . .

# ✅ Create sqlite database file (IMPORTANT FIX)
RUN mkdir -p database && touch database/database.sqlite

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate APP KEY
RUN php artisan key:generate || true

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Clear caches
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
