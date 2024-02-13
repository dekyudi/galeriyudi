<?php

include '../koneksi.php';
include 'userdata.php';

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Komentar</title>
</head>

<body>
	
	<form method="post">
		<textarea name="komentar"></textarea>
		<button type="submit" name="postBtn">Post</button>
	</form>
	<table border>
		<thead>
			<th>username</th>
			<th>isi</th>
			<th>tanggal</th>
		</thead>
		<tbody>
			<?php
			if (empty($ses_username || $ses_email)) {
				header('Location: ../index.php');
				exit();
			}
			$id_post = $_GET['id'];
			$get_komen = mysqli_query($koneksi, "SELECT * FROM `komentarfoto` WHERE FotoID='$id_post'");

			if (!$get_komen) {
				// Handle error, contoh:
				die("Error in query: " . mysqli_error($con));
			}

			foreach ($get_komen as $komen) {

				?>
				<tr>
					<td>
						<?php
						$id_user = $komen['UserID'];
						$get_user = mysqli_query($koneksi, "SELECT Username FROM user WHERE UserID='$id_user'");
						$nama = $get_user->fetch_assoc();
						echo $nama['Username'];
						?>
					</td>
					<td>
						<?php echo $komen['IsiKomentar'] ?>
					</td>
					<td>
						<?php echo $komen['TanggalKomentar'] ?>
					</td>
				</tr>
				<?php
			}
			?>

		</tbody>
	</table>
    <a href="../home.php" class="btn btn-warning btn-sm">kembali</a>
	<?php

	if (isset($_POST['postBtn'])) {
		$isi = $_POST['komentar'];
		mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES (NULL,'$id_post','$ses_userid','$isi','$tanggal')");
		echo "<script>history.back()</script>";
	}


	?>
</body>

</html>