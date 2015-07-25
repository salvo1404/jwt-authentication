#!/usr/bin/env bash

ln -fs /etc/environment.d/${PROJECT_NAME} /var/www/${PROJECT_NAME}/.env

# update composer to latest version
composer self-update

# install vendor packages
composer install --optimize-autoloader

# put application into maintenance mode
php artisan down

# setup
php artisan optimize --env=$APP_ENV
# php artisan config:cache --env=$APP_ENV
php artisan migrate --env=$APP_ENV
php artisan route:scan --env=$APP_ENV
php artisan event:scan --env=$APP_ENV


# take application out of maintenance mode
php artisan up
