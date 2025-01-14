<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $paragraph = mysqli_real_escape_string($conn, $_POST['paragraph']);
    $picture_url = mysqli_real_escape_string($conn, $_POST['picture_url']);

    $sql = "INSERT INTO index_content (name, paragraph, picture_url) VALUES ('$name', '$paragraph', '$picture_url') ON DUPLICATE KEY UPDATE name='$name', paragraph='$paragraph', picture_url='$picture_url'";
    if (mysqli_query($conn, $sql)) {
        echo "Index content updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM index_content LIMIT 1");
$index_content = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Manage Index Content</h1>
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo isset($index_content['name']) ? $index_content['name'] : ''; ?>" required>

    <label for="paragraph">Paragraph:</label>
    <textarea name="paragraph" required><?php echo isset($index_content['paragraph']) ? $index_content['paragraph'] : ''; ?></textarea>

    <label for="picture_url">Picture URL:</label>
    <input type="text" name="picture_url" value="<?php echo isset($index_content['picture_url']) ? $index_content['picture_url'] : ''; ?>" required>

    <button type="submit">Save Changes</button>
</form>
<a href="admin.php">Back to Admin</a>
</body>
</html>
