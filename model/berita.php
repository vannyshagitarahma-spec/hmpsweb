<?php
require_once "config.php";

/* Ambil semua berita */
function berita_index() {
    global $conn;
    $sql = "SELECT * FROM berita ORDER BY id DESC";
    return $conn->query($sql);
}

/* Ambil 1 berita berdasarkan ID */
function berita_detail($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

/* Tambah berita */
function berita_create($judul, $isi, $gambar) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO berita (judul, isi, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $isi, $gambar);
    return $stmt->execute();
}

/* Update */
function berita_update($id, $judul, $isi, $gambar = null) {
    global $conn;

    if ($gambar) {
        $stmt = $conn->prepare("UPDATE berita SET judul=?, isi=?, gambar=? WHERE id=?");
        $stmt->bind_param("sssi", $judul, $isi, $gambar, $id);
    } else {
        $stmt = $conn->prepare("UPDATE berita SET judul=?, isi=? WHERE id=?");
        $stmt->bind_param("ssi", $judul, $isi, $id);
    }

    return $stmt->execute();
}

/* Hapus */
function berita_delete($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM berita WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
