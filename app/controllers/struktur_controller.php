<?php
require_once __DIR__ . '/../config.php';
function struktur_index() {
    $db = db();
    return $db->query("SELECT * FROM struktur ORDER BY id DESC");
}
function struktur_create($name, $role, $photo=null) {
    $db = db();
    $stmt = $db->prepare("INSERT INTO struktur (name, role, photo) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $role, $photo);
    return $stmt->execute();
}
function struktur_update($id, $name, $role, $photo=null) {
    $db = db();
    $stmt = $db->prepare("UPDATE struktur SET name=?, role=?, photo=? WHERE id=?");
    $stmt->bind_param('sssi', $name, $role, $photo, $id);
    return $stmt->execute();
}
function struktur_delete($id) {
    $db = db();
    $stmt = $db->prepare("DELETE FROM struktur WHERE id=?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}
?>