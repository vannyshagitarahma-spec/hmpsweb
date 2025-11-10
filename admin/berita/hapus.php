<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/berita.php";

$id = $_GET['id'];

// Ambil data berita utk hapus file gambar
$berita = berita_detail($id);
if ($berita && !empty($berita['gambar'])) {
    $file_path = "../../uploads/" . $berita['gambar'];
    if (file_exists($file_path)) unlink($file_path);
}

// Hapus dari database
berita_hapus($id);

header("Location: index.php");
exit;
