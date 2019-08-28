<?php
include "sistem/proses.php";
?>
<div class="judul-content">
	<h1>Barang</h1>
</div>
<div class="isi-content">
	<a class="link-tambah" href="index.php?p=f_barang"><i class="fa fa-plus"></i> Tambah</a>
	<table class="tabel">
		<tr>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Expired</th>
			<th>Action</th>
		</tr>
		<?php
		$qw=$db->get("barang.id_barang,barang.nama_barang,jenis.nama_jenis,barang.harga,barang.stok,barang.tgl_expired","barang","INNER JOIN jenis on barang.id_jenis=jenis.id_jenis ORDER BY barang.id_barang ASC");
		foreach($qw as $tamp_barang){
			?>
			<tr>
				<td><?php echo $tamp_barang['id_barang'];?></td>
				<td><?php echo $tamp_barang['nama_barang'];?></td>
				<td><?php echo $tamp_barang['nama_jenis'];?></td>
				<td><?php echo $tamp_barang['harga'];?></td>
				<td><?php echo $tamp_barang['stok'];?></td>
				<td><?php echo $tamp_barang['tgl_expired'];?></td>
				<td>
					<div class="kotak">
						<a href="index.php?p=f_barang&id_barang=<?php echo $tamp_barang['id_barang'];?>"><img src="assets/img/edit.png"></a>
						<a href="crud/hapus_barang.php?id_barang=<?php echo $tamp_barang['id_barang'];?>"><img src="assets/img/hapus.png"></a>
					</div>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>