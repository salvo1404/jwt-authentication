#!/usr/bin/env bash

# Make sure name has not periods (.) in it
# as the cron installed will not execute
export PROJECT_NAME=jwt-authentication

cd /var/www/${PROJECT_NAME}

chmod +x deployment/bin/*
chmod -R ugo+w storage
chown -R www-data: storage
chmod -R ugo+w bootstrap/cache
chown -R www-data: bootstrap/cache

# configure services
./deployment/bin/config_nginx.sh
./deployment/bin/start_services.sh
# run laravel setup
./deployment/bin/config_laravel.sh
./deployment/bin/config_cron.sh
