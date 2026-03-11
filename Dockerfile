FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libonig-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring zip gd \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN php artisan storage:link || true

CMD ["php-fpm"]
