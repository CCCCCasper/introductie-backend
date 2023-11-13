<?php
require_once 'dbConnect.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Your update query
    $sql = "UPDATE gamelibrary SET title='', developer='', publisher='', releasedate='', description='' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "ID not provided";
}

$conn->close();
?>
