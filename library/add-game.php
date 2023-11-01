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

            <input type="file" class="afbeelding" name="afbeelding">

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