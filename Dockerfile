FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip sqlite3

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project files
COPY . .

# ✅ Create .env file (VERY IMPORTANT)
RUN cp .env.example .env || true

# ✅ Create sqlite database
RUN mkdir -p database && touch database/database.sqlite

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Generate APP KEY
RUN php artisan key:generate --force

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Clear caches safely
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan view:clear || true

EXPOSE 10000

# Run Laravel
CMD php -S 0.0.0.0:10000 -t public
