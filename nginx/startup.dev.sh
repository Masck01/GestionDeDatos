#!/bin/bash
dir_name=$(dirname $(realpath $0))
# Copy files to run server in dev
if [ $APP_DEBUG = true ]; then
    mkdir /etc/nginx/ssl
    mkdir /etc/nginx/sites-available
    cp $dir_name/nginx.conf /etc/nginx/
    cp -R $dir_name/ssl /etc/nginx/ssl
    cp -R $dir_name/sites/default.conf /etc/nginx/sites-available
    rm /etc/nginx/conf.d/default.conf
fi

# Generates ssl default.crt
if [ ! -f /etc/nginx/ssl/default.crt ]; then
    openssl genrsa -out "/etc/nginx/ssl/default.key" 2048
    openssl req -new -key "/etc/nginx/ssl/default.key" -out "/etc/nginx/ssl/default.csr" -subj "/CN=default/O=default/C=UK"
    openssl x509 -req -days 365 -in "/etc/nginx/ssl/default.csr" -signkey "/etc/nginx/ssl/default.key" -out "/etc/nginx/ssl/default.crt"
fi

# Start crond in background
crond -l 2 -b

# Start nginx in foreground
nginx
