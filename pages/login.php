<?php
session_start(); // Memulai sesi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database (sesuaikan dengan konfigurasi Anda)
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'nosh_nest';

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk memeriksa login
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            // Login berhasil
            $user_data = $result->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['levels'] = $user_data['levels'];

            // Mengarahkan ke halaman yang sesuai dengan levels
            if ($user_data['levels'] == 'kecamatan') {
                header("Location: lumbung/index_lumbung.php");
            } elseif ($user_data['levels'] == 'desa') {
                header("Location: desa/index_desa.html");
            } else {
                // Levels tidak sesuai, sesuaikan dengan kebutuhan
                header("Location: login.html?error=invalid_levels");
            }

            exit();
        } else {
            // Username atau password tidak ditemukan
            header("Location: login.html?error=" . urlencode("Invalid username or password"));
            exit();
        }
    } else {
        // Terjadi kesalahan dalam query
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
