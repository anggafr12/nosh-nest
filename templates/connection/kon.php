<?php

// Fungsi untuk melakukan koneksi ke database
function connectDB() {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'nosh_nest';

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

?>
