
<?php
include 'koneksi.php';
include 'backend/userdata.php';
if (empty($ses_username || $ses_email)) {
	header('Location: index.php');
	exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-black position-fixed z-1 md-2" style="height: 100px; width: 100%">
    <div class="container-fluid">
      <a href="#">
        <img width="80" class="ms-3"
          src="images/logo.png"alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item fs-5">
            <a class="nav-link active text-light" aria-current="page" href="home.php">Rumah</a>
          </li>
          <li class="nav-item fs-5">
            <a class="nav-link active text-light" aria-current="page" href="album.php">Tambah Album</a>
          </li>
          <li class="nav-item fs-5">
            <a class="nav-link text-light" href="post_foto.php">Upload Foto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fs-5" href="koleksi.php">Ini Koleksi</a>
          </li>
        </ul>
        <form action="backend/logout.php" method="post">
          <input type="submit" value="Log Out" class="btn btn-light ms-2 py-1 mt-2">
        </form>
      </div>
    </div>
  </nav>

        <!-- kode di mulai -->
		
  <div class=" border container d-flex justify-content-center align-items-center flex-column bg-body-tertiary mt-5" style="width: 50%; height: 83vh">
		<h4 class="text-center py-5">Upload Foto di sini</h4>
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Pilih Foto</label>
  					<input type="file" class="form-control" id="" name="image">
				</div>
				<div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul Foto</label>
                    <input type="text" class="form-control" id="" name="judul">
                </div>
				<div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="" name="deskripsi">
                </div>

				<div>
					<select class="form-select mb-4" aria-label="Pilih Album" name="album">
						<option selected>Pilih Album</option>
						<?php
							$get_album = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$ses_userid'");
							foreach ($get_album as $album) {
								?>
								<option value="<?php echo $album['AlbumID']; ?>"><?php echo $album['NamaAlbum'] ?></option>
							<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary float-right " name="postBtn">Save</button>
		</form>
	<?php
	if (isset($_POST['postBtn'])) {
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];
		$extensi = array('png', 'jpeg', 'jpg');
		$album = $_POST['album'];

		$nama_file = $_FILES['image']['name'];
		$ukuran_file = $_FILES['image']['size'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);

		if (!in_array($ext, $extensi)) {
			echo "extensi file tidak benar!";
		} else {
			$pict = $nama_file;
			move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $nama_file);
			$q_upload = "INSERT INTO `foto`  VALUES (NULL, '$judul', '$deskripsi', '$tanggal', '$pict', '$album', '$ses_userid');";
			$upload = mysqli_query($koneksi, $q_upload);
		}
	}
	?>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>