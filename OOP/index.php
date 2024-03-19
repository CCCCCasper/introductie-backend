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

    <div id="container"></div>

    <?php

        require 'database.php';
        require 'game.php';
        require 'gameManager.php';

        spl_autoload_register(function ($class_name) {
        });

        // DATABASE KLASSE
        $db = new Database();
        $db->connectDatabase();

        // GAMEMANAGER KLASSE
        $gameManager = new GameManager();
        $dataArray = $gameManager->dataToArray($result);


        foreach ($dataArray as $gameData) {
            echo "<div class='game'>" . $gameObject->getTitle() . "</div>";
        }

    ?>

</body>
</html>