<?php

if (isset($_GET['bedrijf'])) {
  $file = "bedrijven/$org.json";
  $codes_array = json_decode(file_get_contents($file));
  $unanswered = 0;
  foreach ($codes_array as $code => $result) {
    if ($result == null) {
      $unanswered++;
    }
  }
  $count = count($codes_array);
  $avg = array_sum($codes_array) / $count;
  $perc = round(($total_score / 275) * 100);
  $content = <<<EOF
    <h5>Testresultaten - $test</h5>
    <p>Gemiddelde testuitslag: $avg van de 275. Dat is $perc%</p>
    <p>$unanswered van de $count personeelsleden hebben de test nog niet beantwoord.</p>
EOF;
} else {
  $self = htmlentities($_SERVER['PHP_SELF']);
  $current_tests = "";
  $dirHandle = opendir('../tests/bedrijven/');
  while ($file = readdir($dirHandle)) {
    if ($file != '.htaccess' && $file != '.' && $file != '..') {
      $file = substr($file, 0, strlen($file) - 5);
      $current_tests .= "<li><a href=\"$self?bedrijf=$file\">$bedrijf</a></li>";
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

include 'resources/includes/PageCreator.php';
$page = new PageCreator();
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Informatie";
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
        <h5>Testresultaten - $test</h5>

        <p>blabla</p>

      </div>
    </div>
  </div>

</div>

CONTENT;
$page->create();
