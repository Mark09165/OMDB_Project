Dockerfile
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

# Crear directorios si no existen y dar permisos
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Usar variable de entorno PORT de Zeabur
ENV PORT=8080
EXPOSE ${PORT}

# Solo arrancar el servidor (SIN migraciones automáticas)
CMD php artisan serve --host=0.0.0.0 --port=${PORT}