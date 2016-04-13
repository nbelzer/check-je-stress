<?php
include 'resources/includes/PageCreator.php';
$page = new PageCreator;
$page->title = "Check je stress";
$page->head = "<link rel=\"stylesheet\" href=\"resources/css/specific/index.css\" type=\"text/css\">";
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
      <p>
        Welkom op de website van CheckJeStress. We helpen u graag van
        spanning, stress en (dreigende) burnout af. Het maakt niet uit of u een een onderneming
        heeft of niet, onze dienstverlening past bij iedereen.
      </p>
    </div>
  </div>

  <div class="row water" data-equalizer data-equalize-on="medium">
    <div class="medium-10 medium-centered columns">

      <div class="medium-6 columns" data-equalizer-watch>
        <div class="header" style="color: #CBECF4;">Stel uzelf de onderstaande vragen eens:</div>
        <ul class="questions">
          <li>Heeft u het druk op werk?</li>
          <li>Gunt u zichzelf steeds minder tijd voor pauze?</li>
          <li>Neemt u vaak werk mee naar huis?</li>
          <li>Is uw 'accu' gauw leeg en heeft u langer dan normaal last van verkoudheden?</li>
        </ul>
      </div>

      <div class="medium-6 columns" data-equalizer-watch>
        <div class="header" style="color: #034E60;">Feiten:</div>
        <ul class="facts">
          <li>38% van de arbeidsongeschiktheid in 2005 komt door psychische klachten zoals stress en burnout</li>
          <li>1 op de 8 werknemers heeft last van een burnout (bron CBS)</li>
          <li>30.000 mensen worden jaarlijks afgekeurd ten gevolge van psychische problematiek</li>
          <li>Stressklachten en burnouts kunnen verholpen worden</li>
        </ul>
      </div>

      <div class="medium-12 columns">
        <p>
          Aarzel niet langer en neem contact met ons op om het heft weer in eigen hand te nemen! Dat wilt u toch? 
        </p>
      </div>

    </div>
  </div>

  <div class="row dark">
    <div class="medium-10 medium-centered columns">	  
	  <p>
        Wilt u voor uzelf controleren of u last heeft van stress of wilt u kijken of uw gewoontes en gedragingen u laten afstevenen op een burnout? Door middel van een test kunt u snel en eenvoudig zien of u gevaar loopt.
    	<br><br><a href="tests/">Klik hier</a> voor de testpagina.
      </p>
      <p style="padding-top: 1em;">
        Het kan zijn, dat er naar aanleiding van de uitslag behoefte bestaat om dit met een counsellor of coach te bespreken. Steunpunt Stress Burnout Nederland streeft ernaar om in alle provincies samenwerkingspartners aan te bieden, die een ruime ervaring hebben met stressklachten of burn-out.
        <br>
        Neemt u gerust contact op voor een (vrijblijvend) kennismakingsgesprek en klik <a href="steunpunten/">hier</a> voor een counsellor bij u in de buurt.
      </p>
      <p>
        Sommige consulten komen in aanmerking voor vergoeding vanuit de verzekeringsmaatschappij. U kunt bij uw counsellor om AGB-code(s) vragen en informeren bij uw verzekeringsmaatschappij of u in aanmerking komt voor vergoeding.
      </p>
      <a href="https://www.facebook.com/SSBN2012/">Volgen op facebook?</a>
    </div>
  </div>

</div>

CONTENT;
$page->includeMenu = true;
$page->create();
