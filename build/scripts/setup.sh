#!/bin/bash

sudo service docker start

sudo docker-compose -f ../../docker-compose.yml up -d --force-recreate
sudo docker-compose -f ../../docker-compose.yml exec app chown -R www-data storage
sudo docker-compose -f ../../docker-compose.yml exec app chmod -R 775 storage
sudo docker-compose -f ../../docker-compose.yml exec app composer install
