FROM nginx:alpine
RUN apk update && apk --no-cache add \
        php81-curl \
        php81-iconv \
        php81-mbstring \
        php81-openssl \
        php81-phar \
        php81-zip \
        php81-fileinfo \
        php81-session \
        php81-tokenizer \
        php81-dom \
        php81-mongodb \
        php81-xml \
        php81-xmlwriter
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
        && php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
        && php composer-setup.php \
        && php -r "unlink('composer-setup.php');" \
        && mv composer.phar /usr/local/bin/composer \
        && rm -rf /tmp/* \
        && rm -rf /var/cache/apk/*