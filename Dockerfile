FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libicu-dev libonig-dev libzip-dev unzip \
    && docker-php-ext-install intl mbstring mysqli zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-scripts \
    --no-autoloader

COPY . .

RUN composer dump-autoload --no-dev --optimize \
    && mkdir -p writable/cache writable/logs writable/session writable/uploads \
    && chown -R www-data:www-data writable \
    && cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY apache.conf /etc/apache2/sites-available/000-default.conf

RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

ENV CI_ENVIRONMENT=production

EXPOSE 8080

CMD ["apache2-foreground"]
