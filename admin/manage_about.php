<?php
include '../db/db.php';

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <h1 class="mt-4">Manage About</h1>
    <form method="POST" action="" class="w-50">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo isset($about['title']) ? $about['title'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Description" required><?php echo isset($about['description']) ? $about['description'] : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save About Information</button>
        <a href="edit_about.php?id=<?php echo isset($about['id']) ? $about['id'] : ''; ?>" class="btn btn-secondary">Edit</a>
    </form>
    <a href="admin.php" class="btn btn-link">Back to Home</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
