CREATE DATABASE nosh_nest;

USE nosh_nest;

CREATE TABLE users
(
    username VARCHAR(50) PRIMARY KEY,
    PASSWORD VARCHAR(50),
    email VARCHAR(60),
    levels VARCHAR(30),
    id_kabupaten VARCHAR(60)
);

CREATE TABLE data_kabupaten
(
    id_kabupaten VARCHAR(7) PRIMARY KEY,
    nama VARCHAR(50)
);

CREATE TABLE history_data_barang_kecamatan
(
    kode VARCHAR(7) PRIMARY KEY,
    id_kabupaten VARCHAR(7),
    nama_kabupaten VARCHAR(50),
    nama_barang VARCHAR(50),
    jumlah INT,
    harga INT,
    tanggal_update DATETIME,
    FOREIGN KEY (id_kabupaten) REFERENCES data_kabupaten(id_kabupaten)
);

CREATE TABLE data_barang_kecamatan
(
    kode VARCHAR(7) PRIMARY KEY,
    nama_barang VARCHAR(50),
    jumlah INT,
    harga INT,
    tanggal_update DATETIME
);


CREATE TABLE data_lumbung
(
    kabupaten VARCHAR(50) PRIMARY KEY,
    produk_pangan VARCHAR(50),
    produksi_ton INT,
    beras INT,
    cabai INT,
    bawang_putih INT,
    bawang_merah INT,
    lengkuas INT,
    jahe INT,
    kunyit INT,
    singkong INT,
    kedelai INT
);

DELIMITER $$

CREATE TRIGGER tambah_stok AFTER INSERT ON data_barang_kabupaten
FOR EACH ROW 
BEGIN
    IF NEW.nama_barang = 'cabai' THEN 
        UPDATE data_lumbung 
        SET produksi_ton = produksi_ton + NEW.jumlah 
        WHERE kabupaten = NEW.nama_kabupaten AND cabai = 1;
    END IF;
END $$

DELIMITER ;

