<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
  $data = mysqli_fetch_assoc($query);

  if ($data && $password === $data['password']) {
    $_SESSION['admin'] = $data['username'];
    header("Location: dashboard.php");
    exit;
  } else {
    echo "<script>alert('Login gagal! Username atau password salah');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="col-md-4 mx-auto bg-white p-4 rounded shadow">
      <h4 class="text-center mb-4">Login Admin</h4>
      <form method="post">
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</body>

</html>