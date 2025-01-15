<?php
include 'db/db.php';

// Fetch the index content from the database
$result = mysqli_query($conn, "SELECT * FROM index_content LIMIT 1");
$index_content = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($index_content['name']) ? $index_content['name'] : 'Portfolio'; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">My Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="project.php">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo isset($index_content['picture_url']) ? $index_content['picture_url'] : 'default.jpg'; ?>" alt="<?php echo isset($index_content['name']) ? $index_content['name'] : 'Profile Picture'; ?>" class="img-fluid rounded-circle" style="width: 250px;"> <!-- Increased size -->
        </div>
        <div class="col-md-6">
            <h1 style="font-size: 3rem;  margin-left: -300px;"><?php echo isset($index_content['name']) ? $index_content['name'] : 'Yared'; ?></h1> <!-- Increased size -->
            <p class="lead" style="margin-top: 5px; margin-left: -300px; font-size: 1.5rem;"><?php echo isset($index_content['paragraph']) ? $index_content['paragraph'] : 'Welcome to my portfolio!'; ?></p> <!-- Increased size -->
        </div>
    </div>
    <a href="index.php" class="btn btn-link">Back to Home</a>
</div>

<footer class="bg-light text-center text-lg-start mt-2">
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h5 class="text-uppercase">Follow Us</h5>
                <ul class="list-unstyled d-flex">
                    <li class="mr-3">
                        <a href="https://facebook.com" class="text-dark">Facebook</a>
                    </li>
                    <li class="mr-3">
                        <a href="https://twitter.com" class="text-dark">Twitter</a>
                    </li>
                    <li class="mr-3">
                        <a href="https://instagram.com" class="text-dark">Instagram</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3">
        &copy; <?php echo date("Y"); ?> My Website
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
