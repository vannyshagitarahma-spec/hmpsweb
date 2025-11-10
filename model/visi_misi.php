<?php
require_once "config.php";

function visi_misi_get() {
    global $conn;
    return $conn->query("SELECT * FROM visi_misi LIMIT 1")->fetch_assoc();
}

function visi_misi_update($visi, $misi) {
    global $conn;

    $stmt = $conn->prepare("UPDATE visi_misi SET visi=?, misi=? WHERE id=1");
    $stmt->bind_param("ss", $visi, $misi);

    return $stmt->execute();
}
