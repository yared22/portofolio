<?php
include '../db/db.php';

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <h1 class="mt-4">Manage Projects</h1>
    <form method="POST" action="" class="w-50">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Project Title" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Project Description" required></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="image_url" placeholder="Image URL" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Project</button>
    </form>

    <h2 class="mt-4">Existing Projects</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="edit_project.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_project.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="admin.php" class="btn btn-link">Back to Home</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
