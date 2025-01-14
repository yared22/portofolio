<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yared's Portfolio</title>
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
            <li><a href="about.php">About</a></li>
            <li><a href="project.php">Project</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="hero">
        <div class="profile-pic">
            <img src="self.jpg" alt="Yared's Profile Picture">
        </div>
        <div class="intro">
            <h1>Yared</h1>
            <p>Welcome to my portfolio! I am a passionate web developer with expertise in creating visually appealing and user-friendly interfaces. With a strong foundation in HTML, CSS, and JavaScript, I strive to deliver seamless user experiences that engage and inspire. My commitment to staying updated with the latest trends and technologies allows me to craft responsive designs that work across various devices.</p>
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
