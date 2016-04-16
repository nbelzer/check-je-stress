<?php

/**
 * Checkt of er op het moment een personeelstest geregistreerd is voor een
 * bedrijf of organisatie.
 *
 * @param string $org de naam van de organisatie
 * @return boolean true als de organisatie geregistreerd staat, anders false
 */
function organization_exists($org) {
  return in_array("$org.json", scandir('bedrijven'));
}

/**
 * Checkt of een code geregistreerd is voor een bedrijf waarvan op het moment
 * een personeelstest geregistreerd is.
 *
 * @param string $org de naam van de organisatie waarbij deze code geregistreerd
 * zou moeten zijn
 * @param string $code de code die gecheckt moet worden
 * @return boolean true als de code geregistreerd staat, anders false
 */
function code_exists($org, $code) {
  $file = "bedrijven/$org.json";
  $codes_array = json_decode(file_get_contents($file));
  return array_key_exists($code, $codes_array);
}

/**
 * Slaat het resultaat van een test op.
 *
 * @param string $org de naam van de organisatie waarbij deze test hoort
 * @param string $code de code waarbij deze test hoort
 */
function save_result($org, $code, $result) {
  $file = "bedrijven/$org.json";
  $handle = fopen($file, 'w');
  $codes_array = json_decode(file_get_contents($file));
  $codes_array[$code] = $result;
  fwrite($handle, json_encode($codes_array));
  fclose($handle);
  return array_key_exists($code, $codes_array);
}

if (isset($_GET['organisatie']) && isset($_GET['code'])
    && organization_exists($_GET['organisatie'])
    && code_exists($_GET['organisatie'], $_GET['code'])) {

  /* Toon de personeelstest */
  require_once '../resources/includes/TestCreator.php';

  $vragen = [
    0 => 'Ik ga positief om met de dingen die ik moet doen.',
    1 => 'Ik ben vergeetachtiger dan anders.',
    2 => 'Ik heb angst- en paniekaanvallen.',
    3 => 'Ik ben een perfectionist.',
    4 => 'Ik ervaar een soort algemeen bedrukkend gevoel.',
    5 => 'Ik verzuim taken die ik vroeger niet zou verzuimen.',
    6 => 'Ik voel me niet meer aanwezig in relaties met anderen.',
    7 => 'Ik ben een erg rustig persoon.',
    8 => 'Ik ben minder waard dan vroeger.',
    9 => 'Ik voel me verdoofd.',
    10 => 'Ik kan dingen niet meer van me afzetten.',
    11 => 'Ik voel me betrokken bij anderen.',
    12 => 'Ik kan zomaar erg emotioneel zijn.',
    13 => 'Ik leef me in in de gevoelens van anderen.',
    14 => 'Ik maak vaker ruzie met anderen dan vroeger.',
    15 => 'Ik heb steeds minder sociale contacten.',
    16 => 'Ik ben succesvol.',
    17 => 'Ik heb geen behoefte meer aan seksualiteit.',
    18 => 'Ik heb geen energie meer.',
    19 => 'Ik heb sterke stemmingswisselingen.',
    20 => 'Ik ben snel van streek.',
    21 => 'Ik ben zelfverzekerd.',
    22 => 'Ik ervaar een gevoel van onmacht.',
    23 => 'Ik voel me leeg en lusteloos.',
    24 => 'Ik heb een positief zelfbeeld.',
    25 => 'Ik luister intensief naar adviezen van anderen.',
    26 => 'Ik ben sneller geïrriteerd dan normaal.',
    27 => 'Ik ben zeer gemotiveerd.',
    28 => 'Ik voel me opgebrand.',
    29 => 'Ik heb chaotische gedachten.',
    30 => 'Ik voel me wel eens gefrustreerd.',
    31 => 'Ik heb veel zelfvertrouwen.',
    32 => 'Ik blijf maar moe.',
    33 => 'Ik vraag anderen om hulp indien nodig.',
    34 => 'Ik kan het eigenlijk allemaal niet meer goed aan.',
    35 => 'Ik heb gedachten die rondmalen in mijn hoofd.',
    36 => 'Ik ben wat uitgeblust.',
    37 => 'Ik kan me makkelijk ontspannen.',
    38 => 'Ik ben cynischer dan vroeger.',
    39 => 'Ik ben ongeduldiger dan anders.',
    40 => 'Ik heb geen lichamelijke klachten.',
    41 => 'Ik ben in gedachten verzonken.',
    42 => 'Ik slaap uitstekend.',
    43 => 'Ik ben negatief naar anderen.',
    44 => 'Ik ben emotioneel uitgeput.',
    45 => 'Ik kan me goed concentreren.',
    46 => 'Ik communiceer niet meer met anderen.',
    47 => 'Ik ben opgewekt en vrolijk.',
    48 => 'Ik heb afstand genomen van vrienden en kennissen.',
    49 => 'Ik maak zeer weinig fouten.',
    50 => 'Ik reageer me weleens af op mensen dicht bij me.',
    51 => 'Ik ben angstiger geworden.',
    52 => 'Ik heb geen verlangens meer naar intimiteit.',
    53 => 'Ik vermeid anderen.',
    54 => 'Ik presteer goed.',
    55 => 'Ik neem besluiten even makkelijk als anders.'
  ];

  $test_page = new TestCreator;
  $test_page->title = 'Burnout Personeelstest';
  $test_page->questions = $vragen;
  $test_page->extra_head = <<<EOF
    <link rel="stylesheet" href="resources/css/test.css" type="text/css">
EOF;

  $test_page->test_body = <<<EOF
    <h3>Personeelstest</h3>
    <p>
      Deze test bestaat uit 56 stellingen. Geef bij elk van de stellingen aan in
      hoeverre deze op jou van toepassing is in je werk en/of je privéleven.
      Neem daarbij de afgelopen 6 maanden in gedachten.
    </p>
EOF;

  $test_page->results_body = <<<EOF
    <h3>Personeelstest - Verstuurd</h3>
    <p>Bedankt voor het invullen van deze test!</p>
EOF;

  $test_page->advice_function = function($score) {

    $reverse_questions = [
      0, 7, 11, 16, 21, 24, 25, 27, 31, 33, 37, 40, 42, 45, 47, 49, 54, 55
    ];

    $total_score = 0;
    for ($i=0; $i<56; $i++) {
      if (in_array($i, $reverse_questions)) {
        $total_score += 5 - $score[$i];
      } else {
        $total_score += $score[$i];
      }
    }

    save_result($_GET['organisatie'], $_GET['code'], $score);

    return '';
  };

  $test_page->create('personeel');

} else {
  include '../resources/includes/PageCreator.php';
  $page = new PageCreator;
  $page->path_to_root = '../';
  $page->head = '<link rel="stylesheet"
                       href="resources/css/specific/information.css"
                       type="text/css">';
  $page->title = "Personeelstest Burn-out";
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
      <div class="row text water" id="first">
        <div class="medium-10 medium-centered columns">
          <div class="medium-9 columns">
            <h5>Burn-out Personeelstest</h5>
            <p>
              Het is van groot belang om te weten hoeveel risico het personeel
              van uw bedrijf loopt op burn-outs. Als u een professionele test
              wilt laten afnemen bij uw bedrijf, neem dan
              <a href="contact/index.php">contact</a> met ons op.
            </p>
          </div>
        </div>
      </div>
    </div>
CONTENT;
  $page->create();
}
