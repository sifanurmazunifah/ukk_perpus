<?php
include 'koneksi.php'; // File koneksi database

// Proses penyimpanan peminjaman
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_peminjaman = date('Y-m-d');
    $tanggal_pengembalian = date('Y-m-d', strtotime('+7 days')); // Pengembalian 7 hari kemudian

    // Cek stok buku
    $cekStok = mysqli_query($conn, "SELECT stok FROM buku WHERE id_buku = $id_buku");
    $dataBuku = mysqli_fetch_assoc($cekStok);

    if ($dataBuku['stok'] > 0) {
        // Simpan ke tabel peminjaman
        $query = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_peminjaman, tanggal_pengembalian, status)
                  VALUES ('$id_anggota', '$id_buku', '$tanggal_peminjaman', '$tanggal_pengembalian', 'Dipinjam')";
        mysqli_query($conn, $query);

        // Update stok buku
        mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id_buku = $id_buku");

        echo "<script>alert('Peminjaman berhasil!'); window.location.href='peminjaman.php';</script>";
    } else {
        echo "<script>alert('Stok buku habis!'); window.location.href='peminjaman.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
</head>
<body>
    <h2>Form Peminjaman Buku</h2>

    <form method="POST" action="peminjaman.php">
        <label for="id_anggota">Pilih Anggota:</label><br>
        <select name="id_anggota" required>
            <option value="">-- Pilih Anggota --</option>
            <?php
            $anggota = mysqli_query($conn, "SELECT * FROM anggota");
            while ($row = mysqli_fetch_assoc($anggota)) {
                echo "<option value='{$row['id_anggota']}'>{$row['nama']}</option>";
            }
            ?>
        </select><br><br>

        <label for="id_buku">Pilih Buku:</label><br>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php
            $buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");
            while ($row = mysqli_fetch_assoc($buku)) {
                echo "<option value='{$row['id_buku']}'>{$row['judul']} (Stok: {$row['stok']})</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Pinjam Buku</button>
    </form>

    <hr>

    <h2>Daftar Peminjaman</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $peminjaman = mysqli_query($conn, "
            SELECT peminjaman.*, anggota.nama, buku.judul 
            FROM peminjaman 
            JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
            JOIN buku ON peminjaman.id_buku = buku.id_buku
            ORDER BY peminjaman.tanggal_peminjaman DESC
        ");

        while ($row = mysqli_fetch_assoc($peminjaman)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['judul']}</td>
                    <td>{$row['tanggal_peminjaman']}</td>
                    <td>{$row['tanggal_pengembalian']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        ".($row['status'] == 'Dipinjam' ? "<a href='kembalikan.php?id={$row['id_peminjaman']}'>Kembalikan</a>" : "-")."
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
