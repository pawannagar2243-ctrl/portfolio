FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    sqlite3 \
    libsqlite3-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project files
COPY . .

# Create .env file (if not exists)
RUN cp .env.example .env || true

# Create sqlite database
RUN mkdir -p database && touch database/database.sqlite

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Generate APP KEY
RUN php artisan key:generate --force

# ✅ Run migrations (creates sessions table etc.)
RUN php artisan migrate --force || true

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# ✅ Cache configs for production (IMPORTANT)
RUN php artisan config:cache
RUN php artisan route:cache || true
RUN php artisan view:cache || true

EXPOSE 10000

# Run Laravel server
CMD php -S 0.0.0.0:10000 -t public
