<?php

include 'db.php';


$result = mysqli_query($conn, "SELECT * FROM contact");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<h1>Contact me</h1>

<table>
    <tr>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
    </tr>
    <?php } ?>
</table>
<a href="index.php">back to home</a>
</body>
</html>
