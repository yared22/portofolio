<?php
include '../db/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing service
    $result = mysqli_query($conn, "SELECT * FROM services WHERE id = $id");
    $service = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $header = mysqli_real_escape_string($conn, $_POST['header']);
        $paragraph = mysqli_real_escape_string($conn, $_POST['paragraph']);
        $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);

        $sql = "UPDATE services SET header='$header', paragraph='$paragraph', image_url='$image_url' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "Service updated successfully.";
            header("Location: manage_services.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "No service ID specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Edit Service</h1>
    <form method="POST" action="" class="mb-4">
        <div class="form-group">
            <label for="header">Header:</label>
            <input type="text" class="form-control" name="header" placeholder="Service Header" value="<?php echo isset($service['header']) ? $service['header'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="paragraph">Paragraph:</label>
            <textarea class="form-control" name="paragraph" placeholder="Service Description" required><?php echo isset($service['paragraph']) ? $service['paragraph'] : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="text" class="form-control" name="image_url" placeholder="Image URL" value="<?php echo isset($service['image_url']) ? $service['image_url'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
    <a href="manage_services.php" class="btn btn-link">Back to Manage Services</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
