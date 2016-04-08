<?php

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
$test_page->title = 'Burnout Uitgebreide Test';
$test_page->questions = $vragen;

$test_page->test_body = <<<EOF
  <h1>Uitgebreide Test</h1>
  <p>
    Heb je verschijnselen van een echte burnout?
    <br>
    Deze test bestaat uit 56 stellingen. Geef bij elk van de stellingen aan in
    hoeverre deze op jou van toepassing is in je werk en/of je privéleven. Neem
    daarbij de afgelopen 6 maanden in gedachten.
  </p>
EOF;

$test_page->results_body = <<<EOF
  <h1>Uitgebreide Test Resultaten</h1>
  <p>Bedankt voor het invullen van de test! Hieronder ziet u de resultaten.<br><br>Uw score:</p>
EOF;

$test_page->advice_function = function($score) {
  /*
  Oude beoordeling: sommige antwoorden lopen van 1 t/m 5, anderen van 5 t/m 1.
  Alles bij elkaar optellen en er een percentage van maken.

  Nieuwe beoordeling: antwoorden lopen van 0 t/m 5, anderen van 5 t/m 0. Alles
  bij elkaar optellen en er een percentage van maken.
  */
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

  if ($total_score < 56 * 5 / 4) { /* < 25% */
    $advies = <<<EOF
	
	  <script src="resources/js/svg-dash-meter.min.js"></script>
	  <div id="svgmeter"></div>
	  <script>
		var elm = document.getElementById('svgmeter');
		var meter = svg_meter(elm, {
			value: $total_score,
			max: 280,
			duration: 500,
			gradient:[
			{r:0,g:200,b:0},
			{r:255,g:140,b:0},
			{r:200,g:0,b:0}
			],
		});
	  </script>	
	  
      U scoorde 'zeer laag' op het hebben van burnoutverschijnselen.
      <br>
      Een zeer lage score op het hebben van burnoutverschijnselen is een teken
      dat u ontspannen bent en genoeg energie hebt. Hoewel u best na een
      specifieke dag eens moe kunt zijn, is er van een burnout geen enkele
      sprake.
EOF;
  } else if ($total_score < 56 * 5 / 2) { /* < 50% */
    $advies = <<<EOF

	  <script src="resources/js/svg-dash-meter.min.js"></script>
	  <div id="svgmeter"></div>
	  <script>
		var elm = document.getElementById('svgmeter');
		var meter = svg_meter(elm, {
			value: $total_score,
			max: 280,
			duration: 500,
			gradient:[
			{r:0,g:200,b:0},
			{r:255,g:140,b:0},
			{r:200,g:0,b:0}
			],
		});
	  </script>	
	  
      U scoorde 'laag' op het hebben van burnoutverschijnselen.
      <br>
      De meeste mensen scoren laag op het hebben van burnoutverschijnselen.
      Stress en spanning heeft iedereen wel eens maar doorgaans leidt dat niet
      tot blijvende klachten en zeker niet tot een burnout.
EOF;
  } else if ($total_score < 56 * 5 / 4 * 3) { /* < 75% */
    $advies = <<<EOF
	
	  <script src="resources/js/svg-dash-meter.min.js"></script>
	  <div id="svgmeter"></div>
	  <script>
		var elm = document.getElementById('svgmeter');
		var meter = svg_meter(elm, {
			value: $total_score,
			max: 280,
			duration: 500,
			gradient:[
			{r:0,g:200,b:0},
			{r:255,g:140,b:0},
			{r:200,g:0,b:0}
			],
		});
	  </script>	
	
      U scoorde 'enigszins' op het hebben van burnoutverschijnselen.
      <br>
      Wanneer u enigzins klachten heeft die horen bij een burnout, is het zaak
      snel te onderzoeken wat hiervan de oorzaken zijn. Veelal hebben die vooral
      te maken met werk en privéleven en ligt het niet aan uzelf.
      Probeer te achterhalen of er bronnen van stress zijn die u kunt
      verhelpen. Betrek anderen hierin actief.
	  

EOF;
  } else { /* < 100% */
    $advies = <<<EOF
	
	  <script src="resources/js/svg-dash-meter.min.js"></script>
	  <div id="svgmeter"></div>
	  <script>
		var elm = document.getElementById('svgmeter');
		var meter = svg_meter(elm, {
			value: $total_score,
			max: 280,
			duration: 500,
			gradient:[
			{r:0,g:200,b:0},
			{r:255,g:140,b:0},
			{r:200,g:0,b:0}
			],
		});
	  </script>	
	
      U scoorde 'verhoogd' op het hebben van burnoutverschijnselen.
      <br>
      Wanneer u hoog scoort op het hebben van burnoutverschijnselen, bent u
      waarschijnlijk emotioneel afgevlakt en ziet u het niet meer zitten. Het is
      dan belangrijk dat u stappen onderneemt om van deze klachten af te komen.
      Het gaat niet vanzelf over; het is zaak om bronnen van stress weg te nemen
      en hulp te zoeken.
EOF;
  }

  return $advies;
};

$test_page->create('uitgebreid');
