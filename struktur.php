<?php
session_start();

// Pastikan admin login
if (!isset($_SESSION['admin'])) {
    header('Location: admin/admin_login.php'); // redirect ke halaman login admin
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STRUKTUR HMPS MANAJEMEN NFORMATIKAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
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

        body {
            font-family: Arial, sans-serif;
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

        /* === FOTO ANIMASI === */
        .photo-card {
            width: 300px;
            height: 200px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            margin: 50px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            opacity: 0;
            transform: scale(0.9);
            animation: fadeInZoom 1s forwards;
        }

        @keyframes fadeInZoom {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .photo-card img:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        @media (max-width: 480px) {
            .photo-card {
                width: 90%;
                height: 180px;
            }
        }
    </style>
</head>

<body>
    <!-- === NAVBAR === -->
    <nav class="navbar navbar-expand-lg sticky-top" id="navbarTop">
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><b>Profil</b></a>
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


    <!-- Foto dengan animasi -->
    <div class="photo-card">
        <img src="logo/struktur.jpeg" alt="Foto struktur">
    </div>

    <style>
        .photo-card {
            width: 100%;
            /* Mengisi seluruh lebar layar */
            max-width: 1200px;
            /* Batas maksimal agar tidak terlalu besar di layar lebar */
            height: auto;
            /* Tinggi mengikuti proporsi gambar */
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            margin: 20px auto;
            /* Tengah layar dengan jarak minimal */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-card img {
            width: 100%;
            /* Lebar penuh card */
            height: auto;
            /* Tinggi otomatis sesuai proporsi */
            object-fit: cover;
            object-position: center;
            opacity: 0;
            transform: scale(0.95);
            animation: fadeInZoom 1s forwards;
        }

        @keyframes fadeInZoom {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .photo-card img:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        @media (max-width: 768px) {
            .photo-card {
                width: 95%;
                /* Sedikit margin di HP */
            }
        }
    </style>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>