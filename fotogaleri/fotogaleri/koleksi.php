<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Koleksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    /* body{
        background-color: aquamarine;
    }
	table{
		color: aquamarine;
	} */
	.trash{
		width: 20px;
		height: 20px;
	}

    .kecil{
        width: 100px;
    }

</style>
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

<div style="padding-top: 100px;">
	<h2 class="text-center">Ini Semua Foto Yang Anda Upload</h2>
		<?php
		include 'koneksi.php';
		include 'backend/userdata.php';
		if (empty($ses_username || $ses_email)) {
			header('Location: index.php');
			exit();
		}
		?>
		
		<table class="table border-1">
			<tr class="text-center">
          <!-- <th>ID Foto</th> -->
					<th>Foto</th>
					<th>Judul</th>
					<th>Deskripsi</th>
					<Th>Tanggal Upload</Th>
					<th>Action</th>
				</tr>
			<?php 
			$get_foto = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$ses_userid'");
			foreach($get_foto as $foto){
			?>
				<tr class="text-center">
          <!-- <td><?php echo $foto['FotoID'] ?></td> -->
					<td><img class="kecil" src="images/<?php echo $foto['LokasiFile']; ?>"></td>
					<td><?php echo $foto['JudulFoto'] ?></td>
					<td><?php echo $foto['DeskripsiFoto'] ?></td>
					<td><?php echo $foto['TanggalUnggah'] ?></td>
					<td>
						<a href="backend/hapus.php?id=<?=$foto['FotoID']?>"><img src="images/delet.png" alt="" srcset="" class="trash"></a>
            <a href="update.php?id=<?=$foto['FotoID']?>"><img src="images/update.png" alt="" srcset="" class="trash"></a>
					</td>
				</tr>


			<?php 
			} ?>

		</table>

		</div>
		





 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>