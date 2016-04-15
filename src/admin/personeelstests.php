<?php

/* Relatief weinig validatie hier, want verwacht niet dat meneer SJA zijn eigen
   website gaat proberen te hacken. Wel de benodigde validatie zodat er niks
   fout kan gaan bij het invullen. */

/**
 * Geeft de string $filename terug als een bruikbare string voor in een
 * bestandsnaam.
 *
 * @param string $filename een string die bruikbaar moet worden als bestandsnaam
 * @return string $filename als bruikbare bestandsnaam
 */
function filename_safe($filename) {
  $temp = $filename;
  $temp = strtolower($temp);
  $temp = str_replace(" ", "_", $temp);
  $result = '';
  for ($i=0; $i<strlen($temp); $i++) {
    if (preg_match('([0-9]|[a-z]|_)', $temp[$i])) {
      $result = $result . $temp[$i];
    }
  }
  return $result;
}

if (isset($_POST['request'])) {
  switch ($_POST['request']) {
    case 'add':
      $bedrijf = filename_safe($_POST['bedrijfsnaam']);
      $file = "../tests/bedrijven/$bedrijf.json";

      $personeelsleden = intval($_POST['personeelsleden']);
      /* Assoc. array met code => testresultaat */
      $codes_array = [];
      for ($i=0; $i<$personeelsleden; $i++) {
        $codes_array[md5(uniqid(mt_rand(), true))] = null;
      }

      $handle = fopen($file, 'w');
      fwrite($handle, json_encode($codes_array));
      fclose($handle);
      break;
    case 'remove':
      $bedrijf = $_POST['bedrijfsnaam'];
      $file = "../tests/personeelstest/bedrijven/$bedrijf.json";

      unlink($file);
      break;
  }
}

$current_tests = [];
$dirHandle = opendir('../tests/bedrijven/');
while ($file = readdir($dirHandle)) {
  if ($file != '.htaccess' && $file != '.' && $file != '..') {
    array_push($current_tests, substr($file, 0, strlen($file) - 5));
  }
}

$tests_ul = "<ul>\n";
foreach ($current_tests as $test) {
  $tests_ul .= "<li>$test</li>\n";
}
$tests_ul .= "</ul>\n";

$tests_select = "<select name=\"bedrijfsnaam\">\n";
foreach ($current_tests as $test) {
  $tests_select .= "<option value=\"$test\">$test</option>\n";
}
$tests_select .= "</select>\n";

require_once '../resources/includes/PageCreator.php';

$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Doelgroep";

$self = htmlentities($_SERVER['PHP_SELF']);
$page->body = <<<CONTENT

  <div class="content">
    <div class="menuSpacing"></div>

    <div class="indexImage">
      <div class="row">
        <div class="medium-12 medium-centered columns">
          <div class="backgroundImage" style="background-image: url('resources/img/background.svg');">
          </div>
        </div>
      </div>
    </div>

    <div class="row text water" id="first">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns">

          <h5>Personeelstests</h5>

          <h6>Huidige tests:</h6>
          $tests_ul

          <p><a href="admin/personeelstest-results.php">Naar de resultaten</a></p>

          <h6>Bedrijf toevoegen</h6>
          <form action="$self" method="POST">
            <label>Bedrijfsnaam <input type="text" name="bedrijfsnaam"></input></label>
            <label>Aantal personeelsleden <input type="number" name="personeelsleden"></input></label>
            <input type="hidden" name="request" value="add"></input>
            <input type="submit" class="button" value="Toevoegen"></input>
          </form>

          <h6>Bedrijf verwijderen</h6>
          <form action="" method="POST">
            $tests_select
            <input type="hidden" name="request" value="remove"></input>
            <input type="submit" class="button" value="Verwijderen"></input>
          </form>

        </div>
      </div>
    </div>

  </div>

CONTENT;
$page->create();
