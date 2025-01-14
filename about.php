<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM about LIMIT 1");
$about = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1><?php echo isset($about['title']) ? $about['title'] : 'About Us'; ?></h1>
<p><?php echo isset($about['description']) ? $about['description'] : 'No description available.'; ?></p>
<a href="index.php">back to home</a>
</body>
</html>
