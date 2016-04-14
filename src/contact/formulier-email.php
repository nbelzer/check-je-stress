<?php
include '../resources/includes/PageCreator.php';
$page = new PageCreator();
$page->path_to_root = '../';
$page->head = '<link rel="stylesheet" href="resources/css/specific/standard.css" type="text/css">';
$page->title = "Contact";

$naam = $_POST['naam'];
$bericht = $_POST['bericht'];
$email = $_POST['email'];
$aanvinkvelden = "";
if (isset($_POST['aanvinkvelden'])) {
	foreach($_POST['aanvinkvelden'] as $value){
		$aanvinkvelden .= "<li>";
		$aanvinkvelden .= $value;
		$aanvinkvelden .= "</li>";
	}
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$message = <<<EOF
		Vul alstublieft een geldig e-mailadres in.<br>
		<a href='javascript:history.go(-1)'><button class="button">Terug</button></a>
EOF;
} else {

	session_start();
	require_once '../resources/captcha/securimage.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
		/* Wrong captcha */
		$message = <<<EOF
			De code die u heeft ingevuld klopt niet.<br>
			<a href='javascript:history.go(-1)'><button class="button">Probeer het nog eens.</button></a>
EOF;
	} else {
		$to = $page->getConfig()['email']['admin-email'];
		$email_subject = "CheckJeStress: Contactaanvraag $naam";
		$email_body = <<<EOF
			Er is een nieuwe aanvraag binnengekomen van de site CheckJeStress.nl:<br><br>
			Persoonsinformatie:<br>
			<ul>
				$naam<br>
				$email
			</ul>
			<br>
			Deze persoon heeft interesse in de volgende zaken:
			<ul>$aanvinkvelden</ul>
			Deze persoon liet het volgende bericht achter:<br>
			<ul>$bericht</ul>;
EOF;
		include '../resources/includes/PHPMailer/mail.php';
		$mail = new Mailer($page->getConfig()['email']);
		$mail->sendMail([$to], $email_subject, $email_body, $email_body);

		$message = <<<EOF
			Hartelijk bedankt voor het versturen van uw contactformulier!<br>
			Er zal zo spoedig mogelijk contact met u op worden genomen.<br>
			<a href="">Klik hier</a> om terug te keren naar de homepage.
EOF;
	}

}

$page->body = <<<CONTENT

<div class="content">

  <section class="text water" id="first">
    <div class="row">
      <div class="medium-10 medium-centered columns">
        <div class="medium-9 columns medium-offset-3">
          <h5>Contact</h1>
		  	<p>$message</p>
        </div>
      </div>
    </div>
  </section>

</div>

CONTENT;
$page->create();
