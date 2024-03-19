<?php

class Game {

    private $conn;
    private $title;
    private $developer;
    private $releasedate;
    private $description;
    private $gameImage;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function getAllGames() {
        $sql = "SELECT * FROM gamelibrary";
        $result = $this->conn->query($sql);

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

    public function handleFormSubmission() {
        if(isset($_POST['submit'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            $check = getimagesize($_FILES["afbeelding"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
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
            if ($_FILES["afbeelding"]["size"] > 5000000) {
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
                if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["afbeelding"]["name"])). " has been uploaded.";
        
                    // Insert form data into the database
                    $this->title = $_POST['title'];
                    $this->developer = $_POST['developer'];
                    $this->releasedate = $_POST['releasedate'];
                    $this->description = $_POST['description'];
                    $this->gameImage = $_FILES["afbeelding"]['name'];
        
                    // You might want to perform database insertion here
                    // Example: $this->insertGameData();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    // Other methods for interacting with game data
}

?>
