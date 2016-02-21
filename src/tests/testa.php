<?php

$vragen = array(
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
);

include '../resources/includes/TestCreator.php';
$test_page = new TestCreator;
$test_page->title = 'Quicktest';
$test_page->questions = $vragen;
$test_page->body = <<<EOF
  <h1>Quicktest</h1>
  <p>
    Deze test bestaat uit 25 stellingen.
    <br>
    Kies steeds in welke mate de uitspraak op u van toepassing is.
  </p>
EOF;
$test_page->create();
