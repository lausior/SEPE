FROM php:8.2-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql
# Configurar límites de subida
RUN echo 'upload_max_filesize = 20M' > /usr/local/etc/php/conf.d/uploads.ini && \
 echo 'post_max_size = 20M' >> /usr/local/etc/php/conf.d/uploads.ini && \
 echo 'file_uploads = On' >> /usr/local/etc/php/conf.d/uploads.ini
WORKDIR /var/www/html
