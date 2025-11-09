<?php
$res = galeri_index();
echo '<h3>Galeri</h3>';
echo '<a href="admin.php?page=galeri_upload">Upload Foto</a>';
echo '<ul>';
while($r = $res->fetch_assoc()) {
    echo '<li><img src="public/uploads/galeri/'.$r['filename'].'" style="max-width:120px"><br>'.$r['caption'].'<br><a href="admin.php?page=galeri_delete&id='.$r['id'].'">Hapus</a></li>';
}
echo '</ul>';
?>