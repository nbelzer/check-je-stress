<?php

include '../resources/includes/PageCreator.php';
$page_creator = new PageCreator;

/**
 * Geeft een string met HTML-code voor een entry in de navigatie.
 *
 * @param string $file het bestand waarvoor de entry moet worden gemaakt
 * @param boolean $is_directory of er een entry voor een map of voor een bestand moet worden gemaakt
 * @param int $indents het aantal indents dat deze entry moet hebben
 * @return string een element voor de navigatie
 */
function createNavEntry($file, $is_directory, $indents) {

  // Verander '../info/index.php' naar 'info/index.php'
  $path_from_webroot = substr($file, 3);
  // Verander 'info/index.php' naar 'index.php'
  $file = substr($file, strrpos($file, DIRECTORY_SEPARATOR) + 1);

  // Voeg indents toe in het geval dat de entry in een map zit
  $padding = 20 * $indents;

  // Files moeten linken naar de editor; mappen niet, die zijn er alleen voor het overzicht.
  if ($is_directory) {
    $to_return = "<p style=\"padding-left: {$padding}px; color: blue;\">$file</p>";
  } else {
    $to_return = "<a href=\"editor.php?page=$path_from_webroot\" style=\"padding-left: {$padding}px; color: red;\">$file</a><br />";
  }

  return $to_return;
}

/**
 * Loopt door alle bestanden in een map en maakt er navigatie voor. De map 'admin' wordt niet meegerekend.
 *
 * @param string $main de base directory waarvoor navigatie gemaakt moet worden
 * @param string $output een string waaraan de output gekoppeld wordt. Handig bij recursie
 * @param int $indents het aantal indents dat de nav entries vanaf deze map moeten hebben
 * @return string bruikbare HTML-code voor in de 'nav' div
 */
function readDirs($main, $output, $indents) {
  // Eerst wordt de $main directory gelezen en worden alle gevonden bestanden / mappen in deze arrays gezet.
  $dirs = [];
  $files = [];

  $dirHandle = opendir($main);
  while ($file = readdir($dirHandle)) {
    if (is_dir($main . $file)) {
      if ($file != 'admin' && $file != '.' && $file != '..') {
        array_push($dirs, $file);
      }
    } else if ($file != '.htaccess') {
      array_push($files, $file);
    }
  }

  // Als het een map is, roep deze method dan weer aan (recursief).
  foreach ($dirs as $file) {
    $output .= createNavEntry($main . $file, true, $indents);
    $output = readDirs($main . $file . '/', $output, $indents + 1);
  }
  foreach ($files as $file) {
    $output .= createNavEntry($main . $file, false, $indents);
  }

  return $output;
}

// Maak de inhoud van de navigatiebalk waar de administrator bestanden kan selecteren om ze aan te passen
$file_index = readDirs('../', '', 0);
$navigation = <<<EOF
  $file_index
EOF;

// Maak de inhoud van de editor
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  if (isset($_POST['contents'])) {
    // De admin heeft zojuist een pagina aangepast.
    $page_creator->mysql->getPageSQL()->updatePageBody($page, $_POST['contents']);
    $editor = <<<EOF
      <p>De pagina $page is aangepast.</p>
EOF;
  } else {
    // De admin heeft een bestand geselecteerd om aan te passen. Geef de editor weer.
    $page_contents = $page_creator->mysql->getPageSQL()->getPageBody($page);
    $editor = <<<EOF
      <form action="editor.php?page=$page" method="POST">
        <textarea name="contents">$page_contents</textarea>
        <input type="submit" />
      </form>
EOF;
  }
} else {
  // De admin heeft nog geen pagina geselecteerd om aan te passen.
  $editor = <<<EOF
    <p>Selecteer een pagina om aan te passen in de navigatie.</p>
EOF;
}

// Maak de editor.php pagina
$page_creator->title = "CheckJeStress - Editor";
// Responsive CSS
$page_creator->head = <<<EOF
  <style>
    @media screen and (min-width: 480px) {
      #nav {
        width: 20%;
        float: left;
        background-color: #DDDDDD;
      }
      #editor {
        width: 80%;
        float: right;
        background-color: #EEEEEE;
      }
    }
  </style>
EOF;
$page_creator->body = <<<EOF
  <div id="nav">
    $navigation
  </div>
  <div id="editor">
    $editor
  </div>
EOF;
$page_creator->create();
