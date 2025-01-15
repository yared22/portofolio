<?php
include '../db/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM contact WHERE id = $id");
    $contact = mysqli_fetch_assoc($result);
    
    if (!$contact) {
        echo "Contact not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['phone'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $sql = "UPDATE contact SET email='$email', phone='$phone' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "Contact updated successfully.";
            header("Location: manage_contact.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: Email and phone fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <h1 class="mt-4">Edit Contact</h1>
    <form method="POST" action="" class="w-50">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($contact['email']) ? $contact['email'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo isset($contact['phone']) ? $contact['phone'] : ''; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
    <a href="manage_contact.php" class="btn btn-link">Back to Contacts</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
