<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/berita.php";
include "../header.php";

// Ambil semua berita
$data = berita_all();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Berita</h3>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Berita</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="60">Foto</th>
                <th>Judul</th>
                <th>Isi</th>
                <th width="130">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $b): ?>
                <tr>
                    <td><img src="../../uploads/<?= $b['gambar'] ?>" class="img-fluid" style="height:60px"></td>
                    <td><?= htmlspecialchars($b['judul']) ?></td>
                    <td><?= substr(strip_tags($b['isi']), 0, 80) ?>...</td>
                    <td>
                        <a href="hapus.php?id=<?= $b['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus berita ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>
