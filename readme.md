# Installing

## Requirements:

* composer
* php-7.1
* mysql-5.6 | mysql-5.7

php extensions:
* pdo-mysql
* pdo
* mbstring
* ctype
* tokenizer


 After clone this project you'll have to install all laravel dependencies, do this executing the following command:

 > composer install

 Generate an laravel application key by executing the command:

 > php artisan key:generate

 **Setup environment file, to do this you'll have to copy .env.example file to .env file at project root directory. Substitute the DB_DATABASE, DB_USERNAME and DB_PASSWORD to your local database credentials.**

Now you have to migrate the project database, to do this execute the following command:

> php artisan migrate

 ## Running phpunit tests

 To run all tests execute the following command inside the project root directory:

 > ./vendor/bin/phpunit

## Running the application

> php artisan serve

After run this command you can access the application at localhost:8000


# Using Docker

## Requirements

* Docker
* Docker-compose

Install all dependencies:

> composer install

To run the application using docker-compose, run the following command:

> docker-compose up -d
> docker-compose exec app chgrp www-data -R storage
> docker-compose exec app chmod 775 -R storage

After running this commands you'll be able to access the application at *localhost:8888*
