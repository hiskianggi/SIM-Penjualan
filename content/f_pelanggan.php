<?php
include "sistem/proses.php";
error_reporting(0);
if(empty($_GET['id_pelanggan'])) {
	$Host = "localhost";
	$username = "root";
	$password = "";
	$database = "db_penjualan";
	$koneksi = new mysqli( $Host, $username, $password, $database );
	$query = "SELECT max(id_pelanggan) as maxKode FROM pelanggan";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodePelanggan = $data['maxKode'];
	$noUrut = (int) substr($kodePelanggan, 3, 3);
	$noUrut++;
	$char = "PLG";
	$kodePelanggan = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
}else{
	$kodePelanggan=$_GET['id_pelanggan'];
	$sub='edit';
	$aksinya='crud/simpan_pelanggan.php';
}
$qry=$db->get("*","pelanggan","WHERE id_pelanggan='$_GET[id_pelanggan]'");
$tampq=$qry->fetch();
?>
<div class="judul-content">
	<h1>Input Pelanggan</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_pelanggan.php" method="POST">
		<table>
			<tr>
				<td><label>ID Pelanggan</label></td>
			</tr>
			<tr>
				<td><input readonly=""  type="text" name="id_pelanggan" value="<?php echo $kodePelanggan; ?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Nama Pelanggan</label></td>
			</tr>
			<tr>
				<td><input onkeypress="return huruf(event)" type="text" name="nama" value="<?php echo $tampq['nama'];?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Alamat</label></td>
			</tr>
			<tr>
				<td><input type="text" name="alamat" value="<?php echo $tampq['alamat'];?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Nomor Telepon</label></td>
			</tr>
			<tr>
				<td><input onkeypress="return angka(event)" type="text" name="no_telp" value="<?php if(!empty($_GET['id_pelanggan'])) { echo $tampq['no_telp'];}else{echo '+62';}?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
			</tr>
			<tr>
				<td><input type="email" name="email" value="<?php echo $tampq['email'];?>" class="text"></td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</form>
	</div>
	<script type="text/javascript" src="assets/js/validation.js"></script>