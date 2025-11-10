<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - HMPS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- CUSTOM ADMIN STYLE -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #1f2937;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
        }

        .sidebar .brand {
            font-size: 22px;
            color: white;
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar a {
            padding: 12px 20px;
            display: block;
            color: #d1d5db;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #374151;
            color: white;
            padding-left: 25px;
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            padding: 30px;
        }

        /* CARD STYLE */
        .admin-card {
            padding: 25px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        /* NAVBAR TOP */
        .topbar {
            background: white;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            position: fixed;
            left: 250px;
            right: 0;
            top: 0;
            z-index: 10;
        }

        .content-body {
            margin-top: 80px;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="brand">⚙️ ADMIN HMPS</div>

    <a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
    <a href="berita.php"><i class="fa fa-newspaper"></i> Berita</a>
    <a href="kegiatan.php"><i class="fa fa-calendar"></i> Kegiatan</a>
    <a href="kabinet.php"><i class="fa fa-users"></i> Kabinet</a>
    <a href="struktur.php"><i class="fa fa-sitemap"></i> Struktur</a>
    <a href="sejarah.php"><i class="fa fa-book"></i> Sejarah</a>
    <a href="visi_misi.php"><i class="fa fa-bullseye"></i> Visi Misi</a>

    <a href="logout.php" style="margin-top:20px; color:#f87171;">
        <i class="fa fa-right-from-bracket"></i> Logout
    </a>
</div>

<div class="topbar d-flex justify-content-end align-items-center px-4">
    <span class="text-muted">👋 Hi, Admin</span>
</div>

<div class="content">
    <div class="content-body">
