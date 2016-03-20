<?php

require_once '../resources/includes/TestCreator.php';

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

$test_page = new TestCreator;
$test_page->title = 'Burnout Risicoanalyse';
$test_page->questions = $vragen;

$test_page->test_body = <<<EOF
  <h1>Burnout Risicoanalyse (voor managers)</h1>
  <p>
    Deze test bestaat uit 25 stellingen.
    <br>
    Kies steeds in welke mate de uitspraak op uw bedrijf van toepassing is.
  </p>
EOF;

$test_page->results_body = <<<EOF
  <h1>Risicoanalyse Resultaten</h1>
  <p>Bedankt voor het invullen van de test! Hieronder ziet u de resultaten.</p>
EOF;

/* TODO: de beoordeling voor deze hebben we nog niet */
//$test_page->advice_function = function($results) {
//};

$test_page->create('risicoanalyse', count($vragen));
