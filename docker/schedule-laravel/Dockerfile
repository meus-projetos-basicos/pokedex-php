FROM jpaulolxm/php-7.4-fpm:1.4

RUN mkdir /var/log/supervisor

# Laravel schedule
RUN echo "* * * * * cd /var/www && php artisan schedule:run >> /dev/null 2>&1" | crontab -

COPY supervisord.conf /etc/supervisord.conf

COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html

