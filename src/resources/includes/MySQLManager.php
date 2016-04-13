<?php

/**
 * Manager voor de verbinding met de MySQL database. Door het gebruik van
 * prepared statements is de SQL-functionaliteit beveiligd tegen SQL injection.
 */
class MySQLManager {

  private $page;

  /**
   * Maakt een nieuwe MySQLManager.
   *
   * @param PageCreator $page de PageCreator waaruit de config gehaald kan
   * worden
   */
  function __construct($page) {
    $this->page = $page;
  }

  private $connection;
  private $pageSQL;
  private $testsSQL;

  /**
   * Geeft de MySQL-verbinding.
   *
   * @return mysqli de verbinding die gebruikt kan worden voor queries
   */
  function getConnection() {
    if (!isset($this->connection)) {
      $this->connect();
    }
    return $this->connection;
  }

  /**
   * Sluit de MySQL verbinding (als die bestaat).
   */
  function closeConnection() {
    if(isset($this->connection)) {
      $this->connection->close();
    }
  }

  /**
   * Verbindt met de MySQL server. De PageCreator class moet al in de globale
   * variabele $page_creator staan, zodat de MySQL verbindingsgegevens gevonden
   * kunnen worden.
   *
   * @throws Exception als het verbinden is mislukt
   */
  function connect() {
    $config = $this->page->getConfig()['mysql'];
    $connection = new \mysqli(
                $config['host'], $config['username'],
                $config['password'], $config['database'],
                $config['port']);
    if ($connection->connect_error) {
      throw new \Exception("Verbinden met de database is mislukt.");
    } else {
      $this->connection = $connection;
    }
  }

  /**
   * Voert een query uit waarmee bepaalde waarden worden opgevraagd uit de MySQL
   * database.
   *
   * @param string $query de query die moet worden uitgevoerd, met evt.
   * vraagtekens op de plaatsen van data
   * @param string $param_types optioneel: een string met de types van de
   * parameters voor de query. Verplicht als $params ook opgegeven is. Voor
   * parameter types, check
   * https://secure.php.net/manual/en/mysqli-stmt.bind-param.php bij 'types'
   * @param array $params optioneel: een met parameters voor in
   * de query.
   * @return array een array met daarin de geproduceerde rows als arrays
   */
  function getterQuery($query, $param_types, $params) {

    // Voer de query uit
    $statement = $this->executeQuery($query, $param_types, $params);

    $results = $statement->get_result();
    $statement->close();
    $rows = [];
    while ($row = $results->fetch_assoc()) {
      array_push($rows, $row);
    }
    //echo $rows[0]['vraag1'];

    return $rows;
  }

  /**
   * Voert een query uit waarmee gegeven waarden in de database worden gezet.
   * Deze functie voorkomt SQL injectie doordat de parameters apart worden
   * opgegeven.
   *
   * @param string $query de query die moet worden uitgevoerd, met evt.
   * vraagtekens op de plaatsen van data
   * @param string $param_types een string met de types van de parameters voor
   * de query. Voor parameter types, check
   * https://secure.php.net/manual/en/mysqli-stmt.bind-param.php bij 'types'
   * @param array $params een met parameters voor in de query.
   */
  function setterQuery($query, $param_types, $params) {
    $statement = $this->executeQuery($query, $param_types, $params);
    if ($statement !== false) {
      $statement->close();
    }
  }

  /**
   * Alleen voor intern gebruik. Gebruik liever getterQuery() en setterQuery().
   * Vergeet niet de statement te sluiten met $statement->close() na gebruik, om
   * memory leaks te voorkomen.
   *
   * @param string $query de query die moet worden uitgevoerd
   * @param string $param_types de types van de parameters in $params
   * @param array $params de optionele parameters voor een prepared statement
   * @return mysqli_stmt de reeds uitgevoerde statement, waar eventueel
   * resultaten uit gehaald kunnen worden; of false, als de query is mislukt
   */
  private function executeQuery($query, $param_types, $params) {
    $statement = $this->getConnection()->stmt_init();
    if ($statement->prepare($query)) {
      if ($param_types != null && $param_types != '') {
        // We willen $statement->bind_param() aanroepen met een dynamisch aantal
        // parameters. Doe dat met call_user_func_array. bind_param() accepteert
        // alleen referenced values. Maak dus eerst die array ($refs).
        $refs = array();
          foreach ($params as $key => $value)
        $refs[$key] = &$params[$key];
        call_user_func_array(array($statement, 'bind_param'), array_merge(array($param_types), $refs));
      }
      if (!$statement->execute()) {
        trigger_error('Error executing MySQL query: ' . $statement->error);
      }
    } else {
      trigger_error('Error preparing MySQL statement: ' . $statement->error);
    }
    return $statement;
  }

  /**
   * Geeft de PageSQL die gebruikt kan worden om contents van pagina's uit MySQL op te vragen.
   */
  function getPageSQL() {
    if (!isset($this->pageSQL)) {
      require_once 'PageSQL.php';
      $this->pageSQL = new PageSQL($this);
    }
    return $this->pageSQL;
  }

  /**
   * Geeft de TestsSQL die gebruikt kan worden om resultaten van stresstests uit MySQL op te vragen.
   */
  function getTestsSQL() {
    if (!isset($this->testsSQL)) {
      require_once 'TestsSQL.php';
      $this->testsSQL = new TestsSQL($this);
    }
    return $this->testsSQL;
  }

}
