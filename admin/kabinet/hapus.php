<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/kabinet.php";

$id = $_GET['id'] ?? 0;
$data = kabinet_detail($id);

// hapus file foto
if ($data && file_exists("../../uploads/kabinet/" . $data['foto'])) {
    unlink("../../uploads/kabinet/" . $data['foto']);
}

// hapus database
kabinet_hapus($id);

header("Location: index.php");
exit;
