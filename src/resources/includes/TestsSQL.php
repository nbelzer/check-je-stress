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
   * Zet de resultaten van een zojuist ingevulde stresstest in de database.
   * Gebruikt de $_POST variabele.
   *
   * @param string $test de naam van de test, één lowercase woord
   * @param int $questions_number het aantal vragen dat deze test zou moeten
   * bevatten
   * @throws InvalidTestResultsException als er een fout zit in de
   * testresultaten
   */
  function processTestResults($test, $questions_number) {
    $this->storeResults($test, $this->validatePostResults($questions_number));
  }

  /**
   * Onderzoekt de correctheid van de resultaten van een door een gebruiker
   * ingevulde stresstest. Haalt de resultaten uit de $_POST array.
   *
   * @param int $questions_number het aantal vragen dat deze test zou moeten
   * bevatten
   * @throws InvalidTestResultsException als de test niet kan worden gevalideerd
   * @return array een array met de antwoorden op de vragen, op volgorde
   */
  private function validatePostResults($questions_number) {

    $results = [];

    /* Haal de antwoorden op de vragen uit $_POST en valideer ze. Als een van de
       vragen of antwoorden ongeldig is, negeer dat dan. */
    foreach ($_POST as $key => $value) {
      /* Check of $key begint met 'vraag'. */
      if (strpos($key, 'vraag') === 0) {
        /* Check of het stuk string dat achter 'vraag' komt, een getal is. */
        $question_number_str = substr($key, 5);
        if (is_numeric($question_number_str)) {
          /* Check of het vraagnummer niet meer is dan het maximum van deze
             test. */
          $question_number = intval($question_number_str);
          if ($question_number < $questions_number) {
            /* Check of $value een getal van 0 t/m 5 is */
            if (is_numeric($value)) {
              $answer = intval($value);
              if ($answer >= 0 && $answer <= 5) {
                $results[$question_number] = $answer;
              }
            }
          }
        }
      }
    }

    if (count($results) != $questions_number) {
      throw new InvalidTestResultsException('Niet alle vragen zijn ingevuld', 1);
    }

    return $results;
  }

  /**
   * Zet de resultaten van een stresstest in de database.
   *
   * @param string $test de naam van de gemaakte test
   * @param array $test_results een array met de antwoorden op de test op
   * volgorde van vragen
   */
  private function storeResults($test, $test_results) {
    $columns = 'ip, ';
    $values = '?, ';

    for ($i = 0; $i < count($test_results) - 1; $i++) {
      $columns .= "question$i, ";
      $values .= '?, ';
    }
    $columns .= 'question' . count($test_results) - 1;
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
 * $ex->getMessage() = "reden voor de exception"
 * $ex->getCode() = exception type nummer
 * Dit bericht moet niet gebruikt worden om aan de gebruiker te laten zien, maar
 * is voor debuggen. Catch de exception en geef bericht aan de gebruiker
 * afhankelijk van de error code.
 */
class InvalidTestResultsException extends Exception {
}
