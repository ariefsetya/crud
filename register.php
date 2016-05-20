<?php
	session_start();
	include 'conn.php';
	//cek ada variabel post email dan password
	if(isset($_POST['nama']) and isset($_POST['email']) 
			and isset($_POST['password'])){
		
		//masukkan ke variabel
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		//cek ke tabel user
		$s = $koneksi->prepare('SELECT*FROM user 
									WHERE email="'.$email.'"');
		$s->execute();
		$data = $s->fetch(PDO::FETCH_ASSOC);
		
		//jika data ada, tampilkan pesan email sudah terdaftar
		if(!empty($data)){
		?>
			<div style="display:block;clear: both;
					background: red;color:white;margin: 20px;
					padding:10px;">
				E-Mail sudah terdaftar
			</div>
		<?php
		$_SESSION['logged_in']=false;
		//jika data kosong, input ke tabel user dan assign ke session
		//kemudian diarahkan ke index
		}else{
			$_SESSION['logged_in'] = true;
			$_SESSION['nama'] = $nama;
			$_SESSION['email'] = $email;

			$new = $koneksi->prepare('INSERT INTO user 
						(`nama`,`email`,`password`) VALUES
						("'.$nama.'","'.$email.'","'.$password.'")');
			$new->execute();

			$_SESSION['id'] = $koneksi->lastInsertId();

			header("location:index.php?p=next_");
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" 
		type="text/css" 
		href="assets/css/css.css">
	<meta name="viewport" 
			content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="register-form">
		<h1 style="text-align: center">Sign Up</h1>
		<hr>
		<form method="POST" action="">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="nama"></td>
				</tr>
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
						Have Account? <a href="login.php"
									style="color:white;">Sign In here</a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit">Sign Up</button></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>