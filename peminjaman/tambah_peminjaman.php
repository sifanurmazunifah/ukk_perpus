<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $peminjaman = $_POST['peminjaman'];
    $user = $_POST['user'];
    $buku = $_POST['buku'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = $_POST['status_peminjaman'];

    $query = "INSERT INTO peminjaman (peminjaman, id_user, id_buku, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) 
              VALUES ('$peminjaman', '$user', '$buku', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Gagal menambahkan nama peminjam: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Petugas</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center; /* Menengahkan semua konten di halaman */
        }

        /* Header dengan warna biru */
        .header {
            background-color: #007BFF; /* Biru cerah */
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            width: 100%; /* Membuat header mengambil lebar penuh */
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
            padding: 30px;
            width: 80%; /* Menentukan lebar konten */
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            text-align: center; /* Menengahkan teks dalam tabel */
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Tombol dan link */
        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            color: #0056b3;
        }

        .container {
            width: 90%; /* Lebar konten yang lebih kecil */
            margin: 20px auto;
        }
    </style>
</head>
<body>

<div class="header">
        Selamat Datang di Perpustakaan Digital
    </div>
    <div class="sidebar">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <div class="profile" style="text-align: center; margin-bottom: 20px;">
    <i class="fa-solid fa-user-circle fa-5x" style="color: white;"></i>
    <p style="color: white; margin-top: 10px; font-size: 18px;">Profil Pengguna</p>
    </div>

        <a href="/perpustakaan_digital/dashboard.php"> Dashboard</a>
        <a href="/perpustakaan_digital/buku/index.php"> Data Buku</a>
        <a href="/perpustakaan_digital/petugas/index.php"> Data Petugas</a>
        <a href="pinjam_buku.php"> Peminjaman</a>
        <a href="kembalikan_buku.php"> Laporan</a>
        <a href="kategori_buku.php"> Logout</a>
    </div><br>

</head>
<body>
    <h1>Tambah Peminjaman</h1>
    <form method="POST">
        Nama Peminjam <input type="text" name="peminjaman" required><br>
        Judul Buku <input type="text" name="buku"><br>
        Tanggal Peminjaman <input type="date" name="tanggal_peminjaman"><br>
        Tanggal Pengembalian <input type="date" name="tanggal_pengembalian"><br>
        Status Peminjaman <input type="text" name="status_peminjaman"><br>
        <input type="submit" value="Tambah Petugas">
    </form>
    <a href="index.php">Kembali ke Data Petugas</a>
</body>
</html>
