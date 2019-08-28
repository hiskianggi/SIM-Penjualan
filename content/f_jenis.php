<?php
include "sistem/proses.php";
error_reporting(0);
if(empty($_GET['id_jenis'])) {
	$Host = "localhost";
	$username = "root";
	$password = "";
	$database = "db_penjualan";
	$koneksi = new mysqli( $Host, $username, $password, $database );
	$query = "SELECT max(id_jenis) as maxKode FROM jenis";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeJenis = $data['maxKode'];
	$noUrut = (int) substr($kodeJenis, 0, 3);
	$noUrut++;
	$kodeJenis = sprintf("%03s", $noUrut);
	$sub='simpan';
	$aksinya='crud/simpan_jenis.php';
}else{
	$kodeJenis=$_GET['id_jenis'];
	$sub='edit';
	$aksinya='crud/simpan_jenis.php';
}
$qry=$db->get("*","jenis","WHERE id_jenis='$_GET[id_jenis]'");
$tampq=$qry->fetch();
?>
<div class="judul-content">
	<h1>Input Jenis Barang</h1>
</div>
<div class="isi-content">
	<form action="crud/simpan_jenis.php" method="POST">
		<table>
			<tr>
				<td><label>ID Jenis Barang</label></td>
			</tr>
			<tr>
				<td><input readonly="" type="text" name="id_jenis" value="<?php echo $kodeJenis; ?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Nama Jenis</label></td>
			</tr>
			<tr>
				<td><input onkeypress="return huruf(event)" type="text" value="<?php echo $tampq['nama_jenis'];?>" name="nama_jenis" class="text"></td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</form>
	</div>
	<script type="text/javascript" src="assets/js/validation.js"></script>