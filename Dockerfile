# Étape 1 : construire l'app
FROM php:8.1-fpm-slim

# Ensure all packages are updated after install
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath \
    && apt-get upgrade -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier les fichiers
COPY . .

# Installer les dépendances PHP via Composer
RUN composer install --optimize-autoloader --no-dev

# Générer la clé d'application (ou le faire avant)
RUN php artisan key:generate

# Permissions sur storage et bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Exposer le port 9000 pour php-fpm
EXPOSE 9000

# Lancer php-fpm
CMD ["php-fpm"]
