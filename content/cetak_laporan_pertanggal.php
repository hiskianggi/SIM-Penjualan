<?php
include "../sistem/proses.php";
?>
<link rel="stylesheet" type="text/css" href="/simpenjualan/assets/css/style.css">
<title>Laporan Per Tanggal <?php echo "$_GET[tgl_awal]";?> s/d <?php echo "$_GET[tgl_akhir]";?></title>
<body style="background-color: #fff;">
	<center>
		<div class="isi-content">
			<div class="judul-content">
				<center>
					<h1>Laporan Per Tanggal</h1>
					<h3><?php echo "$_GET[tgl_awal]";?> s/d <?php echo "$_GET[tgl_akhir]";?></h3>
				</center>
			</div>
			<br>
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
				$qw=$db->get("transaksi.id_transaksi,transaksi.tanggal_transaksi,user.username,transaksi.total,transaksi.diskon","transaksi","INNER JOIN user on transaksi.id_user=user.id_user WHERE transaksi.tanggal_transaksi >='$_GET[tgl_awal]' AND transaksi.tanggal_transaksi <='$_GET[tgl_akhir]' ORDER BY transaksi.id_transaksi ASC");
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
	</center>
</body>
<script type="text/javascript">window.print();</script>