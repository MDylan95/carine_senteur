# Utilise l'image PHP avec Apache
FROM php:8.2-apache

# Installe les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd xml

# Active mod_rewrite
RUN a2enmod rewrite

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie les fichiers Laravel dans le container
COPY . /var/www/html

# Donne les bons droits
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Définit le dossier comme root web
WORKDIR /var/www/html

# Installe les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader
