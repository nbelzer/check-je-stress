<!--- Contact-->

<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/standard.css" type="text/css">';
$page->title = "Contact";

$naam = $_POST['naam'];
$vragenopmerkingenideeën = $_POST['vragenopmerkingenideeën'];
$email = $_POST['email'];
$aanvinkvelden = "";
foreach($_POST['aanvinkvelden'] as $value){
	$aanvinkvelden .= "<li>";
	$aanvinkvelden .= $value;
	$aanvinkvelden .= "</li>";
}

$to = "checkjestresstest@gmail.com";
$headers = "From: $to \r\n";
$headers .= "Reply-To: $email \r\n";
$email_subject = "CheckJeStress: Contactaanvraag $naam";
$email_body = "Er is een nieuwe aanvraag binnengekomen van de site CheckJeStress.nl:<br><br>Persoonsinformatie:<br><ul>$naam<br>$email</ul><br>Deze persoon heeft interesse in de volgende zaken:<ul>$aanvinkvelden</ul>Deze persoon liet het volgende bericht achter:<br><ul>$vragenopmerkingenideeën</ul>";

include '../resources/includes/PHPMailer/mail.php';
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
			Hartelijk bedankt voor het versturen van uw contactformulier!<br>
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
