<?php
include '../../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
$page->title = "Vacatures";
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
 
	<div class="row text water" id="first">
	  <div class="medium-10 medium-centered columns">
        <div class="medium-12 columns">
		
		  <h5>Vacatures</h5>

          <p>
			Ons doel is om in elke provincie een ruim aantal aangesloten praktijken te hebben om iedereen in Nederland te kunnen bedienen om stressklachten en burnout terug te dringen.
		  </p>

		  <p>
			Deel jij deze ambitie, wil jij je steentje hieraan bijdragen èn herken je jezelf in onderstaand profiel?
		  </p>
			<ul>
			  <li>HBO werk- en denkniveau</li>
			  <li>Gespecialiseerd in stress en burnout</li>
			  <li>Aangesloten bij een beroepsvereniging (bijv. ABvC, NOLOC, NOBCO, LVNG)</li>
			  <li>Erkende coach- of counsellingsopleiding (Academie voor Coaching & Counselling, Europees Instituut, HBO SPH / MWD)</li>
			  <li>Aantoonbare werkervaring</li>
			</ul>

		  <p>
			Past het profiel en heb je nog steeds interesse? Vul dan onderstaand contactformulier in.
		  </p>

		  <p>
			Tot binnenkort?<br />
			Serge
		  </p>
		</div>
      </div>
    </div>

    <div class="row text dark" id="second">
      <div class="medium-10 medium-centered columns">
        <div class="medium-12 columns">
		
          <h5>Contactformulier vacatures</h1>

		  <p>
			<b>
			  Ja, ik heb interesse om diensten te verzorgen voor CheckJeStress.
			</b>
		  </p>
		  
		  <form method="post" name="contactformulier vacatures" action="steunpunten/vacatures/formulier-email.php">
			<table border="1">

			  <tr>
				<td><label for="1">Voor- en achternaam</label></td>
				<td><input type="text" name="naam" id="1"></td>
			  </tr>

			  <tr>
				<td><label for="2">Praktijknaam</label></td>
				<td><input type="text" name="praktijknaam" id="2"></td>
			  </tr>

			  <tr>
				<td><label for="3">Eigen websitenaam</label></td>
				<td><input type="text" name="eigenwebsite" id="3"></td>
			  </tr>

			  <tr>
				<td><label for="4">E-mailadres</label></td>
				<td><input type="text" name="email" id="4"></td>
			  </tr>

			  <tr>
				<td><label for="5">Adres + postcode</label></td>
				<td><input type="text" name="adres" id="5"></td>
			  </tr>

			  <tr>
				<td><label for="6">Stad + provincie</label></td>
				<td><input type="text" name="stadprovincie" id="6"></td>
			  </tr>

			  <tr>
				<td><label for="7">Opleiding + werkervaring</label></td>
				<td><input type="text" name="opleidingwerkervaring" id="7"></td>
			  </tr>

			  <tr>
				<td><label for="8">Beroepsvereniging</label></td>
				<td><input type="text" name="beroepsvereniging" id="8"></td>
			  </tr>

			  <tr>
				<td><label for="9">Verdere informatie</label></td>
				<td><input type="text" name="verdereinformatie" id="9"></td>
			  </tr>

			  <tr>
				<td><label for="10">Captcha</label></td>
				<td>
				  <img id="captcha" src="resources/captcha/securimage_show.php" alt="CAPTCHA Image" />
				  <a href="#" onclick="document.getElementById('captcha').src = 'resources/captcha/securimage_show.php?' + Math.random(); return false">[ Andere afbeelding ]</a>
				  <input type="text" name="captcha_code" maxlength="6" id="10">				
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
