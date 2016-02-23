<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Check je stress";
$page->head = "<link rel=\"stylesheet\" href=\"resources/css/specific/index.css type=\"text/css\">";
$page->body = <<<CONTENT

<div class="indexImage" style="background-image: url('resources/img/frontpage.svg');">
</div>
<div class="content">

  <section class="water">

    <div class="row">
      <div class="medium-10 medium-centered columns">
        <p>
          Welkom op de website van CheckJeStress. We helpen je graag van
          spanning, stress en (dreigende) burnout af. Of je nu een onderneming
          hebt of niet, onze dienstverlening past bij iedereen.
        </p>
      </div>
    </div>

    <div class="row" data-equalizer data-equalize-on="medium">
      <div class="medium-10 medium-centered columns">

        <div class="medium-6 columns" data-equalizer-watch>
          <div class='header' style='color: #034E60;'>Stel jezelf de onderstaande vragen eens:</div>
          <ul class='questions' >
            <li>Heb je het druk op je werk?</li>
            <li>Gun je jezelf steeds minder tijd voor pauze?</li>
            <li>Neem je vaak werk mee naar huis?</li>
            <li>Is je accu gauw leeg en gaat je verkoudheid maar niet over?</li>
          </ul>
        </div>

        <div class="medium-6 columns" data-equalizer-watch>
          <div class='header' style='color: #CBECF4;'>Feiten:</div>
          <ul class='facts'>
            <li>38% van de arbeidsongeschiktheid in 2005 komt door psychische klachten zoals stress en burnout</li>
            <li>1 op de 8 werknemers heeft last van een burnout (bron CBS)</li>
            <li>30.000 mensen worden jaarlijks afgekeurd ten gevolge van psychische problematiek</li>
            <li>Aan stressklachten en burnout kan iets gedaan worden!</li>
          </ul>
        </div>

        <div class="medium-12 columns">
          <p>
            Aarzel niet langer en neem contact met ons op om het heft weer in eigen hand te nemen! Dat wil je toch?
          </p>
        </div>

      </div>
    </div>

  </section>

  <section class="dark">

    <div class="row">
      <div class="medium-10 medium-centered columns">

        <div class="medium-3 columns">
          <div style="style="padding: 1em;">
          <img src="resources/img/test.svg" style="max-height: 12em; width: 100%; height: auto;">
          </div>
        </div>
        <div class="medium-9 columns">
          <p>
            Wil je voor jezelf controleren of je last hebt van stress of dat je richting een burn-out gaat? Door middel van een test kun je snel en eenvoudig zien of je gevaar loopt.
      <br><br><a href="tests/">Klik hier</a> voor de testpagina.
          </p>
        </div>

        <div class="medium-12 columns">
          <p style="padding-top: 1em;">
            Het kan zijn, dat er naar aanleiding van de uitslag behoefte bestaat om dit met een counsellor of coach te bespreken. Steunpunt Stress Burnout Nederland streeft ernaar om in alle provincies samenwerkingspartners aan te bieden, die een ruime ervaring hebben met stressklachten of burn-out.
            <br>
            Neem gerust contact op voor een (vrijblijvend) kennismakingsgesprek en klik <a href="doelgroep/steunpunten/">hier</a> voor een counsellor bij jou in de buurt.
          </p>
          <p>
            Sommige consulten komen in aanmerking voor vergoeding vanuit de verzekeringsmaatschappij. Vraag bij jouw counsellor om de AGB-code(s) en informeer bij jouw verzekeringsmaatschappij of je in aanmerking komt voor vergoeding.
          </p>

          <a href="https://www.facebook.com/SSBN2012#!/SSBN2012/likes">Volgen op facebook?</a>
        </div>

      </div>
    </div>

  </section>

</div>


<div class='light'>

</div>
</div>

CONTENT;
$page->includeMenu = true;
$page->create();
