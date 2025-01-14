<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $result = mysqli_query($conn, "SELECT * FROM about WHERE id = $id");
    $about = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $sql = "UPDATE about SET title='$title', description='$description' WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "About information updated successfully.";
            header("Location: manage_about.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "No about entry ID specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About</title>
</head>
<body>
<h1>Edit About</h1>
<form method="POST" action="">
    <input type="text" name="title" placeholder="Title" value="<?php echo isset($about['title']) ? $about['title'] : ''; ?>" required>
    <textarea name="description" placeholder="Description" required><?php echo isset($about['description']) ? $about['description'] : ''; ?></textarea>
    <button type="submit">Update About Information</button>
</form>
<a href="manage_about.php">Back to Manage About</a>
</body>
</html>
