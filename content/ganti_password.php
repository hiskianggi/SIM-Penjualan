<?php
include "sistem/proses.php";
if (!isset($_SESSION['login_admin'])){
	header("location:login/index.php");
}
$iduser=$_SESSION['login_id'];
$qry=$db->get("*","user","WHERE id_user='$iduser'");
$tampq=$qry->fetch();
?>
<div class="judul-content">
	<h1>Ganti Password</h1>
</div>
<div class="isi-content">
	<form action="crud/edit_password.php" method="POST">
		<table>
			<tr>
				<td><label>ID User</label></td>
			</tr>
			<tr>
				<td><input readonly="" type="text" name="id_user" value="<?php echo $iduser; ?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
			</tr>
			<tr>
				<td><input readonly="" type="text" name="username" value="<?php echo $tampq['username'];?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Password Lama</label></td>
			</tr>
			<tr>
				<td><input type="text" name="passwordlama" value="" class="text"></td>
			</tr>
			<tr>
				<td><label>Password Baru</label></td>
			</tr>
			<tr>
				<td><input type="text" name="passwordbaru" value="" class="text"></td>
			</tr>
			<tr>
				<td><label>Konfirmasi Password</label></td>
			</tr>
			<tr>
				<td><input type="text" name="konfpassword" value="" class="text"></td>
			</tr>
			<tr>
				<td><input type="submit" name="edit" value="Ganti Password" class="simpan"></td>
			</tr>
		</form>
	</div>
	<script type="text/javascript" src="assets/js/validation.js"></script>