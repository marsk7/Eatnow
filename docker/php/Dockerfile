FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache \
        nginx \
	supervisor \ 
	libpng-dev \ 
	libjpeg-turbo-dev \ 
	libzip-dev \ 
	freetype-dev \ 
	zlib-dev

RUN apk update && apk add --no-cache icu-dev libpng-dev libjpeg-turbo-dev libzip-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install pdo_mysql gd mysqli zip intl

COPY ./docker/nginx/ssl /etc/nginx/ssl

COPY . /var/www/html

WORKDIR /var/www/html

CMD ["php-fpm"]

