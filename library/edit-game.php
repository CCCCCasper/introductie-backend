<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="edit-game.css">

    <title>Add Game</title>
</head>
<body>
   
    <div id="menu">
        <a href="library.php"><div id class="library"><p>LIBRARY</p></div></a>
    </div>

    <div id="container">
            <div id class="info">
                <form method="POST" action="./update.php" enctype="multipart/form-data">

                    <label for="customFileInput" class="custom-file-input">
                    <div id class="afbeelding"><input type="file" id="customFileInput" class="afbeelding" name="afbeelding" accept="image/*"></div>

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
                        <?php include 'selectdata.php'; ?>
                    </label>

                        <div id class="sub-container">
                            <div id class="title"><input type='text' name='title' placeholder='Title:'><br></div>

                            <div id class="developer"><input type='text' name='developer' placeholder='Developer:'><br></div>

                            <div id class="publisher"><input type='text' name='publisher' placeholder='Publisher:'><br></div>

                            <div id class="releasedate"><input type='date' name='releasedate'><br></div>

                            <div id class="description"><input type='text' name='description' placeholder='Description:'><br></div>

                            <div id class="description"><input type='text' style='display:none;' name='id' value='<?php echo $_GET['id']; ?>'>

                            <div id class="submit"><input type='submit' name='update' value='UPDATE'></div>

                            <div id class="submit"><input type='submit' name='delete' value='DELETE'></div>
                    
                        </div>
                </form>
            </div>
    </div>

</body>
</html>