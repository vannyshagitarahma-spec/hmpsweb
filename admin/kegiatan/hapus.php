<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/kegiatan.php";

$id = $_GET['id'];

// Ambil data kegiatan untuk hapus gambar
$kg = kegiatan_detail($id);

if ($kg && !empty($kg['gambar'])) {
    $path = "../../uploads/" . $kg['gambar'];
    if (file_exists($path)) unlink($path);
}

// Hapus dari database
kegiatan_hapus($id);

header("Location: index.php");
exit;
