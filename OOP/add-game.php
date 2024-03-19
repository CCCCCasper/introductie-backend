<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="add-game.css">
    <title>Add Game</title>

    <?php
        require 'database.php';
        require 'game.php';
        require 'gameManager.php';

        $db = new Database();
        $gameManager = new GameManager($db);

        if(isset($_POST['submit'])) {

            $title = $_POST['title'];
            $developer = $_POST['developer'];
            $publisher = $_POST['publisher'];
            $releasedate = $_POST['releasedate'];
            $description = $_POST['description'];
            $gameImage = $_FILES['afbeelding'];

            $gameManager->addNewGame($title, $developer, $publisher, $releasedate, $description, $gameImage);
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
                <div id class="afbeelding"><input type="file" id="customFileInput" class="afbeelding" name="afbeelding" accept="image/*" required></div>

                <div id="image-frame">
                    <div id class="picture"><img id="selected-image" src="" alt="upload file:"></div>
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

                    <div id class="title"><input type='text' name='title' placeholder='Title:' required><br></div>

                    <div id class="developer"><input type='text' name='developer' placeholder='Devloper:' required><br></div>

                    <div id class="publisher"><input type='text' name='publisher' placeholder='Publisher:' required><br></div>

                    <div id class="releasedate"><input type='date' name='releasedate'><br></div>

                    <div id class="description"><input type='text' name='description' placeholder='Description:' required><br></div>

                    <div id class="submit"><input type='submit' name='submit' value='SUBMIT'></div>
                
            </form>
        </div>
    </div>



</body>
</html>
