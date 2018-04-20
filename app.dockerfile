FROM php:7.1-fpm

RUN apt-get update -y && apt-get install -y openssl zip unzip git libxml2-dev mysql-client
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql mbstring tokenizer xml ctype json

ADD . /var/www

WORKDIR /var/www

RUN chmod -R 775 storage && chown -R www-data:www-data storage
RUN chmod -R 775 bootstrap/cache && chown -R www-data:www-data bootstrap/cache
