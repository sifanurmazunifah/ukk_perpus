<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Perpustakaan Digital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 300px; /* Mengecilkan lebar container */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px; /* Mengecilkan ukuran font judul */
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px; /* Mengurangi padding input */
            margin: 6px 0; /* Mengurangi jarak antar input */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px; /* Mengecilkan ukuran font input */
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px; /* Mengecilkan ukuran font tombol */
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Perpustakaan Digital</h2>
        <form action="register.php" method="POST">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="register">Daftar</button>
        </form>
    </div>
</body>
</html>
