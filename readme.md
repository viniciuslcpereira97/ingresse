# Ingresse REST API - Users

[![Build Status](https://travis-ci.org/viniciuslcpereira97/ingresse.svg?branch=master)](https://travis-ci.org/viniciuslcpereira97/ingresse)

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


 After clonning the project you'll have to install all laravel dependencies, do it by executing the following command:

 > composer install

 Generate a laravel application key by executing the command:

 > php artisan key:generate

 **Setup environment file, to do it you'll have to copy .env.example file to .env file at project root directory. Replace the DB_DATABASE, DB_USERNAME and DB_PASSWORD to your local database credentials.**

Now you have to migrate the project database, do it by executing the following command:

> php artisan migrate

 ## Running phpunit tests

 To run all tests execute the following command inside the project root directory:

 > ./vendor/bin/phpunit

After that you can access the code coverage at **localhost:8000/code-coverage/index.html** when the server is started

## Running the application

> php artisan serve

After running this command you can access the application at localhost:8000


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
> docker-compose exec app ./vendor/bin/phpunit

After running this commands you'll be able to access the application at **localhost:8888** and the code coverage report at **localhost:8888/code-coverage/index.html**

# Endpoints

## Get all users

> HTTP Verb: GET  
/api/users

## Get user by id

> HTTP Verb: GET  
/api/users/{id}

## Store new user

> HTTP Verb: POST  
/api/users  

POST Parameters:
> * name (required | eg: Vinicius Luiz)
> * birth (required | eg: 1997-09-06)
> * email (required | eg: viniciuslcp97@gmail.com)
> * company_id (required | eg: 1)
> * password (required | eg: 123456)

*Any other parameters will be dismissed*

## Update user

> HTTP Verb: PUT  
/api/users/{id}

## Delete user

> HTTP Verb: DELETE  
> /api/users/{id}

# Check github Actions
