<!--- Ambitie-->
<!--- Wat doen we-->
<!--- Wie zijn we-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="'.$page->path_to_root
  .'resources/css/specific/information.css" type="text/css">';
$page->title = "Informatie";
$page->body = <<<CONTENT

Dit is de info pagina

CONTENT;
$page->create();

