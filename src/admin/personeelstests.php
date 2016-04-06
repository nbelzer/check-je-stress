<?php

$current_tests = [];
$dirHandle = opendir('../tests/personeelstest/bedrijven/');
while ($file = readdir($dirHandle)) {
  if ($file != '.htaccess' && $file != '.' && $file != '..') {
    array_push($current_tests, $file);
  }
}

$tests_ul = "<ul>\n";
foreach ($current_tests as $test) {
  $tests_ul .= "<li>$test</li>\n";
}
$tests_ul .= "</ul>\n";

$tests_select = "<select name=\"bedrijfsnaam\">\n";
foreach ($current_tests as $test) {
  $tests_ul .= "<option value=\"$test\">$test</option>\n";
}
$tests_ul .= "</select>\n";

require_once '../resources/includes/PageCreator.php';

$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Doelgroep";
$page->body = <<<CONTENT

  <div class="content">
    <div class="menuSpacing"></div>

    <div class="indexImage">
      <div class="row">
        <div class="medium-12 medium-centered columns">
          <div class="backgroundImage" style="background-image: url('resources/img/frontpagecolour.svg');">
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

          <h6>Bedrijf toevoegen</h6>
          <form action="" method="POST">
            <label>Bedrijfsnaam <input type="text" name="bedrijfsnaam"></input></label>
            <label>Aantal personeelsleden <input type="number" name="personeelsleden"></input></label>
            <input type="hidden" name="request" value="add"></input>
            <input type="button" class="button" value="Toevoegen"></input>
          </form>

          <h6>Bedrijf verwijderen</h6>
          <form action="" method="POST">
            $tests_select
            <input type="hidden" name="request" value="remove"></input>
            <input type="button" class="button" value="Verwijderen"></input>
          </form>

          <p>
            TODO:<br>
            Laten zien voor welke bedrijven op dit moment personeelstests bezig zijn, met links naar de resultaten<br>
            Mogelijkheid om tests toe te voegen voor bedrijven, en om bedrijven te verwijderen
          </p>

        </div>
      </div>
    </div>

  </div>

CONTENT;
$page->create();
