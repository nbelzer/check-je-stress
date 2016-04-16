<?php

/**
 * Deze class regelt de SQL queries die te maken hebben met de inhoud van de
 * pagina's op de website.
 *
 * @package CheckJeStress
 */
class PageSQL {

  private $mySQLManager;

  /**
   * Maakt een nieuwe PageSQL.
   *
   * @param MySQLManager $mySQLManager de manager van deze instance
   */
  function __construct($mySQLManager) {
    $this->mySQLManager = $mySQLManager;
  }

  /**
   * Geeft de inhoud van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de inhoud opgezocht moet worden
   * @return array een associated array als volgt:
   * array('title' => titel, 'head' => head, 'body' => body)
   */
  function getPageContents($page) {
    $sql = 'SELECT title, head, body FROM pages WHERE page = ?;';
    $param_types = 's';
    $params = array($page);
    $results = $this->mySQLManager->getterQuery($sql, $param_types, $params, array('title', 'head', 'body'));
    return $results[0];
  }

  /**
   * Geeft de paginatitel van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de titel uit de database gehaald moet worden
   */
  function getPageTitle($page) {
    $sql = 'SELECT title FROM pages WHERE page = ?;';
    $param_types = 's';
    $params = array($page);
    $result = $this->mySQLManager->getterQuery($sql, $param_types, $params);
    return $result[0]['title'];
  }

  /**
   * Geeft de extra inhoud van de head tag die specifiek is voor de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de head uit de database gehaald moet worden
   */
  function getPageHead($page) {
    $sql = 'SELECT head FROM pages WHERE page = ?;';
    $param_types = 's';
    $params = array($page);
    $result = $this->mySQLManager->getterQuery($sql, $param_types, $param);
    return $result[0]['head'];
  }

  /**
   * Geeft de inhoud van de body tag van de opgegeven pagina.
   *
   * @param string $page de pagina waarvan de body uit de database gehaald moet worden
   */
  function getPageBody($page) {
    $sql = "SELECT body FROM pages WHERE page = ?;";
    $param_types = 's';
    $params = array($page);
    $result = $this->mySQLManager->getterQuery($sql, $param_types, $params);
    return $result[0]['body'];
  }

  /**
   * Update de inhoud van de opgegeven pagina, of maakt de pagina aan als deze
   * nog niet bestaat.
   *
   * @param string $page het pad naar de pagina vanaf de website root
   * @param string $title de nieuwe paginatitel
   * @param string $head de nieuwe paginahead
   * @param string $body de nieuwe paginabody
   */
  function updatePageContents($page, $title, $head, $body) {
    $sql = 'INSERT INTO pages (page, title, head, body) VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE title=?, head=?, body=?;';
    $param_types = 'sssssss';
    $params = array($page, $title, $head, $body, $title, $head, $body);
    $this->mySQLManager->setterQuery($sql, $param_types, $params);
  }

  /**
   * Update de titel van de opgegeven pagina.
   *
   * @param string $page het pad naar de pagina vanaf de website root
   * @param string $title de nieuwe paginatitel
   */
  function updatePageTitle($page, $title) {
    $sql = 'UPDATE pages SET title=? WHERE page=?;';
    $param_types = 'ss';
    $params = array($title, $page);
    $this->mySQLManager->setterQuery($sql, $param_types, $params);
  }

  /**
   * Update de head van de opgegeven pagina.
   *
   * @param string $page het pad naar de pagina vanaf de website root
   * @param string $head de nieuwe paginahead
   */
  function updatePageHead($page, $head) {
    $sql = 'UPDATE pages SET head=? WHERE page=?;';
    $param_types = 'ss';
    $params = array($head, $page);
    $this->mySQLManager->setterQuery($sql, $param_types, $params);
  }

  /**
   * Update de body van de opgegeven pagina.
   *
   * @param string $page het pad naar de pagina vanaf de website root
   * @param string $body de nieuwe paginabody
   */
  function updatePageBody($page, $body) {
    $sql = 'UPDATE pages SET body=? WHERE page=?;';
    $param_types = 'ss';
    $params = array($body, $page);
    $this->mySQLManager->setterQuery($sql, $param_types, $params);
  }

}
