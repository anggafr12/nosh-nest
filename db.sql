CREATE DATABASE nosh_nest

USE nosh_nest

CREATE TABLE users
(
	username VARCHAR(50),
	PASSWORD VARCHAR(50),
	levels VARCHAR(30)
)

CREATE TABLE data_barang 
(
	kode INT AUTO_INCREMENT PRIMARY KEY,
	nama VARCHAR(50),
	jumlah INT,
	harga INT,
	tanggal DATETIME
)