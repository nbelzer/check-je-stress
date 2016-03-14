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
    $to_return = "<li style=\"padding-left: {$padding}px; color: blue;\">$file</li>";
  } else {
    $to_return = "<li style=\"padding-left: {$padding}px; color: red;\"><a href=\"admin/editor.php?page=$path_from_webroot\">$file</a></li><br />";
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
      <form action="admin/editor.php?page=$page" method="POST">
        <textarea name="contents" id="editor1">$page_contents</textarea>
        <script>
          CKEDITOR.replace('editor1');
        </script>
        <input type="submit" class="button" value="Aanpassen" />
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
$page_creator->path_to_root = '../';
$page_creator->title = "CheckJeStress - Editor";
$page_creator->head = <<<EOF
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">
EOF;
$page_creator->body = <<<EOF
  <div class="indexImage" style="background-image: url('resources/img/beach.gif');">
  </div>

  <div class="content">
    <div class="row">
      <div class="medium-10 medium-centered columns">

        <div class="medium-3 columns show-for-medium">
          <div class="navmenu">
            <ul>
              $navigation
            </ul>
          </div>
        </div>

        <div class="medium-9 columns">
          <section class="text water" id="first">
            <div class="row">
              <div class="medium-10 medium-centered columns">
                <div class="medium-9 columns medium-offset-3">
                  $editor
                </div>
              </div>
            </div>
          </section>
        </div>

      </div>
    </div>
  </div>
EOF;
$page_creator->create();
