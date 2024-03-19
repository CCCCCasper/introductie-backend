<!-- 1 -->
<!DOCTYPE html>
<html>
<body>

<?php

require_once 'dbConnect.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, title, developer, publisher, releasedate, description, gameimage FROM gamelibrary WHERE id=$id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["title"]. " " . $row["developer"]. " " . $row["publisher"]. " " . $row["releasedate"]. " " . $row["description"]. " " . $row["gameimage"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
} else {
    echo "ID parameter is missing.";
}

?>

</body>
</html>
