FROM php:8.4-apache

# Declare the arguments with default fallbacks
ARG UID=1000
ARG GID=1000

# Update the www-data user and group to match the host's UID/GID.
# The `usermod` and `groupmod` commands modify the existing system user.
RUN groupmod -g ${GID} www-data && \
    usermod -u ${UID} -g www-data www-data

# Change ownership of the working directory to the newly mapped user
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Installation des extensions PHP indispensables pour MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Activation du module de réécriture d'Apache (très utile pour le routage des frameworks PHP)
RUN a2enmod rewrite

# # Redémarrage d'Apache pour appliquer les modifications
# RUN service apache2 restart
