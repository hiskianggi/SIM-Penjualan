<?php
include "sistem/proses.php";
?>
<div class="judul-content">
	<h1>Form Jenis Barang</h1>
</div>
<div class="isi-content">
	<a class="link-tambah" href="index.php?p=f_jenis"><i class="fa fa-plus"></i> Tambah</a>
	<table class="tabel">
		<tr>
			<th>ID Jenis</th>
			<th>Nama Jenis</th>
			<th>Action</th>
		</tr>
		<?php
		$qw=$db->get("*","jenis","ORDER BY id_jenis ASC");
		foreach($qw as $tamp_jenis){
			?>
			<tr>
				<td><?php echo $tamp_jenis['id_jenis'];?></td>
				<td><?php echo $tamp_jenis['nama_jenis'];?></td>
				<td><div class="kotak">
					<a href="index.php?p=f_jenis&id_jenis=<?php echo $tamp_jenis['id_jenis'];?>"><img src="assets/img/edit.png"></a>
					<a href="crud/hapus_jenis.php?id_jenis=<?php echo $tamp_jenis['id_jenis'];?>"><img src="assets/img/hapus.png"></a>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</table>
</div>