<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Tests";
$page->body = <<<CONTENT

<a href="www.checkjestress.nl/testen.php">Klik op deze link voor alle testen.</a>

<ul>
  <li><a href="testa/">Test A</a> is een Quick-test (25 items duur: ± 2 minuten)</li>
  <li><a href="testb/">Test B</a> is een test voor managers, bestuurders en directeuren (25 items duur ± 5 minuten)</li>
  <li><a href="testc/">Test C</a> is een uitgebreide test (56 items duur ± 15 minuten)</li>
  <li><a href="testd/">Test D</a> is een deel van de burn-outrisicoanalyse voor bedrijven, ondernemingen en organisaties. (56 items duur ± 15 minuten)</li>
</ul>
<p>
  Alle feedback verschijnt na het versturen op je scherm en je weet meteen het resultaat. Uiteraard worden alle verstuurde gegevens vertrouwelijk door ons behandeld. 
</p>

CONTENT;
$page->includeMenu = true;
$page->create();
