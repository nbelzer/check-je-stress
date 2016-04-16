<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Doelgroep";
$page->body = <<<CONTENT

<div class="content">
  <div class="menuSpacing"></div>

  <div class="indexImage">
    <div class="row">
      <div class="medium-12 medium-centered columns">
        <div class="backgroundImage" style="background-image: url('resources/img/background.svg');">
        </div>
      </div>
    </div>
  </div>
  
  <div class="row text water docFill" id="first">
    <div class="medium-10 medium-centered columns">
        <h5>Doelgroep</h1>

        <p>
          CheckJeStress is er voor zowel particulieren als voor bedrijven. Beide partijen kunnen compleet vertrouwen op onze inzet en ervaring.
        </p>

		<p>
          <a href="doelgroep/particulier/">Klik hier</a> voor de informatie voor particulieren.
        </p>

		<p>
          <a href="doelgroep/bedrijf/">Klik hier</a> voor de informatie voor bedrijven.
        </p>

    </div>
  </div>

</div>

CONTENT;
$page->create();

