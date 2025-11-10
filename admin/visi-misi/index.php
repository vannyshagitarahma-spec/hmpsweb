<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/visi_misi.php";
include "../header.php";

$data = visi_misi_all();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Visi & Misi</h3>
        <a href="tambah.php" class="btn btn-primary">Tambah</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th width="50">No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while ($row = $data->fetch_assoc()) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= substr($row['isi'], 0, 200); ?>...</td>
                <td>
                    <a onclick="return confirm('Yakin hapus?')" 
                       href="hapus.php?id=<?= $row['id']; ?>" 
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>
