<?php
include "sistem/proses.php";
?>
<style type="text/css">
.tombol{
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin-left: 20px;
}
</style>
<div class="judul-content">
	<h1>Laporan Per Bulan</h1>
</div>
<div class="isi-content">
	<form action="index.php?p=laporan_perbulan" method="POST">
		<table>
			<tr>
				<td><label>Bulan</label></td>
				<td></td>
				<td><label>Tahun</label></td>
			</tr>
			<tr>
				<td>
					<select class="textsmall" name="bulan">
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="12">November</option>
						<option value="12">Desember</option>
					</select>
				</td>
				<td><label>-</label></td>
				<td>
					<select class="textsmall" name="textsmall">
						<?php
						$mulai= date('Y') - 50;
						for($i = $mulai;$i<$mulai + 100;$i++){
							$sel = $i == date('Y') ? ' selected="selected"' : '';
							echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
						}
						?>
					</select>
				</td>
				<td><input type="submit" name="cari" class="tombol" value="Cari"></td>
				<td><input type="submit" name="cetak" class="tombol" value="Cetak"></td>
			</tr>
		</table>
	</form>
	<table class="tabel">
		<tr>
			<th>ID Transaksi</th>
			<th>Tanggal</th>
			<th>Nama Kasir</th>
			<th>Total</th>
			<th>Diskon</th>
			<th>Total Bayar</th>
		</tr>
		<?php
		if (isset($_POST['cari'])) {
			$qw=$db->get("transaksi.id_transaksi,transaksi.tanggal_transaksi,user.username,transaksi.total,transaksi.diskon","transaksi","INNER JOIN user on transaksi.id_user=user.id_user WHERE transaksi.tanggal_transaksi >='$_POST[tgl_awal]' AND transaksi.tanggal_transaksi <='$_POST[tgl_akhir]' ORDER BY transaksi.id_transaksi ASC");
		}elseif (isset($_POST['cetak'])) {
			if ($_POST['tgl_akhir']=='' || $_POST['tgl_awal']=='') {
				echo "<script>alert('Tangal Belum Terisi!');</script>";
				echo "<script>document.location.href='index.php?p=laporan_perbulan'</script>";
			}else{
				echo "<script>window.open('content/cetak_laporan_perbulan.php?tgl_awal=$_POST[tgl_awal]&tgl_akhir=$_POST[tgl_akhir]')</script>";
				echo "<script>document.location.href='index.php?p=laporan_perbulan'</script>";
			}
		}else{
			$qw=$db->get("transaksi.id_transaksi,transaksi.tanggal_transaksi,user.username,transaksi.total,transaksi.diskon","transaksi","INNER JOIN user on transaksi.id_user=user.id_user ORDER BY transaksi.id_transaksi ASC");
		}
		$jml_total=0;
		foreach($qw as $data_laporan){
			$totalbayar=$data_laporan['total']-$data_laporan['diskon'];
			?>
			<tr>
				<td><?php echo $data_laporan['id_transaksi'];?></td>
				<td><?php echo $data_laporan['tanggal_transaksi'];?></td>
				<td><?php echo $data_laporan['username'];?></td>
				<td><?php echo $data_laporan['total'];?></td>
				<td><?php echo $data_laporan['diskon'];?></td>
				<td><?php echo $totalbayar;?></td>
			</tr>
			<?php
		}
		?>
	</table>
</div>