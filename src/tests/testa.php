<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Quicktest";
$page->includeMenu = true;

$page->body = <<<CONTENT
<p>
  Deze test bestaat uit 25 stellingen/vragen.
  <br />
	Kies steeds in welke mate de uitspraak op U van toepassing is. 
</p>
CONTENT;

// Elke vraag heeft een id. Deze hoeft niet per se gelijk te zijn aan de volgorde van de array. Dit zorgt ervoor dat er in de CMS vragen bij en af kunnen.
$vragen = array(
  0 => 'Ik voel me moe, ook al heb ik voldoende slaap gehad',
  1 => 'Ik ben ontevreden met mijn werk',
  2 => 'Ik voel me bedroefd, zonder dat daar echt een reden voor is',
  3 => 'Ik ben vergeetachtig',
  4 => 'Ik ben geïrriteerd en val uit tegen mensen',
  5 => 'Ik vermijd mensen op mijn werk en in mijn privé-leven',
  6 => 'Ik heb slaapproblemen, omdat ik me zorgen maak over mijn werk',
	7 => 'Ik ben vaker ziek dan vroeger',
  8 => 'Mijn houding t.o.v. mijn werk is \'Waar zou ik me druk over maken?\' Ik sta er wat onverschillig tegenover',
  9 => 'Ik raak vaker betrokken bij conflicten',
  10 => 'Het werk lijdt onder \'hoe ik me voel\'.',
	11 => 'Ik gebruik meer koffie, alcohol, sigaretten, drugs of kalmerende middelen om mij beter te voelen',
  12 => 'Met andere mensen communiceren is een bron van spanning',
  13 => 'Ik kan me niet concenteren op mijn werk zoals voorheen',
	14 => 'Het werk verveelt me',
  15 => 'Ik werk hard, maar bereik weinig',
  16 => 'Ik voel me gefrusteerd op mijn werk',
	17 => 'Ik zie ertegen op naar het werk te gaan',
	18 => 'Sociale activiteiten putten me uit',
  19 => 'Seks vraagt teveel energie',
  20 => 'In mijn vrije tijd kijk ik voornamelijk TV',
  21 => 'Ik heb weinig om me op te verheugen in mijn werk',
	22 => 'Ik pieker over mijn werk in mijn vrije tijd',
  23 => 'Mijn gevoelens over mijn werk zitten mij dwars in mijn persoonlijke leven',
  24 => 'Mijn werk lijkt zinloos'
);

$php_self = htmlspecialchars($_SERVER["PHP_SELF"]);
$page->body .= "<form action=\"$php_self\" method="POST">";
foreach ($vragen as $id => $vraag) {
	$page->body .= "<p>$vraag</p>";
  // Input type moet nog veranderd worden.
  $page->body .= "<input type=\"text\" name=\"$id\" />";
}
$page->body .= '</form>';
$page->body .= '<input type="submit" value="Versturen" />';

$page->create();
