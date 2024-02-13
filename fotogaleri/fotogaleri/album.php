<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg bg-black position-fixed z-1" style="height: 100px; width: 100%">
    <div class="container-fluid">
      <a href="#">
        <img width="80" class="ms-3"
          src="images/logo.png"
          alt="">
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
<div class="container d-flex justify-content-center align-items-center flex-column bg-body-tertiary border" style="width: 50%; height: 83vh">
        <div class="">
            <h1 class="text-center p-4 ">Tambahkan Album</h1>
                <!-- ngecek apakah semua form di isi -->
                <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan']=="gagal"){
                            echo "<div class='alert alert-danger'>data belum lengkap!</div>";
                            }
                    }
                ?>

                <!-- ini php untuk ngirim album yang baru -->
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Album</label>
                    <input type="text" class="form-control" id="" name="album_name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Deskripsi Album</label>
                    <input type="text" class="form-control" id="" name="description">
                </div>
                <button type="submit" class="btn btn-primary" name="createBtn">Save</button>
            </form>

        </div>
</div>


<?php
	include 'koneksi.php';
	include 'backend/userdata.php';
	if (empty($ses_username || $ses_email)) {
		header('Location: index.php');
		exit();
	}
	if (isset($_POST['createBtn'])) {
		$tanggal = date("d-m-Y");
		$album = $_POST['album_name'];
		$descr = $_POST['description'];
		if (!empty($album && $descr)) {
			mysqli_query($koneksi, "INSERT INTO album VALUES (NULL, '$album','$descr','$tanggal','$ses_userid')");
		} else {
			header("location:album.php?pesan=gagal");
		}
	}
	?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>