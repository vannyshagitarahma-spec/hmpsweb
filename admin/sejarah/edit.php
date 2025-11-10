<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/sejarah.php";
include "../header.php";

$data = sejarah_all();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $isi = $_POST['isi'];

    sejarah_edit($isi);

    header("Location: index.php?update=success");
    exit;
}
?>

<div class="container mt-4">
    <h3>Edit Sejarah</h3>

    <form method="POST">
        <label>Isi Sejarah :</label>
        <textarea name="isi" class="form-control" rows="10" required><?= $isi['isi'] ?></textarea>

        <button class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
</div>

<?php include "../footer.php"; ?>
