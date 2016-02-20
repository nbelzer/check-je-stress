<?php
require_once '../resources/includes/PageCreator.php';
$page = new PageCreator;
$page->path_to_root = '../';
$page->title = "Quicktest - CheckJeStress";
$page->includeMenu = true;
$page->head = <<<EOF
  <script src="resources/js/vendor/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script>
    window.onload = function() {
      // Zoek alle slider divs op en maak de sliders.
      var sliders = document.getElementsByClassName("slider_handle");
      for (var i = 0; i < sliders.length; i++) {
        $(sliders[i]).slider({
          // Van 0 tot 100 zodat het sliden smooth gaat en we de slider in het
          // midden kunnen zetten wanneer de pagina laadt.
          min: 0,
          max: 100,
          // Initial value is 50
          value: 50,
          // Deze functie wordt aangeroepen zodra de gebruiker de slider loslaat.
          // Zorgt ervoor dat er maar 6 mogelijkheden zijn.
          stop: function(event, ui) {
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
            // Geef de bijbehorende <input type="hidden"> de nieuwe value van de slider.
            $("#vraag" + $(event.target).attr('id')).val(newValue / 20);
          }
        });
      }
    }
  </script>
EOF;

// Elke vraag heeft een id. Deze hoeft niet per se gelijk te zijn aan de volgorde van de array. Dit zorgt ervoor dat er in de CMS vragen bij en af kunnen.
$vragen = array(
  0 => 'Ik voel me moe, ook al heb ik voldoende slaap gehad',
  1 => 'Ik ben ontevreden met mijn werk',
  2 => 'Ik voel me bedroefd, zonder dat daar echt een reden voor is',
  3 => 'Ik ben vergeetachtig',
  4 => 'Ik ben geïrriteerd en val uit tegen mensen',
  5 => 'Ik vermijd mensen op mijn werk en in mijn privé-leven',
  6 => 'Ik heb slaapproblemen, omdat ik me zorgen maak over mijn werk',
	7 => 'Ik ben vaker ziek dan vroeger',
  8 => 'Mijn houding t.o.v. mijn werk is \'Waar zou ik me druk over maken?\' Ik sta er wat onverschillig tegenover',
  9 => 'Ik raak vaker betrokken bij conflicten',
  10 => 'Mijn werk lijdt onder \'hoe ik me voel\'.',
	11 => 'Ik gebruik meer koffie, alcohol, sigaretten, drugs of kalmerende middelen dan normaal om mij beter te voelen',
  12 => 'Met andere mensen communiceren is een bron van spanning',
  13 => 'Ik kan me niet concentreren op mijn werk zoals voorheen',
	14 => 'Het werk verveelt me',
  15 => 'Ik werk hard, maar bereik weinig',
  16 => 'Ik voel me gefrusteerd op mijn werk',
	17 => 'Ik zie ertegen op om naar het werk te gaan',
	18 => 'Sociale activiteiten putten me uit',
  19 => 'Seks vraagt teveel energie',
  20 => 'In mijn vrije tijd kijk ik voornamelijk TV',
  21 => 'Ik heb weinig om me op te verheugen in mijn werk',
	22 => 'Ik pieker over mijn werk in mijn vrije tijd',
  23 => 'Mijn gevoelens over mijn werk zitten mij dwars in mijn persoonlijke leven',
  24 => 'Mijn werk lijkt zinloos'
);

// Maak eerst het formulier met de vragen dat op de testpagina komt.
$form = "";

$php_self = htmlspecialchars($_SERVER["PHP_SELF"]);
$form .= "<form action=\"$php_self\" method=\"POST\">\n";

$form .= "<table style=\"width: 100%;\">\n";
foreach ($vragen as $id => $vraag) {
  $form .= "<tr><td><div class=\"row\">\n";
	$form .= "<div class=\"small-12 medium-6 columns\">$vraag</div>\n";
  $form .= "<div class=\"small-12 medium-6 columns\"><div id=\"$id\" class=\"slider_handle\"></div></div>\n";
  $form .= "<input type=\"hidden\" id=\"vraag$id\" name=\"vraag$id\">";
  $form .= "</div></td></tr>\n";
}
$form .= "</table>\n";

$form .= "<input type=\"submit\" value=\"Versturen\" class=\"button\" />\n";
$form .= "</form>\n";

// Maak de body aan en zet het formulier erin.
$page->body = <<<CONTENT
  <h1>Quicktest</h1>
  <p>
    Deze test bestaat uit 25 stellingen/vragen.
    <br />
    Kies steeds in welke mate de uitspraak op u van toepassing is.
  </p>
  <noscript>
    <p>Voor het invullen van de tests moet <a href="http://enable-javascript.com/nl/" target="_blank">Javascript ingeschakeld zijn in uw browser</a>.</p>
  </noscript>
  $form
CONTENT;

$page->create();
