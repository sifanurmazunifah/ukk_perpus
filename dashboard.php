<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header dengan warna biru */
        .header {
            background-color: #007BFF; /* Biru cerah */
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        /* Sidebar dengan gradasi biru */
        .sidebar {
            height: 100vh; 
            width: 250px; 
            position: fixed; 
            top: 0;
            left: 0;
            background-color: #0056b3; /* Biru tua */
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #007BFF; /* Biru cerah saat hover */
        }

        /* Konten Utama */
        .main-content {
            margin-left: 250px; 
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        Selamat Datang di Perpustakaan Digital
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <div class="profile" style="text-align: center; margin-bottom: 20px;">
    <i class="fa-solid fa-user-circle fa-5x" style="color: white;"></i>
    <p style="color: white; margin-top: 10px; font-size: 18px;">Profil Pengguna</p>
</div>
        <a href="/dashboard.php"> Dashboard</a>
        <a href="/perpustakaan_digital/buku/index.php"> Data Buku</a>
        <a href="/perpustakaan_digital/petugas/index.php"> Data Petugas</a>
        <a href="/perpustakaan_digital/peminjaman/index.php"> Peminjaman</a>
        <a href="/perpustakaan_digital/laporan/index.php"> Laporan</a>
        <a href="/perpustakaan_digital/logout.php"> Logout</a>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <h2>Dashboard Perpustakaan</h2>
        <!-- <p>Silakan pilih menu di sidebar untuk mulai menggunakan sistem perpustakaan digital.</p> -->
    </div>

</body>
</html>
