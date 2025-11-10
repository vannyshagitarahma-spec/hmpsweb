<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/struktur.php";

$id = $_GET['id'] ?? 0;
$data = struktur_detail($id);

if ($data && file_exists("../../uploads/struktur/" . $data['foto'])) {
    unlink("../../uploads/struktur/" . $data['foto']);
}

struktur_hapus($id);

header("Location: index.php");
exit;
