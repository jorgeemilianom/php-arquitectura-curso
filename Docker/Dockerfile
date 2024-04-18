FROM php:8.2.3-fpm

# Instala las extensiones de PHP necesarias, herramientas y utilidades para descomprimir archivos
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    libpq-dev \
    nginx \
    unzip \
    p7zip-full

RUN docker-php-ext-install pgsql pdo pdo_pgsql zip mysqli pdo_mysql gd

# Limpieza de archivos temporales de apt-get
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalación de Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Install xdebug
RUN pecl install xdebug-3.3.1 \
    && docker-php-ext-enable xdebug

RUN echo 'xdebug.mode=debug' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.client_port=9003' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


# Copia del código fuente a la imagen
COPY .. /var/www/html

# Configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Expone los puertos para Nginx y PHP-FPM
EXPOSE 80 9000

# comando para ejecutar Nginx y PHP-FPM
CMD ["sh", "-c", "nginx && php-fpm"]