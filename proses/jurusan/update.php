<?php 
	include '../../conn.php';
	include '../../conf.php';

	$id = post('id');
	$id_sekolah = post('id_sekolah');
	$nama_jurusan = post('nama_jurusan');
	$ka_jurusan = post('ka_jurusan');

	$s = $koneksi->prepare('UPDATE jurusan SET
			id_sekolah="'.$id_sekolah.'",
			nama_jurusan="'.$nama_jurusan.'",
			ka_jurusan="'.$ka_jurusan.'"
				WHERE
			id="'.$id.'"');

	$s->execute();

	header("location:../../index.php?p=jurusan");

?>