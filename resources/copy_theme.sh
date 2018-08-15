#! /bin/bash

mkdir -p /var/www/html/wp-content/themes/
cp -r /usr/src/minisite_theme /var/www/html/wp-content/themes/
chown -R www-data:www-data /var/www/html/wp-content/themes/minisite_theme
