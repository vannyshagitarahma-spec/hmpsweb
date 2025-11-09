<?php
// Unified DB connection for admin — uses app/config.php (db() function)
require_once __DIR__ . '/../app/config.php';

// Provide $conn for legacy code compatibility
$conn = db();
if (!$conn) {
    die('Failed to connect to database.');
}
?>
