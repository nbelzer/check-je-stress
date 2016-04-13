<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Informatie";
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

  <div class="row text water" id="first">
    <div class="medium-10 medium-centered columns">
      <div class="medium-3 columns show-for-medium">
        <div class="navmenu">
          <ul class="vertical menu" data-magellan data-options="barOffset:40">
            <li class="header"><h5>Op deze pagina</h5></li>
            <li><a href="#first">Wie zijn we?</a></li>
            <li><a href="#second">Wat is onze ambitie?</a></li>
            <li><a href="#third">Wat doen we?</a></li>
          </ul>
        </div>
      </div>

      <div class="medium-9 columns">
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

  <div class="row text dark" id="second">
    <div class="medium-10 medium-centered columns">
      <div class="medium-12 columns">

        <h5>Wat is onze ambitie?</h5>

        <p>
          Steunpunt Stress Burnout Nederland heeft als ambitie om stressklachten en burn-out bespreekbaar en toegankelijk te maken en <b>oplossingsgericht</b> te werken naar een nieuwe stressvrije(re) situatie. Dit willen we niet alleen vanuit onze provincie Zeeland, maar dit ook uitrollen over heel Nederland zodat elke provincie aan deze ambitie mee kan werken.
        </p>

        <p>
          Oplossingsgericht werken houdt in dit kader onder andere in:
          <ul>
            <li>Maatregelen nemen om spanningsklachten direct te verminderen</li>
            <li>De belasting op het werk te reduceren</li>
            <li>Het lichaam in een gezonde balans te brengen</li>
          </ul>
        </p>

        <p>
          Particulieren en werkgevers kunnen een stresstest maken en het resultaat hiervan bespreken met één van onze stress- en burnoutcounsellors. Daarbij hebben werkgevers de mogelijkheid om door ons een burnout-risicoanalyse uit te laten voeren, waarbij we het gehele traject rondom stressreductie doorlopen. We bieden een complete dienstverlening aan: van analyseren van testgegevens tot het individuele coachingsgesprek, van het compleet inpasbare actieve preventiebeleid tot training van leidinggevenden.
        </p>

        <p>
          <a href="steunpunten/">Klik hier</a> voor een counsellor bij u in de buurt.
          <br />
          <a href="doelgroep/particulier/">Klik hier</a> wat we voor particulieren kunnen betekenen.
          <br />
          <a href="doelgroep/bedrijf/">Klik hier</a> wat we voor werkgevers kunnen betekenen.
        </p>

      </div>
    </div>
  </div>

  <div class="row text water" id="third">
    <div class="medium-10 medium-centered columns">
      <div class="medium-12 columns ">

        <h5>Wat doen we?</h5>

        <p>
          <b>20 % van de beroepsbevolking lijdt aan ongezonde stress. Dit houdt in dat er geen evenwicht is tussen spanning en ontspanning.</b>
        </p>

        <p>
          Onze begeleiding bestaat uit een op maat gemaakt stappenplan, dat bewezen heeft effectief te zijn. De meerwaarde van het programma zit in de structurele aanpak waarbij een praktische handreiking en psychosociale hulpverlening op maat worden aangeboden. Onze begeleiding is voor zowel de individuele vraag als voor complete organisaties, die met stress/burnoutproblematiek te maken hebben.
        </p>

        <p>
          In het stappenplan zijn ondermeer opgenomen:
          <ul>
            <li>Analyse van testgegevens</li>
            <li>Klachteninventarisatie</li>
            <li>Directe klachtenreductie (u hebt er dus meteen baat bij)</li>
            <li>Terugvalpreventie</li>
            <li>Preventieplan en opzetten van meerjarig beleid op gebied van stress en burnout</li>
          </ul>
        </p>

        <p>
          Na een aantal sessies leert u signalen te herkennen die spanning bij u oproepen en kunt u er beter mee omgaan. We laten u de balans hervinden tussen energieslurpers en energiegevers, zodat u uiteindelijk beter in balans bent en op werk- en privégebied optimaal kunt functioneren. We geven u handvatten mee om gerust in de toekomst om te leren gaan met negatieve stress.
        </p>

        <p>
          Benieuwd of u ook bij deze 20% hoort?
          <br />
          <a href="tests/">Klik hier</a> en maak de snelle test of de uitgebreide test.
        </p>

      </div>
    </div>
  </div>

</div>

CONTENT;
$page->create();
