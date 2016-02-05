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
      $this->$mySQLManager = $mySQLManager;
    }

}
