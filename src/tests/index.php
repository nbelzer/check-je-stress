<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator;
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Burnout Tests";
$page->body = <<<CONTENT

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

  <div class="row water">
    <div class="medium-10 medium-centered columns">
      <h3>Burnout tests</h3>

      <ul>
        <li>
          <!-- test a -->
          Doe de <a href="tests/snelle-test">snelle test</a> als u snel wilt weten of u
          risico loopt op een burnout.
          <br>
          Deze test duurt ongeveer 2 minuten.
        </li>
        <li>
          <!-- test c -->
          Doe de <a href="tests/uitgebreide-test">uitgebreide test</a> als u wilt weten of
          u verschijnselen heeft van een echte burnout.
          <br>
          Deze test duurt ongeveer 5 minuten.
        </li>
        <li>
          <!-- test b -->
          De <a href="tests/risicoanalyse">burnout risico analyse</a> is een test voor
          managers, bestuurders en directeuren om te weten te komen hoeveel risico het
          bedrijf loopt op burnouts van werknemers.
          <br>
          Deze test duurt ongeveer 2 minuten.
        </li>
      <!-- voor deze test kunnen we misschien het beste een inlogsysteem maken waarbij
           de werknemers de link naar de test krijgen opgestuurd, i.p.v. hem hier neer
           te zetten.
        <li>
          <a href="testd/">test d</a> is een deel van de burn-outrisicoanalyse voor bedrijven, ondernemingen en organisaties. (56 items duur ± 15 minuten)
        </li>
      -->
      </ul>
      <p>
        Alle feedback verschijnt na het versturen op uw scherm en u weet meteen het
        resultaat. Uiteraard worden alle verstuurde gegevens vertrouwelijk door ons
        behandeld.
      </p>

    </div>
  </div>
</div>

CONTENT;
$page->includeMenu = true;
$page->create();
