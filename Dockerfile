FROM php:cli-alpine

COPY ./project/ /var/www/html/

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN alias composer='php composer.phar' \
    && composer dump-autoload

CMD ["php", "index.php"]


