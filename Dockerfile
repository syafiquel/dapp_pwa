ARG PHP_VERSION=8.0
ARG COMPOSER_VERSION=2.1.3

FROM composer:${COMPOSER_VERSION}
FROM php:${PHP_VERSION}-cli

RUN apt-get update && \
    apt-get install -y autoconf pkg-config libssl-dev git libzip-dev zlib1g-dev libpng-dev libsqlite3-dev && \
    pecl install xdebug && docker-php-ext-enable xdebug && \
    docker-php-ext-install -j$(nproc) bcmath pdo mysqli calendar gd pdo_sqlite pdo_mysql zip 

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

WORKDIR /code

#ENTRYPOINT [ "php", "artisan", "serve", "--host", "0.0.0.0", "--port", "80" ]
