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
$test_page->path_to_root = '../';
$test_page->questions = $vragen;
$test_page->extra_head = <<<EOF
  <link rel="stylesheet" href="resources/css/test.css" type="text/css">
  <script src="resources/js/svg-dash-meter.min.js"></script>
  <script>
    $(window).bind("load", function () {
      var meter = svg_meter(document.getElementById('svgmeter'), {
        value: 0,
  			max: 100,
  			duration: 500,
  			gradient: [
    			{r:0,g:200,b:0},
    			{r:255,g:140,b:0},
    			{r:200,g:0,b:0}
  			],
        stops: [25, 50, 75]
      });
      updateMeter(meter);
    });
  </script>
EOF;

$test_page->test_body = <<<EOF
  <h3>Burnout Risicoanalyse (voor managers)</h3>
  <p>
    Deze test bestaat uit 25 stellingen.
    <br><br>
    Kies steeds in welke mate de uitspraak op uw bedrijf van toepassing is.
    Hierbij geldt dat hoe verder de slider naar rechts staat, hoe meer u het
    eens bent met de uitspraak.
  </p>
EOF;

$test_page->results_body = <<<EOF
  <h3>Risicoanalyse - Resultaten</h3>
  <p>Bedankt voor het invullen van de test! Hieronder ziet u de resultaten.</p>
  <div id="svgmeter"></div>
EOF;

$test_page->advice_function = function($results) {
  /* Nieuwe beoordeling: antwoorden lopen van 0 t/m 5. Alles bij elkaar
     optellen. */
  $score = 0;
  foreach ($results as $vraag_score) {
    $score += $vraag_score;
  }

  $percentage = round(($score / 125) * 100);
  $advies = <<<EOF
    Uw berekende kans op een burnout is $percentage%.<br>
    <script>
      function updateMeter(meter) {
        meter.update($percentage);
      }
    </script>
EOF;
  if ($percentage < 30) {
    $advies .= <<<EOF
      Comfortabel niveau
      <br>
      De medewerkers vertonen weinig tekenen van een burn-out. Om problemen in
      de toekomst te voorkomen, kunt u proactief met deze medewerkers aan de
      slag gaan om burn-outs te voorkomen. Het beste kunt u met hen in gesprek
      gaan over o.a. de werkdruk.
EOF;
  } else if ($percentage < 60) {
    $advies .= <<<EOF
      Oppassen niveau
      <br>
      De medewerkers vertonen een gematigd beeld van burn-out; preventieve actie
      is geboden.  Start met het doorlichten van de organisatie door een
      burn-out risicoanalyse af te nemen bij alle medewerkers.
EOF;
  } else if ($percentage < 80) {
    $advies .= <<<EOF
      Chronisch niveau
      <br>
      De medewerkers vertonen talrijke signalen van een burn-out; correctieve
      actie is geboden om erger te voorkomen in het belang van de medewerkers en
      de organisatie.
EOF;
  } else {
    $advies .= <<<EOF
      Crisisniveau
      <br>
      De medewerkers (en waarschijnlijk ook u) hebben een volledige burn-out.
      Onmiddellijke crisisinterventie is geboden om te voorkomen dat de
      organisatie compleet instort.
EOF;
  }

  return $advies;
};

$test_page->create('risicoanalyse');
