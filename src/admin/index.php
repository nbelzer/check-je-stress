<?php

include '../resources/includes/PageCreator.php';

$page = new PageCreator;
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "CheckJeStress - Admin";
$page->body = <<<EOF
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

    <div class="row text water docFill" id="first">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
  		    <h5>Admin paneel</h5>

          <p>Welkom bij het Admin paneel van de CheckJeStress website.</p>
          <p>Kies een optie...</p>
          <a href="admin/testresultaten.php"><button type="button" class="button">
            Resultaten van de tests inzien
          </button></a>
          <a href="admin/personeelstests"><button type="button" class="button">
            Personeelstests
          </button></a>

        </div>
      </div>
    </div>
  </div>
EOF;
$page->create();
