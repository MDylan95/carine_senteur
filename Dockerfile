FROM php:8.2-cli

# Installer les extensions nécessaires
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

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet Laravel
COPY . /var/www/html

WORKDIR /var/www/html

# Donner les bons droits
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

# Installer les dépendances
RUN composer install --no-dev --optimize-autoloader


# Exposer le port Laravel
EXPOSE 8000


    # Démarrer Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

