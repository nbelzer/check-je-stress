<?php
include '../includes/PageCreator.php';
$page = new PageCreator;
$page->path_to_root = '../../';
$page->title = "Check je stress";

$page->head = <<<HEAD
  <script>

    teksten = [
      "Drenthe",
      "Flevoland",
      "Friesland",
      "Gelderland",
      "Groningen",
      "Limburg",
      "Noord-Brabant",
      "Noord-Holland",
      "Overijssel",
      "Utrecht",
      "Zeeland",
      "Zuid-Holland"
    ];

    // Provincienummers vanaf 0, alfabetisch
    function update_provincie(provincie) {
      var div = document.getElementById('provincie');
      // Verwijder huidige contents
      while (div.firstChild) {
        div.removeChild(div.firstChild);
      }
      // Voeg correcte content toe
      div.appendChild(document.createTextNode(teksten[provincie]));
    }
  </script>
HEAD;

$page->body = <<<CONTENT
<br><br><br><br><br>
<object data="resources/img/clickable_map.svg" type="image/svg+xml" width="500"></object>
<div id="provincie">
  Kies een provincie
</div>
De eerste versie van de clickable map (MET VECTORINDELING!!)<br><br>

<img src="resources/img/logo_vector.svg" width="300"><br>
Het logo met vectorindeling<br><br>

<img src="resources/img/logo_vector_blocky.svg" width="300"><br>
Het blocky logo met vectorindeling<br><br>

<img src="resources/img/logo_highres.png" width="300"><br>
Logo in hoge resolutie<br><br>

<img src="resources/img/logo_raw.png" width="300"><br>
Het logo, zo basic mogelijk<br><br>

<img src="resources/img/frontpage.svg" width="300"><br>
De achtergrond van de frontpage<br><br>

<img src="resources/img/old/kaart_provincies.png" width="300"><br>
Kaart van de provincies voor een clickable map<br><br>

<img src="resources/img/old/logo_old.jpeg" width="300"><br>
Het originele logo van de oude site<br><br>

<img src="resources/img/old/serge_janssen.JPG" width="300"><br>
Meneer Janssen<br><br>

CONTENT;

$page->create();
