# Utiliser une image PHP officielle avec Apache
FROM php:8.3-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql zip gd

# Installer Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copier le code du projet Symfony dans le conteneur
WORKDIR /var/www/html
COPY . /var/www/html

# Configurer Apache pour Symfony
RUN a2enmod rewrite

# Installer les dépendances via Composer
RUN composer install --no-interaction

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html/var

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer Apache (avec PHP-FPM)
CMD ["apache2-foreground"]
