<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/struktur.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Jika ID tidak valid
if ($id <= 0) {
    header("Location: index.php?error=invalid_id");
    exit;
}

// Ambil data struktur berdasarkan ID
$data = struktur_detail($id);

// Jika data tidak ditemukan
if (!$data) {
    header("Location: index.php?error=notfound");
    exit;
}

// Hapus file foto jika ada
if (!empty($data['foto'])) {
    $filePath = "../../uploads/struktur/" . $data['foto'];

    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Hapus data dari database
struktur_hapus($id);

// Kembali ke halaman index
header("Location: index.php?hapus=success");
exit;
?>
