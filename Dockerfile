FROM php:7.4-apache
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install firebase/php-jwt
RUN a2enmod rewrite