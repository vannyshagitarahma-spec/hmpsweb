<?php
// koneksi database
$conn = new mysqli("localhost", "root", "", "website_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Buat folder uploads jika belum ada
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// =================== TAMBAH DATA ===================
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $divisi = $_POST['divisi'];

    $foto = "";
    if ($_FILES['foto']['name'] != "") {
        $foto = $uploadDir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }

    $sql = "INSERT INTO kabinet (nama, jabatan, divisi, foto) VALUES ('$nama', '$jabatan', '$divisi', '$foto')";
    $conn->query($sql);
    header("Location: admin_kabinet.php");
    exit;
}

// =================== EDIT DATA ===================
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $divisi = $_POST['divisi'];

    $updateFoto = "";
    if ($_FILES['foto']['name'] != "") {
        $updateFoto = ", foto='" . $uploadDir . basename($_FILES['foto']['name']) . "'";
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . basename($_FILES['foto']['name']));
    }

    $sql = "UPDATE kabinet SET nama='$nama', jabatan='$jabatan', divisi='$divisi' $updateFoto WHERE id=$id";
    $conn->query($sql);
    header("Location: admin_kabinet.php");
    exit;
}

// =================== HAPUS DATA ===================
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM kabinet WHERE id=$id");
    header("Location: admin_kabinet.php");
    exit;
}

// =================== AMBIL DATA ===================
$result = $conn->query("SELECT * FROM kabinet ORDER BY FIELD(divisi,'struktur inti','internal','eksternal','iptek','psdm','business development'), id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Kabinet</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f7f7f7; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #007BFF; color: #fff; }
        td img { border-radius: 5px; }
        a { text-decoration: none; color: #007BFF; margin-right: 10px; }
        a:hover { text-decoration: underline; }
        form { background: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type=text], select, input[type=file] { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc; }
        button { padding: 10px 20px; border: none; border-radius: 4px; background: #007BFF; color: #fff; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<h2>Panel Admin Kabinet</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Divisi</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jabatan'] ?></td>
        <td><?= $row['divisi'] ?></td>
        <td>
            <?php if($row['foto'] != ""): ?>
                <img src="<?= $row['foto'] ?>" width="50">
            <?php endif; ?>
        </td>
        <td>
            <a href="?edit_id=<?= $row['id'] ?>">Edit</a>
            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<hr>

<?php
// FORM TAMBAH / EDIT
$editData = null;
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $editData = $conn->query("SELECT * FROM kabinet WHERE id=$id")->fetch_assoc();
}
?>

<h2><?= $editData ? "Edit" : "Tambah" ?> Data Anggota Kabinet</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

    Nama:
    <input type="text" name="nama" value="<?= $editData['nama'] ?? '' ?>" required>

    Jabatan:
    <input type="text" name="jabatan" value="<?= $editData['jabatan'] ?? '' ?>" required>

    Divisi:
    <select name="divisi" required>
        <?php
        $divisiList = ['struktur inti','internal','eksternal','iptek','psdm','business development'];
        foreach($divisiList as $div) {
            $selected = ($editData['divisi'] ?? '') == $div ? 'selected' : '';
            echo "<option value='$div' $selected>$div</option>";
        }
        ?>
    </select>

    Foto: <input type="file" name="foto">
    
    <button type="submit" name="<?= $editData ? 'edit' : 'tambah' ?>">
        <?= $editData ? "Simpan Perubahan" : "Tambah Anggota" ?>
    </button>
</form>

</body>
</html>
