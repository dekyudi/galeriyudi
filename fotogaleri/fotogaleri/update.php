<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
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

  <?php
include "edit.php";

// Ambil ID foto yang akan diupdate
$id_foto = $_GET['id']; // Anda bisa menggunakan metode yang lebih aman seperti prepared statement untuk menghindari serangan SQL injection

// Query untuk mengambil data foto berdasarkan ID
$query_select = "SELECT * FROM foto WHERE FotoID = $id_foto";
$result = mysqli_query($koneksi, $query_select);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Periksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai baru dari form
        $judul_baru = $_POST["JudulFoto"];
        $deskripsi_baru = $_POST["DeskripsiFoto"];

        // Query untuk melakukan update
        $query_update = "UPDATE foto SET JudulFoto = '$judul_baru', DeskripsiFoto = '$deskripsi_baru' WHERE FotoID = $id_foto";

        if (mysqli_query($koneksi, $query_update)) {
            echo "Data foto berhasil diupdate.";
            // Arahkan kembali ke halaman koleksi atau halaman lain yang diinginkan
            header("Location:koleksi.php");
            exit();
        } else {
            echo "Error: " . $query_update . "<br>" . mysqli_error($koneksi);
        }
    }
    ?>
      // Form untuk pengguna menginput nilai baru
      <div class="container d-flex justify-content-center align-items-center flex-column bg-body-tertiary border" style="width: 50%; height: 83vh">
        <div class="">
            <h1 class="text-center p-4 ">Edit Data Foto</h1>
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
            <!-- <div class="mb-3">
                    <label for="FotoID" class="form-label">ID Foto</label>
                    <input type="text" class="form-control" id="" name="FotoID" value="<?php echo $row['FotoID']; ?>">
                </div> -->
                <div class="mb-3">
                    <label for="JudulFoto" class="form-label">Judul Foto</label>
                    <input type="text" class="form-control" id="" name="JudulFoto" value="<?php echo $row['JudulFoto']; ?>">
                </div>
                <div class="mb-3">
                    <label for="DeskripsiFoto" class="form-label">Deskripsi Foto</label>
                    <input type="text" class="form-control" id="" name="DeskripsiFoto" value="<?php echo $row['DeskripsiFoto']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="createBtn">Save</button>
            </form>

        </div>
</div>
        <?php
        } else {
        echo "Error: " . $query_select . "<br>" . mysqli_error($koneksi);
            }

// Tutup koneksi
mysqli_close($koneksi);
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>