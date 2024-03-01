<?php

    class Database {

        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "games2";

        public function cennectDatabase() {

            $this->conn = new mysqli($serverName, $userName, $password, $dbName);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

        }
    }

    public function getData() {

        $sql = "SELECT * FROM library";
        $result = $this->conn->query($sql);


        return $result;
    }
?>