<?php
require_once "../keamanan.php";
require_once "../../config.php";
require_once "../../model/visi_misi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

visi_misi_hapus($id);

header("Location: index.php");
exit;
