<?php
    include "../koleksi.php";
// Ambil ID foto yang akan dihapus
$id_foto = $_GET['id']; // Anda bisa menggunakan metode yang lebih aman seperti prepared statement untuk menghindari serangan SQL injection

// Query untuk mengambil nama file foto dan lokasi penyimpanannya dari database
$query_select = "SELECT LokasiFile FROM foto WHERE FotoID = $id_foto";
$result = mysqli_query($koneksi, $query_select);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $nama_file = $row['LokasiFile'];

    // Hapus foto dari folder
    $lokasi_foto = "images" . $nama_file;
    if (file_exists($lokasi_foto)) {
        unlink($lokasi_foto); // Hapus file foto dari folder
    }

    // Query untuk menghapus data foto dari database
    $query_delete = "DELETE FROM foto WHERE FotoID = $id_foto";
    if (mysqli_query($koneksi, $query_delete)) {
        echo "Foto berhasil dihapus dari database dan folder.";
         // Arahkan kembali ke folder foto
         header("Location: ../koleksi.php");
         exit();
    } else {
        echo "Error: " . $query_delete . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Error: " . $query_select . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
