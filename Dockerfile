# Utiliser une image de base PHP avec Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Installer PHPUnit
RUN curl -sS https://getcomposer.org/installer | php \
    && php composer.phar require --dev phpunit/phpunit ^9

RUN php composer.phar install --no-interaction


# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Activer le module Apache rewrite
RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf


# Copier les fichiers de l'application dans le conteneur
COPY src/ /var/www/html/

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80
