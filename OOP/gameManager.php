<?php

    class GameManager {

        private $dataArray = [];
        private $db;
        private $games = [];

        public function __construct ($db) {
            $this->db = $db;
        }

        public function getGameData() {

            $sql = "SELECT * FROM library";
            $result = $this->dn->conn->query($sql);

            while ($gameObject = $result->fetch_assoc()) {
                $game = new Game($gameObject);
                $this->games[] = $game;
            }
            return $this->gamels;
        }



    }








?>