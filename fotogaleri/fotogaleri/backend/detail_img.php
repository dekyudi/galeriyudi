<?php
    include '../koneksi.php';
    
    // Ambil ID gambar dari parameter GET
    $gambar_id = $_GET['id'];

    // Query untuk mendapatkan detail gambar
    $query = "SELECT foto.UserID, foto.JudulFoto, foto.DeskripsiFoto, foto.FotoID, foto.LokasiFile, user.Username FROM foto INNER JOIN user ON foto.UserID = user.UserID WHERE foto.FotoID = $gambar_id";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dijalankan
    if (!$result) {
        die("Error: " . mysqli_error($koneksi));
    }

    // Ambil data gambar sebagai objek
    $detail_gambar = mysqli_fetch_assoc($result);

    // Tutup koneksi
    mysqli_close($koneksi);
?>

<!-- Bagian HTML untuk menampilkan detail gambar -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Detail Gambar</title>

    <style>
        img{
            width: 100%;
        }
        .icon{
            width: 30px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h3 class="text-center my-3">Detail Gambar</h3>

        <div class="container d-flex border">
            <!-- Menampilkan gambar -->
            <div class="p-2 w-50">
            <img src="../images/<?php echo $detail_gambar['LokasiFile']; ?>" alt="Gambar">
            </div>
            <!-- Menampilkan informasi detail gambar -->
            <div class="">
                <p>Diunggah Oleh: <?php echo $detail_gambar['Username']; ?></p>
                <p>Judul Foto: <?php echo $detail_gambar['JudulFoto']; ?></p>
                <p>Deskripsi foto: <?php echo $detail_gambar['DeskripsiFoto'] ?></p>
                <!-- <p><a href="hapus.php?FotoID=<?= $data['FotoID'] ?>">Hapus</a></p> -->
            </div>
        </div>

        
        


        


        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->

        <a href="../home.php">kembali</a>

    </div>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
