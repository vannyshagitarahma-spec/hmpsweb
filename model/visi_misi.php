<?php
require_once "config.php";

// Ambil semua visi misi
function visi_misi_all() {
    global $conn;
    return $conn->query("SELECT * FROM visi_misi ORDER BY id DESC");
}

// Tambah visi misi baru
function visi_misi_tambah($judul, $isi) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO visi_misi (judul, isi) VALUES (?, ?)");
    $stmt->bind_param("ss", $judul, $isi);
    return $stmt->execute();
}

// Hapus visi misi
function visi_misi_hapus($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM visi_misi WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
