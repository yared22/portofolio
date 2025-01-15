<?php

include 'db/db.php';


$result = mysqli_query($conn, "SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Display</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Projects</h1>

<h2>Existing Projects</h2>
<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
    </tr>
    <?php } ?>
</table>
<a href="index.php">back to home</a>
</body>
</html>
