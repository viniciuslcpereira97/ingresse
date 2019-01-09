#!/bin/bash

# Install Docker suite
sleep 30

echo "installing docker"
sudo amazon-linux-extras install docker -y

echo "installing git"
sudo yum install git -y

sudo usermod -aG docker $(whoami)

echo "installing docker-compose"
sudo curl -o /bin/docker-compose -L "https://github.com/docker/compose/releases/download/1.10.0/docker-compose-$(uname -s)-$(uname -m)"
sudo chmod +x /bin/docker-compose

echo "cloning ingresse repository"
git clone https://github.com/viniciuslcpereira97/ingresse

echo "starting docker"
sudo service docker start

echo "configuring container"
sudo docker-compose -f ~/ingresse/docker-compose.yml up -d
sudo docker-compose -f ~/ingresse/docker-compose.yml exec -T app chmod 775 -R storage/
sudo docker-compose -f ~/ingresse/docker-compose.yml exec -T app chgrp www-data -R storage/
sudo docker-compose -f ~/ingresse/docker-compose.yml exec -T app composer install
