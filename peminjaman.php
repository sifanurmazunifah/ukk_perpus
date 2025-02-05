<?php
include('../config.php');
session_start();

if (!isset($_SESSION['user'])) {
    echo "Silakan login untuk melihat riwayat peminjaman.";
    exit;
}

$id_pengguna = $_SESSION['user']['id_pengguna'];
$query = "SELECT peminjaman.*, buku.judul FROM peminjaman 
          INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
          WHERE peminjaman.id_pengguna = $id_pengguna
          ORDER BY peminjaman.tanggal_peminjaman DESC";
$result = $conn->query($query);

echo "<h1>Riwayat Peminjaman</h1>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['judul'] . "</h3>";
        echo "<p>Tanggal Peminjaman: " . $row['tanggal_peminjaman'] . "</p>";
        echo "<p>Status Pengembalian: " . ($row['status_pengembalian'] ? "Sudah Dikembalikan" : "Belum Dikembalikan") . "</p>";
        
        // Tampilkan tombol pengembalian jika buku belum dikembalikan
        if (!$row['status_pengembalian']) {
            echo "<form method='POST' action='proses_pengembalian.php'>
                    <input type='hidden' name='id_peminjaman' value='" . $row['id_peminjaman'] . "'>
                    <button type='submit' name='kembalikan'>Kembalikan Buku</button>
                  </form>";
        }

        echo "</div><hr>";
    }
} else {
    echo "<p>Anda belum meminjam buku.</p>";
}
?>
