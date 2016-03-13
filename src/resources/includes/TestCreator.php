<?php

require_once '../resources/includes/PageCreator.php';

/**
 * Met deze PHP class kunnen pagina's voor de CheckJeStress tests gemaakt
 * worden.
 */
class TestCreator {

  /**
   * De PageCreator waaruit de testpagina gemaakt zal worden.
   */
  var $pageCreator;

  /**
   * Maakt een nieuwe PageCreator; initialiseert $config en $mysql.
   */
  function __construct() {
    $this->pageCreator = new PageCreator;
  }

  /**
   * De titel van de test.
   */
  var $title;

  /**
   * Een associated array met vragen. Hierbij is telkens id => vraag.
   * Elke vraag heeft dus een id. Deze hoeft niet per se gelijk te zijn aan de
   * volgorde van de array. Op deze manier houden we de mogelijkheid om iets te
   * maken waarmee er in de CMS vragen bij en af gehaald kunnen worden.
   */
  var $questions;

  /**
   * Uitleg over de test die boven het testformulier op de pagina staat.
   */
  var $body;

  /**
   * Optioneel: het pad naar de installatie root van de CheckJeStress website.
   * Deze is default '../' en hoeft alleen veranderd te worden als de test
   * niet in de standaard tests map staat.
   */
  var $path_to_root = '../';

  /**
   * Print de testpagina op de website. Gebruikt de variabelen uit deze
   * TestCreator instance.
   */
  function create() {
    $page->path_to_root = $this->path_to_root;
    $page->title = $this->title;
    $page->includeMenu = true;
    $page->head = self::$head;

    // Maak eerst het formulier met de vragen dat op de testpagina komt.
    $form = "";

    $self = htmlentities($_SERVER['PHP_SELF']);

    $form .= "<form action=\"$self\" method=\"POST\">\n";

    $form .= "<table style=\"width: 100%;\">\n";
    foreach ($this->questions as $id => $vraag) {
      $form .= "<tr><td><div class=\"row\">\n";
      $form .= "<div class=\"small-12 medium-6 columns\">$vraag</div>\n";
      $form .= "<div class=\"small-12 medium-6 columns\">
                  <div id=\"$id\" class=\"slider_handle\"></div>
                </div>\n";
      $form .= "<input type=\"hidden\" id=\"vraag$id\" name=\"vraag$id\">";
      $form .= "</div></td></tr>\n";
    }
    $form .= "</table>\n";

    $form .= "<input type=\"submit\" value=\"Versturen\" class=\"button\">\n";
    $form .= "</form>\n";

    // Maak de body aan en zet het formulier erin.
    $page->body = <<<CONTENT
      $this->body
      <noscript>
        <p>
          Voor het invullen van de tests moet
          <a href="http://enable-javascript.com/nl/" target="_blank">Javascript
          ingeschakeld zijn in uw browser</a>.
        </p>
      </noscript>
      $form
CONTENT;

    $page->create();
  }

  /**
   * Extra head data voor op de testpagina.
   */
  static $head = <<<EOF
    <script src="resources/js/vendor/jquery-ui.min.js"></script>
    <link rel="stylesheet"
      href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
      .skipped {
        background-color: #fce6e2;
      }
    </style>
    <script>
      // Houdt bij bij welke vraag de gebruiker is.
      var questionProgress = -1;

      window.onload = function() {
        // Zoek alle slider divs op en maak de sliders.
        var sliders = document.getElementsByClassName("slider_handle");
        [].forEach.call(sliders, function (slider, index, array) {
          $(slider).slider({
            // Van 0 tot 100 zodat het sliden smooth gaat en we de slider in het
            // midden kunnen zetten wanneer de pagina laadt.
            min: 0,
            max: 100,
            // Initial value is 50 (in het midden)
            value: 50
          });

          // Deze listener wordt aangeroepen zodra de gebruiker de slider loslaat.
          // Zorgt ervoor dat er maar 6 mogelijkheden zijn.
          $(slider).on("slidestop", function(event, ui) {
            var newValue;
            if (ui.value < 10) {
              newValue = 0;
            } else if (ui.value < 30) {
              newValue = 20;
            } else if (ui.value < 50) {
              newValue = 40;
            } else if (ui.value < 70) {
              newValue = 60;
            } else if (ui.value < 90) {
              newValue = 80;
            } else {
              newValue = 100;
            }
            $(event.target).slider("value", newValue);
            // Geef de bijbehorende <input type="hidden"> de nieuwe value van de
            // slider. Dit gaat van 0 t/m 5.
            $("#vraag" + $(event.target).attr('id')).val(newValue / 20);
          });

          // Voeg een listener toe die bijhoudt bij welke vraag de gebruiker is.
          // De gebruiker wordt gewaarschuwd als hij een vraag overslaat.
          $(slider).on("slidestart", function(event, ui) {
            var clickedSliderID = $(event.target).attr('id');
            if (clickedSliderID > questionProgress + 1) {
              // Vragen geskipt. Voeg aan die vragen de .skipped class toe.
              for (var i = questionProgress + 1; i < clickedSliderID; i++) {
                $("#" + i).parent().parent().parent().addClass("skipped");
              }
            } else if (clickedSliderID < questionProgress) {
              // Teruggekomen op een geskipte vraag. Verwijder de .skipped class.
              $("#" + clickedSliderID).parent().parent().parent().removeClass("skipped");
            }

            if (clickedSliderID > questionProgress) {
              // Progress
              questionProgress = parseInt(clickedSliderID);
            }
          });
        });
      }
    </script>
EOF;

}
