<?php
$conn = new mysqli("localhost", "root", "", "website_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dan urutkan per divisi
$result = $conn->query("SELECT * FROM kabinet ORDER BY FIELD(divisi,'struktur inti','internal','eksternal','iptek','psdm','business development'), id");
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEBSITE HMPS MANAJEMEN INFORMATIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* === HERO BACKGROUND === */
        .hero {
            background-image: url('logo/baground.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.55);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            padding: 20px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.5rem;
        }

        /* Navbar */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 12px 20px;
        }

        .navbar-brand img {
            height: 70px;
            margin-right: 12px;
            transition: 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
        }

        .navbar-brand strong {
            font-size: 22px;
            color: #333;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333 !important;
            margin-left: 18px;
            font-size: 16px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff !important;
        }

        /* === DROPDOWN ON HOVER === */
        @media (min-width: 992px) {
            .navbar .dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }

            .dropdown-menu {
                animation: fadeIn 0.3s ease;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                height: 55px;
            }

            .navbar-brand strong {
                font-size: 18px;
            }
        }

        .custom-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        .video-container iframe {
            width: 100%;
            height: 315px;
            border: none;
        }

        /* === CARD MENU === */
        .menu-section {
            background: rgba(255, 255, 255, 0.85);
            padding: 60px 20px;
            text-align: center;
        }

        .menu-section h2 {
            font-weight: bold;
            margin-bottom: 40px;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .menu-card {
            width: 200px;
            background: white;
            border-radius: 20px;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .menu-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
            border-radius: 50%;
        }

        .menu-card p {
            font-weight: bold;
            margin-top: 10px;
            background: #f1f1f1;
            border-radius: 10px;
            padding: 5px 0;
        }

        .menu-card:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .hero {
                background-attachment: scroll;
                height: 100vh;
                background-size: cover;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .video-container iframe {
                height: 200px;
            }

            .menu-card {
                width: 150px;
                padding: 15px;
            }

            .menu-card img {
                width: 60px;
                height: 60px;
            }
        }

        section,
        .container {
            scroll-margin-top: 70px;
        }

        /* === SHARE BAR === */
        .share-bar {
            position: fixed;
            top: 50%;
            left: 8px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 10000;
            user-select: none;
        }

        .share-item {
            width: 48px;
            height: 48px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .25);
            transition: transform .2s;
        }

        .share-item:hover {
            transform: scale(1.1);
        }

        .ig {
            background: radial-gradient(circle at 30% 30%, #feda75, #d62976, #962fbf, #4f5bd5);
        }

        .tt {
            background: #000;
        }

        .yt {
            background: #FF0000;
        }

        .net {
            background: #0078d7;
        }

        .share-item svg {
            width: 24px;
            height: 24px;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <!-- === NAVBAR === -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbarTop">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="logo/LOGO_HIMPUNAN_PROGRAM_STUDI_MANAJEMEN_INFORMATIKA-removebg-preview.png" alt="Logo HMPS MI"
                    class="me-2">
                <span><b>HMPS MI</b></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><b>Beranda</b></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="visi_misi.php">Visi-Misi</a></li>
                            <li><a class="dropdown-item" href="struktur.php">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="kabinet.php ">Kabinet HMPS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galeri</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="foto.php">Kegiatan</a></li>
                            <li><a class="dropdown-item" href="berita.php">Berita</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="sejarah.php">Sejarah</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- === HERO === -->
    <section class="hero" id="home">
        <div class="hero-content" data-aos="fade-up">
            <h1>HIMPUNAN MAHASISWA PROGRAM STUDI MANAJEMEN INFORMATIKA POLMED</h1>
            <p>#BERKEMBANG BERSAMA MI MENJADI YANG TERBAIK</p>
        </div>
    </section>

    <!-- === SHARE BAR === -->
    <nav class="share-bar">
        <!-- Instagram -->
        <a class="share-item ig"
            href="https://www.instagram.com/mipolmed?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
            target="_blank" title="Instagram">
            <svg viewBox="0 0 24 24" fill="white">
                <path
                    d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9A5.5 5.5 0 0 1 16.5 22h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2zm0 2A3.5 3.5 0 0 0 4 7.5v9A3.5 3.5 0 0 0 7.5 20h9a3.5 3.5 0 0 0 3.5-3.5v-9A3.5 3.5 0 0 0 16.5 4h-9zm4.5 3.5a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm4.75-3.75a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
        </a>
        <!-- TikTok -->
        <a class="share-item tt" href="https://www.tiktok.com/@mipolmed?is_from_webapp=1&sender_device=pc" target="_blank"
            title="TikTok">
            <svg viewBox="0 0 24 24" fill="white">
                <path d="M12 2h3a5 5 0 0 0 5 5v3a8 8 0 0 1-5-1.7V17a5 5 0 1 1-5-5v3a2 2 0 1 0 2 2V2z" />
            </svg>
        </a>
        <!-- YouTube -->
        <a class="share-item yt" href="https://www.youtube.com/@mipolmed" target="_blank" title="YouTube">
            <svg viewBox="0 0 24 24" fill="white">
                <path
                    d="M21.8 8s-.2-1.4-.8-2a3 3 0 0 0-2.1-.9C16.7 5 12 5 12 5s-4.7 0-6.9.1a3 3 0 0 0-2.1.9c-.6.6-.8 2-.8 2S2 9.6 2 11.2v1.6c0 1.6.2 3.2.2 3.2s.2 1.4.8 2a3 3 0 0 0 2.1.9c2.2.2 6.9.2 6.9.2s4.7 0 6.9-.1a3 3 0 0 0 2.1-.9c.6-.6.8-2 .8-2s.2-1.6.2-3.2v-1.6c0-1.6-.2-3.2-.2-3.2zM10 14.7V9.3l4.8 2.7-4.8 2.7z" />
            </svg>
        </a>

        <!-- Internet -->
        <a class="share-item net" href="https://polmed.ac.id/" target="_blank" title="Internet">
            <svg viewBox="0 0 24 24" fill="white">
                <path
                    d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm0 2c1.5 0 2.9.4 4.1 1H7.9A8 8 0 0 1 12 4zm-6.9 3h13.8a8.1 8.1 0 0 1 0 10H5.1a8.1 8.1 0 0 1 0-10zM12 20a8 8 0 0 1-4.1-1h8.2A8 8 0 0 1 12 20z" />
            </svg>
        </a>
    </nav>

    <!-- === KONTEN FOTO SELAMAT DATANG === -->
    <div class="container mt-5 pt-5" data-aos="fade-right">
        <div class="row align-items-center">
            <!-- FOTO KIRI -->
            <div class="col-md-5 mb-3 d-flex justify-content-center" data-aos="zoom-in">
                <img src="logo/unggul.jpg" alt="Foto HMPS MI"
                    class="img-fluid rounded shadow-sm"
                    style="max-width: 400px; height: auto;">
            </div>

            <!-- TEKS KANAN -->
            <div class="col-md-7" data-aos="fade-left">
                <p class="mb-1">
                    <b><span style="color:#0078d7;">SELAMAT DATANG DI PORTAL RESMI HMPS MI POLMED</span></b>
                </p>
                <h2 class="fw-bold mb-3">MANAJEMEN INFORMATIKA</h2>
                <p class="text-secondary">
                    Merupakan sarana bagi mahasiswa dan mahasiswi Program Studi Manajemen Informatika untuk bersatu,
                    berkolaborasi, serta menggelar berbagai kegiatan yang mencakup aspek akademis maupun non-akademis.
                </p>
            </div>
        </div>
    </div>


    <!-- === MENU === -->
    <section class="menu-section" data-aos="fade-up">
        <h2>STRUKTUR HIMPUNAN MAHASISWA PRODI MANAJEMEN INFORMATIKA</h2>
        <div class="menu-container">
            <a href="kabinet.php#opsi1" class="menu-card" data-aos="zoom-in">
                <img src="logo/LOGO KABINET UTAMA.png" alt="kabinet Evolutionnaire">
                <p>STRUKTUR INTI</p>
            </a>
            <a href="kabinet.php#opsi2" class="menu-card" data-aos="zoom-in" data-aos-delay="100">
                <img src="logo/DIVISI EKSTERNAL.png" alt="divisi eksternal">
                <p>DIVISI EKSTERNAL</p>
            </a>
            <a href="kabinet.php#opsi3" class="menu-card" data-aos="zoom-in" data-aos-delay="200">
                <img src="logo/DIVISI INTERNAL.png" alt="divisi internal">
                <p>DIVISI INTERNAL</p>
            </a>
            <div class="menu-container">
                <a href="kabinet.php#opsi4" class="menu-card" data-aos="zoom-in" data-aos-delay="300">
                    <img src="logo/DIVISI IPTEK.png" alt="divisi iptek">
                    <p>DIVISI IPTEK</p>
                </a>
                <a href="kabinet.php#opsi5" class="menu-card" data-aos="zoom-in" data-aos-delay="300">
                    <img src="logo/DIVISI PSDM.png" alt="divisi psdm">
                    <p>DIVISI PSDM</p>
                </a>
                <a href="kabinet.php#opsi6" class="menu-card" data-aos="zoom-in" data-aos-delay="300">
                    <img src="logo/DIVISI BISNIS DEVELOPMENT.png" alt="divisi bisnis development">
                    <p>DIVISI BUSINES DEVELOPMENT</p>
                </a>
            </div>
    </section>

    <footer style="background-color: #0078d7;" class="text-white pt-4 pb-3">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <!-- BAGIAN KIRI: LOGO -->
                <div class="col-md-6 mb-3 mb-md-0 d-flex justify-content-center justify-content-md-start flex-wrap gap-3">
                    <img src="logo/LOGO POLMED.png" alt="Logo Polmed" class="img-fluid" style="max-width: 90px;">
                    <img src="logo/LOGO PROGRAM STUDI MI.png" alt="Logo Prodi MI" class="img-fluid" style="max-width: 90px;">
                    <img src="logo/LOGO HIMPUNAN PROGRAM STUDI MANAJEMEN INFORMATIKA.png" alt="Logo HMPS MI" class="img-fluid" style="max-width: 90px;">
                </div>

                <!-- BAGIAN KANAN: TEKS -->
                <div class="col-md-6 text-center text-md-end">
                    <h6 class="fw-bold mb-1">Official Account</h6>
                    <p class="mb-0">HMPS Manajemen Informatika</p>
                    <p class="mb-0">Politeknik Negeri Medan</p>
                    <p class="mb-0">Jl. Almamater No.1 Gedung N Lt.2</p>
                    <p class="mb-0">Politeknik Negeri Medan</p>
                </div>
            </div>

            <hr class="border-light mt-4 mb-3">

            <div class="text-center small">
                &copy; 2025 Himpunan Mahasiswa Program Studi Manajemen Informatika - POLMED
            </div>
        </div>
    </footer>
    <!-- === SCRIPT === -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
        window.addEventListener("load", function() {
            const loading = document.getElementById("loading");
            setTimeout(() => {
                loading.style.opacity = "0";
                loading.style.transition = "opacity 0.5s ease";
                setTimeout(() => loading.remove(), 500);
            }, 800);
        });
    </script>
</body>

</html>