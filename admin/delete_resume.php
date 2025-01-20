<?php
include '../db/db.php'; // Corrected path

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the resume details to get file paths
    $result = mysqli_query($conn, "SELECT * FROM resumes WHERE id = $id");
    $resume = mysqli_fetch_assoc($result);

    if ($resume) {
        // Delete the files from the server with error handling
        $image_path = 'admin/uploads/' . $resume['image_url'];
        $pdf_path = $resume['file_path'];

        if (file_exists($image_path)) {
            unlink($image_path);
        } else {
            echo "Image file not found.";
        }

        if (file_exists($pdf_path)) {
            unlink($pdf_path);
        } else {
            echo "PDF file not found.";
        }

        // Delete the record from the database
        $sql = "DELETE FROM resumes WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "Resume deleted successfully.";
        } else {
            echo "Error deleting resume: " . mysqli_error($conn);
        }
    } else {
        echo "Resume not found.";
    }
} else {
    echo "No ID provided.";
}
?>
<a href="manage_resume.php" class="btn btn-link">Back to Manage Resumes</a>
