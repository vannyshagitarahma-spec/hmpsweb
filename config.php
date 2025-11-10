<?php
// ====== KONEKSI DATABASE ======
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "website_db";

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ====== FUNGSI GLOBAL DATABASE ======
function db() {
    global $conn;
    return $conn;
}

// ====== FUNGSI URL (AGAR ADMIN & PUBLIK TIDAK BERTABRAKAN) ======
function base_url($path = '') {
    return "http://localhost/website-hmps/" . $path;
}

// Lokasi folder upload
define("UPLOAD_PATH", __DIR__ . "/uploads/");
?>
