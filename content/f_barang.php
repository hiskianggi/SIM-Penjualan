<?php
include "sistem/proses.php";
error_reporting(0);
if(empty($_GET['id_barang'])) {
	$Host = "localhost";
	$username = "root";
	$password = "";
	$database = "db_penjualan";
	$koneksi = new mysqli( $Host, $username, $password, $database );
	$query = "SELECT max(id_barang) as maxKode FROM barang";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeBarang = $data['maxKode'];
	$noUrut = (int) substr($kodeBarang, 3, 3);
	$noUrut++;
	$char = "BR";
	$kodeBarang = $char . sprintf("%03s", $noUrut);
	$sub='simpan';
	$aksinya='crud/simpan_barang.php';
}else{
	$kodeBarang=$_GET['id_barang'];
	$sub='edit';
	$aksinya='crud/simpan_barang.php';
}
$qry=$db->get("*","barang","WHERE id_barang='$_GET[id_barang]'");
$tampq=$qry->fetch();
?>
<div class="judul-content">
	<h1>Input Barang</h1>
</div>
<div class="isi-content">
	<form action="<?php echo $aksinya;?>" method="POST">
		<table>
			<tr>
				<td><label>ID Barang</label></td>
			</tr>
			<tr>
				<td><input readonly="" type="text" name="id_barang" value="<?php echo $kodeBarang; ?>" class="text"></td>
			</tr>
			<tr>
				<td><label>Nama Barang</label></td>
			</tr>
			<tr>
				<td><input type="text" name="nama_barang" value="<?php echo $tampq['nama_barang'];?>" class="text" onkeypress="return huruf(event)"></td>
			</tr>
			<tr>
				<td><label>Jenis Barang</label></td>
			</tr>
			<tr>
				<td>
					<select name="id_jenis" class="text">
						<option>--PILIH--</option>
						<?php
						$qw=$db->get("*","jenis","ORDER BY id_jenis ASC");
						foreach ($qw as $tampil) {
							?>
							<option <?php if($tampq['id_jenis']==$tampil['id_jenis']){echo "selected";}?> value="<?php echo $tampil['id_jenis'];?>"><?php echo $tampil['nama_jenis'];?></option>
							<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Harga</label></td>
			</tr>
			<tr>
				<td><input type="text" value="<?php echo $tampq['harga'];?>" name="harga" class="text" onkeypress="return angka(event)"></td>
			</tr>
			<tr>
				<td><label>Stok</label></td>
			</tr>
			<tr>
				<td><input type="text" value="<?php echo $tampq['stok'];?>" name="stok" class="text" onkeypress="return angka(event)"></td>
			</tr>
			<tr>
				<td><label>Tanggal Expired</label></td>
			</tr>
			<tr>
				<td><input type="date" value="<?php echo $tampq['tgl_expired'];?>" name="tgl_expired" class="text"></td>
			</tr>
			<tr>
				<td><input type="submit" name="<?php echo $sub;?>" value="Simpan" class="simpan"></td>
			</tr>
		</form>
	</div>
	<script type="text/javascript" src="assets/js/validation.js"></script>