<?php
require_once "config.php";
require_once "model/berita.php";

// Ambil semua berita dari database
$berita = berita_index();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BERITA HMPS MANAJEMEN INFORMATIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }

        .gallery-container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 15px;
        }

        .gallery-card {
            border: none;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
        }

        .gallery-card img,
        .gallery-card .slideshow img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            display: block;
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


        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 15px;
        }

        .card-text {
            font-size: 15px;
            text-align: justify;
            color: #333;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .selengkapnya {
            color: #007bff;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s;
            font-size: 14px;
        }

        .selengkapnya:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .card-date {
            text-align: center;
            font-style: italic;
            color: #555;
            font-weight: 600;
            margin-top: 10px;
        }

        /* slideshow */
        .slideshow {
            position: relative;
            overflow: hidden;
            height: 200px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .slideshow img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .slideshow img.active {
            opacity: 1;
        }

        /* Modal */
        .modal-dialog {
            max-width: 700px;
        }

        .modal-content {
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            position: relative;
        }

        .modal-body {
            padding: 10px;
            text-align: center;
            position: relative;
        }

        .modal-body img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 10px;
            margin: 15px auto;
        }

        .modal-text {
            padding: 20px;
            text-align: left;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            font-size: 22px;
            line-height: 1;
            width: 35px;
            height: 35px;
            cursor: pointer;
            transition: 0.15s;
        }

        .close-btn:hover {
            transform: scale(1.08);
        }

        /* Panah hitam biasa */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-image: none;
        }

        .carousel-control-prev::before {
            content: "◀";
            color: black;
            font-size: 2rem;
        }

        .carousel-control-next::before {
            content: "▶";
            color: black;
            font-size: 2rem;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 8%;
        }

        @media (max-width: 768px) {
            .gallery-card img {
                height: 160px;
            }

            .slideshow {
                height: 160px;
            }

            .modal-body img {
                max-width: 80%;
            }
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
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="visi_misi.php">Visi-Misi</a></li>
                            <li><a class="dropdown-item" href="struktur.php">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="kabinet.php ">Kabinet HMPS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" style="color: #000;"><b>Galeri</b></a>
                        <ul class="dropdown-menu active">
                            <li><a class="dropdown-item" href="kegiatan.php">Kegiatan</a></li>
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
    <div class="gallery-container">
        <div class="row g-4">

            <!-- KEGIATAN 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal1">
                    <img src="galeri/open-donasi.jpg" alt="Kegiatan 1">
                    <div class="card-body">
                        <p class="card-text">✨ MI CARE & SHARE 🤝 | OPEN DONASI ✨ Bersama kita tebarkan kepedulian untuk sesama 💛</p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal1">Selengkapnya</span>
                        <p class="card-date">-07 November 2025-</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal2">
                    <div class="slideshow">
                        <img src="galeri/pendaftaran-festara.jpg" class="active" alt="Kegiatan 2 - 1">
                        <img src="galeri/pendaftaran-festara-1.jpg" alt="Kegiatan 2 - 2">
                        <img src="galeri/pendaftaran-festara-2.jpg" alt="Kegiatan 2 - 3">
                        <img src="galeri/pendaftaran-festara-3.jpg" alt="Kegiatan 2 - 4">
                    </div>
                    <div class="card-body">
                        <p class="card-text">🔥 PENDAFTARAN FESTARA 2025 RESMI DIBUKA!
                            Saatnya unjuk bakat dan buktikan kemampuanmu!
                            Dari lapangan sampai panggung, dari strategi sampai seni, semua punya ruang untuk bersinar di sini. ✨
                        </p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal2">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 3-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal3">
                    <div class="slideshow">
                        <img src="galeri/talkshow-linkedin.jpg" class="active" alt="Kegiatan 3 - 1">
                        <img src="galeri/talkshow-linkendin-1.jpg" alt="Kegiatan 3 - 2">
                    </div>
                    <div class="card-body">
                        <p class="card-text">🚀 Talkshow LinkedIn Talks: Membangun Jaringan Profesional Melalui LinkedIn
                            Yuk tingkatkan personal branding dan perluas relasi kariermu bersama kami!
                            Dapatkan insight seputar dunia LinkedIn, strategi profil profesional, hingga peluang kerja di era digital 🌐
                        </p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal3">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal4">
                    <img src="galeri/pelantikan-koordinator.jpg" alt="Kegiatan 4">
                    <div class="card-body">
                        <p class="card-text">Selamat dan Sukses dalam Mengemban Amanah Baru! 🌟
                            Kabinet Evolutionnaire HMPS MI 2024/2025 dengan bangga mengucapkan SELAMAT DAN SUKSES atas pelantikan:
                        </p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal4">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal5">
                    <img src="galeri/pelantikan-ketua-jurusan.jpg" alt="Kegiatan 5">
                    <div class="card-body">
                        <p class="card-text">Selamat dan Sukses! Kabinet Evolutionnaire HMPS MI 2024/2025 mengucapkan selamat atas Pelantikan Ketua dan Sekretaris Jurusan Teknik Komputer dan Informatika Politeknik Negeri Medan untuk Periode 2025-2029. 🎊</p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal5">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal6">
                    <img src="galeri/ketua-jurusan-selesai.jpg" alt="Kegiatan 6">
                    <div class="card-body">
                        <p class="card-text">Kabinet Evolutionnaire HMPS MI 2024/2025 mengucapkan TERIMA KASIH yang tulus atas dedikasi, bimbingan, dan dukungan luar biasa yang telah diberikan selama masa kepemimpinan:</p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal6">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN  7-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal7">
                    <img src="galeri/koordinator-selesai.jpg" alt="Kegiatan 7">
                    <div class="card-body">
                        <p class="card-text">Terima Kasih Atas Dedikasi dan Bimbingan yang Tak Ternilai! 🙏</p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal7">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 8-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal8">
                    <div class="slideshow">
                        <img src="galeri/pendaftaran-coding.jpg" class="active" alt="Kegiatan 8 - 1">
                        <img src="galeri/pendaftaran-coding-1.jpg" alt="Kegiatan 8 - 2">
                        <img src="galeri/pendaftaran-coding-2.jpg" alt="Kegiatan 8 - 3">
                    </div>
                    <div class="card-body">
                        <p class="card-text">[PENDAFTARAN CODING CLASS BY CODIFY ACADEMY]</p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal8">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN  9-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal9">
                    <img src="galeri/gelar-hmps.jpg" alt="Kegiatan 9">
                    <div class="card-body">
                        <p class="card-text">💙 Sebuah kebanggaan dan rasa syukur yang mendalam kami sampaikan atas pencapaian luar biasa ini.</p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal9">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 10-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal10">
                    <div class="slideshow">
                        <img src="galeri/opendonasi.jpg" class="active" alt="Kegiatan 10 - 1">
                        <img src="galeri/opendonasi-1.jpg" alt="Kegiatan 10 - 2">
                    </div>
                    <div class="card-body">
                        <p class="card-text">🌟 [OPEN DONASI] 🌟
                            Assalamualaikum Warahmatullahi Wabarakatuh.
                            Hidup tak selalu tentang seberapa banyak yang kita punya, tapi seberapa tulus kita berbagi. Di tengah lelahnya rutinitas, jangan lupa sisihkan sedikit untuk mereka yang membutuhkan. Karena setiap kebaikan, sekecil apapun, akan kembali menjadi kemudahan di setiap urusan kita 🤍
                        </p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal10">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 11-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal11">
                    <div class="slideshow">
                        <img src="galeri/recrutment.jpg" class="active" alt="Kegiatan 11 - 1">
                        <img src="galeri/recrutment-1.jpg" alt="Kegiatan 11 - 2">
                        <img src="galeri/recrutment-2.jpg" alt="Kegiatan 11 - 3">
                        <img src="galeri/recrutment-3.jpg" alt="Kegiatan 11 - 4">
                    </div>
                    <div class="card-body">
                        <p class="card-text">Halo MI !!!!
                            Inilah kesempatanmu untuk membuat perubahan nyata!
                            Apakah kamu memiliki semangat untuk memimpin dan berkontribusi dalam organisasi mahasiswa yang aktif dan solid?
                        </p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal11">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>

            <!-- KEGIATAN 12-->
            <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                <div class="card gallery-card w-100" data-bs-toggle="modal" data-bs-target="#modal12">
                    <div class="slideshow">
                        <img src="galeri/strategi.jpg" class="active" alt="Kegiatan 12 - 1">
                        <img src="galeri/strategi-1.jpg" alt="Kegiatan 12 - 2">
                        <img src="galeri/strategi-2.jpg" alt="Kegiatan 12 - 3">
                        <img src="galeri/strategi-3.jpg" alt="Kegiatan 12 - 4">
                        <img src="galeri/strategi-4.jpg" alt="Kegiatan 12 - 5">
                    </div>
                    <div class="card-body">
                        <p class="card-text">Kuis mendadak sering kali menjadi momen yang menegangkan bagi mahasiswa.
                            Namun, di balik rasa gugup itu, tersimpan peluang untuk melatih ketenangan dan kemampuan berpikir kritis.
                            Tiga strategi adaptif berikut dapat membantu kamu tetap fokus dan percaya diri dalam situasi
                            yang tidak terduga. Sebab, mahasiswa yang tangguh bukan berarti selalu siap, tetapi mampu beradaptasi kapan pun dibutuhkan.
                        </p>
                        <span class="selengkapnya" data-bs-toggle="modal" data-bs-target="#modal12">Selengkapnya</span>
                        <p class="card-date">--</p>
                    </div>
                </div>
            </div>


            <!-- MODAL 1 -->
            <div class="modal fade" id="modal1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>
                            <img src="galeri/open-donasi.jpg" alt="Open Donasi">
                        </div>
                        <div class="modal-text">
                            <h5><strong>✨ MI CARE & SHARE 🤝 | OPEN DONASI ✨</strong></h5>
                            <p>Halo sobat MI! 👋
                                <br>Divisi Eksternal HMPS MI Kabinet Evolutionnaire kembali mengadakan program kerja MI Care & Share, sebuah kegiatan sosial berbagi kasih kepada Panti Asuhan Penuh Pengharapan 🏠

                                <br>Mari ikut ambil bagian dalam kebaikan ini dengan memberikan donasi terbaikmu!
                                Tak peduli besar atau kecil, setiap donasi sangat berarti bagi mereka yang membutuhkan 🌻

                                <br><b>📍 Tujuan Donasi:</b>
                                <br>Panti Asuhan Penuh Pengharapan
                                Jl. Pembangunan No.86, Beringin, Kec. Medan Selayang, Kota Medan, Sumatera Utara 20157

                                <br><b>💳 Rekening Donasi:</b>
                                <br>Seabank: 901140449080
                                <br>a.n Amira Nadhifa Nasution

                                <br><b>📱 QRIS Donasi:</b>
                                <br>Scan barcode pada poster untuk berdonasi langsung 💚

                                <br><b>📞 Contact Person:</b>
                                <br>📌 Dwi Naibaho — 0851-6399-8632
                                <br>📌 Sindy — 0812-1442-8822

                                <br>Yuk, salurkan sedikit rezekimu untuk berbagi kebahagiaan bersama mereka yang membutuhkan 🤲
                                Karena berbagi tak akan membuatmu berkurang, justru menambah keberkahan 💫

                                <br>
                            <p style="color:#0056b3">#MICareAndShare #HMPsMI #KabinetEvolutionnaire #OpenDonasi #PeduliSesama #MedanBerkah #BerkembangBersama #MIMenjadiYangTerbaik</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 2 -->
            <div class="modal fade" id="modal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body position-relative">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>

                            <div id="carouselModal2" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="galeri/pendaftaran-festara.jpg" class="d-block mx-auto" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/pendaftaran-festara-1.jpg" class="d-block mx-auto" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/pendaftaran-festara-2.jpg" class="d-block mx-auto" alt="Slide 3">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/pendaftaran-festara-3.jpg" class="d-block mx-auto" alt="Slide 4">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselModal2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-text">
                            <h5><strong>🔥 PENDAFTARAN FESTARA 2025 RESMI DIBUKA!
                                    Saatnya unjuk bakat dan buktikan kemampuanmu!
                                    Dari lapangan sampai panggung, dari strategi sampai seni, semua punya ruang untuk bersinar di sini. ✨
                                </strong></h5>
                            <p><b>🎮 CABANG LOMBA YANG DIBUKA:</b>
                                <br> Bidang Olahraga 🏅
                                <br> 1.Futsal
                                <br>2.Basket
                                <br> 3.Badminton
                                <br>4.Voli
                                <br>5.Catur

                                <br><b>Bidang E-Sport 🎮</b>
                                <br> 1.Mobile Legends
                                <br>2.eFootball

                                <br><b>Bidang Seni & Kreativitas 🎭</b>
                                <br> 1.Tari Kreasi
                                <br> 2.Vokal Solo
                                <br>3.Poster
                                <br>4.Fotografi3
                                <br>5.Pidato Bahasa Inggris (Speech)

                                <br><b>📌 Catatan Penting:</b>
                                <br>PENDAFTARAN LOMBA FESTARA 2025
                                <br><a href="bit.ly/4qI36JI" target="_blank">bit.ly/4qI36JI</a>


                                <br>GUIDEBOOK FESTARA 2025
                                <br> <a href="bit.ly/4qI36JI" target="_blank">bit.ly/4htS9a9</a>

                                <br> GUIDEBOOK POSTER & FOTOGRAFI
                                <br> <a href="bit.ly/4qI36JI" target="_blank">bit.ly/3JuVNnJ</a>

                                <br> PENDAFTARAN POSTER & FOTOGRAFI
                                <br><a href="bit.ly/4qI36JI" target="_blank"> bit.ly/47FdN8a</a>

                                <b>💥 Daftar sekarang & jadilah bagian dari kemeriahan terbesar kampus!</b>

                                <b> 📍 Politeknik Negeri Medan
                                    ✨ “Gemakan Kreativitas, Kobarkan Sportivitas.”</b>

                            <p style="color:#0056b3">#FESTARA2025 #FestivalNusantara #BEMPOLMED #PolmedBerkarya #SemangatNusantara</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 3 -->
            <div class="modal fade" id="modal3" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body position-relative">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>

                            <div id="carouselModal3" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="galeri/talkshow-linkedin.jpg" class="d-block mx-auto" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/talkshow-linkendin-1.jpg" class="d-block mx-auto" alt="Slide 2">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal3" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselModal3" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                            <div class="modal-text">
                                <h5><b>🚀 Talkshow LinkedIn Talks: Membangun Jaringan Profesional Melalui LinkedIn</b>
                                    Yuk tingkatkan <b>personal branding</b> dan perluas relasi kariermu bersama kami!
                                    Dapatkan insight seputar dunia LinkedIn, strategi profil profesional, hingga peluang kerja di era digital 🌐
                                    </strong></h5>
                                <p>
                                    <br><b>📅Tanggal</b>: 14 November 2025
                                    <br><b>🕗Waktu</b> : 08.00 WIB – Selesai
                                    <br><b>📍Lokasi</b> : Aula Gedung Z Lt.5, Politeknik Negeri Medan

                                    <br><b>✨ Benefit:</b>
                                    <br>* E-certificate
                                    <br>* Soft file materi
                                    <br>* Award for Best Delegates
                                    <br>* Relasi karier melalui LinkedIn

                                    <br> 🔗 Daftar sekarang: [<a href="https://bit.ly/LinkedInTalkshow2025" target="_blank">https://bit.ly/LinkedInTalkshow2025</a>]

                                <p style="color: #0056b3 ; "> #LinkedInTalks #Polmed #ManajemenBisnis #Networking #PersonalBranding</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 4 -->
            <div class="modal fade" id="modal4" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>
                            <img src="galeri/pelantikan-koordinator.jpg" alt="Open Donasi">
                        </div>
                        <div class="modal-text">
                            <h5><strong>Selamat dan Sukses dalam Mengemban Amanah Baru! 🌟
                                    Kabinet Evolutionnaire HMPS MI 2024/2025 dengan bangga mengucapkan SELAMAT DAN SUKSES atas pelantikan:
                                </strong></h5>
                            <p>
                                <br> Bapak Bister Purba, S.Kom., M.Kom. (Koordinator Program Studi Manajemen Informatika)
                                <br> Bapak Rian Syahputra, S.Kom., M.Kom. (Kepala Laboratorium Manajemen Informatika)

                                <br> Semoga amanah ini dapat dijalankan dengan penuh dedikasi dan membawa kemajuan signifikan bagi Program Studi Manajemen Informatika. Kami siap mendukung dan bersinergi untuk mencapai visi bersama.
                                <br>
                            <p style="color:#0056b3">#BerkembangBersama demi #MIMenjadiYangTerbaik! 🚀
                                #SelamatBertugas #KoordinatorProdi #KepalaLab #MIPOLMED #JTKPolmed #PoliteknikNegeriMedan #Evolutionnaire
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <!--modal 5 -->
            <div class="modal fade" id="modal5" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>
                            <img src="galeri/pelantikan-ketua-jurusan.jpg" alt="pelantikan ketua jurusan">
                        </div>
                        <div class="modal-text">
                            <h5><strong>
                                    Selamat dan Sukses! Kabinet Evolutionnaire HMPS MI 2024/2025 mengucapkan selamat atas Pelantikan Ketua dan Sekretaris Jurusan Teknik Komputer dan Informatika Politeknik Negeri Medan untuk Periode 2025-2029. 🎊
                                </strong></h5>
                            <p>Kami ucapkan selamat kepada:
                                <br> Bapak Zakaria Sembiring, S.T., M.Sc. (Ketua Jurusan)
                                <br> Ibu Marliana Sari, S.T., M.M.Si. (Sekretaris Jurusan)

                                <br> Semoga Bapak dan Ibu dapat menjalankan amanah dengan lancar, membawa Jurusan Teknik Komputer dan Informatika menuju prestasi yang gemilang, dan selalu menjadi inspirasi bagi kami. Kami siap bersinergi dan mendukung!
                                <br>
                            <p style="color:#0056b3">#BerkembangBersama demi #MIMenjadiYangTerbaik! 🌟
                                #SelamatBertugas #Pelantikan #PimpinanJurusan #JTKPolmed #MIPOLMED #PoliteknikNegeriMedan #Evolutionnaire</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal 6 -->
            <div class="modal fade" id="modal6" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>
                            <img src="galeri/ketua-jurusan-selesai.jpg" alt="Open Donasi">
                        </div>
                        <div class="modal-text">
                            <h5><strong> Kabinet Evolutionnaire HMPS MI 2024/2025 mengucapkan TERIMA KASIH yang tulus atas dedikasi, bimbingan, dan dukungan luar biasa yang telah diberikan selama masa kepemimpinan: </strong></h5>
                            <p>
                                <br>👨‍💼 Bapak Kadri Yusuf, S.T., M.Kom. (Ketua Jurusan)
                                <br>👩‍💼 Ibu Marliana Sari, S.T., M.M.Si. (Sekretaris Jurusan)
                                <br>Terima kasih atas peran strategis Bapak dan Ibu dalam memajukan Jurusan Teknik Komputer dan Informatika Politeknik Negeri Medan. Kepemimpinan,
                                arahan, serta komitmen yang telah diberikan menjadi inspirasi bagi kami untuk terus melangkah maju. 🌟
                                Semoga semangat dan sinergi yang telah terjalin dapat menjadi fondasi kuat bagi keberlanjutan prestasi dan inovasi di masa mendatang. 🚀
                                <br>
                            <p style="color:#0056b3">#TerimaKasih #KabinetEvolutionnaire #MIPOLMED #JTKPolmed #PoliteknikNegeriMedan #PimpinanJurusan #Sinergi #BerkembangBersama #MIMenjadiYangTerbaik</p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal 7 -->
            <div class="modal fade" id="modal7" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>
                            <img src="galeri/koordinator-selesai.jpg" alt="koordinasi-selesai">
                        </div>
                        <div class="modal-text">
                            <h5><strong> Terima Kasih Atas Dedikasi dan Bimbingan yang Tak Ternilai! 🙏</strong></h5>
                            <p>
                                Mahasiswa/Mahasiswi Program studi Manajemen Informatika mengucapkan rasa terima kasih yang sebesar-besarnya kepada bapak & ibu yang hebat yang telah membimbing dan mendukung kami:

                                <br>👩‍🏫 Ibu Yulia Agustina Dalimunthe, S.Si., M.Kom.
                                <br>👨‍🏫 Bapak Bister Purba, S.Kom., M.Kom.

                                <br>Beliau berdua adalah Koordinator Program Studi dan Kepala Laboratorium Manajemen Informatika Jurusan Teknik Komputer dan Informatika Politeknik Negeri Medan.

                                <br>Dukungan, arahan, dan ilmu yang telah Bapak/Ibu berikan menjadi bekal berharga bagi perjalanan bagi kami. 🌱
                                Semoga sinergi ini terus terjalin untuk kemajuan Program Studi Manajemen Informatika. 🤝

                                <br>
                            <p style="color:#0056b3">#TerimaKasih #KabinetEvolutionnaire #MIPOLMED #JTKPolmed #PoliteknikNegeriMedan #MI20242025 #DosenHebat #BerjuangBersama</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 8-->
            <div class="modal fade" id="modal8" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body position-relative">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>

                            <div id="carouselModal8" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="galeri/pendaftaran-coding.jpg" class="d-block mx-auto" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/pendaftaran-coding-1.jpg" class="d-block mx-auto" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/pendaftaran-coding-2.jpg" class="d-block mx-auto" alt="Slide 3">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal8" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselModal8" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                            <div class="modal-text">
                                <h5><strong>[PENDAFTARAN CODING CLASS BY CODIFY ACADEMY]</strong></h5>
                                <p>
                                    Tertarik belajar coding tapi bingung mulai dari mana? Sekarang saatnya kamu melangkah ke dunia teknologi bersama Codify Academy!🧑‍💻

                                    <br>💡Apa itu Coding Class by Codify Academy?
                                    <br> Sebuah wadah pembelajaran interaktif yang dirancang untuk mahasiswa Politeknik Negeri Medan dan masyarakat umum yang ingin mengembangkan kemampuan di bidang teknologi informasi. Belajar dari dasar, dipandu langsung oleh kakak-kakak Codify Academy yang siap berbagi ilmu dan pengalaman!

                                    <br><b>🗓️ Timeline:</b>
                                    <br>📅 Pembukaan Pendaftaran: 4 - 7 November 2025
                                    <br>🚀 Onboarding Coding Class: 8 November 2025

                                    <br><b>🏆 Keuntungan Bergabung:</b>
                                    <br>✅ Sertifikat Penyelesaian (Certificate of Completion)
                                    <br>✅ Final Project yang bisa dijadikan portofolio pribadi
                                    <br>✅ Akses materi & sumber belajar gratis
                                    <br> ✅ Komunitas aktif Codify Academy yang saling mendukung
                                    <br> ✅ Merchandise eksklusif (stiker/keychain)

                                    <br><b>💬 Platform Pembelajaran:</b>
                                    <br>📍 Google Meet
                                    <br>📍 WhatsApp Community
                                    <br>📍 Min 1 sesi offline per pathway

                                    <br><b>📲 Daftar Sekarang!</b>
                                    <br>Cukup scan QR code di poster untuk mendaftar 🔍
                                    <br>Jangan lewatkan kesempatan emas buat upgrade skill kamu!

                                    <br><b>📞 Contact Person:</b>
                                    <br>Samuel - 0878-9349-2268
                                    <br> Habibah - 0819-9171-6036
                                    <br>Dafi - 0858-3042-8881

                                    <br> 💬 Learn, Code, Innovate - Bangun skill & portofolio impianmu bersama Codify Academy! 🚀💻

                                <p style="color:#0056b3"> #CodeEra #BangkitkanEraSatukanKarya
                                    #CodifyAcademy #CodingClass #Polmed #HMPSTRPL #LearnCodeInnovate #WebDevelopment #MachineLearning #IoT#Git&GitHub#BasicProgramming</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal 9 -->
            <div class="modal fade" id="modal9" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>
                            <img src="galeri/gelar-hmps.jpg" alt="gelar hmps">
                        </div>
                        <div class="modal-text">
                            <h5><strong>💙 Sebuah kebanggaan dan rasa syukur yang mendalam kami sampaikan atas pencapaian luar biasa ini.</strong></h5>
                            <p>Terima kasih sebesar-besarnya kepada seluruh anggota HMPS Manajemen Informatika yang telah menyalakan semangat, kreativitas, dan kekompakan tanpa henti.
                                Kalian adalah fondasi kuat yang membuat Kabinet Evolutionnaire terus melangkah dan bertransformasi menuju arah yang lebih baik. ⚡

                                <br>Kami juga menyampaikan apresiasi kepada BEM Politeknik Negeri Medan atas penghargaan dalam ajang Polmed Organization of The Year (POFTY) 2025.

                                <br>🏆 Gelar HMPS Teknik Terunggul ini bukan hanya sebuah prestasi, tetapi bukti nyata bahwa kerja keras dan kebersamaan dapat menciptakan perubahan besar.
                                Mari jadikan penghargaan ini sebagai semangat baru untuk terus menjadi pionir inovasi dan teladan bagi mahasiswa teknik lainnya! 🚀

                            <p style="color: #0056b3; ">#HMPSMI #Kabinetevolutionnaire #POFTY2025 #TeknikTerunggul #Polmed #ManajemenInformatika #KamiBisa</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 10 -->
            <div class="modal fade" id="modal10" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body position-relative">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>

                            <div id="carouselModal10" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="galeri/opendonasi.jpg" class="d-block mx-auto" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/opendonasi-1.jpg" class="d-block mx-auto" alt="Slide 2">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal10" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselModal10" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                            <div class="modal-text">
                                <h5><strong>🌟 [OPEN DONASI] 🌟</strong></h5>
                                <p> Assalamualaikum Warahmatullahi Wabarakatuh.

                                    <br>Hidup tak selalu tentang seberapa banyak yang kita punya, tapi seberapa tulus kita berbagi. Di tengah lelahnya rutinitas, jangan lupa sisihkan sedikit untuk mereka yang membutuhkan. Karena setiap kebaikan, sekecil apapun, akan kembali menjadi kemudahan di setiap urusan kita 🤍

                                    <br>HMPS TRMG membuka kesempatan bagi Sobat TRMG dan seluruh civitas Politeknik Negeri Medan untuk ikut serta dalam kegiatan Bakti Sosial “Menebar Kebaikan, Menggambar Harapan” 🌈

                                    <br><b>📍 Lokasi:</b> Panti Asuhan Ade Irma S. Nasution
                                    <br><b>🗓️ Waktu Donasi:</b> 30 Oktober – 14 November 2025

                                    <br><b>Bentuk donasi yang dapat disalurkan:</b>
                                    <br>🎒 Perlengkapan Sekolah
                                    <br>🍚 Bahan Pangan Pokok
                                    <br>💵 Uang Tunai
                                    <br>🧴 Kebutuhan Harian

                                    <br><b>💳 Nomor Rekening:</b>
                                    <br>Bank BRI – 019401026505530
                                    <br>a.n. Berta

                                    <br><b>📞 Contact Person:</b>
                                    <br>Berta M. Simanjuntak – 0821-6462-2541

                                    <br>Mari bersama menebar kebaikan, menggambar harapan, dan berbagi senyum untuk adik-adik di Panti Asuhan 🤝
                                    Karena dengan berbagi, kita tak akan pernah kehilangan.

                                <p style="color: #0056b3;">#HMPSTRMG #TRMGBangga #TRMGJaya #OpenDonasi #BaktiSosialTRMG #MenebarKebaikanMenggambarHarapan #PoliteknikNegeriMedan</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 11 -->
            <div class="modal fade" id="modal11" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body position-relative">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>

                            <div id="carouselModal11" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="galeri/recrutment.jpg" class="d-block mx-auto" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/recrutment-1.jpg" class="d-block mx-auto" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/recrutment-2.jpg" class="d-block mx-auto" alt="Slide 3">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/recrutment-3.jpg" class="d-block mx-auto" alt="Slide 4">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal11" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselModal11" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                            <div class="modal-text">
                                <h5><strong>Halo MI !!!!</strong></h5>
                                <p>
                                    Inilah kesempatanmu untuk membuat perubahan nyata!
                                    Apakah kamu memiliki semangat untuk memimpin dan berkontribusi dalam organisasi mahasiswa yang aktif dan solid?

                                    <br>Kami mengajak kamu untuk mendaftarkan diri sebagai Ketua dan Wakil Ketua HMPS 2025 Manajemen Informatika!

                                    <br>Bergabunglah bersama keluarga HMPS Manajemen Informatika untuk menciptakan lingkungan yang lebih baik.
                                    Jadilah bagian dari tim yang berdedikasi untuk membawa perubahan positif dan memberikan dampak nyata!

                                    <br><b>📌 Daftarkan dirimu di sini:</b> <a href="https://bit.ly/OPRECCALONKETUAHMPSMI2025" target="_blank">https://bit.ly/OPRECCALONKETUAHMPSMI2025</a>

                                    <br>Jangan tunggu lagi!
                                    <br>Ayo segera daftarkan dirimu dan bawa semangat pemimpin yang luar biasa! 🔥

                                <p style="color: #0056b3;">#HMPSMI #FormaturHMPSMI #ManajemenInformatika #KabinetEvolutionnaire
                                    #BerkembangBersamaMIMenjadiYangTerbaik</p>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL 12 -->
            <div class="modal fade" id="modal12" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body position-relative">
                            <button class="close-btn" data-bs-dismiss="modal">&times;</button>

                            <div id="carouselModal12" class="carousel slide" data-bs-ride="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="galeri/strategi.jpg" class="d-block mx-auto" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/strategi-1.jpg" class="d-block mx-auto" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/strategi-2.jpg" class="d-block mx-auto" alt="Slide 3">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/strategi-3.jpg" class="d-block mx-auto" alt="Slide 4">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="galeri/strategi-4.jpg" class="d-block mx-auto" alt="Slide 5">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal12" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselModal12" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                            <div class="modal-text">
                                <h5><strong>Kuis mendadak sering kali menjadi momen yang menegangkan bagi mahasiswa.</strong></h5>
                                <p>Namun, di balik rasa gugup itu, tersimpan peluang untuk melatih ketenangan dan kemampuan berpikir kritis.
                                    Tiga strategi adaptif berikut dapat membantu kamu tetap fokus dan percaya diri dalam situasi yang tidak terduga. Sebab, mahasiswa yang tangguh bukan berarti selalu siap, tetapi mampu beradaptasi kapan pun dibutuhkan.

                                <p style="color: #0056b3;"></p>#MahasiswaAktif #StrategiBelajar #KabinetEvolutionnaire #HMPSMI2024 #BersamaBerkembang #InovasiTanpaBatas #BerkembangBersamaMiMenjadiYangTerbaik

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const slideshows = document.querySelectorAll(".slideshow");

                    slideshows.forEach((slideshow) => {
                        const images = slideshow.querySelectorAll("img");
                        let index = 0;

                        if (!images.length) return;

                        // Set gambar pertama aktif
                        images.forEach(img => img.classList.remove("active"));
                        images[index].classList.add("active");

                        // Ganti gambar tiap 1 detik
                        setInterval(() => {
                            images[index].classList.remove("active");
                            index = (index + 1) % images.length;
                            images[index].classList.add("active");
                        }, 1000);
                    });
                });
            </script>


</body>
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

</html>