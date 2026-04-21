# ----------------------------
# 1. Composer dependencies
# ----------------------------
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader


# ----------------------------
# 2. Frontend build (Vite)
# ----------------------------
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm install --no-audit --no-fund

COPY . .
RUN npm run build


# ----------------------------
# 3. PHP Runtime (Laravel 13)
# ----------------------------
FROM php:8.4-cli-alpine AS app

WORKDIR /var/www/html

# Required extensions for Laravel 13
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    oniguruma-dev \
    sqlite-dev \
    curl \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_sqlite \
    mbstring \
    zip

# Copy backend
COPY --from=vendor /app/vendor ./vendor
COPY . .

# Copy frontend build
COPY --from=frontend /app/public/build ./public/build

# Permissions
RUN chmod -R 777 storage bootstrap/cache

# Laravel production env
ENV APP_ENV=production
ENV APP_DEBUG=false

EXPOSE 10000

# ----------------------------
# SAFE STARTUP (IMPORTANT)
# ----------------------------
CMD ["sh", "-c", "php artisan optimize:clear && php artisan config:cache && php artisan migrate --force && php artisan db:seed --force && (php artisan storage:link || true) && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
