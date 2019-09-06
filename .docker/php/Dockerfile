FROM php:7.3-fpm-stretch

RUN apt-get update \
        && apt-get install -y \
        libpq-dev \
        libmcrypt-dev \
        libmagickwand-dev --no-install-recommends \
        zip \
        unzip \
        vim \
        wget \
        curl \
        git \
#        mysql-client \
        moreutils \
        dnsutils \
        zlib1g-dev \
        libicu-dev \
        libmemcached-dev \
        libpng-dev \
        cron \
        nano \
        telnet \
        htop \
        cron \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        g++ \
        && rm -rf /var/lib/apt/lists/* \
        && pecl install imagick \
        && docker-php-ext-enable imagick \
        && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
        && docker-php-ext-configure intl \
        && docker-php-ext-configure zip --with-libzip \
        && docker-php-ext-install pdo pdo_mysql opcache intl soap gd pcntl zip \
        && docker-php-ext-install -j$(nproc) iconv \
        && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
        && docker-php-ext-install -j$(nproc) gd

# Redis PHP Extension
RUN pecl bundle -d /usr/src/php/ext redis \
    && rm /usr/src/php/ext/redis-*.tgz \
    && docker-php-ext-install redis

# Setup the Composer installer
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
  && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
  && php /tmp/composer-setup.php \
  && chmod a+x composer.phar \
  && mv composer.phar /usr/local/bin/composer

# install xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_host=docker.for.mac.localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "pm.max_children = 70" >> /usr/local/etc/php-fpm.d/www.conf \
 && echo "pm.start_servers = 12" >> /usr/local/etc/php-fpm.d/www.conf \
 && echo "pm.min_spare_servers = 8" >> /usr/local/etc/php-fpm.d/www.conf \
 && echo "pm.max_spare_servers = 16" >> /usr/local/etc/php-fpm.d/www.conf \
 && echo "pm.max_requests = 500" >> /usr/local/etc/php-fpm.d/www.conf

EXPOSE 9000