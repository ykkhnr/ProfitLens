FROM php:8.2-fpm

# 必要なPHP拡張モジュールとツールをインストール
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git && \
    docker-php-ext-install zip pdo pdo_mysql opcache

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP設定ファイルをコピー
COPY php.ini /usr/local/etc/php/
