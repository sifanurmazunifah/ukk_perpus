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

        <a href="/perpustakaan_digital/dashboard.php"> Dashboard</a>
        <a href="/perpustakaan_digital/buku/index.php"> Data Buku</a>
        <a href="/perpustakaan_digital/petugas/index.php"> Data Petugas</a>
        <a href="/perpustakaan_digital/peminjaman/index.php"> Peminjaman</a>
        <a href="/perpustakaan_digital/laporan/index.php"> Laporan</a>
        <a href="/perpustakaan_digital/logout.php"> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1>Daftar Buku</h1>
            <a href="tambah_buku.php">Tambah Buku</a><br>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $result = mysqli_query($conn, "SELECT * FROM buku");
                $no = 1;
                while($buku = mysqli_fetch_assoc($result)): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                    <img src="/perpustakaan_digital/buku/book/lgnd.jpeg" alt="Sampul Buku" style="width: 80px; height: auto;">
                    </td>
                    <td><?= $buku['judul']; ?></td>
                    <td><?= $buku['penulis']; ?></td>
                    <td><?= $buku['penerbit']; ?></td>
                    <td><?= $buku['tahun_terbit']; ?></td>
                    <td>
                        <a href="edit_buku.php?id=<?= $buku['id_buku']; ?>">Edit</a> |
                        <a href="hapus_buku.php?id=<?= $buku['id_buku']; ?>" onclick="return confirm('Yakin hapus buku ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table><br>
            <a href="../dashboard.php">Kembali ke Halaman Dashboard</a>
        </div>
    </div>

</body>
</html>
