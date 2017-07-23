FROM php:5.6.30-cli
COPY ./source_root /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./recursive_php_lint.php" ]
