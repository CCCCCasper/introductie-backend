<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <form method="POST">
    <input type='text' name='voornaam' required>
    <input type='text' name='achternaam' required>
    <input type='date' name='geboortedatum' required>

    <input type='submit' name='submit' value='submit'>
  </form>

  <?php


    $serverName = "localhost";
    $userName = "root";
    $password  = "";
    $dbName = "introductie-backend";

    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit]'])) {

      $voornaam = $_POST['voornaam'];
      $achternaam = $_POST['achternaam'];
      $geboortedatum = $_POST['geboortedatum'];

      echo $voornaam . " " . $achternaam . " " . $geboortedatum;


      $sql = "INSERT INTO personen (voornaam, achternaam, geboortedatum)
    VALUES ('$voornaam', '$achternaam', '$geboortedatum')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }


   $conn->close();

   
  ?>

  <form method="POST">
    <input type='submit' name='throw' value='throw'>
  </form>

    <?php include 'random.php' ?>
    
</body>
</html>