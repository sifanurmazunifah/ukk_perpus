<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "perpustakaan_digital";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data peminjaman
// $sql = "SELECT p.id_peminjaman, b.judul_buku, u.nama_lengkap, p.tanggal_pinjam, p.tanggal_kembali, p.status 
//         FROM peminjaman p
//         JOIN buku b ON p.id_buku = b.id_buku
//         JOIN user u ON p.id_user = u.id_user
//         ORDER BY p.tanggal_pinjam DESC";
// $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
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
        margin-left: 250px; 
        padding: 30px;
        width: calc(100% - 250px); 
        display: flex; 
        justify-content: center;
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
    
    <h3>Laporan Peminjaman Buku</h3>
    <div class="container">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php while($row = $result->fetch_assoc()) { ?> -->
                    <tr>
                        <td><?= $row['id_peminjaman'] ?></td>
                        <td><?= $row['judul_buku'] ?></td>
                        <td><?= $row['nama_lengkap'] ?></td>
                        <td><?= $row['tanggal_pinjam'] ?></td>
                        <td><?= $row['tanggal_kembali'] ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php $conn->close(); ?>
