<?php

    class Game {

            private $title;
            private $developer;
            private $releasedate;
            private $description;


            public function __construct($title, $developer, $releasedate, $description) {

                $this->title = $title;
                $this->developer = $developer;
                $this->releasedate = $releasedate;
                $this->description = $description;

            }


            public function setTitle($title) {
                $this->title = $title;
            }


            public function getTitle() {
                return $this->title;
            }
    }

?>