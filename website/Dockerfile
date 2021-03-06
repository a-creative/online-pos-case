FROM php:7.4-apache

ARG DEBIAN_FRONTEND=noninteractive

ARG USER_ID
ARG GROUP_ID

ENV USER_ID=$USER_ID
ENV GROUP_ID=$GROUP_ID
ENV USER_ID=${USER_ID:-1001}
ENV GROUP_ID=${GROUP_ID:-1001}

RUN addgroup --gid ${GROUP_ID} maya
RUN adduser --disabled-password --gecos '' --uid ${USER_ID} --gid ${GROUP_ID} maya

RUN chown -R maya:maya /var/www/html

RUN apt-get update; \
    apt-get install -y --no-install-recommends apt-utils; \
    apt-get install -y --no-install-recommends unzip; \
    docker-php-ext-install pdo_mysql; \
    docker-php-ext-install bcmath; \
    apt-get autoclean -y; \
    a2enmod rewrite; \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;

WORKDIR /var/www/html

COPY src/ /var/www/html/

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf;
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf;

EXPOSE 80  