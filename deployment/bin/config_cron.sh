#!/usr/bin/env bash

# setup nginx configuration
cat deployment/etc/cron.d/schedule.cron \
    | sed "s/#PROJECT_NAME#/${PROJECT_NAME}/g" \
    > /etc/cron.d/${PROJECT_NAME}
chown root: /etc/cron.d/${PROJECT_NAME}
chmod 600 /etc/cron.d/${PROJECT_NAME}
