<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/visi_misi.php";
include "../header.php";

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if (visi_misi_tambah($judul, $isi)) {
        $pesan = "<div class='alert alert-success'>Berhasil ditambahkan!</div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menambah data!</div>";
    }
}
?>

<div class="container mt-4">
    <h3>Tambah Visi / Misi</h3>
    <?= $pesan ?>

    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="6" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../footer.php"; ?>
