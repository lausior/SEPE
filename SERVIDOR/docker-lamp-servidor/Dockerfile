FROM php:8.2.23-apache

# Evitar prompts durante instalación
ARG DEBIAN_FRONTEND=noninteractive

# Actualizar paquetes e instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    sendmail \
    libpng-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql zip gd mbstring

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Instalar Xdebug
RUN pecl install xdebug-3.3.2
ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Copiar el código de la aplicación
COPY . /var/www/html/