FROM php:8.1-apache

# Install dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files to the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80