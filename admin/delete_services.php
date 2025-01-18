<?php
include '../db/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $service_query = mysqli_query($conn, "SELECT * FROM services WHERE id = $id");
    $service = mysqli_fetch_assoc($service_query);

    if ($service) {
        $sql_delete = "DELETE FROM services WHERE id = $id";
        if (mysqli_query($conn, $sql_delete)) {
            unlink($service['image_url']);
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

header("Location: manage_services.php");
exit();
?>
