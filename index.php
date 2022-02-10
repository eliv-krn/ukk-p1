<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Lapor Diri</title>
</head>
<body>
	<form action="" method="POST">
		<label for="">NIK : </label>
		<input type="text" name="nik" placeholder="NIK">
		<label for="">Password : </label>
		<input type="Password" name="password" placeholder="Password">
		<input type="submit" name="submit" value="Login">
		<br>
		<a href="daftar.php">Daftar Akun</a>
	</form>

	<?php 
		if (isset($_POST['submit'])) {
			$user = trim($_POST['nik']);
			$pass = trim($_POST['password']);
			if (!strlen($user) || !strlen($pass)) {
				die("Silahkan masukkan NIK dan Password dengan benar");
			}
			$sukses = false;
			$handle = fopen('config.csv', 'r');
			while ($data = fgetcsv($handle) !==false) {
				if ($data[0]==$user && $data[1]==$pass) {
					$sukses=true;
					break;
				}
			}
			fclose($handle);
			if ($sukses) {
				session_start();
				$_SESSION['nama']=$data[1];
				header('location:home.php');
			} else {
				echo "Gagal";
			}
		}

	 ?>

</body>
</html>