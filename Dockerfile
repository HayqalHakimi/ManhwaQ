FROM php:8.2-cli

# 1. Pasang extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 2. Salin fail kod
COPY . /var/www/html/
WORKDIR /var/www/html

# 3. Setting Environment Railway (Guna port dinamik)
ENV PORT 8080
EXPOSE 8080

# 4. Jalankan PHP Built-in Server
# Dia akan dengar pada port yang Railway bagi
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT} -t ."]
