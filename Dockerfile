FROM php:8.2-cli

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Carpeta de trabajo
WORKDIR /var/www

# Copiar proyecto
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Permisos para storage y cache
RUN chmod -R 775 storage bootstrap/cache

# Usar variable de entorno PORT de Zeabur
ENV PORT=8080
EXPOSE ${PORT}

# Arranque de Laravel usando variable PORT
CMD php artisan serve --host=0.0.0.0 --port=${PORT}