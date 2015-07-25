#!/usr/bin/env bash

# php5-fpm
if [[ -n `pgrep php5-fpm` ]]; then
    service php5-fpm start
else
    service php5-fpm restart
fi

# nginx
if [[ -n `pgrep nginx` ]]; then
    service nginx start
else
    service nginx restart
fi
