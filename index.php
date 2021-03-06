<?php
include 'conn.php';
include 'conf.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" 
			content="width=device-width, initial-scale=1.0">
			
		<title>PDO CRUDSRUD</title>
		<link rel="stylesheet" 
			type="text/css" 
			href="assets/css/css.css">

	</head>
	<body>
		<div id="top-gray"></div>
		<div class="header">
			<div class="big-logo">Latihan CRUDSRUD</div>
			<?php inc('menu');?>
		</div>
		<div class="content">
			<div class="container">
			<?php
			if(!is_null(get('p'))){
				switch (get('p')) {
				case 'home':
					inc('home');
				break;
				case 'sekolah':
					switch (get('m')) {
					case 'home':
						inc('tampilan/sekolah/all');
					break;
					case 'add':
						inc('tampilan/sekolah/add');
					break;
					case 'edit':
						inc('tampilan/sekolah/edit');
					break;
					default:
						inc('tampilan/sekolah/all');
					break;
					}
				break;
				//buat case jurusan baru
				case 'jurusan':
					switch (get('m')) {
						case 'home':
							inc('tampilan/jurusan/all');
						break;
						case 'add':
							inc('tampilan/jurusan/add');
						break;
						case 'edit':
							inc('tampilan/jurusan/edit');
						break;
						default:
							inc('tampilan/jurusan/all');
						break;
					}
				break;
				case 'addnews':
					inc('tampilan/news/add');
				break;
				case 'next_':
					inc('tampilan/news/next_');
				break;

				default:
					inc('home');
				break;
			}
			}else{
				inc('home');
			}
			?>
			</div>
		</div>
	</body>
</html>