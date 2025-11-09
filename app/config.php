<?php
// Simple DB config (edit with your credentials)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); 
define('DB_NAME', 'website_db'); // ✅ Diganti dari hmps_db ke website_db

function db() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die('Database connect error: ' . $conn->connect_error);
    }
    return $conn;
}
?>
