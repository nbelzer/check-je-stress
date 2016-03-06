<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator;
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/standard.css" type="text/css">';
$page->title = "Burnout Tests";
$page->body = <<<CONTENT

<h1>Burnout Tests</h1>

<ul>
  <li>
    <!-- Test A -->
    Doe de <a href="tests/snelle-test">Snelle Test</a> als je snel wilt weten of je
    risico loopt op een burnout.
    <br>
    Deze test duurt ongeveer 2 minuten.
  </li>
  <li>
    <!-- Test C -->
    Doe de <a href="tests/uitgebreide-test">Uitgebreide Test</a> als je wilt weten of
    je verschijnselen hebt van een echte burnout.
    <br>
    Deze test duurt ongeveer 15 minuten.
  </li>
  <li>
    <!-- Test B -->
    De <a href="tests/risicoanalyse">Burnout Risico Analyse</a> is een test voor
    managers, bestuurders en directeuren om te weten te komen hoeveel risico het
    bedrijf loopt op burnouts van werknemers.
    <br>
    Deze test duurt ongeveer 5 minuten.
  </li>
<!-- Voor deze test kunnen we misschien het beste een inlogsysteem maken waarbij
     de werknemers de link naar de test krijgen opgestuurd, i.p.v. hem hier neer
     te zetten.
  <li>
    <a href="testd/">Test D</a> is een deel van de burn-outrisicoanalyse voor bedrijven, ondernemingen en organisaties. (56 items duur ± 15 minuten)
  </li>
-->
</ul>
<p>
  Alle feedback verschijnt na het versturen op je scherm en je weet meteen het
  resultaat. Uiteraard worden alle verstuurde gegevens vertrouwelijk door ons
  behandeld.
</p>

CONTENT;
$page->includeMenu = true;
$page->create();
