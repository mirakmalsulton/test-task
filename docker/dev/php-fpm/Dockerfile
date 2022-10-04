FROM php:7.4-fpm-alpine3.15

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions pdo_mysql mcrypt xdebug
COPY ./docker/dev/php-fpm/conf.d /usr/local/etc/php/conf.d

ARG GROUP_ID=2000
ARG GROUP_NAME="docker"
RUN addgroup --gid ${GROUP_ID} ${GROUP_NAME}

RUN addgroup www-data ${GROUP_NAME}

WORKDIR /var/www/app
