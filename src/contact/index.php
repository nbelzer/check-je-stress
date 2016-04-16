<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = <<<EOF
  <link rel="stylesheet" href="resources/css/specific/standard.css"
        type="text/css">
  <script>
    function changeCaptcha() {
      var element = document.getElementById('captcha');
      element.src = 'resources/captcha/securimage_show.php?' + Math.random();
      return false;
    }
  </script>
EOF;
$page->title = "Contact";
$page->body = <<<CONTENT

  <div class="content">
    <div class="menuSpacing"></div>

    <div class="indexImage">
      <div class="row">
        <div class="medium-12 medium-centered columns">
          <div class="backgroundImage"
               style="background-image: url('resources/img/background.svg');">
          </div>
        </div>
      </div>
    </div>

    <div class="row text water" id="first">
    	<div class="medium-10 medium-centered columns">
        <div class="medium-12 columns">

          <h5>Contact</h5>

          <p>
    		    Wilt u meer informatie over CheckJeStress en onze dienstverlening?
            Wilt u zich aanmelden voor een activiteit (lezing of workshop) of
            gewoon een persoonlijk gesprek?
    		  </p>

      		<p>
      		  Vul dan onderstaand contactformulier in en dan zullen wij trachten
            zo spoedig mogelijk contact met u op te nemen. Wij kunnen ons
            voorstellen dat dit misschien een grote stap voor u is, maar het is
            het begin van een nieuwe start.
      		</p>

      		<p>
      		  Gefeliciteerd met het kiezen voor uzelf! Ik kijk ernaar uit om u te
            ontmoeten!
      		</p>

      		<p>
      		  Serge Janssen
      		</p>

        </div>
      </div>
    </div>

    <div class="row text dark docFill" id="second">
      <div class="medium-10 medium-centered columns">
        <div class="medium-12 columns">

          <h5>Contactformulier</h5>

  		    <form method="post" name="contactformulier" action="contact/formulier-email.php">
      		  <table class="contact" border="1">

        			<tr>
        			  <td><label>Uw reden voor deze contactaanvraag:</label></td>
        			  <td>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Persoonlijke afspraak particulier)">
                    Persoonlijke afspraak (particulier)<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Persoonlijke afspraak (werkgever)">
                    Persoonlijke afspraak (werkgever)<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Gratis lezing voor werkgevers">
                    Gratis lezing voor werkgevers: wat is stress/burn-out?<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Informatie over Burnout-risico-analyse">
                    Informatie over burn-out risicoanalyse<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Workshop terugvalpreventie">
                    Workshop terugvalpreventie<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Workshop check je stress">
                    Workshop Check Je Stress<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Lezing over stress/burnout">
                    Lezing over stress/burn-out<br>
                  </label>
          				<label>
                    <input type="checkbox" name="aanvinkvelden[]"
                           value="Anders">Anders<br>
                  </label>
        			  </td>
        			</tr>

        			<tr>
        			  <td>
                  <label for="1">Voor- en achternaam (of bedrijfsnaam):</label>
                </td>
        			  <td>
                  <input type="text" name="naam" id="1">
                </td>
        			</tr>

        			<tr>
        			  <td><label for="2">E-mailadres:</label></td>
        			  <td><input type="text" name="email" id="2"></td>
        			</tr>

        			<tr>
        			  <td>
                  <label for="3">Vragen, opmerkingen of uw ideeën:</label>
                </td>
        			  <td>
                  <textarea name="bericht" id="3" placeholder="Uw bericht"
                            style="height: px; width: px;"></textarea>
                </td>
        			</tr>

        			<tr>
        			  <td><label for="4">Captcha:</label></td>
        			  <td>
          				<img id="captcha" src="resources/captcha/securimage_show.php"
                       alt="CAPTCHA Image" style="border:1px solid black;" />
          				<a href="#" onclick="changeCaptcha()">[ Andere afbeelding ]</a>
                  <br><br>
          				<input type="text" name="captcha_code" maxlength="6" id="4">
        			  </td>
        			</tr>

      		  </table>

      		  <p>
      			  <input type="submit" value="Verzenden" class="button">
      		  </p>
  		    </form>

        </div>
      </div>
    </div>

  </div>

CONTENT;
$page->create();
