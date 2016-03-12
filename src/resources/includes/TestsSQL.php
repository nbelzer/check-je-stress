<?php

/**
 * Deze class regelt de SQL queries die te maken hebben met de resultaten van de
 * stresstests.
 */
class TestsSQL {

  /**
   * Een array met telkens de naam van de test verbonden aan het aantal vragen.
   */
  static $possible_tests = [
    'snel' => 25,
    'uitgebreid' => 56,
    'risicoanalyse' => 25
  ];

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
   * Zet de resultaten van een zojuist ingevulde stresstest in de database.
   * Gebruikt de $_POST variabele.
   *
   * @throws InvalidTestResultsException als er een fout zit in de
   * testresultaten
   */
  function processTestResults() {
    $this->storeResults($this->validatePostResults());
  }

  /**
   * Onderzoekt de correctheid van de resultaten van een door een gebruiker
   * ingevulde stresstest. Haalt de resultaten uit de $_POST array.
   *
   * @throws InvalidTestResultsException als de test niet kan worden gevalideerd
   * @return array een array met de naam van de test op $arr['test'] en de
   * antwoorden op de vragen
   */
  private function validatePostResults() {
    $test = $_POST['test'];

    if (!array_key_exists($test, self::$possible_tests)) {
      /*
        Fout: gebruiker probeerde een niet-bestaande test op te sturen.
        Mogelijk een hack attempt, aangezien deze variabele gebruikt wordt voor
        MySQL. Het kan ook dat er gewoon een fout zit in de website of in
        iemands browser waardoor de variabele niet meegekomen is.
      */
      throw new InvalidTestResultsException("Test '$test' bestaat niet", 1);
    }

    $results = [];

    /* Haal de antwoorden op de vragen uit $_POST en valideer ze. Als een van de
       vragen of antwoorden ongeldig is, negeer dat dan. */
    foreach ($_POST as $key => $value) {
      /* Check of $key begint met 'vraag'. */
      if (strrpos($key, 'vraag', -strlen($key))) {
        /* Check of het stuk string dat achter 'vraag' komt, een getal is. */
        $question_number_str = substr($key, 5);
        if (is_numeric($question_number_str)) {
          /* Check of het vraagnummer niet meer is dan het maximum van deze
             test. */
          $question_number = intval($question_number_str);
          if ($question_number < self::$possible_tests[$test] - 1) {
            /* Check of $value een getal van 0 t/m 5 is */
            if (is_int($value) && $value >= 0 && $value <= 5) {
              $results[$question_number] = $value;
            }
          }
        }
      }
    }

    if (count($results) != self::$possible_tests[$test]) {
      throw new InvalidTestResultsException('Niet alle vragen zijn ingevuld', 2);
    }

    $results['test'] = $test;
    return $results;
  }

  /**
   * Zet de resultaten van een stresstest in de database.
   *
   * @param array $test_results een array met de antwoorden op de tests op
   * volgorde van vragen, en de naam van de test op key 'test'
   */
  private function storeResults($test_results) {
    $test = $test_results['test'];
    unset($test_results['test']);

    $columns = 'ip, ';
    $values = '?, ';

    for ($i = 0; $i < self::$possible_tests[$test] - 1; $i++) {
      $columns .= "vraag$i, ";
      $values .= '?, ';
    }
    $columns .= 'vraag' . self::$possible_tests[$test] - 1;
    $values .= '?';

    $params = [ip2long($_SERVER['REMOTE_ADDR'])];
    $param_types = 'i';

    foreach ($test_results as $answer) {
      array_push($params, $answer);
      $param_types .= 'i';
    }

    $sql = "INSERT INTO test_$test ($columns) VALUES ($values);";

    $this->mySQLManager->setterQuery($sql, $param_types, $params);
  }

}

/**
 * Thrown als ingestuurde testresultaten incorrect blijken te zijn. Properties
 * zijn net als bij Exception:
 * $ex->message = "reden voor de exception"
 * $ex->code = exception type nummer
 * Dit bericht moet niet gebruikt worden om aan de gebruiker te laten zien, maar
 * is voor debuggen. Catch de exception en geef bericht aan de gebruiker
 * afhankelijk van de error code.
 */
class InvalidTestResultsException extends Exception {
}
