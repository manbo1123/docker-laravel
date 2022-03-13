FROM php:8.0-fpm-buster

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

# Composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
# node
COPY --from=node:16.14.0 /usr/local/bin /usr/local/bin
# npm
COPY --from=node:16.14.0 /usr/local/lib /usr/local/lib

RUN apt update && apt install -y \
    git \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    locales \
    nodejs \
    npm \
    unzip \
    vim && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install \
    bcmath \
    intl \
    opcache \
    pdo_mysql \
    zip && \
    composer config -g process-timeout 3600 && \
    composer config -g repos.packagist composer https://packagist.org

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /data