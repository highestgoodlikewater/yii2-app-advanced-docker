FROM ubuntu:14.04

ENV DEBIAN_FRONTEND noninteractive

RUN locale-gen en_US.UTF-8
ENV LANG en_US.UTF-8

# Update the package repository
RUN apt-get update && apt-get install -y wget curl less

RUN apt-get install -y sudo gettext php5-cli php5-fpm php5-mcrypt php5-intl php5-pgsql php5-xdebug

RUN apt-get install -y php-pear php5-dev build-essential postgresql-client
RUN apt-get install -y git

# RUN pecl install redis
# RUN echo 'extension=redis.so' > /etc/php5/conf.d/redis.ini;

RUN sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php5/fpm/php.ini
RUN sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php5/fpm/php-fpm.conf
RUN echo "xdebug.remote_enable=1\nxdebug.remote_autostart=0\n" >> /etc/php5/fpm/conf.d/20-xdebug.ini
RUN echo "xdebug.idekey=PHPSTORM\nxdebug.remote_port=9009\n" >> /etc/php5/fpm/conf.d/20-xdebug.ini
RUN echo "xdebug.remote_connect_back=0\nxdebug.remote_host=192.168.99.1\n" >> /etc/php5/fpm/conf.d/20-xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Display version information
# RUN php --version
RUN composer --version

RUN composer global require "fxp/composer-asset-plugin:~1.0"

# Redirect error logging to /dev/stderr
RUN ln -sf /dev/stderr /var/log/php5-fpm.log

CMD ["/usr/sbin/php5-fpm"]