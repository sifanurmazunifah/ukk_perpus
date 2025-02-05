<?php
// Konfigurasi database
$host = 'localhost';
$db = 'perpustakaan_digital';
$user = 'root';
$pass = ''; // Ganti jika ada password untuk MySQL

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $conn->real_escape_string($_POST['email']);
    $nama_lengkap = $conn->real_escape_string($_POST['nama_lengkap']);
    $alamat = $conn->real_escape_string($_POST['alamat']);

    // Cek apakah email atau username sudah terdaftar
    $check_query = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email atau Username sudah terdaftar!'); window.location='login.php';</script>";
    } else {
        // Simpan data ke database
        $insert_query = "INSERT INTO user (username, password, email, nama_lengkap, alamat) 
                         VALUES ('$nusername','$password', '$email', '$nama_lengkap', '$alamat')";

        if ($conn->query($insert_query) === TRUE) 
        {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
