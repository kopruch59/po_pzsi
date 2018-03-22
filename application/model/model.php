<?php

/**
 * This is the base model class. 
 * All other "normal" models should extend this class.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */
abstract class Model {

    /**
     * @var PDO Holds PDO object connected to database.
     */
    private $db = null;

    /**
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    public function __construct() {
        //Prepare database connection.
        $this->db = $this->setConnection();
    }

    /**
     * Getter for PDO database connection;
     * 
     * @return PDO|null Connection object or null if no connection.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    protected function getConnection() {

        return $this->db;
    }

    /**
     * Creates PDO object (connect to database).
     * 
     * @return PDO|null PDO object if successful connected to database or null otherwise.
     * 
     * @todo Exception handling.
     * 
     * @author theKindlyMallard <the.kindly.mallard@gmail.com>
     */
    private function setConnection() {
        try {
            $pdo = new PDO(
                    DB_TYPE . ':host:' . DB_HOST . ';dbname:' . DB_NAME, DB_USER, DB_PASS, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
            );
        } catch (PDOException $ex) {
            //Output exception message.
            echo $ex->getMessage();
            $pdo = null;
        }

        return $pdo;
    }

}
