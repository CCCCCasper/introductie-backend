<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="update.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


 

<?php
require_once 'dbConnect.php';      

// Check if the ID is set in the URL
if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $developer = $_POST['developer'];
    $publisher = $_POST['publisher'];
    $releasedate = $_POST['releasedate'];
    $description = $_POST['description'];
    $gameImage = $_FILES["afbeelding"]['name'];



    $sql = "UPDATE gamelibrary SET title='$title', developer='$developer', publisher='$publisher', releasedate='$releasedate', description='$description', gameimage='$gameImage' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: library.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    
    $sql = "DELETE FROM gamelibrary WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: library.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$conn->close();
?>
</html>