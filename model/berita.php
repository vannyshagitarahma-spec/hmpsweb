<?php
require_once __DIR__ . "/../config.php";

/* Ambil semua berita */
function berita_index() {
    global $db;
    $sql = "SELECT * FROM berita ORDER BY id DESC";
    return $db->query($sql);
}

/* Ambil semua berita (array) */
function berita_all() {
    global $db;
    $result = $db->query("SELECT * FROM berita ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

/* Tambah berita */
function berita_tambah($judul, $isi, $gambar) {
    global $db;
    $stmt = $db->prepare("INSERT INTO berita (judul, isi, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $isi, $gambar);
    return $stmt->execute();
}

/* Update berita */
function berita_edit($id, $judul, $isi, $gambar = null) {
    global $db;

    if ($gambar) {
        $stmt = $db->prepare("UPDATE berita SET judul=?, isi=?, gambar=? WHERE id=?");
        $stmt->bind_param("sssi", $judul, $isi, $gambar, $id);
    } else {
        $stmt = $db->prepare("UPDATE berita SET judul=?, isi=? WHERE id=?");
        $stmt->bind_param("ssi", $judul, $isi, $id);
    }

    return $stmt->execute();
}

/* Hapus berita */
function berita_hapus($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM berita WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
