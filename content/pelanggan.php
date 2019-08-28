<?php
include "sistem/proses.php";
?>
<div class="judul-content">
	<h1>Form Pelanggan</h1>
</div>
<div class="isi-content">
	<a class="link-tambah" href="index.php?p=f_pelanggan"><i class="fa fa-plus"></i> Tambah</a>
	<table class="tabel">
		<tr>
			<th>ID Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>No. Telp</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
		<?php
		$qw=$db->get("*","pelanggan","ORDER BY id_pelanggan ASC");
		foreach($qw as $tamp_barang){
			?>
			<tr>
				<td><?php echo $tamp_barang['id_pelanggan'];?></td>
				<td><?php echo $tamp_barang['nama'];?></td>
				<td><?php echo $tamp_barang['alamat'];?></td>
				<td><?php echo $tamp_barang['no_telp'];?></td>
				<td><?php echo $tamp_barang['email'];?></td>
				<td><div class="kotak">
					<a href="index.php?p=f_pelanggan&id_pelanggan=<?php echo $tamp_barang['id_pelanggan'];?>"><img src="assets/img/edit.png"></a>
					<a href="crud/hapus_pelanggan.php?id_pelanggan=<?php echo $tamp_barang['id_pelanggan'];?>"><img src="assets/img/hapus.png"></a>
				</div></td>
			</tr>
			<?php
		}
		?>
	</table>
</div>