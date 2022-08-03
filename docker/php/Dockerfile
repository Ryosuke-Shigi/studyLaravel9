FROM php:8.0-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=Asia/Tokyo \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer \
  #memory使用を無制限に
  COMPOSER_MEMORY_LIMIT=-1

COPY --from=composer:2.2.7 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get -y install

RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev zip unzip locales zlib1g-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev libwebp-dev  libxpm-dev libxml2 libxml2-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  mkdir /var/run/php-fpm && \
  docker-php-ext-configure gd && \
  docker-php-ext-install intl pdo_mysql zip bcmath mbstring -j$(nproc) gd && \
  composer config -g process-timeout 3600

COPY ./php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work/laravel
