<?php

/**
 * Deze class regelt de SQL queries die te maken hebben met de inhoud van de
 * pagina's op de website.
 */
class PageSQL {

  private $mySQLManager;

  /**
   * Maakt een nieuwe PageSQL.
   *
   * @param MySQLManager $mySQLManager de manager van deze instance
   */
  function __construct($mySQLManager) {
    $this->$mySQLManager = $mySQLManager;
  }

  /**
   * Geeft de paginatitel van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de titel uit de database gehaald moet worden
   */
  function getPageTitle($page) {
    return '';
  }

  /**
   * Geeft de extra inhoud van de head tag die specifiek is voor de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de head uit de database gehaald moet worden
   */
  function getPageHead($page) {
    return '';
  }

  /**
   * Geeft de inhoud van de body tag van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de body uit de database gehaald moet worden
   */
  function getPageBody($page) {
    return '';
  }

}
