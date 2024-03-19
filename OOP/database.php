<?php

class Database {

    public $serverName = "localhost";
    public $userName = "root";
    public $password = "";
    public $dbName = "games2";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }

    public function getData() {

        $sql = "SELECT * FROM gamelibrary";
        $result = $this->conn->query($sql);
        return $result;
        
    }
}
?>
