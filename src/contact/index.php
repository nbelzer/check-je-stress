<!--- Contact-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/standard.css" type="text/css">';
$page->title = "Contact";
$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Contact</h1>

          <p>
			Wil je meer informatie over het Steunpunt Stress Burnout Nederland en onze dienstverlening? Wil je je aanmelden voor een activiteit (lezing of workshop) of wil je gewoon een persoonlijk gesprek?
		  </p>

		  <p>
			Vul dan het onderstaand contactformulier in en één van ons neemt zo spoedig mogelijk contact met je op. We kunnen ons voorstellen, dat dit misschien een grote stap voor je is, maar het is het begin van een nieuwe start.
		  </p>

		  <p>
			Gefeliciteerd met het kiezen voor jezelf! Ik kijk ernaar uit om je te ontmoeten!
		  </p>

		  <p>
			Serge Janssen
		  </p>

        </div>
      </div>
    </div>
  </section>
  
  <section class="text dark" id="second">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Contactformulier</h1>

		  <form method="post" name="contactformulier" action="contact/formulier-email.php">
		    <table border="1">
			
			  <tr>
				<td>Aanvinkvelden
				<td>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Persoonlijke afspraak particulier)">Persoonlijke afspraak (particulier)<br></label>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Persoonlijke afspraak (werkgever)">Persoonlijke afspraak (werkgever)<br></label>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Gratis lezing voor werkgevers">Gratis lezing voor werkgevers: wat is stress/burn-out?<br></label>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Informatie over Burnout-risico-analyse">Informatie over Burnout-risico-analyse<br></label>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Workshop terugvalpreventie">Workshop terugvalpreventie<br></label>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Workshop check je stress">Workshop check je stress<br></label>
				  <label><input type="checkbox" name="aanvinkvelden[]" value="Lezing over stress/burnout">Lezing over stress/burn-out<br></label>
				</td>
			  </tr>
			
			  <tr>
				<td><label for="1">Voor- en achternaam (of bedrijfsnaam)</label></td>
				<td><input type="text" name="naam" id="1" placeholder="John Doe"></td>
			  </tr>
			
			  <tr>
				<td><label for="2">E-mailadres</label></td>
				<td><input type="text" name="email" id="2" placeholder="johndoe@gmail.com"></td>
			  </tr>
			
			  <tr>
				<td><label for="3">Vragen, opmerkingen of jouw ideeën</label></td>
				<td><input type="text" name="vragenopmerkingenideeën" id="3" placeholder="Uw bericht"></td>
			  <tr>
			
			</table>
			
			<p>
			   <input type="submit" value="Verstuur me, ik ben er klaar voor!" class="button">
			</p>
		  </form>
		  
        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

