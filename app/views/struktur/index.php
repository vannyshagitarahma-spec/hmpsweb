<?php
$res = struktur_index();
echo '<h3>Struktur Anggota</h3>';
echo '<a href="admin.php?page=struktur_create">Tambah Anggota</a>';
echo '<ul>';
while($r = $res->fetch_assoc()) {
    echo '<li>'.$r['name'].' ('.$r['role'].') - <a href="admin.php?page=struktur_edit&id='.$r['id'].'">Edit</a> | <a href="admin.php?page=struktur_delete&id='.$r['id'].'">Hapus</a></li>';
}
echo '</ul>';
?>