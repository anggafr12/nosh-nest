<?php
// Sisipkan file koneksi.php
require_once('../../../connection/koneksi.php');

// Ambil data yang dikirimkan melalui form
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama'];
$jumlah_barang = $_POST['jumlah'];
$harga_barang = $_POST['harga'];

// Koneksi ke database
$conn = connectDB();

// Query untuk mengubah data barang
$query = "UPDATE data_penjualan SET nama='$nama_barang', jumlah='$jumlah_barang', harga='$harga_barang' WHERE kode='$kode_barang'";
if ($conn->query($query) === TRUE) {
    // Redirect kembali ke halaman utama setelah berhasil diubah
    header("Location: ../index_lumbung.php");
    exit();
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>
