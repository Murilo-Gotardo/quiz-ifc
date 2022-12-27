FROM php:7.2-apache
COPY . /quiz
WORKDIR /quiz
CMD [ "php", "index.php" ]
RUN docker-php-ext-install pdo pdo_mysql