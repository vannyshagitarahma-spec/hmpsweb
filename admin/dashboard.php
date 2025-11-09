<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Aman dari XSS
$adminName = htmlspecialchars($_SESSION['admin']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3>Selamat datang, <?= $adminName; ?> </h3>
    <hr>

    <a href="index.php" class="btn btn-success">Kelolah Data</a>

    <!-- pastikan path logout sesuai -->
    <a href="../logout.php" class="btn btn-danger">Logout</a>
  </div>
</body>
</html>
