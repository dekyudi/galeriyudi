<?php 

	$host = "localhost";
	$user = "root";
	$pw = "";
	$db = "ukkgaleri";

	$koneksi = mysqli_connect($host,$user,$pw,$db);

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>