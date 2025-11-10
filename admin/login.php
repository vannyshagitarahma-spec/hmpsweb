<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

require "../config.php";

$err = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $q = $db->query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");

    if ($q->num_rows > 0) {
        $_SESSION['admin'] = $user;
        header("Location: index.php");
        exit;
    } else {
        $err = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin HMPS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #e5e7eb;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial;
        }

        .login-box {
            width: 380px;
            padding: 35px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .login-box h3 {
            font-weight: bold;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h3 class="text-center">LOGIN ADMIN</h3>

    <?php if ($err) { ?>
        <div class="alert alert-danger"><?php echo $err; ?></div>
    <?php } ?>

    <form method="POST">
        <label>Username</label>
        <input class="form-control mb-3" type="text" name="username" required>

        <label>Password</label>
        <input class="form-control mb-3" type="password" name="password" required>

        <button class="btn btn-dark w-100 mt-3">Login</button>
    </form>
</div>

</body>
</html>
