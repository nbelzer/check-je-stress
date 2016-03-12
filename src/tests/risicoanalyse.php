<?php

$vragen = [
  0 => 'Er is veel verloop in personeel.',
  1 => 'Mensen zitten hun tijd uit.',
  2 => 'Drugs- en/of alcoholproblemen beïnvloeden het werk.',
  3 => 'Er is veel ziekteverzuim.',
  4 => 'Er zijn veel conflicten.',
  5 => 'Opdrachten worden niet opgevolgd.',
  6 => 'Er is sprake van sabotage.',
	7 => 'Mensen stelen en liegen.',
  8 => 'Deadlines worden niet gehaald.',
  9 => 'Veel werk moet worden overgedaan.',
  10 => 'Een \'dolksteek in de rug\' komt vaak voor.',
	11 => 'Kantoorpolitiek verstoort het werk.',
  12 => 'De productiviteit is laag.',
  13 => 'De organisatiedoelen zijn voor de mensen niet helder.',
	14 => 'Er is sprake van gevoelens van hulpeloosheid.',
  15 => 'Er is weinig teamspirit.',
  16 => 'Mensen zijn niet open.',
	17 => 'Mensen gaan niet veel met elkaar om buiten het werk.',
	18 => 'Teamsamenwerking verloopt slecht.',
  19 => 'Ontslagen komen veel voor.',
  20 => 'Er wordt veel geklaagd.',
  21 => 'Mensen zitten er voor zichzelf.',
	22 => 'Mensen zijn weinig betrokken.',
  23 => 'Mensen hebben geen of weinig invloed op managementbeslissingen.',
  24 => 'Dreigementen zijn de beste aansporingen.'
];

if (isset($_POST['vraag0'])) {
  try {
    require_once '../resources/includes/MySQLManager.php';
    $sql = new MySQLManager;

    require_once '../resources/includes/TestsSQL.php';
    $tests_sql = new TestsSQL($sql);
    $tests_sql->processTestResults('risicoanalyse', count($vragen));

    // Toon pagina met resultaten
  } catch (InvalidTestResultsException $ex) {
    if ($ex->getCode() == 1) {
      displayTestPage($vragen, "Beantwoord alstublieft alle vragen.");
    } else {
      displayTestPage($vragen, "Er is iets foutgegaan tijdens het verwerken van uw testresultaten.");
    }
  }
} else {
  displayTestPage($vragen);
}

/**
 * Toont de pagina met vragen.
 *
 * @param array $questions de vragen voor in de test
 * @param string $error optioneel een error die weergegeven moet worden
 */
function displayTestPage($questions, $error = null) {
  require_once '../resources/includes/TestCreator.php';
  $test_page = new TestCreator;
  $test_page->title = 'Burnout Risico Analyse';
  $test_page->questions = $questions;
  $test_page->body = <<<EOF
    <h1>Burnout Risico Analyse (voor managers)</h1>
    <p>
      Deze test bestaat uit 25 stellingen.
      <br>
      Kies steeds in welke mate de uitspraak op uw bedrijf van toepassing is.
    </p>
EOF;
  if ($error != null) {
    $test_page->body .= <<<EOF
      <div class="error">
        <p>$error</p>
      </div>
EOF;
  }
  $test_page->create();
}
