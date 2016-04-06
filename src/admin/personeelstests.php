<?php

require_once '../resources/includes/PageCreator.php';

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
          <div class="backgroundImage" style="background-image: url('resources/img/frontpagecolour.svg');">
          </div>
        </div>
      </div>
    </div>

    <div class="row text water" id="first">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns">

          <h5>Personeelstests</h5>

          <p>
            TODO:<br>
            Laten zien voor welke bedrijven op dit moment personeelstests bezig zijn, met links naar de resultaten<br>
            Mogelijkheid om tests toe te voegen voor bedrijven, en om bedrijven te verwijderen
          </p>

        </div>
      </div>
    </div>

  </div>

CONTENT;
$page->create();
