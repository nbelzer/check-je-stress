<!--- Contact-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/information.css" type="text/css">';
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

		  <p>
			*Formulier hier*
		  </p>			

        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

