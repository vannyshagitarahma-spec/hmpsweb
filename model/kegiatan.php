<?php
require_once "config.php";

function kegiatan_all() {
    global $conn;
    $sql = "SELECT * FROM kegiatan ORDER BY id DESC";
    return $conn->query($sql);
}

function kegiatan_detail($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM kegiatan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function kegiatan_tambah($judul, $isi, $gambar) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO kegiatan (judul, isi, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $isi, $gambar);
    return $stmt->execute();
}

function kegiatan_edit($id, $judul, $isi, $gambar = null) {
    global $conn;

    if ($gambar) {
        $stmt = $conn->prepare("UPDATE kegiatan SET judul=?, isi=?, gambar=? WHERE id=?");
        $stmt->bind_param("sssi", $judul, $isi, $gambar, $id);
    } else {
        $stmt = $conn->prepare("UPDATE kegiatan SET judul=?, isi=? WHERE id=?");
        $stmt->bind_param("ssi", $judul, $isi, $id);
    }

    return $stmt->execute();
}

function kegiatan_hapus($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM kegiatan WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
