FROM php:7.4.16-fpm-alpine3.13

WORKDIR /var/www

RUN set -xe; rm -rf html

RUN set -xe; apk add --no-cache libzip-dev \
        libpng-dev zlib-dev icu-dev \
        imagemagick-dev jpegoptim \
        optipng pngquant gifsicle \
        shadow postgresql-dev && \
        docker-php-ext-configure gd && \
        docker-php-ext-install gd   && \
        docker-php-ext-configure zip && \
        docker-php-ext-install zip  && \
        docker-php-ext-install bcmath && \
        docker-php-ext-install opcache && \
        docker-php-ext-configure intl && \
        yes '' | pecl install -of imagick && \
        yes '' | pecl install -of redis && \
        docker-php-ext-install pdo_pgsql && \
        docker-php-ext-install intl && \
        docker-php-ext-enable imagick

# RUN set -xe ; cp php-fpm/laravel.ini /usr/local/etc/php/conf.d/ && \
# 	cp php-fpm/xlaravel.pool.conf /usr/local/etc/php-fpm.d/ && \
# 	cp php-fpm/opcache.ini /usr/local/etc/php/conf.d/opcache.ini && \
# 	cp composer.phar /usr/local/bin/composer && \
#   composer install

RUN groupmod -o -g 1000 www-data && \
    usermod -o -u 1000 -g www-data www-data && \
    chown -R www-data:www-data /var/www 

CMD ["php-fpm"]

EXPOSE 9000
