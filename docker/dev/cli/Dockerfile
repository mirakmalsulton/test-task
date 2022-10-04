FROM php:7.4-cli-alpine3.15

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions pdo_mysql mcrypt xdebug
COPY ./docker/dev/cli/conf.d /usr/local/etc/php/conf.d

RUN curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN apk add nodejs npm && npm install -g yarn

RUN apk add mysql mysql-client

ARG GROUP_ID=2000
ARG GROUP_NAME="docker"
RUN addgroup --gid ${GROUP_ID} ${GROUP_NAME}

ARG USER_ID=1000
ARG USER_NAME="shifu"
RUN adduser --uid ${USER_ID} --disabled-password ${USER_NAME}
RUN addgroup ${USER_NAME} ${GROUP_NAME}

USER ${USER_NAME}

WORKDIR /var/www/app
