<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/berita.php";
include "../header.php";

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = "";

    // Upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = time() . "_" . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../uploads/" . $gambar);
    }

    if (berita_tambah($judul, $isi, $gambar)) {
        $msg = "<div class='alert alert-success'>Berita berhasil ditambahkan!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Gagal menambah berita.</div>";
    }
}
?>

<div class="container mt-4">
    <h3>Tambah Berita</h3>

    <?= $msg ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul Berita</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../footer.php"; ?>
