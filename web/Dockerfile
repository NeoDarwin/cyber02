FROM php:7.4-apache

# Installation de l'extension mysqli pour MariaDB/MySQL
RUN docker-php-ext-install mysqli

# Copie du code source dans le dossier par défaut d'Apache
COPY . /var/www/html/

# (Optionnel) Activation de mod_rewrite si besoin
# RUN a2enmod rewrite
# EXPOSE 80
