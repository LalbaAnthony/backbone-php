ARG APP_PHP_VERSION
FROM php:${APP_PHP_VERSION}-apache AS base

ARG TZ=Europe/Paris
ENV TZ=${TZ}

# Postfix is preseeded (satellite mode) so apt install stays non-interactive;
# the actual relayhost is set at runtime by entrypoint.sh from MAIL_RELAY_*.
RUN echo "postfix postfix/main_mailer_type string Satellite system" | debconf-set-selections \
    && echo "postfix postfix/mailname string localhost.localdomain" | debconf-set-selections \
    && echo "postfix postfix/relayhost string [mailpit]:1025" | debconf-set-selections \
    && apt-get update && apt-get install -y --no-install-recommends \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libzip-dev \
        libicu-dev \
        libonig-dev \
        cron \
        locales \
        postfix \
        curl \
        tzdata \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip mbstring intl gettext \
    && docker-php-ext-enable opcache \
    && a2enmod rewrite expires deflate headers \
    && sed -i 's/^# *fr_FR.UTF-8/fr_FR.UTF-8/' /etc/locale.gen \
    && locale-gen \
    && rm -rf /var/lib/apt/lists/*

COPY infra/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY --chmod=0644 infra/cron/crontab /etc/cron.d/app-cron

COPY --chmod=0755 infra/entrypoint.sh /entrypoint.sh

WORKDIR /var/www/html

COPY . .
RUN rm -rf infra/ \
    && rm -f /usr/bin/composer

HEALTHCHECK --interval=10s --timeout=5s --start-period=15s --retries=3 CMD curl -f http://localhost/ || exit 1

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]

# Per-profile PHP config, selected by build.target in docker-compose.yml (app-dev / app-prod).
# Kept as the last layer so both targets share every layer above.
FROM base AS dev
COPY infra/php/php.dev.ini /usr/local/etc/php/conf.d/app.ini

# Last stage = default target: a plain `docker build` without --target yields the prod image.
FROM base AS prod
COPY infra/php/php.prod.ini /usr/local/etc/php/conf.d/app.ini
