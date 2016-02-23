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

  <section class="text water">
    <div class="row">
      <div class="medium-10 medium-centered columns">

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
  </section>

  <section class="text dark">
    <div class="row">
      <div class="medium-10 medium-centered columns">
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
          <a href="../steunpunten/">Klik hier</a> voor een counsellor bij jou in de buurt.
          <br />
          <a href="../doelgroep/particulier/">Klik hier</a> wat we voor particulieren kunnen betekenen.
          <br />
          <a href="../doelgroep/bedrijf/">Klik hier</a> wat we voor werkgevers kunnen betekenen.
        </p>
      </div>
    </div>
  </section>

  <section class="text water">
    <div class="row">
      <div class="medium-10 medium-centered columns">

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
            <li>analyse van testgegevens</li>
            <li>Klachteninventarisatie</li>
            <li>directe klachtenreductie (je hebt er dus meteen baat bij)</li>
            <li>terugvalpreventie</li>
            <li>preventieplan en opzetten van meerjarig beleid op gebied van stress en burnout</li>
          </ul>
        </p>

        <p>
          Na een aantal sessies leer je signalen te herkennen die spanning bij je oproepen en kun je er beter mee omgaan. We laten je de balans hervinden tussen energieslurpers en energiegevers, zodat je uiteindelijk beter in balans bent en op werk- en privégebied optimaal kunt functioneren. We geven je handvatten mee om gerust in de toekomst om te leren gaan met negatieve stress.
        </p>

        <p>
          Benieuwd of jij ook bij deze 20% hoort?
          <br />
          <a href="../tests/">Klik hier</a> en maak test A of test C.
        </p>

      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

