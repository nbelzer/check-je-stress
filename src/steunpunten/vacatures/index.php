<?php
include '../../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../../';
$page->head = <<<EOF
  <link rel="stylesheet" href="resources/css/specific/information.css"
        type="text/css">
  <script>
    function changeCaptcha() {
      var element = document.getElementById('captcha');
      element.src = 'resources/captcha/securimage_show.php?' + Math.random();
      return false;
    }
  </script>
EOF;
$page->head = '<link rel="stylesheet"
                     href="resources/css/specific/information.css"
                     type="text/css">';
$page->title = "Vacatures";
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

  		    <h5>Vacatures</h5>

          <p>
  		      Ons doel is om in elke provincie een groot genoeg aantal aangesloten
            praktijken te hebben om iedereen in Nederland te kunnen bedienen met
            zijn of haar stressklachten en het terugdringen van zijn of haar
            burn-out.
  		    </p>

      		<p>
      		  Deelt u deze ambitie, wilt u uw steentje hieraan bijdragen èn
            herkent u uzelf in onderstaand profiel?
      		  <ul>
        		  <li>HBO werk- en denkniveau</li>
        		  <li>Gespecialiseerd in stress en burnout</li>
        		  <li>Aangesloten bij een beroepsvereniging (bijv. ABvC, NOLOC,
                  NOBCO, LVNG)</li>
        		  <li>Erkende coach- of counsellingsopleiding (Academie voor
                  Coaching & Counselling, Europees Instituut, HBO SPH /
                  MWD)</li>
        		  <li>Aantoonbare werkervaring</li>
      		  </ul>
      		</p>

      		<p>
      		  Indien u zichzelf in het profiel kunt herkennen en u zich bij ons
            wilt aansluiten, kunt u het onderstaand contactformulier invullen.
      		</p>

      		<p>
      		  Wij horen graag van u!<br />
      		  Serge
      		</p>
  	    </div>
      </div>
    </div>

    <div class="row text dark docFill" id="second">
      <div class="medium-10 medium-centered columns">
        <div class="medium-12 columns">

          <h5>Contactformulier vacatures</h1>
      		<p><b>
      			 Ik heb interesse om diensten te verzorgen voor CheckJeStress en
             herken mijzelf in het geschetste profiel.
      		</b></p>

      		<form method="post" name="contactformulier vacatures"
                action="steunpunten/vacatures/formulier-email.php">
      		  <table class="contact" border="1">

        			<tr>
        			  <td><label for="1">Voor- en achternaam:</label></td>
        			  <td><input type="text" name="naam" id="1"></td>
        			</tr>

        			<tr>
        			  <td><label for="2">Praktijknaam:</label></td>
        			  <td><input type="text" name="praktijknaam" id="2"></td>
        			</tr>

        			<tr>
        			  <td><label for="3">Eigen websitenaam:</label></td>
        			  <td><input type="text" name="eigenwebsite" id="3"></td>
        			</tr>

        			<tr>
        			  <td><label for="4">E-mailadres:</label></td>
        			  <td><input type="text" name="email" id="4"></td>
        			</tr>

        			<tr>
        			  <td><label for="5">Adres + postcode:</label></td>
        			  <td><input type="text" name="adres" id="5"></td>
        			</tr>

        			<tr>
        			  <td><label for="6">Stad + provincie:</label></td>
        			  <td><input type="text" name="stadprovincie" id="6"></td>
        			</tr>

        			<tr>
        			  <td><label for="7">Opleiding + werkervaring:</label></td>
        			  <td><input type="text" name="opleidingwerkervaring" id="7"></td>
        			</tr>

        			<tr>
        			  <td><label for="8">Beroepsvereniging:</label></td>
        			  <td><input type="text" name="beroepsvereniging" id="8"></td>
        			</tr>

        			<tr>
        			  <td><label for="9">Verdere informatie:</label></td>
        			  <td><input type="text" name="verdereinformatie" id="9"></td>
        			</tr>

        			<tr>
        			  <td><label for="10">Captcha:</label></td>
        			  <td>
          				<img id="captcha" src="resources/captcha/securimage_show.php"
                       alt="CAPTCHA Image" style="border:1px solid black;" />
          				<a href="#" onclick="changeCaptcha()">[ Andere afbeelding ]</a>
                  <br><br>
          				<input type="text" name="captcha_code" maxlength="6" id="10">
        			  </td>
        			</tr>

      		  </table>

      		  <p><input type="submit" value="Verzenden" class="button"></p>
      		</form>

        </div>
      </div>
    </div>

  </div>

CONTENT;
$page->create();
