<?php
include "sistem/proses.php";
error_reporting(0);
if(empty($_GET['id_user'])) {
	$Host = "localhost";
	$username = "root";
	$password = "";
	$database = "db_penjualan";
	$koneksi = new mysqli( $Host, $username, $password, $database );
	$query = "SELECT max(id_user) as maxKode FROM user";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeuser = $data['maxKode'];
	$noUrut = (int) substr($kodeuser, 3, 3);
	$noUrut++;
	$char = "US";
	$kodeuser = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
}else{
	$kodeuser=$_GET['id_user'];
	$sub='edit';
	$aksinya='crud/simpan_user.php';
}
$qry=$db->get("*","user","WHERE id_user='$_GET[id_user]'");
$tampq=$qry->fetch();
?>
<div class="judul-content">
	<h1>Input user</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_user.php" method="POST">
		<table>
			<tr>
				<td><label>ID User</label></td>
			</tr>
			<tr>
				<td><input readonly=""  type="text" name="id_user" value="<?php echo $kodeuser; ?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
			</tr>
			<tr>
				<td><input onkeypress="return huruf(event)" type="text" name="username" value="<?php echo $tampq['username'];?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
			</tr>
			<tr>
				<td><input type="text" name="password" value="" class="text"></td>
			</tr>
			<tr>
				<td><label>Level</label></td>
			</tr>
			<tr>
				<td>
					<select class="text" name="level">
						<option <?php if($tampq['id_jenis']){echo "selected";}?>>Admin</option>
						<option <?php if($tampq['id_jenis']){echo "selected";}?>>Kasir</option>
						<option <?php if($tampq['id_jenis']){echo "selected";}?>>Manager</option>
					</select>
				</td>
			<!--
				<td><input type="text" name="level" value="<?php echo $tampq['level'];?>" class="text"></td> -->
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</form>
	</div>
	<script type="text/javascript" src="assets/js/validation.js"></script>