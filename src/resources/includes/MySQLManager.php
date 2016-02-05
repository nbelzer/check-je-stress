<?php

/**
 * Manager voor de verbinding met de MySQL database.
 */
class MySQLManager {

    private $connection;

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
     * Verbindt met de MySQL server.
     *
     * @throws Exception als het verbinden is mislukt
     */
    function connect() {
        $connection = new \mysqli(
                $config['mysql']['host'], $config['mysql']['username'], $config['mysql']['password'], NULL, $config['mysql']['port']);
        if ($connection->connect_error) {
            throw new \Exception("Verbinden met de database is mislukt.");
        } else {
            $this->connection = $connection;
        }
    }

}
