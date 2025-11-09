<?php
$res = divisi_index();
echo '<h3>Daftar Divisi</h3>';
echo '<a href="admin.php?page=divisi_create">Tambah Divisi</a>';
echo '<ul>';
while($r = $res->fetch_assoc()) {
    echo '<li>'.$r['name'].' - <a href="admin.php?page=divisi_edit&id='.$r['id'].'">Edit</a> | <a href="admin.php?page=divisi_delete&id='.$r['id'].'">Hapus</a></li>';
}
echo '</ul>';
?>