<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/kabinet.php";
include "../header.php";

$id = $_GET['id'] ?? 0;
$data = kabinet_detail($id);

if (!$data) {
    header("Location: index.php?error=notfound");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $foto = $data['foto'];

    if (!empty($_FILES['foto']['name'])) {
        $namaFile = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../../uploads/kabinet/" . $namaFile);

        if (file_exists("../../uploads/kabinet/" . $foto)) {
            unlink("../../uploads/kabinet/" . $foto);
        }

        $foto = $namaFile;
    }

    kabinet_edit($id, $nama, $jabatan, $foto);

    header("Location: index.php?update=success");
    exit;
}
?>

<div class="container mt-4">
    <h3>Edit Kabinet</h3>

    <form method="POST" enctype="multipart/form-data">
        <label>Nama :</label>
        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>

        <label class="mt-3">Jabatan :</label>
        <input type="text" class="form-control" name="jabatan" value="<?= $data['jabatan'] ?>" required>

        <label class="mt-3">Foto :</label><br>
        <img src="../../uploads/kabinet/<?= $data['foto'] ?>" width="120" class="mb-2">
        <input type="file" name="foto" class="form-control">

        <button class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

<?php include "../footer.php"; ?>
