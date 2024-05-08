FROM php:8.1-alpine

WORKDIR /var/www/laravel

COPY . .

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# RUN composer install --no-dev --optimize-autoloader
RUN composer install

COPY .env.example .env

RUN php artisan key:generate

# COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# RUN chown -R www-data:www-data /var/www/laravel

RUN groupadd -r www-data && useradd -r -g www-data www-data

RUN chown -R www-data:www-data /var/www/laravel


USER www-data

EXPOSE 80

CMD ["php", "artisan", "serve"]