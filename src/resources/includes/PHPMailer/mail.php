<?php
require 'PHPMailerAutoload.php';

/**
 * Class die voor mail functionaliteit zorgt.
 *
 * @package CheckJeStress
 */
class Mailer {

  /**
   * Constructs the object
   *
   * @param array $config het deel van het configuratiebestand dat met de SMTP
   * server te maken heeft
   */
  function __construct($config) {
    $this->config = $config;
    $this->mail = new PHPMailer;
    $this->mail->SMTPDebug = 0; // Enable verbose debug output
  }

  /**
   * De PHPMailer instance van deze class
   */
  var $mail;

  /**
   * De array met gegevens betreffende de SMTP server
   */
  private $config;

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
      $this->mail->addReplyTo($recipient);
    }

    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $this->mail->isHTML(true);
    $this->mail->Subject = $subject;
    $this->mail->Body = $html_message; /* Body containing HTML */
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
    $this->mail->Host = $config['host'];
    $this->mail->Port = $config['port'];
    /* Enable TLS encryption, `ssl` also accepted */
    $this->mail->SMTPSecure = $config['secure'];
    $this->mail->SMTPAuth = $config['auth'];
    $this->mail->Username = $config['username'];
    $this->mail->Password = $config['password'];

    $this->mail->setFrom($config['admin-email'], 'CheckJeStress');
  }

}

/**
 * Thrown if een mail niet verstuurd kon worden.
 *
 * @package CheckJeStress
 */
class MailException extends Exception {
}
