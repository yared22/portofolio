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
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        nav {
            background-color: #333;
            padding: 1rem;
        }

        .nav-links {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            margin: 0 1rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
        }

        .nav-links a:hover {
            color: #4CAF50;
        }

        .hero {
            display: flex;
            align-items: center;
            padding: 2rem;
            background-color: #f4f4f4;
        }

        .profile-pic {
            width: 33%;
            margin-right: 2rem;
        }

        .profile-pic img {
            width: 100%;
            border-radius: 50%;
        }

        .intro {
            width: 66%;
        }

        .intro h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .intro p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }

        .social-links a {
            color: white;
            margin: 0 0.5rem;
            text-decoration: none;
        }

        .social-links a:hover {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <nav>
        <ul class="nav-links" id="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="project.php">Project</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="hero">
        <div class="profile-pic">
            <img src="<?php echo isset($index_content['picture_url']) ? $index_content['picture_url'] : 'default.jpg'; ?>" alt="<?php echo isset($index_content['name']) ? $index_content['name'] : 'Profile Picture'; ?>">
        </div>
        <div class="intro">
            <h1><?php echo isset($index_content['name']) ? $index_content['name'] : 'Yared'; ?></h1>
            <p><?php echo isset($index_content['paragraph']) ? $index_content['paragraph'] : 'Welcome to my portfolio!'; ?></p>
        </div>
    </div>

    <footer>
        <div class="social-links">
            <a href="https://linkedin.com/in/yared" target="_blank">LinkedIn</a>
            <a href="https://github.com/yared" target="_blank">GitHub</a>
            <a href="https://twitter.com/yared" target="_blank">Twitter</a>
        </div>
    </footer>
</body>
</html>
    