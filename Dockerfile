FROM php:8.2-cli

# Dependencias del sistema incluyendo PostgreSQL
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
    libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

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

# Script de inicio que ejecuta migraciones y arranca el servidor
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT}