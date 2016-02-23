<!--- Ambitie-->
<!--- Wat doen we-->
<!--- Wie zijn we-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Informatie";
$page->body = <<<CONTENT

<div class="content">

  <div class="row">
    <div class="medium-10 medium-centered columns">

      <div class="medium-2 columns left">
        <div class="menu">
          <ul>
            <a href="#"><li>Index</li></a>
            <a href="#"><li>Ambitie</li></a>
            <a href="#"><li>Methoden</li></a>
            <a href="#"><li>Serge Janssen</li></a>
          </ul>
        </div>
      </div>

      <div class="medium-10 columns right">
        <div class="text">
          <h5>Wie zijn we?</h1>

          <p>
            Steunpunt Stress Burnout Nederland is een initiatief van Ria in de Weij en Serge Janssen en opgericht in 2011.
            <br />
            Samen hebben we jarenlange ervaring in het trainen en werken met mensen opgebouwd.
            <br />
            Ria heeft met name haar ervaring in de reïntegratiesector en Serge staat als docent al ruim 15 jaar voor de klas.
          </p>

          <p>
            We zijn beiden registercounsellor bij de ABvC. Dit is de Algemene Beroepsvereniging voor Counselling. Naast een gedegen opleiding met als specialisatie stress en burnoutproblematiek, dienen we ons ook te houden aan de ethische beroepscode. Dit vraagt een jaarlijkse bijscholing en aantal uren intervisie, zodat de kwaliteit van onze  dienstverlening up-to-date blijft.
          </p>

          <p>
            Ook van onze samenwerkingspartners in de provincies verwachten we een zelfde betrokkenheid als specialisatie, zodat uw stressvraag in goede handen is.
          </p>
        </div>
      </div>


    </div>
  </div>

</div>

CONTENT;
$page->create();

