<?php
require_once "config.php";

// Ambil semua data sejarah
function sejarah_all() {
    global $conn;
    return $conn->query("SELECT * FROM sejarah ORDER BY id DESC");
}

// Ambil 1 data berdasarkan ID
function sejarah_detail($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM sejarah WHERE id=? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Tambah data sejarah
function sejarah_tambah($isi) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO sejarah (isi) VALUES (?)");
    $stmt->bind_param("s", $isi);
    return $stmt->execute();
}

// Update data sejarah (untuk edit default)
function sejarah_edit($isi) {
    global $conn;

    $stmt = $conn->prepare("UPDATE sejarah SET isi=? WHERE id=1");
    $stmt->bind_param("s", $isi);
    return $stmt->execute();
}

// Hapus data sejarah
function sejarah_hapus($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM sejarah WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
