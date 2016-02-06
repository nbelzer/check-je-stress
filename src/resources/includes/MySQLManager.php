<?php

/**
 * Manager voor de verbinding met de MySQL database.
 */
class MySQLManager {

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
    global $page_creator;
    $config = $page_creator->config;
    $connection = new \mysqli(
                $config['mysql']['host'], $config['mysql']['username'],
                $config['mysql']['password'], $config['mysql']['database'],
                $config['mysql']['port']);
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
   * @param array $params optioneel: een associated array met parameters voor in
   * de query. Formaat is (parameter type) => (parameter). Voor parameter types,
   * check https://secure.php.net/manual/en/mysqli-stmt.bind-param.php bij
   * 'types'
   * @param array $result_names een array met namen voor de resultaten
   * @return array een associated array waarin de waardes van $results aan de
   * resultaten gekoppeld staan
   */
  function getterQuery($query, $params, $result_names) {

    // Voer de query uit
    $statement = $this->executeQuery($query, $params);

    // Maak een array van arrays voor de resultaten: één column returnt meerdere
    // values als er meerdere rows matchen in MySQL.
    $results = array();
    for ($i = 0; $i < $result_names.length; $i++) {
      $results[$i] = array();
    }

    // Elke keer als fetch() aangeroepen wordt, wordt $results_row gevuld met
    // een nieuwe row. Voeg elke keer de column value toe aan de goede array uit
    // $results.
    $results_row = array($result_names.length - 1);
    $statement->bind_result($results_row);
    while ($statement->fetch()) {
      for ($i = 0; $i < $results_row.length; $i++) {
        array_push($results[$i], $results_row[$i]);
      }
    }
    $statement->close();

    // Zorg ervoor dat arrays met maar 1 entry geconverteerd worden naar die
    // waarde. Maak een associated array waarin telkens de naam van de result
    // column gekoppeld wordt aan de value. Die value is dus een array als er
    // meerdere rows zijn, of de plain value als het maar één row is.
    $results_assoc = array();
    for ($i = 0; $i < $results.length; $i++) {
      switch ($result.length) {
        case 0:
          $results_assoc[$result_names[$i]] = null;
          break;
        case 1:
          $results_assoc[$result_names[$i]] = $results[$i][0];
          break;
        default:
          $results_assoc[$result_names[$i]] = $results[$i];
          break;
      }
    }

    return $results_assoc;
  }

  /**
   * Voert een query uit waarmee gegeven waarden in de database worden gezet.
   * Deze functie voorkomt SQL injectie doordat de parameters apart worden
   * opgegeven.
   *
   * @param string $query de query die moet worden uitgevoerd, met evt.
   * vraagtekens op de plaatsen van data
   * @param array $params een associated array met parameters voor in de query.
   * Formaat is (parameter type) => (parameter). Voor parameter types, check
   * https://secure.php.net/manual/en/mysqli-stmt.bind-param.php bij 'types'
   */
  function setterQuery($query, $params) {
    $statement = $this->executeQuery($query, $params);
    $statement->close();
  }

  /**
   * Alleen voor intern gebruik. Gebruik liever getterQuery() en setterQuery().
   * Vergeet niet de statement te sluiten met $statement->close() na gebruik, om
   * memory leaks te voorkomen.
   *
   * @return mysqli_stmt de reeds uitgevoerde statement, waar eventueel
   * resultaten uit gehaald kunnen worden
   */
  function executeQuery($query, $params) {
    // Maak de query uit $query en $params
    $statement = $this->getConnection()->prepare($query);
    if (is_array($params)) {
      foreach ($params as $type => $param) {
        $statement->bind_param($type, $param);
      }
    }
    // Voer de query uit
    $statement->execute();

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
