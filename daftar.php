<?php
    include "inc/koneksi.php";

    // Ambil dan bersihkan data dari formulir
    $nama = isset($_POST['nama_pengguna']) ? mysqli_real_escape_string($koneksi, $_POST['nama_pengguna']) : "";
    $email = isset($_POST['username']) ? filter_var($_POST['username'], FILTER_SANITIZE_EMAIL) : "";
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
	$level = isset($_POST['level']) ? mysqli_real_escape_string($koneksi, $_POST['level']) : "";


    // Validasi data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "";
    } else {
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO tb_pengguna (nama_pengguna, username, password) VALUES ('$nama', '$email', '$password')";

        // Jalankan query
        $result = mysqli_query($koneksi, $query);

        // Periksa hasil query
        if ($result) {
            #echo "Pendaftaran berhasil!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar | SISCURE</title>
	<link rel="icon" href="dist/img/login.jpg">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<center>
					<img src="dist/img/login.jpg" width=170px/>
					<br>
					<br>
					<h5>
						<b>Sistem Data Kependudukan</b>
						<p>Perumahan CUR 2 Cikarang</p>
					</h5>
					<h6> <b> FORM DAFTAR <b> <h6>
					<br>
				</center>
                <form action="daftar.php" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="nama_pengguna" placeholder="nama_pengguna" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
                <form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="email" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="level" placeholder="level" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-danger btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Daftar</b>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-danger btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b><a href="login.php">kembali</a></b>
                </form>
				</div>
			</div>
		</div>
</body>
</html>
