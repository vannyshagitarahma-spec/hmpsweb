<?php
$res = program_index();
echo '<h3>Program Kerja</h3>';
echo '<a href="admin.php?page=program_create">Tambah Program</a>';
echo '<ul>';
while($r = $res->fetch_assoc()) {
    echo '<li>['.$r['divisi_name'].'] '.$r['title'].' - <a href="admin.php?page=program_edit&id='.$r['id'].'">Edit</a> | <a href="admin.php?page=program_delete&id='.$r['id'].'">Hapus</a></li>';
}
echo '</ul>';
?>