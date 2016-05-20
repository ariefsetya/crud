<?php

	include '../../conn.php';
	include '../../conf.php';

	$s = $koneksi->prepare('DELETE FROM jurusan 
		WHERE
			id="'.get('id').'"');
	$s->execute();

	header('location:../../index.php?p=jurusan');

?>