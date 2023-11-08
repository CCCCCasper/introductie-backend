<?php

    require_once 'dbConnect.php';

    $sql = "SELECT * FROM gamelibrary";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {

            
            echo "<div id class='games'><img class='game-image' src='uploads/".$row['gameimage']."'></div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();


?>