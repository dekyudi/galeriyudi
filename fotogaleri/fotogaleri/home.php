<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

  <div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="my-5 text-center col-12" style="margin-top: 100px;">
      <h1 class="mt-5 poppins-m">Selamat Datang Di Website Gallery Foto</h1>
      <p class="text-secondary mb-3">
        Simpan semua moment kenangan anda
      </p>
      <div class="row">
        <div class=" mt-3">
          <!-- <div class="input-group mb-3">
            <input type="text" class="form-control py-3" placeholder="Search image..." aria-describedby="search-img" />
            <button class="btn btn-dark z-n1" id="search-img">Search</button>
          </div> -->
          <!-- <small>Cari Sesuai Katagori :
            <b>Food, Technology, user, people, bussiness</b></small> -->
        </div>
      </div>
    </div>
  </div>

  <!-- semua konten -->
  <div class="">
    <div class="row ">
      <?php
      include 'koneksi.php';
      include 'backend/userdata.php';
      if (empty($ses_username || $ses_email)) {
        header('Location: index.php');
        exit();
      }
      $get_all_post = mysqli_query($koneksi, "SELECT foto.UserID, foto.JudulFoto, foto.FotoID, foto.LokasiFile, user.Username FROM foto INNER JOIN user WHERE foto.UserID = user.UserID ORDER BY foto.TanggalUnggah DESC");
      $counter = 0;
      foreach ($get_all_post as $postingan) {
        ?>
        <div class="col-md-2 mb-5 mx-5">
          <div class="card" style="width: 16rem;">
            <a href="backend/detail_img.php?id=<?php echo $postingan['FotoID'] ?>">
              <img src="images/<?php echo $postingan['LokasiFile']; ?>" width="100%" height="300px"
                style="object-fit: cover;" />
            </a>
            <div class=" card-body d-flex justify-content-between">
              <p class="card-text">
                <?php echo $postingan['JudulFoto'] ?>
              </p>
              <tr>
                <p class="ms-5">
                  <a href="backend/like.php?id=<?php echo $postingan['FotoID']; ?>"><img src="aset/like.png" class="me-2"
                      alt="" srcset=""></a>
                  <?php
                  $id_foto = $postingan['FotoID'];
                  $get_like = mysqli_query($koneksi, "SELECT COUNT(fotoID) AS TotalLike FROM likefoto WHERE FotoID='$id_foto'");
                  $like = $get_like->fetch_assoc();
                  echo $like['TotalLike']; ?>

                </p>

                <a href="backend/komentar.php?id=<?php echo $postingan['FotoID']; ?>"><img src="aset/comment.png" alt=""
                    srcset="" class="icon"></a>
            </div>
          </div>
        </div>
        <?php
        $counter++;
        if ($counter % 4 == 0) {
          // Menambahkan row baru setelah setiap 4 card
          echo '</div><div class="row">';
        }
      }
      ?>
    </div>
  </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  </bodys>

</html>