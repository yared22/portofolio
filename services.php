<?php
include 'db/db.php';

$services_result = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
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
                <a class="nav-link" href="project.php">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resume.php">Resume</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Admin</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-2 d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
    <h1 class="mt-4">Available Services</h1>
    <div class="row">
        <?php while ($service = mysqli_fetch_assoc($services_result)) { ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="<?php echo $service['image_url']; ?>" alt="Service Image" class="card-img-top img-fluid" style="width: 100%; height: auto;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $service['header']; ?></h5>
                    <p class="card-text"><?php echo $service['paragraph']; ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
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
                        <a href="https://x.com" class="text-dark">X</a>
                    </li>
                    <li class="mr-3">
                        <a href="https://instagram.com/yarednegassi" class="text-dark">Instagram</a>
                    </li>
                    <li class="mr-3">
                        <a href="https://github.com/yared22" class="text-dark">GitHub</a>
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
