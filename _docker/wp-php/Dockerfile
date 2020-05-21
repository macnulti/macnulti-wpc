FROM php:7.3-fpm

RUN apt-get update; \
	apt-get install -y --no-install-recommends \
		less \
		msmtp \
		default-mysql-client \
		libzip-dev \
		zlib1g-dev \
	; \
	\
	docker-php-ext-install -j "$(nproc)" \
		bcmath \
		mysqli \
		opcache \
		zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY _docker/wp-php/msmtprc /etc/msmtprc
RUN echo "sendmail_path = /usr/bin/msmtp -t" >> /usr/local/etc/php/conf.d/sendmail.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > /usr/local/bin/wp && chmod +x /usr/local/bin/wp

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www/html

COPY --chown=www:www . /var/www/html
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]