<?php
$engi = "mysql";
$host = "localhost";
$dbsa = "crud";
$user = "root";
$pass = "windows10";

$koneksi = new PDO($engi.':dbname='.$dbsa.";host=".$host,
					$user,
					$pass);
?>