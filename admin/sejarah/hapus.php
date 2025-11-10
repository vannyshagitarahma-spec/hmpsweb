<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/sejarah.php";

$id = $_GET['id'] ?? 0;

if (sejarah_hapus($id)) {
    header("Location: index.php");
    exit;
} else {
    echo "<div class='container mt-4 alert alert-danger'>Gagal menghapus data!</div>";
}
