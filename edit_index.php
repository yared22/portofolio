<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing index content
    $result = mysqli_query($conn, "SELECT * FROM index_content WHERE id = $id");
    $index_content = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $paragraph = mysqli_real_escape_string($conn, $_POST['paragraph']);
        $picture_url = mysqli_real_escape_string($conn, $_POST['picture_url']);

        $sql = "UPDATE index_content SET name='$name', paragraph='$paragraph', picture_url='$picture_url' WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "Index content updated successfully.";
            header("Location: manage_index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "No index entry ID specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Edit Index Content</h1>
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo isset($index_content['name']) ? $index_content['name'] : ''; ?>" required>

    <label for="paragraph">Paragraph:</label>
    <textarea name="paragraph" required><?php echo isset($index_content['paragraph']) ? $index_content['paragraph'] : ''; ?></textarea>

    <label for="picture_url">Picture URL:</label>
    <input type="text" name="picture_url" value="<?php echo isset($index_content['picture_url']) ? $index_content['picture_url'] : ''; ?>" required>

    <button type="submit">Update Index Content</button>
</form>
<a href="manage_index.php">Back to Manage Index</a>
</body>
</html>
