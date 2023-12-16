<?php
session_start();

// Sisipkan file koneksi.php
require_once('../../../connection/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];

    // Koneksi ke database
    $conn = connectDB();

    // Query untuk memasukkan data barang ke database
    $query = "INSERT INTO data_barang (kode, nama, jumlah, harga, tanggal) VALUES ('$kode', '$nama', '$jumlah', '$harga', '$tanggal')";

    if ($conn->query($query) === TRUE) {
        $_SESSION['message'] = "Data Barang berhasil disimpan!";
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }

    $conn->close();

    // Redirect ke halaman formulir
    header("Location: ../input_barang.php");
    exit();
} else {
    // Jika bukan metode POST, redirect ke halaman formulir
    header("Location: ../input_barang.php");
    exit();
}
?>
