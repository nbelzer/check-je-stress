<!--- Ambitie-->
<!--- Wat doen we-->
<!--- Wie zijn we-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';

$page->title = "Informatie";
$page->body = <<<CONTENT

Dit is de info pagina

CONTENT;
$page->create();

