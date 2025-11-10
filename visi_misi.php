<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VISI-MISI HMPS MANAJEMEN INFORMATIKA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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



 <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="misi-section">
          <div class="header-with-logo">
            <img src="logo/LOGO KABINET UTAMA.png" alt="Logo HMPS MI">
            <h2 class="misi-header mb-0">STRUKTUR INTI</h2>
          </div>
          <div class="header-with-logo">
            <h3 class="misi-header mb-1">VISI</h3>
          </div>
          <div class="misi-text">
            <p>Menjadikan HMPS MI Sebagai Organisasi yang berkomitmen untuk mengembangkan potensi setiap bidang,
              menciptakan suasana inklusif yang mempereerat huungan antar mahasiswa/i, memperluas cakupan
              eksternal melalui bidang non-informatika sebagai bisnis usaha faktor utamanya, serta mengoptimalkan
              persan mahasiswa/i untuk berkontribusi aktif dalam mencapai tujuan bersama dan prestasi yang membanggakan.
            </p>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">MISI</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Membangun program-program pengembangan diri bagi mahasiswa/i dalam berbagai bidang, baik di dalam
                maupun di luar lingkup prodi, sehingga setiap mahasiswa/i memiliki kesempatan untuk memaksimalkan
                keterampilan, potensi, dan kontribusi mereka guna mencapai tujuan bersama HMPS MI.</li>
              <li>Meningkatkan kesadaran dan pemahaman seluruh mahasiswa/i mengenai pentingnya peran HMPS dalam
                mendukung prestasi akademik dan non-akademik melalui sosialisasi yang efektif.</li>
              <li>Memanfaatkan platform komunikasi yang efektif bagi mahasiswa/i aktif Program Studi untuk berbagi
                masukan, ide, dan umpan balik terkait pengembangan HMPS. Platform ini akan memastikan keterlibatan
                aktif mahasiswa/i dalam menanggapi hal yang akan terjadi pada lingkungan sekitar pembelajaran
                mereka.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <hr class="garis-tebal">
        <div class="misi-section">
          <div class="header-with-logo">
            <img src="logo/DIVISI INTERNAL.png" alt="Logo internal MI">
            <h2 class="misi-header mb-0">DIVISI INTERNAL</h2>
          </div>
          <div class="header-with-logo">
            <h3 class="misi-header mb-1">VISI</h3>
          </div>
          <div class="misi-text">
            <p>Menjadikan divisi internal yang solid, efesien, dan inovatif, dengan tata kelola yang baik,
              sehingga mampu mendukung tercapainya tujuan organisasi secara optimal.
            </p>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">TARGET</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Menciptakan lingkungan organisasi yang inklusif</li>
              <li>Meningkatkan keberlanjutan dan efektivitas kegiatan internal</li>
            </ul>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">STRATEGI</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Mengadakan kegiatan sosialisasi dan team building</li>
              <li>Menyusun program kerja yang jelas dan terstruktur</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <hr class="garis-tebal">
        <div class="misi-section">
          <div class="header-with-logo">
            <img src="logo/DIVISI EKSTERNAL.png" alt="Logo eksternal MI">
            <h2 class="misi-header mb-0">DIVISI EKSTERNAL</h2>
          </div>
          <div class="header-with-logo">
            <h3 class="misi-header mb-1">VISI</h3>
          </div>
          <div class="misi-text">
            <p>Menjadikan divisi eksternal yang dinamis, profesional, dan terhubung baik dengan
              pihak luar, untuk memperluas peluang kerjasama yang mendukung perkembangan mahasiswa/i
            </p>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">TARGET</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Memperluas kerjasama dengan pihak eksternal</li>
              <li>Mengembangkan platfom untuk mahasiswa/i cakupan luar prodi</li>
            </ul>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">STRATEGI</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Menjalin kemitraan dengan berbagai instansi dan organisasi</li>
              <li>Meningkatkan keterampilan mahasiswa/i dalam kegiatan eksternal</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <hr class="garis-tebal">
        <div class="misi-section">
          <div class="header-with-logo">
            <img src="logo/DIVISI IPTEK.png" alt="Logo iptek MI">
            <h2 class="misi-header mb-0">DIVISI IPTEK</h2>
          </div>
          <div class="header-with-logo">
            <h3 class="misi-header mb-1">VISI</h3>
          </div>
          <div class="misi-text">
            <p>Menjadi divisi yang mampu menghasilkan konten kreatif dan inovatif di bidangg ilmu
              pengetahuan dan teknologi, yang menginspirasi dan memberikan nilai tambah bagi mahasiswa/i.
            </p>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">TARGET</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Meningkatkan pemahaman dan penerapan teknologi oleh mahasiswa</li>
            </ul>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">STRATEGI</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Mengorganisir webinar dan seminar dengan narasumber profesional</li>
              <li>Menyelenggarakan pelatihan teknologi</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <hr class="garis-tebal">
        <div class="misi-section">
          <div class="header-with-logo">
            <img src="logo/DIVISI PSDM.png" alt="Logo PSDM MI">
            <h2 class="misi-header mb-0">DIVISI PSDM</h2>
          </div>
          <div class="header-with-logo">
            <h3 class="misi-header mb-1">VISI</h3>
          </div>
          <div class="misi-text">
            <p>Menjadi pusat invosi dalam pengembangan program yang relevan dan berdampak,
              guna mengoptimaklan potensi setiap mahasiswa/i
            </p>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">TARGET</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Meningkatkan kualitas program kerja unggulan kabinet</li>
            </ul>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">STRATEGI</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Peningkatan kualitas pengurus dan penitia</li>
              <li>Mengoptimalkan komunikasi dan promosi program</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <hr class="garis-tebal">
        <div class="misi-section">
          <div class="header-with-logo">
            <img src="logo/DIVISI BISNIS DEVELOPMENT.png" alt="Logo HMPS MI">
            <h2 class="misi-header mb-0">DIVISI BUSINESS DEVELOPMENT</h2>
          </div>
          <div class="header-with-logo">
            <h3 class="misi-header mb-1">VISI</h3>
          </div>

          <div class="misi-text">
            <p>Menjadikan divisi business development sebagau penggerak utama kewirausahaan mahasiswa/i di luar
              bidang informatika, mendukung peningkatan usaha mereka melalui promosi dan penjualan, serta menciptakan
              peluang produk baru bagi mahasiswa mi.
            </p>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">TARGET</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Meningkatkan penjualan produk mahasiswa/i</li>
              <li>Menciptakan produk mandiri dari hmps MI</li>
              <li>Membangun kolaborasi dengan mahasiswa/i yang memiliki usaha</li>
            </ul>
          </div>

          <div class="header-with-logo">
            <h3 class="misi-header mb-0">STRATEGI</h3>
          </div>
          <div class="misi-list">
            <ul>
              <li>Memfalitasi promosi dan pemasaran</li>
              <li>Menjalin kerjasama bisnis dengan mahasiswa/i</li>
              <li>Pengembangan produk sendiri</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
 <br>
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