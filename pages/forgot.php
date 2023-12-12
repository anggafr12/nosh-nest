<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'nosh_nest';

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lakukan langkah-langkah reset password (contoh hanya menampilkan pesan)
    echo "Tautan reset password telah dikirim ke email Anda.";

    $conn->close();
}
?>
