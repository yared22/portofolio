<?php

include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['phone'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $sql = "INSERT INTO contact (email, phone) VALUES ('$email', '$phone')";
        if (mysqli_query($conn, $sql)) {
            echo "New contact added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: Email and phone fields are required.";
    }
}

$result = mysqli_query($conn, "SELECT * FROM contact");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Contacts</title>
</head>
<body>
<h1>Manage Contacts</h1>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <button type="submit">Add Contact</button>
</form>

<h2>Existing Contacts</h2>
<table>
    <tr>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td>
            <a href="edit_contact.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete_contact.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="admin.php">back to home</a>
</body>
</html>
