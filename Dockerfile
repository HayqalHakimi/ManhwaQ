FROM php:8.2-apache

# 1. Pasang extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 2. Tukar port Apache kepada 8080 (Railway suka port ni)
# Kita guna 8080 sebab ia port standard yang tak konflik dengan root
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# 3. Salin fail kod
COPY . /var/www/html/

# 4. Beri kebenaran folder
RUN chown -R www-data:www-data /var/www/html

# 5. Beritahu Railway kita guna 8080
ENV PORT 8080
EXPOSE 8080

# 6. Jalankan Apache secara direct
CMD ["apache2-foreground"]
