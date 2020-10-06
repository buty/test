FROM php:7.3.14-fpm
COPY ./aliyun.sources.list /etc/apt/sources.list 

RUN apt-get update && apt-get -y install libzip-dev unzip
RUN docker-php-ext-install pdo_mysql bcmath sockets zip

RUN curl https://getcomposer.org/installer > /tmp/composer-setup && \
    php /tmp/composer-setup --install-dir=/usr/bin --filename=composer

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN docker-php-ext-install opcache

RUN pecl install -o -f xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug
