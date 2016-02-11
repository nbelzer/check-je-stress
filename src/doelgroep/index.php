<!--- Voor wie-->
<!--- Links-->
<!--- Steunpunten bij jou in de buurt-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';

$page->title = "Doelgroep";
$page->body = <<<CONTENT

Dit is de doelgroep pagina

CONTENT;
$page->create();