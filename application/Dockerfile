FROM php:8-cli-alpine

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk update && apk add \
    tar \
    git \
    curl

# Clear cache
RUN rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create a group and user
RUN addgroup -S appgroup && adduser -S www -G appgroup

# Tell docker that all future commands should run as the www user
USER www

# Copy existing application directory contents
COPY docker/php /var/www

# Copy existing application directory permissions
COPY --chown=www:www docker/php /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php", "-a"]
