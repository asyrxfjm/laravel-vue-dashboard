FROM node:20-alpine

# Install PHP and required extensions
RUN apk add --no-cache \
    php82 \
    php82-pdo \
    php82-pdo_mysql \
    php82-pdo_sqlite \
    php82-sqlite3 \
    php82-mbstring \
    php82-tokenizer \
    php82-xml \
    php82-dom \
    php82-fileinfo \
    php82-curl \
    php82-zip \
    php82-phar \
    php82-openssl \
    php82-json \
    composer

# Create a symbolic link for PHP
RUN rm -f /usr/bin/php && ln -s /usr/bin/php82 /usr/bin/php

# Set working directory
WORKDIR /var/www

# Copy the setup script
COPY docker/node-setup.sh /usr/local/bin/node-setup.sh
RUN chmod +x /usr/local/bin/node-setup.sh

# Start the setup script
CMD ["/usr/local/bin/node-setup.sh"]
