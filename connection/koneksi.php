<?php 
$koneksi = mysqli_connect("localhost","root","","nosh_nest");

// Cek Koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>