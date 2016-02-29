<!--- Doelgroep-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Doelgroep";
$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Doelgroep</h1>

          <p>
            CheckJeStress is er voor zowel particulier als bedrijf. Beide partijen kunnen rekenen op onze inzet en ervaring.         
          </p>
		  
		  <p>
            <a href="doelgroep/particulier/">Klik hier</a> voor informatie voor particulieren.         
          </p>

		  <p>
            <a href="doelgroep/bedrijf/">Klik hier</a> voor informatie voor bedrijven.         
          </p>


        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

