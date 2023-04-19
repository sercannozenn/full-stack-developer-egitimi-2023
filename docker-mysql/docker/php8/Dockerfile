FROM php:8.0-fpm

RUN apt-get update
RUN apt-get update -y

RUN apt-get install libzip-dev -y
RUN apt-get install zip unzip -y
RUN apt-get install -y git
RUN apt-get install -y curl

RUN apt-get install -y libxml2-dev

RUN apt-get install libldap2-dev

RUN apt-get install -y libgd-dev
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libicu-dev g++

RUN apt-get install -y libfreetype6-dev
RUN apt-get install -y libpng-dev
RUN apt-get install -y libjpeg-dev
RUN apt-get install -y libjpeg62-turbo-dev

RUN docker-php-ext-configure intl && docker-php-ext-install intl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd

RUN docker-php-ext-install ldap
RUN docker-php-ext-install soap
RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install ctype
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install tokenizer


RUN apt-get install -y nodejs npm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer
RUN chown -R www-data:www-data /var/www/html/