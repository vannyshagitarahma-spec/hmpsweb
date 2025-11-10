<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/sejarah.php";
include "../header.php";

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isi = $_POST['isi'];

    if (sejarah_tambah($isi)) {
        $pesan = "<div class='alert alert-success'>Sejarah berhasil ditambahkan!</div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menambahkan sejarah!</div>";
    }
}
?>

<div class="container mt-4">
    <h3>Tambah Sejarah</h3>

    <?= $pesan ?>

    <form method="POST">
        <div class="mb-3">
            <label>Isi Sejarah</label>
            <textarea name="isi" class="form-control" rows="10" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../footer.php"; ?>
