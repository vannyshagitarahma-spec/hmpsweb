<?php
require_once "config.php";

function struktur_index() {
    global $conn;
    return $conn->query("SELECT * FROM struktur ORDER BY urutan ASC");
}

function struktur_create($nama, $jabatan, $foto) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO struktur (nama, jabatan, foto) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $jabatan, $foto);
    return $stmt->execute();
}

function struktur_update($id, $nama, $jabatan, $foto = null) {
    global $conn;

    if ($foto) {
        $stmt = $conn->prepare("UPDATE struktur SET nama=?, jabatan=?, foto=? WHERE id=?");
        $stmt->bind_param("sssi", $nama, $jabatan, $foto, $id);
    } else {
        $stmt = $conn->prepare("UPDATE struktur SET nama=?, jabatan=? WHERE id=?");
        $stmt->bind_param("ssi", $nama, $jabatan, $id);
    }

    return $stmt->execute();
}

function struktur_delete($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM struktur WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
