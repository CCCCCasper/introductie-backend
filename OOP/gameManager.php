<?php

class GameManager {

    private $db;
    private $title;
    private $developer;
    private $releasedate;
    private $description;
    private $gameImage;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllGames() {
        $sql = "SELECT * FROM gamelibrary";
        $result = $this->db->conn->query($sql);

        if ($result->num_rows > 0) {
            $games = array();
            while($row = $result->fetch_assoc()) {
                $games[] = $row;
            }
            return $games;
        } else {
            return array();
        }
    }

    public function getGameById($id) {
        $sql = "SELECT * FROM gamelibrary WHERE id = $id";
        $result = $this->db->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function uploadImage($image) {
            $target_dir = "./uploads/";
            $target_file = $target_dir . basename($image["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            $check = getimagesize($image["tmp_name"]);
            if($check !== false) {
          
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
 
            // Check file size
            if ($image["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
        
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                   
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function addNewGame($title, $developer, $publisher, $releasedate, $description, $gameImage) {

        $sql = "INSERT INTO gamelibrary (title, developer, publisher, releasedate, description, gameimage)
                VALUES ('$title', '$developer', '$publisher', '$releasedate', '$description', '$gameImage')";
        if($this->db->conn->query($sql)) {
            header("Location: index.php");
        } else {
            echo "ERROR";
        }
    }

    

    // Other methods for interacting with game data
}

?>
