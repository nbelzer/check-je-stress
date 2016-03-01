<?php

$vragen = array(
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
);

include '../../resources/includes/TestCreator.php';
$test_page = new TestCreator;
$test_page->title = 'Burnout Risico Analyse';
$test_page->questions = $vragen;
$test_page->body = <<<EOF
  <h1>Burnout Risico Analyse (voor managers)</h1>
  <p>
    Deze test bestaat uit 25 stellingen.
    <br>
    Kies steeds in welke mate de uitspraak op uw bedrijf van toepassing is.
  </p>
EOF;
$test_page->create();
