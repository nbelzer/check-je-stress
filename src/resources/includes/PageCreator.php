<?php

/**
 * Deze PHP class bevat functies waarmee pagina's gemaakt kunnen worden.
 */
class PageCreator {

  /**
   * Bevat de config array.
   */
  var $config;

  /**
   * Zie MySQLManager.php. Roep getConnection() aan als je hem nodig hebt;
   * vergeet dan niet om aan het eind closeConnection() aan te roepen.
   */
  var $mysql;

  /**
   * Maakt een nieuwe PageCreator; initialiseert $config en $mysql.
   */
  function __construct() {
    $this->config = include 'config.php';
    require_once 'MySQLManager.php';
    $this->mysql = new MySQLManager;
  }

  /**
   * Het pad naar de root van de installatie van de website, gezien vanaf de
   * pagina die deze class aanroept. Voorbeelden: bij info/index.php zou dit
   * '../' zijn; bij doelgroep/bedrijven/index.php zou dit '../../' zijn. Het
   * zetten van deze variabele is verplicht voor pagina's die niet in de webroot
   * staan.
   */
  var $path_to_root;

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
   * Moet er een top-bar menu weergegeven worden. Optioneel.
   */
  var $includeMenu;

  /**
	 * Of het mogelijk moet zijn om deze pagina weer te geven in een iframe.
   * Default false om de gebruiker te beschermen tegen clickjacking.
   * http://w2spconf.com/2010/papers/p27.pdf
   */
  var $allowFraming = false;

  /**
   * Geeft de pagina voor op de website. Gebruikt de variabelen uit deze
   * PageCreator instance.
   */
  function create() {
    /*
     * Maak de content variables global zodat ze gebruikt kunnen worden door
     * de nieuwe pagina. Werkt niet in een aparte functie.
     */

    global $path_to_root;
    $path_to_root = $this->path_to_root;

    global $title;
    $title = $this->title;

    global $head;
    $head = $this->head;

    global $body;
    $body = $this->body;

    global $includeMenu;
    $includeMenu = $this->includeMenu;

		if (!$allowFraming) {
      header("Content-Security-Policy: frame-ancestors 'none'", false);
    }
    // Print de pagina (en voer php uit die daarop staat)
    include 'generic.php';
  }

}
