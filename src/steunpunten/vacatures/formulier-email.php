<!--- Vacatures-->

<?php
include '../../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/standard.css" type="text/css">';
$page->title = "Vacatures";

$naam = $_POST['naam'];
$praktijknaam = $_POST['praktijknaam'];
$eigenwebsite = $_POST['eigenwebsite'];
$email = $_POST['email'];
$adres = $_POST['adres'];
$stadprovincie = $_POST['stadprovincie'];
$opleidingwerkervaring = $_POST['opleidingwerkervaring'];
$beroepsvereniging = $_POST['beroepsvereniging'];
$verdereinformatie = $_POST['verdereinformatie'];

$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Contact</h1>

		  <p>
			Voor- en achternaam: $naam<br>
			Praktijknaam: $praktijknaam<br>
			Eigen websitenaam: $eigenwebsite<br>
			E-mailadres: $email<br>
			Adres + postcode: $adres<br>
			Stad + provincie: $stadprovincie<br>
			Opleiding + werkervaring: $opleidingwerkervaring<br>
			Beroepsvereniging: $beroepsvereniging<br>
			Verdere informatie: $verdereinformatie
		  </p>
		  
        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

