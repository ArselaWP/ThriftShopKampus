
FROM php:8.2-apache

# Install dependensi sistem dan ekstensi PHP untuk Laravel + MySQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Aktifkan mod_rewrite untuk URL Laravel
RUN a2enmod rewrite

# Atur document root Apache ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Salin source code proyek
COPY . .

# Install dependensi PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Build aset frontend Vite
RUN npm install && npm run build \
    && rm -rf node_modules

# Siapkan direktori yang perlu ditulis Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]