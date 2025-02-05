<?php
include 'config.php';

$id = $_GET['id'];
$query = "DELETE FROM user WHERE id_user = $id";

if (mysqli_query($conn, $query)) {
    header('Location: index.php');
} else {
    echo "Gagal menghapus petugas: " . mysqli_error($conn);
}
?>
