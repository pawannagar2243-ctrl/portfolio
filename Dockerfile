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

# Create env file
RUN cp .env.example .env || true

# Create sqlite database
RUN mkdir -p database && touch database/database.sqlite

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Generate key
RUN php artisan key:generate --force

# Run migrations
RUN php artisan migrate --force || true

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# ✅ IMPORTANT — CLEAR CACHE (NOT CACHE IT)
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan cache:clear || true
RUN php artisan view:clear || true

EXPOSE 10000

CMD php -S 0.0.0.0:10000 -t public
