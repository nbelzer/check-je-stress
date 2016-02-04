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
    include 'MySQLManager.php';
    $this->mysql = new MySQLManager;
  }

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
