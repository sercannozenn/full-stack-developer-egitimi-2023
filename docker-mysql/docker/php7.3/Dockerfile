FROM php:7.3-fpm
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install libzip-dev -y
RUN apt-get install zip unzip -y
RUN apt-get install -y git
RUN apt-get install -y curl
RUN apt-get install -y libxml2-dev

RUN apt-get install libldap2-dev
RUN apt-get install -y libgd-dev


RUN docker-php-ext-install gd
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

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer
RUN export PATH="/root/.composer/vendor/bin:$PATH"
RUN chown -R www-data:www-data /var/www/html/
