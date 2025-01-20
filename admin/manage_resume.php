<?php
include '../db/db.php'; // Corrected path

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = $_FILES['pdf_file']['name'];
    $image_url = $_FILES['image_file']['name'];
    $file_path = 'uploads/' . basename($file_name); // Corrected path

    // Move uploaded files to the desired directory
    if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], 'uploads/' . $file_name) && 
        move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/' . basename($image_url))) {
        
        // Insert into database
        $sql = "INSERT INTO resumes (file_name, image_url, file_path, upload_date) VALUES ('$file_name', '$image_url', '$file_path', NOW())";
        mysqli_query($conn, $sql);
    } else {
        echo "Error uploading files: " . $_FILES['pdf_file']['error'] . " " . $_FILES['image_file']['error'];
    }
}

$result = mysqli_query($conn, "SELECT * FROM resumes");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Resumes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <h1 class="mt-4">Manage Resumes</h1>

    <form method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="form-group">
            <label for="image_file">Upload Image:</label>
            <input type="file" class="form-control" name="image_file" required>
        </div>
        <div class="form-group">
            <label for="pdf_file">Upload PDF:</label>
            <input type="file" class="form-control" name="pdf_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Resume</button>
    </form>

    <h2 class="mt-4">Existing Resumes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>PDF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><img src="admin/uploads/<?php echo $row['image_url']; ?>" alt="Resume Image" width="90" class="img-fluid"></td>
                <td><a href="<?php echo $row['file_path']; ?>" target="_blank">View PDF</a></td>
                <td>
                    <a href="delete_resume.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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
