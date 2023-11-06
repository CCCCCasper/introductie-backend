<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="add-game.css">
    <title>Add Game</title>
</head>
<body>
   
    <div id="menu">
        <a href="library.php"><div id class="library"><p>LIBRARY</p></div></a>
    </div>

    <div id="container">
        <div id class="info"><form method="POST">

        <label for="customFileInput" class="custom-file-input">
            <div id class="afbeelding"><input type="file" id="customFileInput" class="afbeelding" name="afbeelding" accept="image/*" required></div>

            <div id="image-frame">
            <div id class="picture"><img id="selected-image" src="" alt=""></div>
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

            <label for='naam'>Naam: </label>
            <input type='text' name='naam' required><br>

            <label for='release'>Release: </label>
            <input type='date' name='release'><br>

            <input type='submit' name='submit' value='submit'>
        </div>
    </form>
    </div>

</body>
</html>