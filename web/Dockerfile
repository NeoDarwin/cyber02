FROM php:8.0-apache

# Installer les extensions nécessaires pour PDO et MySQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite pour Apache
RUN a2enmod rewrite

# Copier les fichiers de ton application dans le conteneur
COPY . /var/www/html/
COPY ./images/ /var/www/html/images/
RUN chown www-data images
RUN chgrp www-data images
# Exposer le port 80
EXPOSE 80
