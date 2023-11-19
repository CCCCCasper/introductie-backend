
<!DOCTYPE html>
<html>
<body>

<?php

require_once 'dbConnect.php';

$id = $row["id"];

$sql = "SELECT id, title, developer, publisher, releasedate, description, gameimage FROM gamelibrary WHERE id=$id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["id"]. " " . $row["title"]. " " . $row["developer"]. " " . $row["publisher"]. " " . $row["releasedate"]. " " . $row["description"]. " " . $row["gameimage"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
