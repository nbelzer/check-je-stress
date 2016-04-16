<?php

$self = htmlentities($_SERVER['PHP_SELF']);
if (isset($_GET['bedrijf']) && file_exists("../tests/bedrijven/{$_GET['bedrijf']}.json")) {

  $codes_array = (array) json_decode(file_get_contents("../tests/bedrijven/{$_GET['bedrijf']}.json"));
  $answered = 0;
  foreach ($codes_array as $code => $result) {
    if ($result != null) {
      $answered++;
    }
  }
  $count = count($codes_array);
  if ($answered == 0) {
    $avg = "0";
  } else {
    $avg = array_sum($codes_array) / $answered;
  }
  $perc = round(($total_score / 275) * 100);
  $content = <<<EOF
    <h5>Testresultaten - {$_GET['bedrijf']}</h5>
    <p>Gemiddelde testuitslag: $avg van de 275. Dat is $perc%</p>
    <p>$answered van de $count personeelsleden hebben de test ingevuld.</p>
EOF;

  if (isset($_GET['show_codes']) && boolval($_GET['show_codes']) == true) {
    $unanswered_codes = '';
    $answered_codes = '';
    foreach ($codes_array as $code => $answer) {
      $url = "http://checkjestress.nl/tests/personeelstest?bedrijf={$_GET['bedrijf']}&code=$code<br>";
      if ($result == null) {
        $unanswered_codes .= $url;
      } else {
        $answered_codes .= $url;
      }
    }
    $content .= <<<EOF
      <p>URLs van mensen die de test <b>nog niet</b> hebben ingevuld:</p>
      <pre>$unanswered_codes</pre>
      <p>URLs van mensen die de test <b>al wel</b> hebben ingevuld:</p>
      <pre>$answered_codes</pre>
EOF;
  } else {
    $content .= "<p><a href=\"$self?bedrijf={$_GET['bedrijf']}&show_codes=true\">Toon bestand met URLs</a></p>";
  }

} else {
  $current_tests = "";
  $dirHandle = opendir('../tests/bedrijven/');
  while ($file = readdir($dirHandle)) {
    if ($file != '.htaccess' && $file != '.' && $file != '..') {
      $file = substr($file, 0, strlen($file) - 5);
      $current_tests .= "<li><a href=\"$self?bedrijf=$file\">$file</a></li>";
    }
  }
  $content = <<<EOF
    <h5>Testresultaten</h5>
    <p>Kies een bedrijf voor de resultaten:</p>
    <ul>
      $current_tests
    </ul>
EOF;
}

include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->head = '<link rel="stylesheet"
                     href="resources/css/specific/information.css"
                     type="text/css">';
$page->title = "Informatie";
$page->path_to_root = '../';
$page->body = <<<CONTENT

<div class="content">
  <div class="menuSpacing"></div>

  <div class="indexImage">
    <div class="row">
      <div class="medium-12 medium-centered columns">
        <div class="backgroundImage"
             style="background-image: url('resources/img/background.svg');">
        </div>
      </div>
    </div>
  </div>

  <div class="row text water docFill" id="first">
    <div class="medium-10 medium-centered columns">

      <div class="medium-9 columns">
        $content
      </div>
    </div>
  </div>

</div>

CONTENT;
$page->create();
