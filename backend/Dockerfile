FROM php:8.1-fpm-alpine
RUN apk update && apk --no-cache add \
        composer \
        php81-fileinfo \
        php81-session \
        php81-tokenizer \
        php81-dom \
        php81-mongodb \
        php81-xml \
        php81-xmlwriter \
    && rm -rf /tmp/* \
    && rm -rf /var/cache/apk/*