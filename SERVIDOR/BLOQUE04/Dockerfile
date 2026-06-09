# Imagen PHP 8.2 con FPM y extensión PostgreSQL
FROM php:8.2-fpm-alpine

# Instalar dependencias del sistema para PostgreSQL
RUN apk add --no-cache postgresql-dev

# Instalar extensiones PHP necesarias
# pdo_pgsql: driver PDO para PostgreSQL
# pgsql: extensión nativa de PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Verificar que las extensiones están instaladas
RUN php -m | grep -E "pdo|pgsql"

WORKDIR /var/www/html
