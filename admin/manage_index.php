<?php
include '../db/db.php';

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Manage Index Content</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo isset($index_content['name']) ? $index_content['name'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="paragraph">Paragraph:</label>
            <textarea class="form-control" name="paragraph" required><?php echo isset($index_content['paragraph']) ? $index_content['paragraph'] : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="picture_url">Picture URL:</label>
            <input type="text" class="form-control" name="picture_url" value="<?php echo isset($index_content['picture_url']) ? $index_content['picture_url'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="edit_index.php?id=<?php echo isset($index_content['id']) ? $index_content['id'] : ''; ?>" class="btn btn-secondary">Edit</a>
    </form>
    <a href="admin.php" class="btn btn-link">Back to Admin</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
