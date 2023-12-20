<?php
// Sisipkan file koneksi.php
require_once('../../connection/kon.php');

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

        // Form untuk mengubah data barang
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ubah Data Barang</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-4">
                <h2 class="section__header">UBAH DATA BARANG</h2>
                <form action="proses/proses_ubah_barang.php" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Barang:</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $row['kode']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Barang:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang:</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Barang:</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d\TH:i', strtotime($row['tanggal'])); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" onclick="goBack()">Kembali</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo '<div class="container mt-4">';
        echo '<p class="alert alert-danger">Data barang tidak ditemukan.</p>';
        echo '</div>';
    }

    $conn->close();
} else {
    echo '<div class="container mt-4">';
    echo '<p class="alert alert-danger">Kode barang tidak valid.</p>';
    echo '</div>';
}
?>

<script>
    function goBack() {
        window.history.back();
    }
</script>
