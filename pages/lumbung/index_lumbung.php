<!DOCTYPE html>
<html lang="en">
<?php
// Mulai sesi
session_start();

// Fungsi koneksi ke database
include '../../connection/kon.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, arahkan ke halaman login atau lakukan tindakan lain sesuai kebutuhan Anda
    header("Location: ../../index.html");
    exit();
}

// Fungsi logout
if (isset($_GET['logout'])) {
    // Hapus semua data sesi
    session_unset();
    
    // Hancurkan sesi
    session_destroy();

    // Redirect ke halaman login atau halaman lainnya
    header("Location: ../../index.html");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOSH NEST | ADMIN LUMBUNG</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../styles.css" />
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <!-- Navigation Bar -->
        <nav>
            <div class="nav__logo"><a href="#">ADMIN LUMBUNG</a></div>
            <ul class="nav__links" id="nav-links">
                <li class="link"><a href="#home">INPUT BARANG</a></li>
                <li class="link"><a href="#choose">DATA REQUEST</a></li>
            </ul>
            <button type="button" class="btn btn-primary" onclick="logout()">KELUAR</button>
            <div class="nav__menu__btn" id="menu-btn">
                <span><i class="ri-menu-line"></i></span>
            </div>
            <div class="nav__actions">
                <span><i class="ri-search-fill"></i></span>
                <span><i class="ri-user-fill"></i></span>
            </div>
        </nav>
        <!-- Content Section -->
        <div class="section__container header__container" id="home">
            <h1>NoshNest: Menyambungkan Desa, Melayani Kebutuhan Pangan.</h1>
            <p>
                Amanah Pangan untuk Desa Sejahtera! Satukan Langkah, Sediakan Ketersediaan Makanan untuk Semua.
            </p>
            <form action="/">
                <input type="text" placeholder="Cari Lumbung Pangan" />
                <button><i class="ri-search-line"></i></button>
            </form>
            <a href="#choose"><i class="ri-arrow-down-double-line"></i></a>
        </div>
    </header>

    <!-- Modern Section -->
    <section class="section__container" id="modern">
    <link rel="stylesheet" href="style.css" />
        <h2 class="section__header">
            DATA BARANG LUMBUNG PANGAN
        </h2>
        <br>
        <!-- Table Section -->
        <div class="table-container">
        <table class="table custom-table">
            <tr class="thead-dark">
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php 
            include '../../connection/koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from data_barang order by kode");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['kode']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['tanggal']; ?></td>
                    <td>
                    <!-- Tambah tombol Edit dan Hapus -->
                        <button onclick="editBarang('<?php echo $d['kode']; ?>')">Edit</button>
                        <button onclick="hapusBarang('<?php echo $d['kode']; ?>')">Hapus</button>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </table>
        </div>
        <br>
        <!-- Button Section -->
        <button class="btn" onclick="inputBarang()">INPUT BARANG</button>
        <button class="btn" onclick="ubahBarang()">UBAH BARANG</button>
    </section>

    <!-- JavaScript Section -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../../main.js"></script>

    <!-- JavaScript Functions -->
    <script>
        function logout() {
        // Konfirmasi logout
        if (confirm("Apakah Anda yakin ingin keluar?")) {
            // Redirect ke halaman logout dengan menyertakan parameter logout
            window.location.href = 'index_lumbung.php?logout=1';
        }
        }

        function inputBarang() {
            // Mengarahkan pengguna ke halaman input_barang.php
            window.location.href = 'input_barang.php';
        }

        function ubahBarang() {
            // Mengarahkan pengguna ke halaman input_barang.php
            window.location.href = 'ubah_barang.php';
        }

        function editBarang(kode) {
            // Mengarahkan pengguna ke halaman edit_barang.php dengan menyertakan parameter kode
            window.location.href = 'ubah_barang.php?kode=' + kode;
        }

        function hapusBarang(kode) {
            // Konfirmasi hapus, jika disetujui, mengarahkan pengguna ke halaman hapus_barang.php dengan menyertakan parameter kode
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = 'hapus_barang.php?kode=' + kode;
            }
        }
    </script>
</body>
</html>