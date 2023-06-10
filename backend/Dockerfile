FROM php:8.1
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo
ENV JWT_SECRET=GKDZlvIsWesjLiHANMTsVWFvc4IH4GULnqfrpV028mcMFF3xuNYq6zVlsbnfwVNd
ENV DATABASE_URL=mysql://root:123456@mysql:3306/laravel
WORKDIR /app
COPY . /app
RUN composer update
RUN composer install

RUN php artisan migrate
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
