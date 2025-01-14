<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $image_url = $_POST['image_url'];
    $sql = "INSERT INTO projects (title, description, image_url) VALUES ('$title', '$description', '$image_url')";
    if (mysqli_query($conn, $sql)) {
        echo "New project added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


$result = mysqli_query($conn, "SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
</head>
<body>
<h1>Manage Projects</h1>
<form method="POST" action="">
    <input type="text" name="title" placeholder="Project Title" required>
    <textarea name="description" placeholder="Project Description" required></textarea>
    <input type="text" name="image_url" placeholder="Image URL" required>
    <button type="submit">Add Project</button>
    </form>

    <h2>Existing Projects</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <a href="edit_project.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_project.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="admin.php">back to home</a>
</body>
</html>
