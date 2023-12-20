<?php
// Mulai sesi
session_start();

// Fungsi koneksi ke database
include '../../connection/koneksi.php';

// Pesan awal (kosong)
$message = '';

// Cek apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];

    // Query SQL untuk memasukkan data ke database
    $query = "INSERT INTO data_barang (kode, nama, jumlah, harga, tanggal) VALUES ('$kode', '$nama', '$jumlah', '$harga', '$tanggal')";

    // Jalankan query
    if (mysqli_query($koneksi, $query)) {
        // Jika sukses, atur pesan
        $message = "Data barang berhasil disimpan.";
    } else {
        // Jika gagal, atur pesan kesalahan
        $message = "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles.css" />
</head>
<body>
    <header class="header">
        <!-- ... your header content ... -->
    </header>

    <section class="section__container" id="form">
        <!-- ... (form content) ... -->
        <?php
        // Tampilkan pesan sukses atau kesalahan
        if (!empty($message)) {
            echo '<div class="alert ' . (strpos($message, 'berhasil') !== false ? 'alert-success' : 'alert-danger') . '">' . $message . '</div>';
        }
        ?>
    </section>

    <section class="section__container" id="form">
        <div class="container">
            <h2 class="section__header">FORM INPUT BARANG</h2>
            <?php
            // Remove the following line, as session_start() is already called at the beginning
            // session_start();
            
            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }

            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <form action="proses/input_data_barang.php" method="post">
                <div class="form-group">
                    <label for="kode">Kode Barang:</label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Barang:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Barang:</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga Barang:</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="goBack()">Kembali</button>
            </form>
        </div>
    </section>

    <!-- ... your other sections ... -->

    <!-- Bootstrap JS and dependencies -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../../main.js"></script>
</body>
</html>
