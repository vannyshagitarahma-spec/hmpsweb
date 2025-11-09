<?php
// Basic CRUD for Divisi (uses simple procedural style)
require_once __DIR__ . '/../config.php';
function divisi_index() {
    $db = db();
    $res = $db->query("SELECT * FROM divisi ORDER BY id DESC");
    return $res;
}
function divisi_create($name, $desc='') {
    $db = db();
    $stmt = $db->prepare("INSERT INTO divisi (name, description) VALUES (?, ?)");
    $stmt->bind_param('ss', $name, $desc);
    return $stmt->execute();
}
function divisi_update($id, $name, $desc='') {
    $db = db();
    $stmt = $db->prepare("UPDATE divisi SET name=?, description=? WHERE id=?");
    $stmt->bind_param('ssi', $name, $desc, $id);
    return $stmt->execute();
}
function divisi_delete($id) {
    $db = db();
    $stmt = $db->prepare("DELETE FROM divisi WHERE id=?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}
?>