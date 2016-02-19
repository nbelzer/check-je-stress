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

<div class='row'>
  <div class='medium-9 columns'>
    Tekst voor informatie pagina
  </div>
  <div class='medium-3 columns'>
    Possible menu
  </div>
</div>

CONTENT;
$page->create();

