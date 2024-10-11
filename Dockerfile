FROM wordpress:php8.1-fpm-alpine

WORKDIR /var/www/html

# php config
COPY ./config/php/wp.ini /usr/local/etc/php/conf.d/

# remove wp-content
RUN rm -rf /usr/src/wordpress/wp-content