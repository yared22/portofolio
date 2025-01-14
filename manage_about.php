<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO about (title, description) VALUES ('$title', '$description') ON DUPLICATE KEY UPDATE description='$description'";
    if (mysqli_query($conn, $sql)) {
        echo "About information saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


$result = mysqli_query($conn, "SELECT * FROM about LIMIT 1");
$about = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage About</title>
</head>
<body>
<h1>Manage About</h1>
<form method="POST" action="">
    <input type="text" name="title" placeholder="Title" value="<?php echo isset($about['title']) ? $about['title'] : ''; ?>" required>
    <textarea name="description" placeholder="Description" required><?php echo isset($about['description']) ? $about['description'] : ''; ?></textarea>
    <button type="submit">Save About Information</button>
    <a href="edit_about.php?id=<?php echo isset($about['id']) ? $about['id'] : ''; ?>">Edit</a>
</form>
<a href="admin.php">back to home</a>
</body>
</html>
