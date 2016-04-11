<?php

require_once '../resources/includes/TestCreator.php';

$vragen = [
  0 => 'Ik voel me moe, ook al heb ik voldoende slaap gehad.',
  1 => 'Ik ben ontevreden met mijn werk.',
  2 => 'Ik voel me bedroefd, zonder dat daar echt een reden voor is.',
  3 => 'Ik ben vergeetachtig.',
  4 => 'Ik ben geïrriteerd en val uit tegen mensen.',
  5 => 'Ik vermijd mensen op mijn werk en in mijn privé-leven.',
  6 => 'Ik heb slaapproblemen, omdat ik me zorgen maak over mijn werk.',
  7 => 'Ik ben vaker ziek dan vroeger.',
  8 => 'Mijn houding t.o.v. mijn werk is \'Waar zou ik me druk over maken?\' Ik sta er wat onverschillig tegenover.',
  9 => 'Ik raak vaker betrokken bij conflicten.',
  10 => 'Mijn werk lijdt onder \'hoe ik me voel\'.',
  11 => 'Ik gebruik meer koffie, alcohol, sigaretten, drugs of kalmerende middelen dan normaal om mij beter te voelen.',
  12 => 'Met andere mensen communiceren is een bron van spanning.',
  13 => 'Ik kan me niet concentreren op mijn werk zoals voorheen.',
  14 => 'Het werk verveelt me.',
  15 => 'Ik werk hard, maar bereik weinig.',
  16 => 'Ik voel me gefrusteerd op mijn werk.',
  17 => 'Ik zie ertegen op om naar het werk te gaan.',
  18 => 'Sociale activiteiten putten me uit.',
  19 => 'Seks vraagt teveel energie.',
  20 => 'In mijn vrije tijd kijk ik voornamelijk TV.',
  21 => 'Ik heb weinig om me op te verheugen in mijn werk.',
  22 => 'Ik pieker over mijn werk in mijn vrije tijd.',
  23 => 'Mijn gevoelens over mijn werk zitten mij dwars in mijn persoonlijke leven.',
  24 => 'Mijn werk lijkt zinloos.'
];

$test_page = new TestCreator;
$test_page->title = 'Burnout Snelle Test';
$test_page->path_to_root = "../";
$test_page->extra_head = <<<EOF
  <link rel="stylesheet" href="resources/css/test.css" type="text/css">
  <script src="resources/js/svg-dash-meter.min.js"></script>
  <script>
    $(window).bind("load", function () {
      var meter = svg_meter(document.getElementById('svgmeter'), {
        value: 0,
        max: 100,
        duration: 500,
        gradient:[
          {r:0,g:200,b:0},
          {r:255,g:140,b:0},
          {r:200,g:0,b:0}
        ]
      });
      updateMeter(meter);
    });
  </script>
EOF;
$test_page->questions = $vragen;

$test_page->test_body = <<<EOF
<div class="content">
  <div class="menuSpacing"></div>

  <div class="indexImage">
    <div class="row">
      <div class="medium-12 medium-centered columns">
        <div class="backgroundImage" style="background-image: url('resources/img/frontpagecolourbeach.svg');">
        </div>
      </div>
    </div>
  </div>

  <div class="row text water">
    <div class="medium-10 medium-centered columns">
      <div class="medium-12 columns">
      <h3>Snelle test</h3>
EOF;

$test_page->results_body = <<<EOF
  <h1>Snelle Test Resultaten</h1>
  <p>Bedankt voor het invullen van de test! Hieronder ziet u de resultaten.</p>
  <div id="svgmeter"></div>
EOF;

$test_page->advice_function = function($results) {
  /*
  Oude beoordeling: antwoorden lopen van 1 t/m 5. Alles bij elkaar optellen.
   25- 50 Het gaat goed. Let wel op de items waarop je score hoger is.
   51- 75 Neem preventie maatregelen
   76-100 Risico burnout te raken, of als je dat bent geweest, nog niet hersteld
  101-125 Burnout aan het raken

  Nieuwe beoordeling: antwoorden lopen van 0 t/m 5. Alles bij elkaar optellen.
    0- 25 Het lijkt erop dat u geen risico loopt op een burnout.
   26- 50 Het gaat goed. Let wel op de items waarop je score hoger is.
   51- 75 Neem preventiemaatregelen
   76-100 Risico burnout te raken, of als je dat bent geweest, nog niet hersteld
  101-125 Burnout aan het raken / u heeft een burnout
  */
  $score = 0;
  foreach ($results as $vraag_score) {
    $score += $vraag_score;
  }

  $percentage = round(($score / 125) * 100);
  $advies = <<<EOF
    Uw berekende kans op een burnout is $percentage%.
    <script>
      function updateMeter(meter) {
        meter.update($percentage);
      }
    </script>
EOF;
  if ($score < 26) {
    $advies .= 'Het lijkt erop dat u op het moment geen risico loopt op een burnout.';
  } else if ($score < 51) {
    $advies .= 'Het gaat goed. Let wel op de items waarop uw score hoger is.';
  } else if ($score < 76) {
    $advies .= 'U heeft waarschijnlijk geen burnout, maar wij adviseren u wel om preventiemaatregelen te nemen.';
  } else if ($score < 101) {
    $advies .= 'U loopt risico om een burnout te krijgen. Als u net een burnout gehad hebt, bent u nog niet hersteld.';
  } else {
    $advies .= 'U hebt waarschijnlijk een burnout, of een burnout is zich bij u aan het ontwikkelen.';
  }

  return $advies;
};

$test_page->create('snel');
