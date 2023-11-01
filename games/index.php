<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <input type='text' name='title' required>
    <input type='text' name='developer' required>
    <input type='text' name='uitgever' required>
    <input type='date' name='jaar eerste uitgever' required>

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

      $title = $_POST['title'];
      $developer = $_POST['developer'];
      $uitgever= $_POST['uitgever'];
      $jaar_eerste_uitgever['jaar eerste uitgever']




      $sql = "INSERT INTO games (title, developer, uitgever, jaar eerste uitgever)
    VALUES ('$title', '$developer', '$uitgever', '$jaar_eerste_uitgever')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $sql = "SELECT * FROM games";
    $result = $conn->query($sql);

    echo "<table>";

      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc())

          echo "<tr>";

            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['developer'] . "</td>";
            echo "<td>" . $row['uitgever'] . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($row['jaar eerste uitgever'])) . "</td>";

          echo "</tr>";


        }


   $conn->close();

   
  ?>
    
</body>
</html>
