<?php
include '../db/db.php';

// Check if user ID is provided
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    
    // Prepare and execute delete query
    $query = "DELETE FROM admins WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: manage_users.php?deleted=1");
        exit();
    } else {
        $error = "Error deleting user: " . mysqli_error($conn);
    }
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/admin/style.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Delete User</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="alert alert-warning">
        Are you sure you want to delete this user?
    </div>
    <form method="POST" action="">
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
        <a href="manage_users.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
