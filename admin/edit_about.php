<?php
include '../db/db.php';

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Edit About</h1>
    <form method="POST" action="" class="mb-4">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo isset($about['title']) ? $about['title'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Description" required><?php echo isset($about['description']) ? $about['description'] : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update About Information</button>
    </form>
    <a href="manage_about.php" class="btn btn-link">Back to Manage About</a>
</div>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
