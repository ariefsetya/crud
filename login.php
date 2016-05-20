<?php
	session_start();
	include 'conn.php';
	//cek ada variabel post email dan password
	if(isset($_POST['email']) and isset($_POST['password'])){
		//masukkan ke variabel
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		//cek ke tabel user
		$s = $koneksi->prepare('SELECT*FROM user 
									WHERE email="'.$email.'"
									AND password="'.$password.'"');
		$s->execute();
		$data = $s->fetch(PDO::FETCH_ASSOC);
		//jika data kosong, tampilkan pesan email dan password salah
		if(empty($data)){
		?>
			<div style="display:block;clear: both;
					background: red;color:white;margin: 20px;
					padding:10px;">
				E-Mail atau Password tidak terdaftar
			</div>
		<?php
		$_SESSION['logged_in']=false;
		//jika data ada, masuk dengan email dan nama yang sudah terdaftar
		//kemudian diarahkan ke halaman index
		}else{
			$nama = $data['nama'];
			$_SESSION['logged_in'] = true;
			$_SESSION['nama'] = $nama;
			$_SESSION['id'] = $data['id'];
			$_SESSION['email'] = $email;
			header("location:index.php");
		}

	}





?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" 
		type="text/css" 
		href="assets/css/css.css">
	<meta name="viewport" 
			content="width=device-width, initial-scale=1.0">
			
</head>
<body>
	<div class="login-form">
		<h1 style="text-align: center">Sign In</h1>
		<hr>
		<form method="POST" action="">
			<table>
				<tr>
					<td>E-Mail</td>
					<td><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan="2">
						No Account? <a href="register.php"
									style="color:white;">Register here</a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit">Sign In</button></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>