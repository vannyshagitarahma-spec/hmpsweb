<?php
session_start();

// ✅ Pastikan admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// ✅ Gunakan config yang benar
require_once __DIR__ . '/../app/config.php';

// ✅ Load controllers
require_once __DIR__ . '/../app/controllers/divisi_controller.php';
require_once __DIR__ . '/../app/controllers/program_controller.php';
require_once __DIR__ . '/../app/controllers/struktur_controller.php';
require_once __DIR__ . '/../app/controllers/galeri_controller.php';

// ✅ Routing aman
$allowed_pages = ['dashboard', 'divisi', 'program', 'struktur', 'galeri'];
$page = $_GET['page'] ?? 'dashboard';

if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard';
}

ob_start();

// ✅ Load view sesuai halaman
include __DIR__ . '/../app/views/' . $page . '/index.php';

$content = ob_get_clean();
?>
<!doctype html>
<html>
<head>
    <title>Admin Panel - HMPS</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <?php echo $content; ?>
</body>
</html>
