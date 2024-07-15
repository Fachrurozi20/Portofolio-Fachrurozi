<?php
include 'includes/config.php';

$sql = "SELECT content FROM pages WHERE page_name='index'";
$result = $conn->query($sql);
$content = '';
if ($result->num_rows > 0) {
    $page = $result->fetch_assoc();
    $content = $page['content'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        .hero-left h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #f0ad4e;
            animation: fadeInLeft 1s;
        }
        .hero-left p {
            font-size: 1.2rem;
            animation: fadeInLeft 1.5s;
        }
        .hero-right img {
            border-radius: 15px;
            animation: fadeInRight 1.5s;
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
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
<header>
    <div class="main-container">
        <div class="nav">
            <div class="logo">
                <a href="/">SELAMAT DATANG</a>
            </div>
        </div>
        <section id="hero" class="d-flex align-items-center">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="hero-left">
                    <h3 class="pre-title">Fachrurozi</h3>
                    <p>Saya adalah seorang mahasiswa di Telkom University dengan Jurusan Teknik Komputer angkatan 2021</p>
                </div>
                <div class="hero-right">
                    <img src="assets/images/FOTO.jpg" alt="Fachrurozi" class="img-fluid">
                </div>
            </div>
        </section>
    </div>
</header>

<nav class="navbar navbar-expand-lg fixed-top text-uppercase navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="index.php">F A C H R U R O Z I</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cv.php">CV</a>
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

<section id="content" class="s-content">
    <div class="container">
        <div class="dynamic-content" style="animation: fadeInUp 1s;">
            <?= $content ?>
        </div>
    </div>
</section>

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
