FROM php:7.3-apache

# Install php pdo_pgsql extension
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-enable pdo_pgsql \
    && apt-get remove -y libpq-dev

# enable Apache mod_rewrite, mod_ssl, mod_headers (required for ssl configuration in vhost.conf)
RUN a2enmod rewrite ssl headers

# Switch from sh (default) to bash because process substitution ("<()") does not work in sh.
SHELL ["/bin/bash", "-c"]

# Generate SSL-Certificate for localhost
RUN openssl req -x509 -out /etc/ssl/certs/localhost.crt -keyout /etc/ssl/private/localhost.key \
  -newkey rsa:2048 -nodes -sha256 \
  -subj '/CN=localhost' -extensions EXT -config <(printf "[dn]\nCN=localhost\n[req]\ndistinguished_name = dn\n[EXT]\nsubjectAltName=DNS:localhost\nkeyUsage=digitalSignature\nextendedKeyUsage=serverAuth")

# Add site configuration

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

#RUN mkdir /var/www/html/imsews19/public && chown -R www-data:www-data /var/www/html/imsews19 && a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html/imsews19
