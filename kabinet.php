<?php
$conn = new mysqli("localhost", "root", "", "website_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dan urutkan per divisi
$result = $conn->query("SELECT * FROM kabinet ORDER BY FIELD(divisi,'struktur inti','internal','eksternal','iptek','psdm','business development'), id");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KABINET HMPS MANAJEMEN INFORMATIKA</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
    /* Navbar */
    .navbar {
      background-color: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      padding: 0px 5px;
      /* dikurangi agar lebih compact */
    }

    .navbar-brand img {
      height: 70px;
      /* dikurangi dari 70px */
      margin-right: 10px;
      transition: 0.3s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.05);
    }

    .navbar-brand strong {
      font-size: 15px;
      /* dikurangi dari 22px */
      color: #333;
      letter-spacing: 1px;
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      color: #333 !important;
      margin-left: 10px;
      /* dikurangi agar lebih rapi */
      font-size: 16px;
      /* dikurangi dari 16px */
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

    /* Responsif logo & teks */
    @media (max-width: 768px) {
      .navbar-brand img {
        height: 40px;
      }

      .navbar-brand strong {
        font-size: 16px;
      }

      .navbar-nav .nav-link {
        font-size: 13px;
        margin-left: 8px;
      }
    }

    /* Navbar di hp kecil */
    @media (max-width: 480px) {
      .navbar-brand img {
        height: 35px;
      }

      .navbar-brand strong {
        font-size: 14px;
      }

      .navbar-nav .nav-link {
        font-size: 12px;
        margin-left: 6px;
      }
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

    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #ffffff;
      overflow-x: hidden;
    }

    .container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
      margin-bottom: 30px;
    }

    .profile-card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 200px;
      padding: 20px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .profile-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }

    .profile-card img {
      border-radius: 8px;
      width: 100%;
      height: 200px;
      object-fit: cover;
      object-position: center;
      margin-bottom: 10px;
    }

    .profile-card h3 {
      margin: 10px 0 5px;
      font-size: 18px;
    }

    .profile-card p {
      font-size: 14px;
      color: #666;
      margin: 0;
    }

    .title {
      font-size: 16px;
      font-weight: bold;
      color: #008dc4;
      margin: 5px 0;
    }

    /* Garis tebal */
    .garis-tebal {
      border: 2px solid #4fb2d9;
      width: 80%;
      margin: 10px auto 30px;
    }

    /* Responsif */
    @media (max-width: 768px) {
      .profile-card {
        width: 45%;
        padding: 15px;
      }

      .profile-card img {
        height: 160px;
      }

      .profile-card h3 {
        font-size: 16px;
      }

      .profile-card p {
        font-size: 13px;
      }
    }

    @media (max-width: 480px) {
      .profile-card {
        width: 100%;
        padding: 10px;
      }

      .profile-card img {
        height: 150px;
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
          <li class="nav-item"><a class="nav-link active" href="index.php">Beranda</a></li>
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
      <section id="opsi1">
        <h1 style="color: #4fb2d9;"><b>STRUKTUR INTI</b></h1>
        <hr class="garis-tebal">

        <div class="container">
          <div class="profile-card">
            <img src="foto/alifa-qadri.jpg" alt="alifa qadri"
              style="border-radius:15px 25px 0 0;box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Alifa Qadri</h3>
            <p class="title">KETUA HIMPUNAN</p>
          </div>

          <div class="profile-card">
            <img src="foto/m-hafizh-batu-bara.jpg" alt="m hafizh batu bara" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Muhammad Hafizh Batu Bara</h3>
            <p class="title">WAKIL KETUA HIMPUNAN</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/mauliza-azizah.jpg" alt="mauliza azizah style=" border-radius:15px 25px 0 0; box-shadow:0px 0px
              15px -2px rgba(0,0,0,0.4);">
            <h3>Mauliza Azizah</h3>
            <p class="title">SEKRETARIS</p>
          </div>

          <div class="profile-card">
            <img src="foto/syafitri-uswatun.jpg" alt="syafitri uswatun" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Syafitri Uswatun</h3>
            <p class="title">WAKIL SEKRETARIS</p>
          </div>

          <div class="profile-card">
            <img src="foto/amira-nadhifa-n.jpg" alt="amira nadhifa" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Amira Nadhifa</h3>
            <p class="title">BENDAHARA</p>
          </div>

          <div class="profile-card">
            <img src="foto/umi-nurfadilah-s.jpg" alt="umi nurfadilah s" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Umi Nurfadilah S.</h3>
            <p class="title">WAKIL BENDAHARA</p>
          </div>

          <div class="container">
            <div class="profile-card">
              <img src="foto/m-ibnu-tawakal.jpg" alt="m ibnu tawakal" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
              <h3>Muhammad Ibnu Tawakal</h3>
              <p class="title">KONTROL INTERNAL</p>
            </div>

            <div class="profile-card">
              <img src="foto/mariska-siagian.jpg" alt="mariska siagian" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
              <h3>Mariska Siagian</h3>
              <p class="title">KONTROL INTERNAL</p>
            </div>
          </div>
      </section>
      <section id="opsi2">
        <h1 style="color: #4fb2d9;"><b>DIVISI INTERNAL</b></h1>
        <hr class="garis-tebal">

        <div class="container">
          <div class="profile-card">
            <img src="foto/zaky-farhan-sitorus.jpg" alt="zaky farhan sitorus" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Zaky Farhan Sitorus</h3>
            <p class="title">KEPALA DIVISI INTERNAL</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/lettyciya-laura-siagian.jpg" alt="lettyciya laura siagian" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>lettyciya Laura Siagian</h3>
            <p class="title">KETUA TIM KEAGAMAAN</p>
          </div>

          <div class="profile-card">
            <img src="foto/egi-syahputra.jpg" alt="egi syahputra" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Egi Syahputra</h3>
            <p class="title">ANGGOTA TIM KEAGAMAAN</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/chrisandy-hutabarat.jpg" alt="chrisandy hutabarat" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Chrisandy Hutabarat</h3>
            <p class="title">KETUA TIM ADVOKASI HUBUNGAN MAHASISWA</p>
          </div>

          <div class="profile-card">
            <img src="foto/holikristin-br-ginting.jpg" alt="holikristin br ginting" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Holikristin BR Ginting</h3>
            <p class="title">ANGGOTA TIM ADVOKASI HUBUNGAN MAHASISWA</p>
          </div>

          <div class="profile-card">
            <img src="foto/johannes-mario-rafael-sibarani.jpg" alt="johannes mario rafael sibarani" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>johannes Mario Rafael Sibarani</h3>
            <p class="title">ANGGOTA TIM ADVOKASI HUBUNGAN MAHASISWA</p>
          </div>

          <div class="profile-card">
            <img src="foto/tri-septian-tarigan.jpg" alt="tri septian tarigan " style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Tri Septian Tarigan</h3>
            <p class="title">ANGGOTA TIM ADVOKASI HUBUNGAN MAHASISWA</p>
          </div>
        </div>
      </section>

      <section id="opsi3">
        <h1 style="color: #4fb2d9;"><b>DIVISI EKSTERNAL</b></h1>
        <hr class="garis-tebal">

        <div class="container">
          <div class="profile-card">
            <img src="foto/bima-shakti.jpg" alt="bima shakti" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Bima Shakti</h3>
            <p class="title">KETUA DIVISI EKSTERNAL</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/tongku-guru-s.jpg" alt="tongku guru s" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Tongku Guru S.</h3>
            <p class="title">KETUA TIM HUBUNGAN LUAR PRODI</p>
          </div>

          <div class="profile-card">
            <img src="foto/dwika-br-naibaho.jpg" alt="dwika br naibaho" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Dwika BR Naibaho</h3>
            <p class="title">ANGGOTA TIM HUBUNGAN LUAR PRODI</p>
          </div>

          <div class="profile-card">
            <img src="foto/m-hilmi-syuhada.jpg" alt="m hilmi syuhada" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Muhammad Hilmi Syuhada/h3>
              <p class="title">ANGGOTA TIM HUBUNGAN LUAR PRODI</p>
          </div>

          <div class="profile-card">
            <img src="foto/m-rizky-ramadhan.jpg" alt="m rizky ramadhan" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Muhammad Rizky Ramadhan</h3>
            <p class="title">ANGGOTA TIM HUBUNGAN LUAR PRODI</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/dita-liana.jpg" alt="dita liana" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Dita Liana</h3>
            <p class="title">KETUA TIM RISET ANALIS</p>
          </div>

          <div class="profile-card">
            <img src="foto/sindy-syahfitri.jpg" alt="sindy syahfitri" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Sindy Syahfitri</h3>
            <p class="title">ANGGOTA TIM RISET ANALIS</p>
          </div>
        </div>
      </section>

      <section id="opsi4">
        <h1 style="color: #4fb2d9;"><b>DIVISI IPTEK</b></h1>
        <hr class="garis-tebal">

        <div class="container">
          <div class="profile-card">
            <img src="foto/rendy-krisna.jpg" alt="rendy-krisna" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Rendy Krisna</h3>
            <p class="title">KEPALA DIVISI IPTEK</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/hatta-fahriza.jpg" alt="hatta-fahriza" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Hatta fahriza</h3>
            <p class="title">KETUA TIM CONTENT CREATOR</p>
          </div>

          <div class="profile-card">
            <img src="foto/silvika-zachry.jpg" alt="silvika-zachry" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Silvika Zachry</h3>
            <p class="title">ANGGOTA TIM CONTENT CREATOR</p>
          </div>

          <div class="profile-card">
            <img src="foto/sukma-andini.jpg" alt="sukma andini" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Sukma Andini</h3>
            <p class="title">ANGGOTA TIM CONTENT CREATOR</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/randy-karna.jpg" alt="randy karna" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Randy Karna</h3>
            <p class="title">KETUA TIM MULTIMEDIA</p>
          </div>

          <div class="profile-card">
            <img src="foto/dedy-hutahean-p.jpg" alt="dedy-hutahean-p" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Dedy Hutahean P.</h3>
            <p class="title">ANGGOTA TIM MULTIMEDIA</p>
          </div>

          <div class="profile-card">
            <img src="foto/may-helena-tamba.jpg" alt="may helena tamba" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>May Helena Tamba</h3>
            <p class="title">ANGGOTA TIM MULTIMEDIA</p>
          </div>

          <div class="profile-card">
            <img src="foto/sekarissa-ramadhani.jpg" alt="sekarissa-ramadhani" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Sekarissa Ramadhani</h3>
            <p class="title">ANGGOTA TIM MULTIMEDIA</p>
          </div>
        </div>
      </section>

      <section id="opsi5">
        <h1 style="color: #4fb2d9;"><b>DIVISI PSDM</b></h1>
        <hr class="garis-tebal">

        <div class="container">
          <div class="profile-card">
            <img src="foto/gilbert-tamba.jpg" alt="gilbert-tamba" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Gilbert Tamba</h3>
            <p class="title">KEPALA DIVISI PSDM</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/valencia-anbarina.jpg" alt="valencia-anbarina" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Valencia Anbarina</h3>
            <p class="title">KETUA TIM PROGRAM</p>
          </div>

          <div class="profile-card">
            <img src="foto/clara-sinta-limbong.jpg" alt="clara-sinta-limbong" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Clara Sinta Limbong</h3>
            <p class="title">ANGGOTA TIM PROGRAM</p>
          </div>

          <div class="profile-card">
            <img src="foto/rahkmadsyah-irawan.jpg" alt="rahkmadsyah-irawan" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Rahkmadsyah Irawan</h3>
            <p class="title">ANGGOTA TIM PROGRAM</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/hanna-pati-lopian.jpg" alt="hanna-pati-lopian" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Hanna Pati Lopian</h3>
            <p class="title">KETUA TIM QUALITY ASSURANCE</p>
          </div>

          <div class="profile-card">
            <img src="foto/rachel-sagita-sibarani.jpg" alt="rachel-sagita-sibarani" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Rachel Sagita Sibarani</h3>
            <p class="title">ANGGOTA TIM QUALITY ASSURANCE</p>
          </div>

          <div class="profile-card">
            <img src="foto/shindy-aprilia.jpg" alt="shindy-aprilia" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Sindy Aprilia</h3>
            <p class="title">ANGGOTA TIM QUALITY ASSURANCE</p>
          </div>
        </div>
      </section>

      <section id="opsi6">
        <h1 style="color: #4fb2d9;"><b>DIVISI BUSINESS DEVELOPMENT</b></h1>
        <hr class="garis-tebal">

        <div class="container">
          <div class="profile-card">
            <img src="foto/riah-ulina-hutasoit.jpg" alt="riah-ulina-hutasoit" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Riah Ulina Hutasoit</h3>
            <p class="title">KEPALA DIVISI BUSSINES DEVELOPMENT</p>
          </div>

          <div class="profile-card">
            <img src="foto/putri-anggreini.jpg" alt="putri-anggreini" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Putri Anggreini</h3>
            <p class="title">MANAGER</p>
          </div>
        </div>

        <div class="container">
          <div class="profile-card">
            <img src="foto/hepyana-daulay.jpg" alt="hepyana-daulay" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Hepyana Daulay</h3>
            <p class="title">KETUA TIM PRODUCEY DEVELOPMENT</p>
          </div>

          <div class="profile-card">
            <img src="foto/fensia-emanuela.jpg" alt="fensia-emanuela" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Fensia Emanuela</h3>
            <p class="title">ANGGOTA TIM PRODUKEY DEVELOPMENT</p>
          </div>

          <div class="profile-card">
            <img src="foto/kyla-hulwani.jpg" alt="kyla-hulwani" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Kyla Hulwani</h3>
            <p class="title">ANGGOTA TIM PRODUKEY DEVELOPMENT</p>
          </div>

          <div class="profile-card">
            <img src="foto/musbar-muliansyah.jpg" alt="musbar-muliansyah" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
            <h3>Musbar Muliansyah</h3>
            <p class="title">ANGGOTA TIM PRODUKEY DEVELOPMENT</p>
          </div>

          <div class="container">
            <div class="profile-card">
              <img src="foto/yohana-fransiska.jpg" alt="yohana-fransiska" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
              <h3>Yohana Fransiska</h3>
              <p class="title">KETUA TIM SALES</p>
            </div>

            <div class="profile-card">
              <img src="foto/nabila-azzahro.jpg" alt="nabila-azzahro" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
              <h3>Nabila Azzahro</h3>
              <p class="title">ANGGOTA TIM SALES</p>
            </div>
            <div class="profile-card">
              <img src="foto/nurul-inayah.jpg" alt="nurul-inayah" style="border-radius:15px 25px 0 0;
        box-shadow:0px 0px 15px -2px rgba(0,0,0,0.4);">
              <h3>Nurul Inayah</h3>
              <p class="title">ANGGOTA TIM SALES</p>
            </div>
          </div>
      </section>
<?php
$currentDivisi = '';
while($row = $result->fetch_assoc()):
    if ($currentDivisi != $row['divisi']):
        $currentDivisi = $row['divisi'];
        echo "<h2>" . ucfirst($currentDivisi) . "</h2><div class='anggota'>";
    endif;
?>
    <div class="card">
        <?php if($row['foto'] != ""): ?>
            <img src="<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>">
        <?php endif; ?>
        <h4><?= $row['nama'] ?></h4>
        <p><?= $row['jabatan'] ?></p>
    </div>
<?php
    // Tutup div anggota saat divisi berubah atau di akhir
    $peek = $result->fetch_assoc();
    if(!$peek || $peek['divisi'] != $currentDivisi) echo "</div>";
    if($peek) $result->data_seek($result->current_field); // kembalikan pointer
endwhile;
?>

</body>
</html>


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