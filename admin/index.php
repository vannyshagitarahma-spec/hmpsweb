<?php include "header.php"; ?>

<h2 class="fw-bold mb-4">Dashboard Admin</h2>

<div class="row">

    <div class="col-md-4">
        <div class="admin-card">
            <h4><i class="fa fa-newspaper"></i> Berita</h4>
            <p>Kelola semua berita</p>
            <a href="berita.php" class="btn btn-dark btn-sm">Kelola</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="admin-card">
            <h4><i class="fa fa-calendar"></i> Kegiatan</h4>
            <p>Kelola semua kegiatan</p>
            <a href="kegiatan.php" class="btn btn-dark btn-sm">Kelola</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="admin-card">
            <h4><i class="fa fa-users"></i> Kabinet</h4>
            <p>Kelola struktur kabinet</p>
            <a href="kabinet.php" class="btn btn-dark btn-sm">Kelola</a>
        </div>
    </div>

</div>

<?php include "footer.php"; ?>
