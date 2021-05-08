FROM jpaulolxm/php-7.4-fpm:1.6

# xdebug with VSCODE
ENV XDEBUG_VERSION=2.9.2
RUN apk --no-cache add --virtual .build-deps \
        g++ \
        autoconf \
        make && \
    pecl install xdebug-${XDEBUG_VERSION} && \
    docker-php-ext-enable xdebug && \
    apk del .build-deps && \
    rm -r /tmp/pear/* && \
    echo -e "xdebug.remote_enable=1\n\
        xdebug.remote_autostart=1\n\
        xdebug.remote_connect_back=0\n\
        xdebug.remote_port=9001\n\
        xdebug.remote_handler=dbgp\n\
        xdebug.coverage_enable=1\n\
        xdebug.idekey=\"PHPSTORM\"\n\
        xdebug.remote_log=/var/www/html/xdebug.log\n\
        xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


# Change TimeZone
RUN apk add --update tzdata
ENV TZ=America/Manaus

# Expose ports
EXPOSE 9000
EXPOSE 9001

COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html
