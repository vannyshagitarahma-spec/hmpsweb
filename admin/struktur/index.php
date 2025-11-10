<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/struktur.php";
include "../header.php";

$data = struktur_all();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Struktur Organisasi</h3>
        <a href="tambah.php" class="btn btn-primary">Tambah Struktur</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="60">ID</th>
                <th width="120">Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><img src="../../uploads/struktur/<?= $row['foto'] ?>" width="90" class="rounded"></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jabatan'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>

<?php include "../footer.php"; ?>
