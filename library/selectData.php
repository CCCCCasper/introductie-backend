<head>
    <link rel="stylesheet" type="text/css" href="selectData.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Image</title>
</head>
<body>

<?php
// Your database connection logic here
require_once 'dbConnect.php';

$sql = "SELECT id, title, developer, publisher, releasedate, description FROM gamelibrary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<img src='uploads/" . $row['gameimage'] . "' alt='Interactive Image' class='interactive-image' onclick='showDetails(" . $row['id'] . ")'>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>

<div id="detailsContainer">
    <!-- Display details here -->
</div>

<script>
    function showDetails(id) {
        // Redirect to the update page with the selected ID
        window.location.href = "update.php?id=" + id;
    }
</script>

</body>
</html>