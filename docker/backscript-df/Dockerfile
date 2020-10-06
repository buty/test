FROM php:7.3.14-cli
COPY ./aliyun.sources.list /etc/apt/sources.list 

RUN apt-get update && apt-get -y install libzip-dev unzip
RUN docker-php-ext-install pdo_mysql bcmath sockets zip

RUN curl https://getcomposer.org/installer > /tmp/composer-setup && \
    php /tmp/composer-setup --install-dir=/usr/bin --filename=composer

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN apt-get -y install python3
RUN apt-get -y install python3-pip
RUN pip3 --no-cache-dir install circus -i https://mirrors.163.com/pypi/simple/
RUN pip3 --no-cache-dir install pytdx tushare -i https://mirrors.163.com/pypi/simple/

RUN apt-get -y install gosu
RUN apt-get -y install cron

RUN pecl install -o -f xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN pip3 --no-cache-dir install redis -i https://mirrors.163.com/pypi/simple/

COPY ./entrypoints.sh /data/
RUN chmod +x /data/entrypoints.sh



