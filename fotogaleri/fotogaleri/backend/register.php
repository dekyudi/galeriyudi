<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nama = $_POST['nm_lengkap'];
$alamat = $_POST['alamat'];


 
// menginput data ke database
mysqli_query($koneksi,"insert into user values('','$username','$password','$email','$nama','$alamat')");

// 3 digunakan untuk peminjam
 
// mengalihkan halaman kembali ke index.php
header("location:../index.php?pesan=info_daftar");
 
?>