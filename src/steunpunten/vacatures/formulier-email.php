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

$to = "checkjestresstest@gmail.com";
$headers = "From: $to \r\n";
$headers .= "Reply-To: $email \r\n";
$email_subject = "CheckJeStress: Sollicitatie $naam";
$email_body = "Er is een nieuwe sollicitatie binnengekomen van de site CheckJeStress.nl:<br><br>
	Naam: $naam<br>
	Praktijknaam: $praktijknaam<br>
	Eigen website: $eigenwebsite<br>
	Email-adres: $email<br>
	Adres: $adres<br>
	Stad en provincie: $stadprovincie<br>
	Opleiding en werkervaring: $opleidingwerkervaring<br>
	Beroepsvereniging: $beroepsvereniging<br>
	Verdere informatie: $verdereinformatie";

include '../../resources/includes/PHPMailer/mail.php';
$mail = new Mailer;
$mail->sendMail([$to], $email_subject, $email_body, $email_body);

$page->body = <<<CONTENT

<div class="content">
  
  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Contact</h1>

		  <p>
			Hartelijk bedankt voor het versturen van uw sollicitatie!<br>
			Er zal zo spoedig mogelijk contact met u op worden genomen.<br>
			<a href="">Klik hier</a> om terug te keren naar de homepage.
		  </p>
		  
        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();

