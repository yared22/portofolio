<?php
include '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $header = mysqli_real_escape_string($conn, $_POST['header']);
    $paragraph = mysqli_real_escape_string($conn, $_POST['paragraph']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO services (header, paragraph, image_url, created_at) VALUES ('$header', '$paragraph', '$image_url', '$created_at')";
    if (mysqli_query($conn, $sql)) {
        echo "Service added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$services_result = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Manage Services</h1>
    <form method="POST" action="" class="mb-4">
        <div class="form-group">
            <label for="header">Type:</label>
            <input type="text" class="form-control" name="header" placeholder="Service Type" required>
        </div>
        <div class="form-group">
            <label for="paragraph">Description:</label>
            <textarea class="form-control" name="paragraph" placeholder="Service Description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="text" class="form-control" name="image_url" placeholder="Image URL" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Service</button>
    </form>

    <h2 class="mt-4">Existing Services</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($service = mysqli_fetch_assoc($services_result)) { ?>
            <tr>
                <td><?php echo $service['header']; ?></td>
                <td><?php echo $service['paragraph']; ?></td>
                <td><img src="<?php echo $service['image_url']; ?>" alt="Service Image" width="90" class="img-fluid"></td>
                <td>
                    <a href="edit_services.php?id=<?php echo $service['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_services.php?id=<?php echo $service['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
