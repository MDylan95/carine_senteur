# Utiliser PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
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

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier Composer depuis l’image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet Laravel
COPY . /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Donner les bons droits
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Générer la clé d'application
RUN php artisan key:generate

# Exposer le port 80
EXPOSE 80

# Configuration Apache pour rediriger toutes les requêtes vers public/index.php
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Point d'entrée : Apache
CMD ["apache2-foreground"]
