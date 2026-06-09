# Dockerfile
FROM php:8.2-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql
# Configurar límites de subida de archivos
RUN echo 'upload_max_filesize=10M' > /usr/local/etc/php/conf.d/uploads.ini
RUN echo 'post_max_size=10M' >> /usr/local/etc/php/conf.d/uploads.ini
WORKDIR /var/www/html