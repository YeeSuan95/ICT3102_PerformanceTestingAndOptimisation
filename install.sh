#!/bin/bash

# Update sources
apt-get update

# Install mysql-server
echo "mysql-server mysql-server/root_password password root" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password root" | debconf-set-selections
apt-get install -y mysql-server

# Start mysql
service mysql start

MYSQL_PASS="root"
# Set mysql password to empty
mysql -u root -p"$MYSQL_PASS" -e "SET PASSWORD FOR root@localhost=PASSWORD('');"

# Create DB and import data
mysql -u root -e "CREATE DATABASE shawdb_xsite_dropbox"
mysql -u root shawdb_xsite_dropbox < /mnt/shawdb.sql

# Install apache2/php
apt-get install -y nano apache2 unzip php libapache2-mod-php php-mcrypt php-mysql

# Start apache2
service apache2 start
