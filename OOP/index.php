<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>GameLibrary</title>
</head>
<body>

    <div id="menu">
        <a href="add-game.php"><div id class="toevoegen"><p>ADD GAME</p></div></a>
    </div>

    <div id="container">

        <?php

            require 'database.php';
            require 'game.php';
            require 'gameManager.php';



            // DATABASE KLASSE
            $db = new Database();
            // GAMEMANAGER KLASSE
            $gameManager = new GameManager($db);

            $resultArray = $gameManager->getAllGames();

            forEach($resultArray as $game) {

                echo "<a href='edit-game.php?id=".$game['id']."'><div id class='games'><img class='game-image' src='uploads/".$game['gameimage']."'></div></a>";
                
            }

        ?>

    </div>

</body>
</html>