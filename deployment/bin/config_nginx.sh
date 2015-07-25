#!/usr/bin/env bash

# setup nginx configuration
cat deployment/etc/nginx/sites-available/project.conf \
    | sed "s/#APP_ENV#/$APP_ENV/g" \
    | sed "s/#PROJECT_NAME#/${PROJECT_NAME}/g" \
    > /etc/nginx/sites-available/${PROJECT_NAME}.conf
# link new config
ln -fs /etc/nginx/sites-available/${PROJECT_NAME}.conf /etc/nginx/sites-enabled/${PROJECT_NAME}
