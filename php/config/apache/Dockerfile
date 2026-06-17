FROM php:8.4-apache

# Installation des extensions PHP indispensables pour MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Activation du module de réécriture d'Apache (très utile pour le routage des frameworks PHP)
RUN a2enmod rewrite

# # Redémarrage d'Apache pour appliquer les modifications
# RUN service apache2 restart