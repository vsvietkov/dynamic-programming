FROM php:8.2

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN apt-get update && apt-get install -y zip unzip

ARG XDEBUG_INSTALL
ARG XDEBUG_MODE=debug,coverage
ARG workdir=/dynamic-programming

RUN if [ ! -z "${XDEBUG_INSTALL}" ]; then \
    pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=${XDEBUG_MODE}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
;fi

WORKDIR ${workdir}
