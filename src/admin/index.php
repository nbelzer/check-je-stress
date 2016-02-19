<?php
include '../resources/includes/PageCreator.php';

$page = new PageCreator;
$page->path_to_root = '../';
$page->title = "CheckJeStress - Admin";
$page->body = <<<EOF
  <p>Welkom bij het Admin paneel van de CheckJeStress website.</p>
  <p>Kies een optie...</p>
  <a href="admin/editor.php"><button type="button" class="button">Inhoud van de website aanpassen</button></a>
  <button type="button" class="button">Resultaten van de tests inzien</button>
EOF;
$page->create();
