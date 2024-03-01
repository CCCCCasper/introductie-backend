<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        spl_autoload_register(function ($class_name) {
            include './classes/'. $class_name . '.php';
        });

        // DATABASE KLASSE
        $db = new Database();
        $db->connectDatabase();

        // GAMEMANAGER KLASSE
        $gameManager = new GameManager();
        $dataArray = $gameManager->dataToArray($result);


        foreach ($dataArray as $gameData) {
            echo "<div class='game'>".$gameObject->getTitle().
        }


    ?>

</body>
</html>