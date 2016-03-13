<?php

/**
 * Manager voor de verbinding met de MySQL database. Door het gebruik van
 * prepared statements is de SQL-functionaliteit beveiligd tegen SQL injection.
 */
class MySQLManager {

  private $config;

  /**
   * Maakt een nieuwe MySQLManager.
   *
   * @param array $config de configuratie array die de authenticatie informatie
   * bevat
   */
  function __construct($config) {
    $this->config = $config;
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
    $connection = new \mysqli(
                $this->config['host'], $this->config['username'],
                $this->config['password'], $this->config['database'],
                $this->config['port']);
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
   * @param array $result_names een array met namen voor de resultaten
   * @return array een associated array waarin de waardes van $results aan de
   * resultaten gekoppeld staan
   */
  function getterQuery($query, $param_types, $params, $result_names) {

    // Voer de query uit
    $statement = $this->executeQuery($query, $param_types, $params);

    // Maak een array van arrays voor de resultaten: één column returnt meerdere
    // values als er meerdere rows matchen in MySQL.
    $results = array();
    for ($i = 0; $i < count($result_names); $i++) {
      $results[$i] = array();
    }

    // Elke keer als fetch() aangeroepen wordt, wordt $results_row gevuld met
    // een nieuwe row. Voeg elke keer de column value toe aan de goede array uit
    // $results.
    $results_row = array(count($result_names) - 1);
    $statement->bind_result($results_row);
    while ($statement->fetch()) {
      for ($i = 0; $i < count($results_row); $i++) {
        array_push($results[$i], $results_row[$i]);
      }
    }
    $statement->close();

    // Zorg ervoor dat arrays met maar 1 entry geconverteerd worden naar die
    // waarde. Maak een associated array waarin telkens de naam van de result
    // column gekoppeld wordt aan de value. Die value is dus een array als er
    // meerdere rows zijn, of de plain value als het maar één row is.
    $results_assoc = array();
    for ($i = 0; $i < count($results); $i++) {
      switch (count($result)) {
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
   * @param string $param_types een string met de types van de parameters voor
   * de query. Voor parameter types, check
   * https://secure.php.net/manual/en/mysqli-stmt.bind-param.php bij 'types'
   * @param array $params een met parameters voor in de query.
   */
  function setterQuery($query, $param_types, $params) {
    $statement = $this->executeQuery($query, $param_types, $params);
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
  private function executeQuery($query, $param_types, $params) {
    // Maak de query uit $query en $params
    $statement = $this->getConnection()->prepare($query);
    if (is_array($params)) {
      // We willen $statement->bind_param() aanroepen met een dynamisch aantal
      // parameters. Doe dat met call_user_func_array. bind_param() accepteert
      // alleen referenced values. Maak dus eerst die array ($refs).
      $refs = array();
      foreach ($params as $key => $value)
      $refs[$key] = &$params[$key];
      call_user_func_array(array($statement, 'bind_param'), array_merge(array($param_types), $refs));
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
