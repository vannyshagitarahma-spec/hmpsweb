<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/kegiatan.php";
include "../header.php";

$id = $_GET['id'] ?? 0;
$data = kegiatan_detail($id);

if (!$data) {
    header("Location: index.php?error=notfound");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $foto = $data['foto'];

    if (!empty($_FILES['foto']['name'])) {
        $namaFile = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../../uploads/kegiatan/" . $namaFile);

        if (file_exists("../../uploads/kegiatan/" . $foto)) {
            unlink("../../uploads/kegiatan/" . $foto);
        }

        $foto = $namaFile;
    }

    kegiatan_tambah( $judul, $isi, $gambar );

    header("Location: index.php?update=success");
    exit;
}
?>

<div class="container mt-4">
    <h3>Edit Kegiatan</h3>

    <form method="POST" enctype="multipart/form-data">
        <label>Judul :</label>
        <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" required>

        <label class="mt-3">Isi :</label>
        <textarea name="isi" class="form-control" rows="6" required><?= $data['isi'] ?></textarea>

        <label class="mt-3">Foto :</label><br>
        <img src="../../uploads/kegiatan/<?= $data['foto'] ?>" width="120" class="mb-2">
        <input type="file" name="foto" class="form-control">

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

<?php include "../footer.php"; ?>
