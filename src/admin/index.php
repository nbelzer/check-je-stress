<?php
include '../resources/includes/PageCreator.php';

$page = new PageCreator;
$page->title = "CheckJeStress - Admin";
$page->body = <<<EOF
  <p>Welkom bij het Admin paneel van de CheckJeStress website.</p>
  <p>Kies een optie...</p>
  <a href="editor.php"><button type="button">Inhoud van de website aanpassen</button></a>
  <button type="button">Resultaten van de tests inzien</button>
EOF;
$page->create();
