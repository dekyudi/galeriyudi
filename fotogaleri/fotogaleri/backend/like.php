<?php 

	include '../koneksi.php';
	include 'userdata.php';
	$idFoto = $_GET['id'];
	$cek_like = mysqli_query($koneksi,"SELECT * FROM likefoto WHERE userID='$ses_userid' && FotoID='$idFoto'");
	if (!$cek_like->num_rows > 0) {
		mysqli_query($koneksi,"INSERT INTO likefoto VALUES (NULL,'$idFoto','$ses_userid','$tanggal')");
		echo "<script>history.back()</script>";
		exit();
	}else{
		mysqli_query($koneksi,"DELETE FROM `likefoto` WHERE userID='$ses_userid' && FotoID='$idFoto'");
		echo "<script>history.back()</script>";
		exit();
		

	}

 ?>