FROM php:8.2-apache

# Pasang extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Salin semua fail kod ke dalam server
COPY . /var/www/html/

# Beri kebenaran folder
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
