<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Login</title>

    <style>
    /* body {
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
  .login-container {
    margin-top: 120px;
    max-width: 400px;
  } */
  </style>

</head>
<body>
<div class="container">
        <div class="content">
            <div class="card mt-5 mb-5">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <img src="images/login.png" width="300" class="form-group mt-5">
                          </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                                <h5>Masukan Username dan Password untuk Login</h5>
                                <?php 
	                               if(isset($_GET['pesan'])){
		                            if($_GET['pesan']=="gagal"){
			                        echo "<div class='alert alert-danger'>Username dan Password Tidak Sesuai !</div>";
		                            }
	                                }

                                    if(isset($_GET['pesan'])){
                                        if($_GET['pesan']=="info_login"){
                                        echo "<div class='alert alert-info'>Maaf Kamu Belum Login !!</div>";
                                    }
                                    }

                                    if(isset($_GET['pesan'])){
                                        if($_GET['pesan']=="info_logout"){
                                        echo "<div class='alert alert-success'>Kamu Berhasil Logout !!</div>";
                                    }
                                    }

                                    if(isset($_GET['pesan'])){
                                        if($_GET['pesan']=="info_daftar"){
                                            echo "<div class='alert alert-success'>Kamu Berhasil Daftar,Silahkan Login </div>";
                                    }
                                    }
                                        
	                                    ?>
                                <form method="post" action="backend/login.php">
                               
                                    <div class="form-group mt-2">
                                        <label for="">Username</label>  
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="">Password</label>  
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Silahkan Daftar Akun Terlebih Dahulu !!</label><br>
                                        <a href="register.php" class="btn btn-warning btn-sm">Daftar Akun</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         </div>
    </div>

    
</body>
</html>