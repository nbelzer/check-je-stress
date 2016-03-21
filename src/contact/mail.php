<?php
require '../resources/includes/PHPMailer/PHPMailerAutoload.php';

/**
 * Class die voor mail functionaliteit zorgt.
 */
class Mailer {

  /**
   * Constructs the object
   */
  function __construct() {
    $this->mail = new PHPMailer;
    $this->mail->SMTPDebug = 3; // Enable verbose debug output
  }

  /**
   * De PHPMailer instance van deze class
   */
  var $mail;

  /**
   * Stuurt een mail.
   *
   * @param array $recipients de e-mailadresse van de personen naar wie de mail
   * gestuurd moet worden
   * @param string $subject het onderwerp van de e-mail
   * @param string $message het bericht zelf
   */
  function sendMail($recipients, $subject, $html_message, $non_html_message) {
    $this->configure();

    foreach ($recipients as $recipient) {
      $this->mail->addAddress($recipient);
    }

    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $this->mail->isHTML(true);
    $this->mail->Subject = $subject;
    $this->mail->Body = $message; /* Body containing HTML */
    $this->mail->AltBody = $non_html_message;

    if(!$this->mail->send()) {
      throw new MailException('Message could not be sent. Mailer Error: ' . $this->mail->ErrorInfo);
    }
  }

  /**
   * Haalt waarden uit de configuratie voor gebruik bij het verbinden met de
   * mailserver.
   */
  private function configure() {
    $this->mail->isSMTP();
    $this->mail->Host = 'smtp.gmail.com';
    $this->mail->Port = 587;
    /* Enable TLS encryption, `ssl` also accepted */
    $this->mail->SMTPSecure = 'tls';
    $this->mail->SMTPAuth = true;
    $this->mail->Username = 'checkjestresstest@gmail.com';
    $this->mail->Password = 'jemoeder';

    $this->mail->addReplyTo('info@example.com', 'Information');
    $this->mail->setFrom('from@example.com', 'Mailer');
  }

}

/**
 * Thrown if een mail niet verstuurd kon worden.
 */
class MailException extends Exception {
}
