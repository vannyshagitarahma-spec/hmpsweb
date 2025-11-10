<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/kegiatan.php";
include "../header.php";

$data = kegiatan_all();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Kegiatan</h3>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Kegiatan</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="60">Foto</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th width="130">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $k): ?>
                <tr>
                    <td>
                        <img src="../../uploads/<?= $k['gambar'] ?>" 
                             class="img-fluid"
                             style="height:60px">
                    </td>
                    <td><?= htmlspecialchars($k['judul']) ?></td>
                    <td><?= substr(strip_tags($k['deskripsi']), 0, 80) ?>...</td>
                    <td>
                        <a href="hapus.php?id=<?= $k['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus kegiatan ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>
