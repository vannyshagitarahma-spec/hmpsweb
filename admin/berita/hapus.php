<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/berita.php";

// Pastikan ada ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Hapus berita dari database
berita_hapus($id);

// Kembali ke halaman index
header("Location: index.php");
exit;
