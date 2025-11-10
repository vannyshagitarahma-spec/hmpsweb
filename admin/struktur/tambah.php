<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/struktur.php";
include "../header.php";

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    $folder = "../../uploads/struktur/";
    if (!is_dir($folder)) mkdir($folder, 0777, true);

    move_uploaded_file($tmp, $folder . $foto);

    if (struktur_tambah($nama, $jabatan, $foto)) {
        $pesan = "<div class='alert alert-success'>Data berhasil ditambahkan!</div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menambah data!</div>";
    }
}
?>

<div class="container mt-4">
    <h3>Tambah Struktur Organisasi</h3>

    <?= $pesan ?>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?php include "../footer.php"; ?>
