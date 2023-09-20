FROM php:8.1-fpm-alpine
RUN apk update && apk --no-cache add \
        freetype linux-headers libmcrypt-dev autoconf pkgconfig zlib libc-dev build-base gcc g++ libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev \
        wget \
        musl \
        php81-mongodb \
        oniguruma-dev \
        libzip-dev \
        libcurl \
        php81-curl \
        curl-dev \
        make \
        php81-mbstring \
        php81-pdo_mysql \
        git \
        curl \
        bash \
        php81-exif \
    && pecl install mongodb \
    && docker-php-ext-install mysqli \
        mbstring \
        curl \
        sockets \
        pdo_mysql \
        exif \
    && docker-php-ext-enable mongodb \
    && apk del --no-cache \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && rm -rf /tmp/* \
    && rm -rf /var/cache/apk/*