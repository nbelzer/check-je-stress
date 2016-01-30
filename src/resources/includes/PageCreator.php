<?php
/**
 * Deze PHP class bevat functies waarmee pagina's gemaakt kunnen worden.
 */
class PageCreator {

  /**
   * De paginatitel.
   */
  var $title;

  /**
   * Extra inhoud voor de head tag. Optioneel.
   */
  var $head;

  /**
   * De inhoud van de body tag van de pagina.
   */
  var $body;

  /**
   * Geeft de pagina voor op de website. Gebruikt de variabelen uit deze
   * PageCreator instance.
   */
  function create() {
    /*
     * Maak de content variables global zodat ze gebruikt kunnen worden door
     * de nieuwe pagina. Het werkt niet als ik hier een aparte functie voor
     * gebruik :/
     */
    global $title;
    $title = $this->title;

    global $head;
    $head = $this->head;

    global $body;
    $body = $this->body;

    // Print de pagina (en voer php uit die daarop staat)
    include 'generic.php';
  }

}
