<?php
include "sistem/proses.php";
error_reporting(0);
$Host = "localhost";
$username = "root";
$password = "";
$database = "db_penjualan";
$koneksi = new mysqli( $Host, $username, $password, $database );
$query = "SELECT max(id_transaksi) as maxKode FROM transaksi";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodetransaksi = $data['maxKode'];
$noUrut = (int) substr($kodetransaksi, 3, 3);
$noUrut++;
$char = "TR";
$kodetransaksi = $char . sprintf("%03s", $noUrut);
	// TGL OTOMATIS
$tgloto = date("Y-m-d");
$tgloto2 = date("d-m-Y");
	// Session
$user=$_SESSION['login_id'];
?>
<body onload="buka_tab()">
	<div class="judul-content">
		<h1>Input transaksi</h1>
	</div>
	<div class="isi-content">
		<form action="crud/simpan_transaksi.php" method="POST">
			<table>
				<input hidden="" type="text" id="id_usernya" name="id_usernya" value="<?php echo $user;?>">
				<tr>
					<td><label>ID transaksi</label></td>
				</tr>
				<tr>
					<td><input readonly="" type="text" id="id_transaksi" name="id_transaksi" value="<?php echo $kodetransaksi; ?>" class="textsmall"></td>
				</tr>
				<tr>
					<td><label>Tanggal</label></td>
				</tr>
				<tr>
					<input hidden="" type="text" name="tanggal_transaksi" value="<?php echo $tgloto; ?>">
					<td><input readonly="" type="text" name="tanggal_transaksi2" value="<?php echo $tgloto2; ?>" class="textsmall"></td>
				</tr>
				<tr>
					<tr>
						<td><label><center>Pelanggan</center></label></td>
						<td><label id="id_plg"><center>ID Pelanggan</center></label></td>
						<td><label id="nm_plg"><center>Nama</center></label></td>
					</tr>
					<tr>
						<td>
							<center><select onchange="plgnn()" class="textsmall" id="plg_cb" name="plg_cb">
								<option>== PILIH ==</option>
								<option>Pelanggan</option>
								<option>Bukan Pelanggan</option>
							</select></center>
						</td>
						<td><input onkeyup="cari_plg()" type="text" value="" id="id_pelanggan" name="id_pelanggan" class="textsmall"></td>
						<td><input readonly="" type="text" value="" id="nama_pelanggan" class="textsmall"></td>
					</tr>
					<tr>
						<td><label><center>ID Barang</center></label></td>
						<td><label><center>Nama Barang</center></label></td>
						<td><label><center>Harga Barang</center></label></td>
					</tr>
					<tr>
						<td><input onkeyup="cari_brg()" type="text" value="" id="id_barang" name="id_barang" class="textsmall"></td>
						<td><input readonly="" type="text" value="" id="nama_barang" name="nama_barang" class="textsmall"></td>
						<td><input readonly="" type="text" value="" id="harga" name="harga" class="textsmall"></td>
					</tr>
					<tr>
						<td><label><center>Jumlah Barang</center></label></td>
						<td><label><center>Total</center></label></td>
						<td><label></label></td>
					</tr>
					<tr>
						<td><input onkeypress="return angka(event)" onkeyup="jmlbrg()" type="text" value="" id="jumlah_barang" name="jumlah_barang" class="textsmall"></td>
						<td><input readonly="" type="text" value="" id="subtotal" name="subtotal" class="textsmall"></td>
						<td><center><input onclick="simpan_detail()" type="button" name="simpan" value="Simpan" class="simpan2"></center></td>
					</tr>
				</table>
				<div style="float: left;" id="dttrk"></div>
				<table style="margin-top: 15px;">
					<tr>
						<td><label>Sub Total</label></td>
					</tr>
					<tr>
						<td>
							<input readonly="" type="text" value="" id="totalsub33" name="totalsub33" class="textsmall"></td>
						</tr>
						<tr>
							<td><label>Diskon</label></td>
						</tr>
						<tr>
							<td><input readonly="" type="text" value="" id="diskon" name="diskon" class="textsmall"></td>
						</tr>
						<tr>
							<td><label>Bayar</label></td>
						</tr>
						<tr>
							<td><input onkeyup="kembalian()" type="text" value="" id="bayarnya" name="bayarnya" class="textsmall"></td>
						</tr>
						<tr>
							<td><label>Kembali</label></td>
						</tr>
						<tr>
							<td><input readonly="" type="text" id="kembalinya" value="" name="kembali" class="textsmall"></td>
						</tr>
						<tr>
							<td><input type="submit" name="batal" value="Batal" class="batal"><input type="submit" name="simpan" value="Simpan" class="simpan"></td>
						</tr>
					</table>
				</form>
			</div>
		</body>
		<script type="text/javascript" src="assets/js/validation.js"></script>
		<script src="assets/js/jquery.min.js"></script>