<?php
require_once "config.php";

function kabinet_all() {
    global $conn;
    $sql = "SELECT * FROM kabinet ORDER BY posisi ASC";
    return $conn->query($sql);
}

function kabinet_detail($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM kabinet WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function kabinet_tambah($nama, $jabatan, $gambar) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO kabinet (nama, jabatan, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $jabatan, $gambar);
    return $stmt->execute();
}

function kabinet_edit($id, $nama, $jabatan, $gambar = null) {
    global $conn;

    if ($gambar) {
        $stmt = $conn->prepare("UPDATE kabinet SET nama=?, jabatan=?, gambar=? WHERE id=?");
        $stmt->bind_param("sssi", $nama, $jabatan, $gambar, $id);
    } else {
        $stmt = $conn->prepare("UPDATE kabinet SET nama=?, jabatan=? WHERE id=?");
        $stmt->bind_param("ssi", $nama, $jabatan, $id);
    }

    return $stmt->execute();
}

function kabinet_hapus($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM kabinet WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
