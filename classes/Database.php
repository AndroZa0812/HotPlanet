<?php

class Database
{
    private $pdo;
    public $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DB ;
        try {
            $this->pdo = new PDO($dsn, USER, PASS);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function con() {
        return $this->pdo;
    }

    public function prepare($query, Array $driverOptions = []) {
        $this->stmt = $this->pdo->prepare($query, $driverOptions);
    }
}