<?php
require_once __DIR__ . "/../config.php";   // FIX PATH

function kabinet_all() {
    global $db;
    return $db->query("SELECT * FROM kabinet ORDER BY id ASC");
}

function kabinet_detail($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM kabinet WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function kabinet_tambah($nama, $jabatan, $gambar) {
    global $db;
    $stmt = $db->prepare("INSERT INTO kabinet (nama, jabatan, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $jabatan, $gambar);
    return $stmt->execute();
}

function kabinet_edit($id, $nama, $jabatan, $gambar = null) {
    global $db;

    if ($gambar) {
        $stmt = $db->prepare("UPDATE kabinet SET nama=?, jabatan=?, gambar=? WHERE id=?");
        $stmt->bind_param("sssi", $nama, $jabatan, $gambar, $id);
    } else {
        $stmt = $db->prepare("UPDATE kabinet SET nama=?, jabatan=? WHERE id=?");
        $stmt->bind_param("ssi", $nama, $jabatan, $id);
    }

    return $stmt->execute();
}

function kabinet_hapus($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM kabinet WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
