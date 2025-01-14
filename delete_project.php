<?php

include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = "DELETE FROM projects WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Project deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }


    header("Location: manage_projects.php");
    exit();
} else {
    echo "No project ID specified.";
}
?>
