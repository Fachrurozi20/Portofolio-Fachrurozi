<?php
include 'includes/config.php';

$sql = "SELECT content, pdf_file FROM pages WHERE page_name='cv'";
$result = $conn->query($sql);
$content = '';
$pdfFile = '';
if ($result->num_rows > 0) {
    $page = $result->fetch_assoc();
    $content = $page['content'];
    $pdfFile = $page['pdf_file'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
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
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .cv-header {
            background-color: #f0ad4e;
            color: #fff;
            padding: 15px 30px;
            display: inline-block;
            border-radius: 5px;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .content {
            margin-bottom: 2rem;
        }
        .embed-container {
            position: relative;
            padding-bottom: 141.42%; /* Aspect ratio for A4 paper size */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .embed-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
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
                    <a class="nav-link active" href="cv.php">CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="cv-header">CV</h1>
    <div class="content">
        <?= $content ?>
    </div>
    <?php if ($pdfFile): ?>
        <div class="mt-4">
            <div class="embed-container">
                <embed src="uploads/<?= $pdfFile ?>" type="application/pdf">
            </div>
        </div>
    <?php else: ?>
        <p>No CV uploaded yet.</p>
    <?php endif; ?>
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
