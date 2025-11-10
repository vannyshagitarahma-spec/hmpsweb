<?php
session_start();
require_once "config.php";
require_once "model/sejarah.php";

$sejarah = sejarah_get();

?>


<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEJARAH HMPS MANAJEMEN INFORMATIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
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
                            <li><a class="dropdown-item" href="kegiatan.php">Kegiatan</a></li>
                            <li><a class="dropdown-item" href="berita.php">Berita</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="sejarah.php"><b>Sejarah</b></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="sejarah-section">
                    <h2 class="sejarah-header">Sejarah</h2>
                    <div class="sejarah-text">
                        <p>HMPS-MI POLMED didirikan pada hari Sabtu tanggal 10 Mei 2008 di Gedung UPT Komputer Lantai 3 kampus Politeknik Negeri Medan Jalan Almamater No. 1 Medan, untuk waktu yang tidak ditentukan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <P></P>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="sejarah-section">
                    <h2 class="sejarah-header">Profil</h2>
                    <div class="sejarah-text">
                        <p>HMPS-MI POLMED merupakan organisasi kemahasiswaan yang bersifat kekeluargaan dan
                            profesionalitas serta menjunjung tinggi kesetaraan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sejarah-text">
        <?= nl2br(htmlspecialchars($sejarah['isi'])) ?>
    </div>

    <p></p>
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