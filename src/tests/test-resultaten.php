<?php

/*
$_POST["vraagx"] => n
waarbij x = vraagnummer, beginnend bij 0
en n = antwoord op de vraag, van 0 t/m 5
*/
print_r($_POST);

include '../resources/includes/MySQLManager.php';
$sql = new MySQLManager;

include '../resources/includes/TestsSQL.php';
$tests_sql = new TestsSQL($sql);
$tests_sql->processTestResults();
