<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="edit-game.css">

    <title>Add Game</title>

    <?php

        require 'database.php';
        require 'game.php';
        require 'gameManager.php';

        $db = new Database();
        $gameManagers = new GameManager($db);
        $gameManager = new Game($db);

        if (isset($_POST['update'])) {
  
            $id = $_POST['id'];
            $title = $_POST['title'];
            $developer = $_POST['developer'];
            $publisher = $_POST['publisher'];
            $releasedate = $_POST['releasedate'];
            $description = $_POST['description'];
            $gameImage = $_FILES["afbeelding"]['name'];

            $gameManager->handleFormSubmission($_FILES['afbeelding']);

            $gameManager->update($id, $title, $developer, $publisher, $releasedate, $description, $gameImage);
        }


        if (isset($_POST['delete'])) {
    
            $id = $_POST['id'];
            $gameManager->delete($id);
        }

        if(isset($_GET['id'])) {

            $gameId = $_GET['id'];
            $game = $gameManagers->getGameById($gameId);

            $title = $game['title'];
            $developer = $game['developer'];
            $publisher = $game['publisher'];
            $releasedate = $game['releasedate'];
            $description = $game['description'];
            $gameImage = $game['gameimage'];
        }
    ?>
</head>
<body>
   
    <div id="menu">
        <a href="index.php"><div id class="library"><p>LIBRARY</p></div></a>
    </div>

    <div id="container">
        <div id class="info">
            <form method="POST" enctype="multipart/form-data">

                <label for="customFileInput" class="custom-file-input">
                <div id class="afbeelding"><input type="file" id="customFileInput" class="afbeelding" name="afbeelding" accept="image/*"></div>

                <div id="image-frame">
                    <div id class="picture"><img id="selected-image" src="uploads/<?php echo $gameImage; ?>" alt="upload file:"></div>
                </div>

                <script>
                    document.getElementById('customFileInput').addEventListener('change', function () {
                        const selectedImage = document.getElementById('selected-image');
                        const fileInput = this;

                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function (e) {
                        selectedImage.src = e.target.result;
                            };

                            reader.readAsDataURL(fileInput.files[0]);
                            }
                            });
                </script>

                    </label>

                        <div id class="sub-container">

                            <div id class="title"><input type='text' name='title' value='<?php echo $title; ?>'><br></div>

                            <div id class="developer"><input type='text' name='developer' value='<?php echo $developer; ?>'><br></div>

                            <div id class="publisher"><input type='text' name='publisher' value='<?php echo $publisher; ?>'><br></div>

                            <div id class="releasedate"><input type='date' name='releasedate' value='<?php echo $releasedate; ?>'><br></div>

                            <div id class="description"><input type='text' name='description' value='<?php echo $description; ?>'><br></div>

                            <div id class="description"><input type='text' name='id' style='display:none' value='<?php echo $gameId; ?>'>

                            <div id class="submit"><input type='submit' name='update' value='UPDATE'></div>

                            <div id class="submit"><input type='submit' name='delete' value='DELETE'></div>
                    
                        </div>
                </form>
            </div>
    </div>
    <?php

    ?>
</body>
</html>