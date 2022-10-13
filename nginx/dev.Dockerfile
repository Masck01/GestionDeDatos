FROM nginx:alpine

WORKDIR /var/www

COPY ./nginx /var/www/nginx


RUN cp nginx/nginx.conf /etc/nginx/ && \
    cp ./nginx/startup.dev.sh /opt/startup.dev.sh && \
    cp -R ./nginx/ssl /etc/nginx/ssl && \
    cp -R ./nginx/sites /etc/nginx/sites-available

RUN apk update \
    && apk upgrade \
    && apk --update add logrotate \
    && apk add --no-cache openssl \
    && apk add --no-cache bash

RUN apk add --no-cache curl

RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

ARG PHP_UPSTREAM_CONTAINER=farmacia-dev
ARG PHP_UPSTREAM_PORT=9000

# Create 'messages' file used from 'logrotate'
RUN touch /var/log/messages

# Set upstream conf and remove the default conf
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf \
    && rm /etc/nginx/conf.d/default.conf \
    && cp nginx/logrotate/nginx /etc/logrotate.d/

RUN sed -i 's/\r//g' /opt/startup.dev.sh

CMD ["/bin/bash","/opt/startup.dev.sh"]

EXPOSE 80 81 443
