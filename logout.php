<?php
session_start();          // Memulai sesi
session_unset();          // Menghapus semua data sesi
session_destroy();        // Mengakhiri sesi

header("Location: login.php");  // Mengarahkan kembali ke halaman login
exit();
?>
