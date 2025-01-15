<?php
include '../db/db.php';

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
        header("Location: manage_projects.php");
        exit();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Edit Project</h1>
    <form method="POST" action="" class="mb-4">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Project Title" value="<?php echo $project['title']; ?>" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Project Description" required><?php echo $project['description']; ?></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="image_url" placeholder="Image URL" value="<?php echo $project['image_url']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
    <a href="manage_projects.php" class="btn btn-link">Back to Manage Projects</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
