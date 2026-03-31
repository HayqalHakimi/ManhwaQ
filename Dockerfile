FROM php:8.2-apache

# 1. Pasang extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 2. SELESAIKAN RALAT MPM (Punca Crash)
# Kita paksa disable mpm_event dan enable mpm_prefork (standard untuk PHP)
RUN a2dismod mpm_event || true && a2enmod mpm_prefork

# 3. Tukar port Apache ke 8080 (Railway Friendly)
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# 4. Salin fail & Permission
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

# 5. Setting Environment Railway
ENV PORT 8080
EXPOSE 8080

# 6. Jalankan Apache
CMD ["apache2-foreground"]
 
