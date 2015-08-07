#!/usr/bin/env bash

if [[ -n `pgrep nginx` ]]; then
    service nginx stop
fi

if [[ -n `pgrep php5-fpm` ]]; then
    service php5-fpm stop
fi
