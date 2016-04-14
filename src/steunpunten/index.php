<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = <<<EOF
  <link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">
  <link rel="stylesheet" href="resources/css/specific/steunpunten.css" type="text/css">
  <script>
    function update_provincie(provincie) {
      $('body,html').animate({
        'scrollTop': $('#' + provincie).offset().top - 55
      }, 1000);
    }
  </script>
EOF;
$page->title = "Steunpunten";
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
            <li class="headeR"><h5><a href="#overzicht">Overzicht</a></h5></li>
            <li><a href="#zuidholland">Zuid-Holland</a></li>
            <li><a href="#noordholland">Noord-Holland</a></li>
            <li><a href="#noordbrabant">Noord-Brabant</a></li>
            <li><a href="#gelderland">Gelderland</a></li>
            <li><a href="#utrecht">Utrecht</a></li>
            <li><a href="#overijssel">Overijssel</a></li>
            <li><a href="#limburg">Limburg</a></li>
            <li><a href="#friesland">Friesland</a></li>
            <li><a href="#groningen">Groningen</a></li>
            <li><a href="#drenthe">Drenthe</a></li>
            <li><a href="#flevoland">Flevoland</a></li>
            <li><a href="#zeeland">Zeeland</a></li>
          </ul>
        </div>
      </div>
      <div class="medium-9 columns" id="overzicht">

        <h5>Overzicht</h5>

        <p>
          Kies hieronder op de kaart de provincie naar keuze.
        </p>

        <p>
          <object data="resources/img/clickable_map.svg" type="image/svg+xml" width="500"></object>
        </p>

      </div>
    </div>
  </div>

  <div class="row text dark" id="zuidholland">
    <div class="medium-10 medium-centered columns">
      <h5>Zuid-Holland</h5>

      <ul class="steunpunten">
        <li>
          <p>
            Alphen aan den Rijn<br>
            <i>Counselling Alphen aan den Rijn</i><br>
            <a href="http://www.counsellingalphenaandenrijn.nl">www.counsellingalphenaandenrijn.nl</a>
          </p>
        </li>
		    <li>
          <p>
            Leiden<br>
            <i>Leni Minderhoud Counselling & Coaching</i><br>
            <a href="http://www.leniminderhoud.nl">www.leniminderhoud.nl</a>
          </p>
        </li>
        <li>
          <p>
            Honselersdijk<br>
            <i>Molius Relaties</i><br>
            <a href="http://www.molius.nl">www.molius.nl</a>
          </p>
        </li>
      </ul>

    </div>
  </div>

  <div class="row text water" id="noordholland">
    <div class="medium-10 medium-centered columns">

      <h5>Noord-Holland</h5>

      <ul class="steunpunten">
		  <li>
        <p>
        Amsterdam<br>
        <i>De beweging / Hartfysiotherapie</i><br>
        <a href="http://www.debewegingadvies.nl">www.debewegingadvies.nl</a>
        </p>
      </li>

      <li>
        <p>
        Amsterdam<br>
        <i>Tanya de Wit Loopbaanbegeleiding</i><br>
        <a href="http://www.tanyadewit.nl">www.tanyadewit.nl</a>
        </p>
      </li>

      <li>
        <p>
        Amsterdam<br>
        <i>Coaching en Counseling Amsterdam</i><br>
        <a href="http://www.coachingencounselingamsterdam.nl">www.coachingencounselingamsterdam.nl</a>
        </p>
      </li>

      <li>
        <p>
        Kortenhoef<br>
        <i>Aaratio</i><br>
        <a href="http://www.aaratio.nl">www.aaratio.nl</a>
        </p>
      </li>

      <li>
        <p>
        Purmerend<br>
        <i>Well-linked</i><br>
        <a href="http://www.well-linked.nl">www.well-linked.nl</a>
        </p>
		  </li>

      <li>
        <p>
        Krommenie<br>
        <i>Emovisie (o.a. artiesten als specialiteit)</i><br>
        <a href="http://www.emovisie.nl">www.emovisie.nl</a>
        </p>
      </li>

      <li>
        <p>
        Medemblik<br>
        <i>Primeres Counseling, Coaching en Training</i><br>
        <a href="http://www.primeres.nl">www.primeres.nl</a>
        </p>
      </li>

      <li>
        <p>
        Aalsmeer<br>
        <i>Praktijk voor Counseling en Coaching</i><br>
        <a href="http://www.saskiadriezen.nl">www.saskiadriezen.nl</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text dark" id="noordbrabant">
    <div class="medium-10 medium-centered columns">

      <h5>Noord-Brabant</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Kruisland<br>
        <i>Counsellingpraktijk "INBUSS"</i><br>
        <a href="http://www.inbuss.nl">www.inbuss.nl</a>
        </p>
      </li>

      <li>
        <p>
        Sint Anthonis<br>
        <i>Bewust Helen</i><br>
        <a href="http://www.bewust-helen.nl">www.bewust-helen.nl</a>
        </p>
      </li>

      <li>
        <p>
        Helvoirt<br>
        <i>Stresskundig</i><br>
        <a href="http://www.stresskundig.nl">www.stresskundig.nl</a>
        </p>
      </li>

      <li>
        <p>
        Tilburg<br>
        <i>Mesters Coaching & Counselling</i><br>
        <a href="http://www.mesters.nl">www.mesters.nl</a>
        </p>
      </li>

      <li>
        <p>
        Sterksel<br>
        <i>www.lifechoices.nl</i><br>
        <a href="http://www.lifechoices.nl">www.lifechoices.nl</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text water" id="gelderland">
    <div class="medium-10 medium-centered columns">

      <h5>Gelderland</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Arnhem<br>
        <i>Batubulan Counseling</i><br>
        <a href="http://www.batubulancounseling.nl">www.batubulancounseling.nl</a>
        </p>
      </li>

      <li>
        <p>
        Nijmegen<br>
        <i>Stil Counseling en Coaching</i><br>
        <a href="http://stilcounseling.nl">www.stilcounseling.nl</a>
        </p>
      </li>

      <li>
        <p>
        Lent<br>
        <i>Ammerlaan Counseling</i><br>
        <a href="http://www.ammerlaancounseling.nl">www.ammerlaancounseling.nl</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text dark" id="utrecht">
    <div class="medium-10 medium-centered columns">

      <h5>Utrecht</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Leusden<br>
        <i>Carolien Broeke</i><br>
        <a href="http://www.carolienbroeke.nl">www.carolienbroeke.nl</a>
        </p>
      </li>

      <li>
        <p>
        Amersfoort<br>
        <i>Cirkel der Seizoenen</i><br>
        <a href="http://www.cirkelderseizoenen.com">www.cirkelderseizoenen.com</a>
        </p>
      </li>

      <li>
        <p>
        Houten<br>
        <i>InEssence</i><br>
        <i>InEssence</i><br>
        <a href="http://www.inessence.org">www.inessence.org</a>
        </p>
      </li>

      <li>
        <p>
        Bosch en Duin<br>
        <i>Cum Cura (kinderen 8 t/m 23 jaar)</i><br>
        <a href="http://www.cumcura.nl">www.cumcura.nl</a>
        </p>
      </li>

      <li>
        <p>
        Utrecht<br>
        <i>Karakter, kunst & Co</i><br>
        <a href="http://www.karakterkunstenco.com">www.karakterkunstenco.com</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text water" id="overijssel">
    <div class="medium-10 medium-centered columns">

      <h5>Overijssel</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Hardenberg<br>
        <i>Deditio Counseling en Coaching Bureau</i><br>
        <a href="http://www.deditio.nl">www.deditio.nl</a>
        </p>
      </li>

      <li>
        <p>
        Deventer<br>
        <i>Chiasmo Consult</i><br>
        <a href="http://www.chiasmo.nl">www.chiasmo.nl</a>
        </p>
      </li>

      <li>
        <p>
        Enschede<br>
        <i>PMB Counselling en Coaching</i><br>
        <a href="http://www.pmbcounsellingencoaching.nl">www.pmbcounsellingencoaching.nl</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text dark" id="limburg">
    <div class="medium-10 medium-centered columns">

      <h5>Limburg</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Maastricht<br>
        <i>Centrum voor lichaam en geest</i><br>
        <a href="http://www.centrumvoorlichaamengeest.eu">www.centrumvoorlichaamengeest.eu</a>
        </p>
      </li>

      <li>
        <p>
        Weert<br>
        <i>Puur Life Coaching</i><br>
        <a href="http://www.puur-lifecoaching.nl">www.puur-lifecoaching.nl</a>
        </p>
      </li>

      <li>
        <p>
        Horn<br>
        <i>Serenity Coaching</i><br>
        <a href="http://www.serenitycoaching.nl">www.serenitycoaching.nl</a>
        </p>
      </li>

      <li>
        <p>
        Buggenum<br>
        <i>Unfold Counselling & Coaching</i><br>
        <a href="http://www.unfold-counselling.nl">www.unfold-counselling.nl</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text water" id="friesland">
    <div class="medium-10 medium-centered columns">

      <h5>Friesland</h5>

		  <p>
			We hebben (nog) geen steunpunten in Friesland. <a href="steunpunten/vacatures/">Klik hier</a> als u zich als steunpunt voor deze provincie aan wilt melden.
		  </p>

    </div>
  </div>

  <div class="row text dark" id="groningen">
    <div class="medium-10 medium-centered columns">

      <h5>Groningen</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Siddeburen<br>
        <i>Hilma Dekens Counseling- nlp- Coaching</i><br>
        <a href="http://www.hilmadekens.nl">www.hilmadekens.nl</a>
        </p>
		  </li>
		  </ul>

    </div>
  </div>

  <div class="row text water" id="drenthe">
    <div class="medium-10 medium-centered columns">

      <h5>Drenthe</h5>

      <p>
			We hebben (nog) geen steunpunten in Drenthe. <a href="steunpunten/vacatures/">Klik hier</a> als u zich als steunpunt voor deze provincie aan wilt melden.
		  </p>

    </div>
  </div>

  <div class="row text dark" id="flevoland">
    <div class="medium-10 medium-centered columns">

      <h5>Flevoland</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Dronten<br>
        <i>Uw Coach</i><br>
        <a href="http://www.uwcoach.nu">www.uwcoach.nu</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

  <div class="row text water" id="zeeland">
    <div class="medium-10 medium-centered columns">

      <h5>Zeeland</h5>

      <ul class="steunpunten">
      <li>
        <p>
        Terneuzen<br>
        <i>BriljansS*</i><br>
        <a href="http://briljanss.nl">www.briljanss.nl</a>
        </p>
      </li>

      <li>
        <p>
        Veere<br>
        <i>Vice Versa Veere</i><br>
        <a href="http://www.viceversaveere.nl">www.viceversaveere.nl</a>
        </p>
      </li>
      </ul>

    </div>
  </div>

</div>

CONTENT;
$page->create();
