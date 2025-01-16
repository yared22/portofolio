<?php
include '../db/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the service to delete
    $service_query = mysqli_query($conn, "SELECT * FROM services WHERE id = $id");
    $service = mysqli_fetch_assoc($service_query);

    if ($service) {
        // Delete the service from the database
        $sql_delete = "DELETE FROM services WHERE id = $id";
        if (mysqli_query($conn, $sql_delete)) {
            // Optionally, delete the image file from the server
            unlink($service['image_url']); // Ensure the path is correct
            echo "Service deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Service not found.";
    }
} else {
    echo "No service ID specified.";
}

// Redirect to manage services page
header("Location: manage_services.php");
exit();
?>
