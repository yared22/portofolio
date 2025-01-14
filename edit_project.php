<?php

include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $result = mysqli_query($conn, "SELECT * FROM projects WHERE id = $id");
    $project = mysqli_fetch_assoc($result);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    
    $sql = "UPDATE projects SET title='$title', description='$description', image_url='$image_url' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Project updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
<h1>Edit Project</h1>
<form method="POST" action="">
    <input type="text" name="title" placeholder="Project Title" value="<?php echo $project['title']; ?>" required>
    <textarea name="description" placeholder="Project Description" required><?php echo $project['description']; ?></textarea>
    <input type="text" name="image_url" placeholder="Image URL" value="<?php echo $project['image_url']; ?>" required>
    <button type="submit">Update Project</button>
</form>
</body>
</html>
