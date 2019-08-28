<?php
include "sistem/proses.php";
?>
<div class="judul-content">
	<h1>Form User</h1>
</div>
<div class="isi-content">
	<a class="link-tambah" href="index.php?p=f_user"><i class="fa fa-plus"></i> Tambah</a>
	<table class="tabel">
		<tr>
			<th>ID User</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th>Action</th>
		</tr>
		<?php
		$qw=$db->get("*","user","ORDER BY id_user ASC");
		foreach($qw as $tamp_user){
			?>
			<tr>
				<td><?php echo $tamp_user['id_user'];?></td>
				<td><?php echo $tamp_user['username'];?></td>
				<td><?php echo $tamp_user['password'];?></td>
				<td><?php echo $tamp_user['level'];?></td>
				<td><div class="kotak">
					<a href="index.php?p=f_user&id_user=<?php echo $tamp_user['id_user'];?>"><img src="assets/img/edit.png"></a>
					<a href="crud/hapus_user.php?id_user=<?php echo $tamp_user['id_user'];?>"><img src="assets/img/hapus.png"></a>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</table>
</div>