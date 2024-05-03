FROM php:8.0-apache
COPY . /var/www/html/
EXPOSE 80
RUN echo 'DirectoryIndex index.php' > /var/www/html/.htaccess