<?php
include '../../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Particulier";
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

        <h5>Particulier</h5>

		  <p>
			<b>Stress is onvermijdelijk en vroeg of laat kunt u ermee te maken krijgen:</b> op uw werk, in uw sociale en privé-contacten, zelfs in uw slaap. Steeds meer werkenden – zowel in het lagere als het hogere kader – klagen over stress of spanningen. Voor cijfers zie <a href="http://www.cbs.nl/nl-nl/menu/themas/arbeid-sociale-zekerheid/publicaties/artikelen/archief/2011/2011-3493-wm.htm">CBS.nl</a>
		  </p>

		  <p>
			<b>Welke signalen waarschuwen voor een overbelasting aan stress?</b>
			<br />
			Signalen die op teveel stress duiden, variëren van een algeheel malaisegevoel tot fysieke pijn. Deze symptomen lopen zo uiteen dat men ze vaak niet herkent als tekenen van stress. Als men onder stress gebukt gaat, kan men zich angstig, niet ontspannen of zich langdurig verveeld voelen. Stress kan tevens met slaapstoornissen, seksuele problemen en verminderde arbeidsprestaties gepaard gaan. Het vervelende van dit alles is dat stress ook als heel persoonlijk ervaren wordt: waar de een niet opkijkt van 80 uur werken in de week, wordt de ander al misselijk bij het idee om een uur over te moeten werken.
		  </p>

		  <p>
			<b>Stress en efficiëntie in het werk</b>
			<br />
			Uit ervaring blijkt dat afname van efficiëntie een brede uitstraling kan hebben op collega’s. Als een hele afdeling erdoor wordt beïnvloed, kan het voor een bedrijf beslist een grote last worden. Dit bijverschijnsel van stress, een burn-out en de daaraan gekoppelde de inefficiëntie, belast zowel de betreffende persoon als zijn/haar hele omgeving. Het demoraliseert en dat is weer een oorzaak van verlies van eigenwaarde, dit gaat altijd gepaard met een burn-out.
		  </p>

		  <p>
			<b>Wat kan Steunpunt Stress Burnout Nederland voor u betekenen?</b>
			<ul>
			  <li>Wij gaan onderzoeken hoe we de mentale belasting kunnen verminderen.
			  <li>Wij helpen u het werk weer belonend te maken en persoonlijke betekenis te geven
			  <li>Wij gaan uw vermogen vergroten om een nieuwe burnout te voorkomen.
			</ul>
		  </p>

		  <p>
			<b>Voordelen van de begeleiding door Steunpunt Stress Burnout Nederland zijn:</b>
			<ul>
			  <li>Kracht en prestatievermogen worden behouden of snel herwonnen</li>
			  <li>Binnen relatief korte tijd krijgen mensen met een burnout hun leven weer op de rails</li>
			  <li>De behandeling is zeer effectief bij stress en het herstellen van de gevolgschade ervan</li>
			</ul>
		  </p>

		  <p>
			Herkent u uzelf in de bovenstaande symptomen en bent u benieuwd naar een stressvrij(er) leven? Neem dan contact met ons op door <a href="contact/">hier te klikken</a>, of vul de snelle test in op de <a href="tests/snelle-test.php">testpagina</a>.
		  </p>

		  <p>
			U kunt zelf al eenvoudig beginnen om te zorgen voor een goed slaappatroon, maar ook regelmatig en gezond te eten. Neem tijd voor ontspanning door bijvoorbeeld te wandelen, zwemmen of te sporten. Dit zijn al eenvoudige tips zijn om actief iets tegen stress te doen. Zit u echter dieper in de put en wilt u een nieuw begin maken? Schroom niet om contact op te nemen, het is nooit te laat om uw mentale/emotionele gestel te herstellen.
		  </p>

		  <p>
			Verzekeringsmaatschappijen erkennen in toenemende mate de waarde van counselling en vergoeden (soms gedeeltelijk) de sessies, waaronder:
			<br />
			<i>Aegon, Anderzorg, CZ, Delta Lloyd, IAK, IZA, Lancyr, Menzis, Ohra, Trias, Univé</i> en <i>VGZ</i>.
			<br />
			<a href="http://www.abvc.nl/CMS/Docs/Verz/Vergoedingen%20zorgverzekeraars%202013%20ABvC.pdf">Klik hier</a> voor een overzicht van de verzekeringsmaatschappijen en bijbehorende vergoedingen.
		  </p>

		  <p>
			De consulten/sessies van een individueel traject (geen groepstrainingen, lezingen en/of workshops) vallen onder "Alternatieve Geneeswijzen" in het aanvullende verzekeringspakket. Raadpleeg de eigen polis of neem contact op met de ziektekostenverzekeraar, deze kan u vertellen tot welk verzekerd bedrag onze declaraties vergoed worden.
		  </p>

    </div>
  </div>

</div>

CONTENT;
$page->create();
