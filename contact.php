<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'includes/config.php';
require 'vendor/autoload.php'; // Pastikan jalur ini benar

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$status = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Pengaturan server
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = '#####@gmail.com'; // Ganti dengan email SMTP Anda
        $mail->Password = '######'; // Ganti dengan kata sandi aplikasi Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Penerima
        $mail->setFrom($email, $name);
        $mail->addAddress('#####@gmail.com'); // Ganti dengan alamat email tujuan Anda

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Message';
        $mail->Body    = "Name: $name<br>Email: $email<br><br>Message:<br>$message";

        $mail->send();
        $status = 'Pesan telah berhasil dikirim.';
    } catch (Exception $e) {
        $status = "Pesan tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}";
    }
}

$sql = "SELECT content, address, phone, email FROM pages WHERE page_name='contact'";
$result = $conn->query($sql);
$content = '';
$address = '';
$phone = '';
$email = '';

if ($result->num_rows > 0) {
    $page = $result->fetch_assoc();
    $content = $page['content'];
    $address = $page['address'];
    $phone = $page['phone'];
    $email = $page['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
        .contact {
            margin-top: 100px;
            padding: 2rem 0;
        }
        .contact-left, .contact-right {
            padding: 2rem;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .contact-form button {
            padding: 0.75rem 1.5rem;
            border: none;
            background-color: #f0ad4e;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #e69500;
        }
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .contact-item-icon {
            font-size: 2rem;
            color: #f0ad4e;
            margin-right: 1rem;
        }
        .contact-item-detail h4 {
            margin-bottom: 0.5rem;
        }
        .contact-item-detail a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .contact-item-detail a:hover {
            color: #f0ad4e;
            text-decoration: underline;
        }
        .map {
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            margin-top: 2rem;
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
                    <a class="nav-link" href="projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="contact">
    <div class="contact main-container">
        <div class="row">
            <div class="col-md-6 contact-left">
                <form action="contact.php" method="POST" class="contact-form">
                    <div>
                        <input type="text" placeholder="Name" name="name" required>
                    </div>
                    <div>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                    </div>
                    <div>
                        <button class="btn-submit">Send Message</button>
                    </div>
                </form>
                <?php if ($status): ?>
                    <div class="alert alert-info mt-3">
                        <?= $status ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 contact-right">
                <div class="contact-item">
                    <div class="contact-item-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-item-detail">
                        <h4>Alamat</h4>
                        <p><?= $address ?></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-item-detail">
                        <h4>Nomor Handphone</h4>
                        <p><?= $phone ?></p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-item-detail">
                        <h4>Email</h4>
                        <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
                    </div>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.8285141636347!2d107.63939222349718!3d-6.972920243426971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c568303ccf%3A0x2f1a20608f9adf3d!2sJalan%20Terusan%20Buah%20Batu%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040257!5e0!3m2!1sen!2sid!4v1620825462894!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
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
