<?php 

include('../koneksi.php');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$check = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$username' || Email='$username'");
		if ($check->num_rows > 0) {
			$login_username = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$username' && Password='$password'");
			if ($login_username->num_rows > 0) {
				session_start();
				$get_userdat = $check->fetch_assoc();
				$_SESSION['username'] = $get_userdat['Username'];
				$_SESSION['userID'] = $get_userdat['UserID'];
				$_SESSION['password'] = $get_userdat['Password'];
				$_SESSION['email'] = $get_userdat['Email'];
				$_SESSION['fullname'] = $get_userdat['NamaLengkap'];
				$_SESSION['alamat'] = $get_userdat['Alamat'];
				header('Location: ../home.php');
				exit();
			} else {
				$login_email = mysqli_query($koneksi, "SELECT * FROM user WHERE Email='$username' && Password='$password'");
				if ($login_email->num_rows > 0) {
					session_start();
					$get_userdat = $check->fetch_assoc();
					$_SESSION['username'] = $get_userdat['Username'];
					$_SESSION['userID'] = $get_userdat['UserID'];
					$_SESSION['password'] = $get_userdat['Password'];
					$_SESSION['email'] = $get_userdat['Email'];
					$_SESSION['fullname'] = $get_userdat['NamaLengkap'];
					$_SESSION['alamat'] = $get_userdat['Alamat'];
					header('Location: ../home.php');
				} 
				else {
					echo "password salah";
					exit();
				}
			}
		} else {
			header("location:index.php?pesan=gagal");
		}
?>

