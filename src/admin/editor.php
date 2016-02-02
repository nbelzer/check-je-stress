<?php

/**
 * Geeft een string met HTML-code voor een entry in de navigatie.
 *
 * @param string $file het bestand waarvoor de entry moet worden gemaakt
 * @param boolean $is_directory of er een entry voor een map of voor een bestand moet worden gemaakt
 * @param int $indents het aantal indents dat deze entry moet hebben
 * @return string een element voor de navigatie
 */
function createNavEntry($file, $is_directory, $indents) {
  $to_return = "<p style=\"";

  // Voeg indents toe in het geval dat de entry in een map zit
  $padding = 20 * $indents;
  $to_return .= "padding-left: {$padding}px;";

  if ($is_directory) {
    $to_return .= "color: blue;";
  } else {
    $to_return .= "color: red;";
  }

  $to_return .= "\">$file</p>";
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
    $output .= createNavEntry($file, true, $indents);
    $output = readDirs($main . $file . '/', $output, $indents + 1);
  }
  foreach ($files as $file) {
    $output .= createNavEntry($file, false, $indents);
  }

  return $output;
}

// Maak de inhoud van de navigatiebalk waar de administrator bestanden kan selecteren om ze aan te passen
$navigation = readDirs('../', '', 0);

// Maak de inhoud van de editor
if (isset($_POST['page'])) {
  $page = $_POST['page'];
  if (isset($_POST['contents'])) {
    // De admin heeft zojuist een pagina aangepast.
    // Zet $_POST['contents'] in MySQL als contents bij deze pagina
    $editor = <<<EOF
      <p>De pagina $page is aangepast.</p>
EOF;
  } else {
    // De admin heeft een bestand geselecteerd om aan te passen. Geef de editor weer.
    // Tekst van deze pagina wordt uit MySQL gehaald en in de variabele $page_contents gezet
    $page_contents = "";
    $editor = <<<EOF
      <form action="editor.php" method="POST">
        <textarea name="contents">$page_contents</textarea>
        <input type="hidden" name="page" value="$page" />
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
include '../resources/includes/PageCreator.php';

$page = new PageCreator;
$page->title = "CheckJeStress - Editor";
// Responsive CSS
$page->head = <<<EOF
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
$page->body = <<<EOF
  <div id="nav">
    $navigation
  </div>
  <div id="editor">
    $editor
  </div>
EOF;
$page->create();
