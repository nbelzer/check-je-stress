<?php

/**
 * Deze class regelt de SQL queries die te maken hebben met de resultaten van de
 * stresstests.
 */
class TestsSQL {

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
   * Zet de resultaten van een stresstest in de database.
   *
   * @param string $test de naam van de gemaakte test
   * @param array $test_results een array met de antwoorden op de test op
   * volgorde van vragen
   */
  function storeResults($test, $test_results) {
    $ip = ip2long($_SERVER['REMOTE_ADDR']);
    if (!$ip) {
      $columns = '';
      $values = '';
      $params = [];
      $param_types = '';
    } else {
      $columns = 'ip, ';
      $values = '?, ';
      $params = [ip2long($_SERVER['REMOTE_ADDR'])];
      $param_types = 'i';
    }

    for ($i = 0; $i < count($test_results) - 1; $i++) {
      $columns .= "question$i, ";
      $values .= '?, ';
    }
    $columns .= 'question' . strval(count($test_results) - 1);
    $values .= '?';

    foreach ($test_results as $answer) {
      array_push($params, $answer);
      $param_types .= 'i';
    }

    $sql = "INSERT INTO test_$test ($columns) VALUES ($values);";

    try {
      $this->mySQLManager->setterQuery($sql, $param_types, $params);
    } catch (\Exception $e) {
      /* Doe niets. De testresultaten kunnen niet worden opgeslagen in MySQL,
         maar de gebruiker kan nog steeds zijn resultaten zien. */
    }
  }

  /**
   * Zoekt de resultaten van een bepaalde test op.
   *
   * @param string $test de test waarvan de resultaten opgezocht moeten worden
   * @return array de resultaten van de test
   */
  function getResults($test) {
    $sql = "SELECT * FROM test_$test LIMIT 20;";
    try {
      return $this->mySQLManager->getterQuery($sql, null, null);
    } catch (\Exception $e) {
      return;
    }
  }

  /**
   * Geeft de gemiddelde resultaten van de vragen.
   *
   * @return array een array op volgorde van de vragen met de gemiddelde
   * antwoorden
   */
  function getAverageResults($test) {
    switch ($test) {
      case 'risicoanalyse':
      case 'snel':
        $number = 25;
        break;
      case 'uitgebreid':
        $number = 56;
        break;
    }
    $columns = 'AVG(question0)';
    for ($i=1; $i<$number; $i++) {
      $columns .= ", AVG(question$i)";
    }

    $sql = "SELECT $columns FROM test_$test;";
    try {
      return $this->mySQLManager->getterQuery($sql, null, null)[0];
    } catch (\Exception $e) {
      return;
    }
  }

}
