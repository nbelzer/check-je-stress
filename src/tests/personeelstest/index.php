<?php

if (isset($_GET['organisatie']) && isset($_GET['code'])) {
  /* Toon de personeelstest */
  require_once '../../resources/includes/TestCreator.php';

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

  $test_page->test_body = <<<EOF
    <h1>Personeelstest</h1>
    <p>
      Deze test bestaat uit 56 stellingen. Geef bij elk van de stellingen aan in
      hoeverre deze op jou van toepassing is in je werk en/of je privéleven. Neem
      daarbij de afgelopen 6 maanden in gedachten.
    </p>
EOF;

  $test_page->results_body = "Bedankt voor het invullen van deze test!";

  $test_page->advice_function = function($score) {

    $reverse_questions = [
      0, 7, 11, 16, 21, 24, 25, 27, 31, 33, 37, 40, 42, 45, 47, 49, 54, 55
    ];

    $score = 0;
    for ($i=0; $i<56; $i++) {
      if (in_array($i, $reverse_questions)) {
        $score += 5 - $i;
      } else {
        $score += $i;
      }
    }

    /* TODO Sla de resultaten op */

    return '';
  };

  $test_page->create('personeel');

} else {
  // TODO Toon pagina met informatie over de personeelstest
  // Wilt u uw bedrijf of organisatie testen? Neem [link]contact op
}