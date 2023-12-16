<?php
require_once('../../connection/koneksi.php');

// Koneksi ke database
$conn = connectDB();

// Query untuk mengambil data barang dari database
$query = "SELECT * FROM data_barang";
$result = $conn->query($query);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

// Output the data as JSON
return $data;
?>
