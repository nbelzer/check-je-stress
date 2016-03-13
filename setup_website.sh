#!/bin/bash
# Dit script installeert de website door de bestanden naar de goede locatie te
# kopiëren en de benodigde MySQL databases en tables op te zetten.

#######################
# ==== VARIABLES ==== #
#######################

# In welke map moet de website geïnstalleerd worden? De bestanden worden direct
# in deze map geplakt, niet eerst nog in een submap.
TARGET_LOCATION="/var/www/html"
# Hoe ga je naar de installatie van de CheckJeStress website vanaf de web root?
# Stel, de website wordt geïnstalleerd in http://website.com/stress/ dan is deze
# variabele '/stress/'.
PATH_TO_INSTALLATION_FROM_ROOT="/"
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
cp -r src/. $TARGET_LOCATION/
rm $TARGET_LOCATION/.htpasswd

echo "Admin user voor de website: "
read user
echo "Wachtwoord: "
read -s password
htpasswd -bc $PASSWORD_FILE_LOCATION/.htpasswd $user $password

# Pas het pad naar .htpasswd aan in admin/.htaccess
PASSWORD_FILE_LOCATION=$(echo $PASSWORD_FILE_LOCATION | sed 's/\//\\\//g')
sed -i.bak "s/\/absolute\/path\/to\/.htpasswd/$(echo $PASSWORD_FILE_LOCATION)\/.htpasswd/g" $TARGET_LOCATION/admin/.htaccess

# Pas de ErrorDocument paths in de root .htaccess aan naar absolute vanaf de
# installatie root
PATH_TO_INSTALLATION_FROM_ROOT=$(echo $PATH_TO_INSTALLATION_FROM_ROOT | sed 's/\//\\\//g')
SEDSTRING='s/\/error\//'$PATH_TO_INSTALLATION_FROM_ROOT'error\//'
mv $TARGET_LOCATION/.htaccess $TARGET_LOCATION/.htaccess.old
sed $SEDSTRING $TARGET_LOCATION/.htaccess.old > $TARGET_LOCATION/.htaccess
rm $TARGET_LOCATION/.htaccess.old

# Laat de gebruiker de config editen
"${EDITOR:-vim}" src/resources/includes/config.php

# Zet de goede permissions op de bestanden van de website
chown -R $APACHE_GROUP:$APACHE_USER $TARGET_LOCATION

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
for line in $(php -f temp)
do
  config[$counter]=$(echo $line | tr -d §)
  counter=$(($counter+1))
done
rm temp

echo MySQL database opzetten...

# create_questions_query <testnaam> <aantalvragen>
function create_questions_query {
  query="CREATE TABLE IF NOT EXISTS test_$1 (id MEDIUMINT UNSIGNED UNIQUE AUTO_INCREMENT, time DATETIME DEFAULT CURRENT_TIMESTAMP, ip INT UNSIGNED, "
  nr=$(($2-1))
  for (( i=0; i<=$nr; i++ )); do
    query="${query}question$i TINYINT(3) UNSIGNED, "
  done
  query="${query}question$2 TINYINT(3) UNSIGNED);"
  echo $query
}

test_snel=$(create_questions_query snel 25)
test_uitgebreid=$(create_questions_query uitgebreid 56)
test_risicoanalyse=$(create_questions_query risicoanalyse 25)

if [ "${config[3]}" == "" ]; then
  password_param="-p${config[3]}"
else
  password_param=""
fi
mysql -h ${config[0]} -P ${config[1]} -u ${config[2]} $password_param << EOF
  CREATE DATABASE IF NOT EXISTS ${config[4]};
  USE ${config[4]};
  CREATE TABLE IF NOT EXISTS pages (id TINYINT UNSIGNED UNIQUE AUTO_INCREMENT, page VARCHAR(255) UNIQUE KEY, title TINYTEXT, head TEXT, body TEXT);
  $test_snel
  $test_uitgebreid
  $test_risicoanalyse
EOF
