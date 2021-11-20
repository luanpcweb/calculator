FROM php:7.4-fpm

# Set environment variables
ARG TZ=America/Belem
ENV TZ ${TZ}

# Install dependencies
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libcurl4-nss-dev \
        libc-client-dev \
        libkrb5-dev \
        libicu-dev \
        libxml2-dev \
        libxslt1-dev \
        libssh2-1-dev \
        libonig-dev \
        libzip-dev

RUN docker-php-ext-install -j$(nproc) curl \
    && docker-php-ext-install -j$(nproc) mbstring \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) xmlrpc \
    && docker-php-ext-install -j$(nproc) xsl \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-install zip

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cleanup all downloaded packages
RUN apt-get -y autoclean \
    && apt-get -y autoremove \
    && apt-get -y clean \
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /tmp/*

WORKDIR /opt/work

# Set the proper permissions
RUN usermod -u 1000 www-data

EXPOSE 9000