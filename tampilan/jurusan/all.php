<?php
$jurusan = $koneksi->prepare('SELECT jurusan.*, sekolah.nama 
			FROM jurusan 
			LEFT JOIN sekolah ON sekolah.id=jurusan.id_sekolah');
$jurusan->execute();
$data = $jurusan->fetchAll();
?>
<a href="index.php?p=jurusan&m=add" class="btn pull-right">Add New</a>
<h2>Data Jurusan</h2>
<table class="data">
	<thead>
		<tr>
			<th>No</th>
			<th>Sekolah</th>
			<th>Nama Jurusan</th>
			<th>Kepala Jurusan</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($data as $key) {
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $key['nama'];?></td>
			<td><?php echo $key['nama_jurusan'];?></td>
			<td><?php echo $key['ka_jurusan'];?></td>
			<td><a href="index.php?p=jurusan&m=edit
				&id=<?php echo $key['id'];?>">Edit</a></td>
			<td><a href="proses/jurusan/delete.php?
					id=<?php echo $key['id'];?>">Delete</a></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>