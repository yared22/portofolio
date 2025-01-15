<?php

include '../db/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contact WHERE id = $id"; 
    if (mysqli_query($conn, $sql)) {
        echo "Contact deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: manage_contact.php");
    exit();
} else {
    echo "No contact ID specified.";
}
