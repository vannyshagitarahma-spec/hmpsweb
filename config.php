<?php
$db = new mysqli("localhost", "root", "", "website_db");

if ($db->connect_errno) {
    die("Gagal koneksi database: " . $db->connect_error);
}

// Fungsi koneksi yang benar
function db() {
    global $db;
    return $db;
}

// Base URL
function base_url($path = '') {
    return "http://localhost/tes/" . $path;
}

define("UPLOAD_PATH", __DIR__ . "/uploads/");
?>
