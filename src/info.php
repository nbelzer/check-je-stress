<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator();
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Informatie";
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

    <div class="row text water" id="first">
      <div class="medium-10 medium-centered columns">
        <div class="medium-3 columns show-for-medium">
          <div class="navmenu">
            <ul class="vertical menu" data-magellan data-options="barOffset:40">
              <li class="header"><h5>Op deze pagina</h5></li>
              <li><a href="#first">Wie zijn wij?</a></li>
              <li><a href="#second">Wat is onze ambitie?</a></li>
              <li><a href="#third">Wat doen wij?</a></li>
            </ul>
          </div>
        </div>

        <div class="medium-9 columns">
          <h5>Wie zijn we?</h5>

          <p>
            Steunpunt Stress Burn-out Nederland is een initiatief van Ria in de
            Weij en Serge Janssen en opgericht in 2011.
            <br />
            Samen hebben we jarenlange ervaring in het trainen en werken met
            mensen opgebouwd.
            <br />
            Serge staat als docent al ruim 15 jaar voor de klas.
          </p>

          <p>
            Wij zijn beiden registercounsellor bij de <abbr title="Algemene
            Beroepsvereniging voor Counselling">ABvC</abbr>. Naast een
            kwalitatief uitmuntende opleiding met als specialisatie stress en
            burn-outproblematiek, dienen we ons ook te houden aan de ethische
            beroepscode. Dit vraagt een jaarlijkse bijscholing en uren aan
            intervisie, zodat de kwaliteit van onze dienstverlening up-to-date
            blijft.
          </p>

          <p>
            Ook van onze samenwerkingspartners in de provincies verwachten wij
            eenzelfde betrokkenheid en passende specialisatie, zodat uw
            stressvraag in de juiste, capabele handen is.
          </p>

        </div>
      </div>
    </div>

    <div class="row text dark" id="second">
      <div class="medium-10 medium-centered columns">
        <div class="medium-12 columns">

          <h5>Wat is onze ambitie?</h5>

          <p>
            Steunpunt Stress Burnout Nederland heeft als ambitie om
            stressklachten en burn-out bespreekbaar en toegankelijk te maken en
            <b>oplossingsgericht</b> te werken naar een nieuwe stressvrije(re)
            situatie. Dit willen we niet alleen vanuit onze provincie Zeeland,
            maar we willen het ook uitrollen over heel Nederland, zodat elke
            provincie aan deze ambitie mee kan werken.
          </p>

          <p>
            Oplossingsgericht werken houdt in dit kader onder andere in:
            <ul>
              <li>Maatregelen nemen om spanningsklachten direct te
                  verminderen</li>
              <li>De belasting op het werk te reduceren</li>
              <li>Het lichaam in een gezonde balans te brengen</li>
            </ul>
          </p>

          <p>
            Particulieren en werkgevers kunnen een stresstest maken en het
            resultaat hiervan bespreken met één van onze stress- en
            burnoutcounsellors. Daarbij hebben werkgevers de mogelijkheid om
            door ons een burn-out risicoanalyse uit te laten voeren, waarbij we
            het gehele traject rondom stressreductie doorlopen. Wij bieden een
            complete dienstverlening aan: van analyseren van testgegevens tot
            het individuele coachingsgesprek, van het compleet inpasbare actieve
            preventiebeleid tot training van leidinggevenden.
          </p>

          <p>
            <a href="steunpunten/">Klik hier</a> voor een counsellor bij u in de
            buurt.
            <br />
            <a href="doelgroep/particulier/">Klik hier</a> om te bekijken wat
            wij voor particulieren kunnen betekenen.
            <br />
            <a href="doelgroep/bedrijf/">Klik hier</a> om te bekijken wat wij
            voor werkgevers kunnen betekenen.
          </p>

        </div>
      </div>
    </div>

    <div class="row text water docFill" id="third">
      <div class="medium-10 medium-centered columns">
        <div class="medium-12 columns ">

          <h5>Wat doen wij?</h5>

          <p><b>
            20% van de beroepsbevolking lijdt aan ongezonde stress. Dit houdt in
            dat er geen evenwicht is tussen spanning en ontspanning.
          </b></p>

          <p>
            Onze begeleiding bestaat uit een op maat gemaakt stappenplan, dat
            bewezen heeft effectief te zijn. De meerwaarde van het programma zit
            in de structurele aanpak waarbij een praktische handreiking en
            psychosociale hulpverlening op maat worden aangeboden. Onze
            begeleiding is voor zowel individuen als voor complete organisaties,
            die met stress- en burn-outproblematiek te maken hebben.
          </p>

          <p>
            Het stappenplan bestaat uit onder meer:
            <ul>
              <li>Analyse van testgegevens</li>
              <li>Klachteninventarisatie</li>
              <li>Directe klachtenreductie (u hebt er dus meteen baat bij)</li>
              <li>Terugvalpreventie</li>
              <li>Preventieplanning en het opzetten van een meerjarig beleid op
                  het gebied van stress en burn-out</li>
            </ul>
          </p>

          <p>
            Na een aantal sessies leert u signalen te herkennen die spanning bij
            u oproepen en kunt u er beter mee omgaan. We laten u de balans
            hervinden tussen energieslurpers en energiegevers, zodat u
            uiteindelijk beter in balans bent en op werk- en privégebied
            optimaal kunt functioneren. We geven u handvatten mee waarmee u kunt
            omgaan met negatieve stress.
          </p>

          <p>
            Denkt u dat u ook bij de 20% hoort?
            <br />
            <a href="tests/">Klik hier</a> en maak de snelle test of de
            uitgebreide test.
          </p>

        </div>
      </div>
    </div>

  </div>

CONTENT;
$page->create();
