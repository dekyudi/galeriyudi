<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Register</title>

  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-container {
      max-width: 400px;
    }
  </style>

</head>

<body>
  <div class="container ">
    <div class="row justify-content-center">
      <!-- Gambar di Sebelah Kiri -->
      <div class="col-md-6">
        <img src="images/regis.png" class="img-fluid mt-5 mx-4" alt="Left Image">
      </div>

      <!-- Formulir Register di Bagian Kanan -->
      <div class="col-md-6 login-container mx-auto">
        <h2 class="text-center mb-4">Registrasi</h2>
        <form action="backend/register.php" method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="password">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" required>
          </div>
          <div class="form-group">
            <label for="password">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          <p class="mt-3 text-center">Akun Sudah Ada <a href="index.php" data-toggle="tab">Login Sekarang</a></p>
      </div>
      </form>
    </div>
  </div>
  </div>

</body>

</html>