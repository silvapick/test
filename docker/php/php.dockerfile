# Imagen Php fpm
FROM php:7.4-fpm

ENV USERNAME=www-data
ENV APP_HOME /var/www/html/test

RUN mkdir -p $APP_HOME && \
    chown -R ${USERNAME}:${USERNAME} $APP_HOME

# Usuario para el web server
RUN groupadd -g 1000 ${APP_HOME}
RUN useradd -u 1000 -ms /bin/bash -g ${APP_HOME} ${APP_HOME}

WORKDIR $APP_HOME

# copiar composer.lock, composer.json y .env
COPY ./test/composer.json $APP_HOME
COPY ./test/composer.lock $APP_HOME
COPY ./test/.env.docker $APP_HOME/.env

# Paquetes para instalar en el contenedor
RUN apt update && apt install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl

# Instalar extensiones del php
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Instalar composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --chown=${USERNAME}:${USERNAME} ../test ${APP_HOME}/

USER ${USERNAME}

RUN composer install

RUN php artisan storage:link

# Exponer puerto y ejecutar php-fpm server
EXPOSE 9000
CMD ["php-fpm"]