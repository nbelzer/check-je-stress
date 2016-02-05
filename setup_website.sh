#!/bin/bash
# Dit script installeert de website door de bestanden naar de goede locatie te
# kopiëren en de benodigde MySQL databases en tables op te zetten.

#######################
# ==== VARIABLES ==== #
#######################

# In welke map moet de website geïnstalleerd worden? De bestanden worden direct
# in deze map geplakt, niet eerst nog in een submap.
TARGET_LOCATION="/var/www/html"
# Absolute path naar .htpasswd. Dit moet bij voorkeur een plaats zijn BUITEN de
# webserver, zodat bezoekers het bestand ook niet kunnen zien als de server
# verkeerd geconfigureerd is.
PASSWORD_FILE_LOCATION="/var/www"
# Welke user moet de owner worden van de website bestanden? Dit moet de apache
# user zijn.
APACHE_USER="www-data"
APACHE_GROUP=$APACHE_USER

###########################
# ==== WEBSITE SETUP ==== #
###########################

echo Bestanden kopiëren naar $TARGET_LOCATION...
sudo cp -r src/. $TARGET_LOCATION/
sudo rm $TARGET_LOCATION/.htpasswd

echo "Admin user voor de website: "
read user
echo "Wachtwoord: "
read -s password
sudo htpasswd -bc $PASSWORD_FILE_LOCATION/.htpasswd $user $password

# Pas het pad naar .htpasswd aan in admin/.htaccess
PASSWORD_FILE_LOCATION=$(echo $PASSWORD_FILE_LOCATION | sed 's/\//\\\//g')
sudo sed -i.bak "s/\/absolute\/path\/to\/.htpasswd/$(echo $PASSWORD_FILE_LOCATION)\/.htpasswd/g" $TARGET_LOCATION/admin/.htaccess

# Laat de gebruiker de config editen
sudo "${EDITOR:-vim}" src/resources/includes/config.php

# Zet de goede permissions op de bestanden van de website
sudo chown -R $APACHE_GROUP:$APACHE_USER $TARGET_LOCATION

#########################
# ==== MySQL SETUP ==== #
#########################

echo MySQL gegevens lezen uit config.php...

echo '
  <?php
  $config = include "src/resources/includes/config.php";
  print ("§" . $config["mysql"]["host"] . "\n");
  print ("§" . $config["mysql"]["port"] . "\n");
  print ("§" . $config["mysql"]["username"] . "\n");
  print ("§" . $config["mysql"]["password"] . "\n");
  print ("§" . $config["mysql"]["database"] . "\n");
' > temp
config=()
counter=0;
for line in $(sudo php -f temp)
do
  config[$counter]=$(echo $line | tr -d §)
  counter=$(($counter+1))
done
rm temp

echo MySQL database opzetten...
if [ ${config[3]} == "" ]
then
  mysql -h ${config[0]} -P ${config[1]} -u ${config[2]} << EOF
    CREATE DATABASE IF NOT EXISTS ${config[4]};
    CREATE TABLE IF NOT EXISTS ${config[4]}.pages (id TINYINT UNSIGNED UNIQUE AUTO_INCREMENT, page TINYTEXT, title TINYTEXT, head TEXT, body TEXT);
EOF
else
  mysql -h ${config[0]} -P ${config[1]} -u ${config[2]} -p${config[3]} << EOF
    CREATE DATABASE IF NOT EXISTS ${config[4]};
    CREATE TABLE IF NOT EXISTS ${config[4]}.pages (id TINYINT UNSIGNED UNIQUE AUTO_INCREMENT, page TINYTEXT, title TINYTEXT, head TEXT, body TEXT);
EOF
fi