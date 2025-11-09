<?php
require_once __DIR__ . '/../config.php';
function galeri_index() {
    $db = db();
    return $db->query("SELECT * FROM galeri ORDER BY id DESC");
}
function galeri_create($filename, $caption='') {
    $db = db();
    $stmt = $db->prepare("INSERT INTO galeri (filename, caption) VALUES (?, ?)");
    $stmt->bind_param('ss', $filename, $caption);
    return $stmt->execute();
}
function galeri_delete($id) {
    $db = db();
    $stmt = $db->prepare("DELETE FROM galeri WHERE id=?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}
?>