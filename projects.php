<?php
include 'includes/config.php';

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
$projects = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .navbar {
            transition: background-color 0.5s ease;
        }
        .navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.9);
        }
        .nav-link {
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #f0ad4e !important;
        }
        .container {
            margin-top: 100px;
            padding: 2rem;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .projects-header {
            background-color: #f0ad4e;
            color: #fff;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 5px;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-weight: bold;
        }
        .card-body {
            padding: 15px;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .footer-icons a {
            color: #fff;
            margin: 0 0.5rem;
            font-size: 1.5rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .footer-icons a:hover {
            color: #f0ad4e;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top text-uppercase navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="index.php">F A C H R U R O Z I</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cv.php">CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="projects-header">Projects</h1>
    <div class="row">
        <?php foreach ($projects as $project): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="<?= $project['url'] ?>" target="_blank">
                        <img src="uploads/<?= $project['image'] ?>" class="card-img-top" alt="<?= $project['title'] ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $project['title'] ?></h5>
                        <p class="card-text"><?= $project['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <div class="footer-icons">
        <a href="https://www.instagram.com/fachrurozi21/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://github.com/Fachrurozi20" target="_blank"><i class="fab fa-github"></i></a>
    </div>
    <p>&#169; 2024 - Made by Fachrurozi</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.querySelector('.navbar-toggler');
        const mainContainer = document.querySelector('.main-container');
        const navbarNav = document.querySelector('.navbar-nav');
        const navbar = document.querySelector('.navbar');

        toggler.addEventListener('click', function() {
            mainContainer.classList.toggle('expanded');
            navbarNav.classList.toggle('show');
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>
</body>
</html>
