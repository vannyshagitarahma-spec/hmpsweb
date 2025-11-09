<?php
require_once __DIR__ . '/../config.php';
function program_index() {
    $db = db();
    return $db->query("SELECT p.*, d.name as divisi_name FROM program p LEFT JOIN divisi d ON p.divisi_id=d.id ORDER BY p.id DESC");
}
function program_create($divisi_id, $title, $desc='') {
    $db = db();
    $stmt = $db->prepare("INSERT INTO program (divisi_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $divisi_id, $title, $desc);
    return $stmt->execute();
}
function program_update($id, $divisi_id, $title, $desc='') {
    $db = db();
    $stmt = $db->prepare("UPDATE program SET divisi_id=?, title=?, description=? WHERE id=?");
    $stmt->bind_param('issi', $divisi_id, $title, $desc, $id);
    return $stmt->execute();
}
function program_delete($id) {
    $db = db();
    $stmt = $db->prepare("DELETE FROM program WHERE id=?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}
?>