<?php
include 'includes/config.php';

$sql = "SELECT content FROM pages WHERE page_name='about'";
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
    <title>About Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
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
        .page-title {
            font-size: 3rem;
            margin-top: 1.5rem;
            text-align: center;
            font-weight: bold;
            animation: fadeInDown 1s;
        }
        .pagecontent {
            padding: 2rem 0;
        }
        .pageintro {
            margin-bottom: 2rem;
            animation: fadeInUp 1s;
        }
        .pageintro h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .pageintro p {
            font-size: 1.2rem;
        }
        .pagemedia img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            margin: 1rem 0;
            animation: fadeIn 1.5s;
        }
        .grid-list-items {
            margin-top: 2rem;
        }
        .list-items__item {
            margin-bottom: 1.5rem;
            animation: fadeIn 1s;
        }
        .footer {
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
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
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
                    <img src="assets/images/fotojahim.jpg" alt="Fachrurozi" class="img-fluid">
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="about.php">About Me</a>
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
    <section class="s-pageheader pageheader">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="page-title">H A L L O</h1>
            </div>
        </div>
    </section>
    <section class="s-pagecontent pagecontent">
        <div class="row pageintro">
            <div class="col-xl-6 col-lg-12">
                <h2 class="text-display-title">F A C H R U R O Z I</h2>
            </div>
            <div class="col-xl-6 col-lg-12 text-right">
                <p class="lead justify">
                    Seorang mahasiswa biasa yang berusaha menjadi orang yang berguna untuk dirinya dan orang sekitarnya.
                </p>
            </div>
        </div>

        <div class="row pagemedia">
            <div class="col-xl-12">
                <figure class="page-media">                                
                    <img src="assets/images/fotoinformal.jpg" 
                         srcset="assets/images/fotoinformal.jpg 2400w, 
                                 assets/images/fotoinformal2.jpg 1200w, 
                                 assets/images/fotoinformal3.jpg 600w" sizes="(max-width: 2400px) 100vw, 2400px" alt="">
                </figure>
            </div>
        </div>

        <div class="row width-narrower pagemain">
            <div class="col-xl-12 justify">
                <h2>How I Got Here</h2>
                <p>
                    Tumbuh besar di Medan, rasa ingin tahu saya tentang cara kerja segala sesuatu, 
                    terutama teknologi, selalu menjadi teman setia. Mulai dari membongkar dan merakit 
                    kembali perangkat, hingga menjelajahi dunia maya yang luas, saya selalu bersemangat 
                    untuk memahami mekanisme yang mendasari dunia digital kita. Kecintaan ini secara alami 
                    membawa saya untuk mengejar gelar di bidang Teknik Komputer di Telkom University. 
                    Perjalanan saya penuh dengan momen penemuan dan tantangan yang menguji ketahanan saya.
                    Setiap proyek, tugas, dan aktivitas ekstrakurikuler telah mengasah keterampilan saya 
                    dan memperdalam apresiasi saya terhadap kompleksitas teknologi. Sebagai mahasiswa semester 
                    tujuh, saya merasa semakin siap untuk menghadapi tantangan di masa depan dan berkontribusi 
                    dalam perkembangan teknologi informasi.
                </p>

                <h2 class="u-add-bottom">Prinsip & Keyakinan</h2>
                <div class="grid-list-items list-items">
                    <div class="grid-list-items__item list-items__item u-remove-bottom">
                        <div class="list-items__item-header">
                            <h6 class="list-items__item-small-title justify">Prinsip</h6>
                        </div>
                        <p>
                            Dalam menjalani kehidupan dan perjalanan akademis saya, ada beberapa prinsip 
                            yang saya pegang teguh dan menjadi panduan dalam setiap langkah yang saya ambil. 
                            Pertama, kerja keras dan dedikasi adalah kunci utama dalam mencapai kesuksesan. 
                            Saya selalu berusaha memberikan yang terbaik dalam setiap tugas dan tanggung jawab 
                            yang saya emban. Kedua, integritas dan kejujuran sangat penting bagi saya. Saya 
                            yakin bahwa kesuksesan yang dicapai dengan cara yang jujur dan benar akan 
                            memberikan kepuasan yang lebih besar dan bertahan lama. Kerja tim dan kolaborasi juga merupakan 
                            prinsip penting, karena dengan bekerja sama, kita dapat mencapai hasil yang lebih 
                            besar. Terakhir, menghargai waktu adalah kunci untuk mencapai produktivitas yang 
                            tinggi dan keseimbangan antara kehidupan akademis, hobi, dan waktu bersama keluarga 
                            serta teman-teman.
                        </p>
                    </div>
                    <div class="grid-list-items__item list-items__item u-remove-bottom">
                        <div class="list-items__item-header">
                            <h6 class="list-items__item-small-title justify">Keyakinan</h6>
                        </div>
                        <p> 
                            Saya percaya bahwa niat baik adalah awal dari segala pencapaian yang positif. 
                            Dengan niat yang tulus dan tujuan yang baik, kita dapat menarik energi positif 
                            dan dukungan dari orang-orang di sekitar kita. Selain itu, saya yakin bahwa setiap 
                            individu memiliki potensi yang luar biasa. Dengan usaha yang tepat dan tekad yang
                            kuat, kita dapat mencapai hal-hal yang mungkin tidak pernah kita bayangkan 
                            sebelumnya. Menggali dan memaksimalkan potensi diri adalah salah satu tujuan 
                            utama saya dalam setiap langkah yang saya ambil. Terakhir, saya percaya bahwa 
                            keseimbangan antara pekerjaan, pendidikan, dan rekreasi adalah kunci untuk 
                            kehidupan yang bahagia dan sehat. Mengelola waktu dengan baik antara tanggung 
                            jawab akademis dan hobi seperti futsal, basket, billiard, dan bermain game membantu 
                            saya tetap aktif dan siap menghadapi berbagai tantangan.
                        </p>
                    </div>
                </div>

                <h2>Kalimat Favorit</h2>
                <p>
                    Terima semua tawaran, jangan pikirkan kamu sanggup atau tidak. COBA!!!
                </p>
            </div>
        </div>
    </section>
</section>

<footer class="footer">
    <div class="container">
        <div class="footer-icons">
            <a href="https://www.instagram.com/fachrurozi21/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://github.com/Fachrurozi20" target="_blank"><i class="fab fa-github"></i></a>
        </div>
        <p>&#169; 2024 - Made by Fachrurozi</p>
    </div>
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
