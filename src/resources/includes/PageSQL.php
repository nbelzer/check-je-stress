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
   * Geeft de inhoud van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de inhoud opgezocht moet worden
   * @return array een associated array als volgt:
   * array('title' => titel, 'head' => head, 'body' => body)
   */
  function getPageContents($page) {
    $sql = "SELECT title, head, body FROM pages WHERE page = '$page';";
    $results = $this->mySQLManager->getterQuery($sql, null, array('title', 'head', 'body'));
    return $results;
  }

  /**
   * Geeft de paginatitel van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de titel uit de database gehaald moet worden
   */
  function getPageTitle($page) {
    $sql = "SELECT title FROM pages WHERE page = '$page';";
    $result = $this->mySQLManager->getterQuery($sql, null, array('title'));
    return $result['title'];
  }

  /**
   * Geeft de extra inhoud van de head tag die specifiek is voor de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de head uit de database gehaald moet worden
   */
  function getPageHead($page) {
    $sql = "SELECT head FROM pages WHERE page = '$page';";
    $result = $this->mySQLManager->getterQuery($sql, null, array('head'));
    return $result['head'];
  }

  /**
   * Geeft de inhoud van de body tag van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de body uit de database gehaald moet worden
   */
  function getPageBody($page) {
    $sql = "SELECT body FROM pages WHERE page = '$page';";
    $result = $this->mySQLManager->getterQuery($sql, null, array('body'));
    return $result['body'];
  }

}
