<!-- 1 -->
<?php

require_once 'dbConnect.php';

if(isset($_POST['submit'])) {


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["afbeelding"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $title = $_POST['title'];
    $developer = $_POST['developer'];
    $publisher = $_POST['publisher'];
    $releasedate = $_POST['releasedate'];
    $description = $_POST['description'];
    $gameImage = $_FILES["afbeelding"]['name'];

    
    $sql = "INSERT INTO gamelibrary(title, developer, publisher, releasedate, description, gameimage)
    VALUES ('$title', '$developer', '$publisher', '$releasedate', '$description', '$gameImage')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: library.php");

}

?>