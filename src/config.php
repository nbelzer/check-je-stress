<?php

return array(

  'email' => array(
    /* Het adres waarnaar de contactmailtjes etc. verstuurd worden */
    'admin-email' => 'checkjestresstest@gmail.com',
    /* Gegevens van de SMTP server */
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'secure' => 'tls', /* 'ssl' of 'tls' */
    'auth' => true,
    'username' => 'checkjestresstest@gmail.com',
    'password' => 'wachtwoord'
  ),

  'mysql' => array(
    'host' => '127.0.0.1',
    'port' => '3306',
    'username' => 'root',
    'password' => '',
    'database' => 'stress'
  )

);
