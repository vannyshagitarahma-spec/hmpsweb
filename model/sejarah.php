<?php
require_once "config.php";

function sejarah_get() {
    global $conn;
    $sql = "SELECT * FROM sejarah LIMIT 1";
    return $conn->query($sql)->fetch_assoc();
}

function sejarah_update($isi) {
    global $conn;

    $stmt = $conn->prepare("UPDATE sejarah SET isi=? WHERE id=1");
    $stmt->bind_param("s", $isi);
    return $stmt->execute();
}
