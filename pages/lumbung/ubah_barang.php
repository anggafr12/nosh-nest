<?php
// Sisipkan file koneksi.php
require_once('../../connection/koneksi.php');

// Ambil kode barang dari parameter GET
if (isset($_GET['kode'])) {
    $kode_barang = $_GET['kode'];

    // Koneksi ke database
    $conn = connectDB();

    // Query untuk mengambil data barang berdasarkan kode
    $query = "SELECT * FROM data_barang WHERE kode='$kode_barang'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Tampilkan tabel dengan data barang
        echo '<h2>Data Barang</h2>';
        echo '<table border="1">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                </tr>
                <tr>
                    <td>' . $row['kode'] . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . $row['jumlah'] . '</td>
                    <td>' . $row['harga'] . '</td>
                    <td>' . $row['tanggal'] . '</td>
                </tr>
            </table>';

        // Tampilkan form untuk mengubah data
        echo '<form action="proses_ubah_barang.php" method="post">
                <input type="hidden" name="kode_barang" value="' . $row['kode'] . '">

                <label for="nama">Nama Barang:</label>
                <input type="text" id="nama" name="nama" value="' . $row['nama'] . '" required>

                <label for="jumlah">Jumlah Barang:</label>
                <input type="number" id="jumlah" name="jumlah" value="' . $row['jumlah'] . '" required>

                <label for="harga">Harga Barang:</label>
                <input type="number" id="harga" name="harga" value="' . $row['harga'] . '" required>

                <button type="submit" class="btn">Simpan Perubahan</button>
            </form>';
    } else {
        echo 'Data barang tidak ditemukan.';
    }

    $conn->close();
} else {
    echo 'Kode barang tidak valid.';
}
?>
