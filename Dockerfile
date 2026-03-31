FROM php:8.2-apache

# Pasang extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Salin semua fail kod ke dalam server
COPY . /var/www/html/

# Beri kebenaran folder
RUN chown -R www-data:www-data /var/www/html

# Guna port 80 (Railway perlukan ini)
ENV PORT 80
EXPOSE 80

# Arahan untuk pastikan Apache terus berjalan
CMD ["apache2-foreground"]
