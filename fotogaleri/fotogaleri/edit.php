<!DOCTYPE html>
<html>
<head>
    <title>edit</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
    <h3>Edit data</h3>
    
    <?php 
    include "koneksi.php";
    
    // Pastikan FotoID diatur dan tidak kosong
    if (isset($_GET['FotoID']) && !empty($_GET['FotoID'])) {
        $FotoID = $_GET['FotoID'];

        // Gunakan prepared statements untuk mencegah SQL injection
        $stmt = mysqli_prepare($koneksi, "SELECT * FROM foto WHERE FotoID = ?");
        mysqli_stmt_bind_param($stmt, "i", $FotoID);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)){
    ?>
    <form action="update.php" method="post"> 
        <table>
            <!-- <tr>
                <td>ID Foto</td>
                <td>
                <input type="hidden" name="FotoID" value="<?php echo $row['FotoID'] ?>">
                </td>
            </tr> -->
            <tr>
                <td>Judul Foto</td>
                <td>
                    <input type="text" name="JudulID" value="<?php echo $row['JudulID'] ?>">
                </td> 
            </tr> 
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto" value="<?php echo $row['DeskripsiFoto'] ?>"></td> 
            </tr> 
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td> 
            </tr> 
        </table>
    </form>
    <?php 
        }
    }
    ?>
</body>
</html>
