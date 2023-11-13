<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="library.css">

</head>
<body>

    <div id="menu">
        <a href="add-game.php"><div id class="toevoegen"><p>ADD GAME</p></div></a>
        <a href="edit-game.php"><div id class="edit"><p>EDIT GAME</p></div></a> 
    </div>

    <div id="container">
        <?php include 'selectImages.php'; ?>
        <?php include 'selectData.php'; ?>


    </div>

</body>
</html>