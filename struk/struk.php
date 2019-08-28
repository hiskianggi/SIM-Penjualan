<!DOCTYPE html>
<html>
<head>
	<title>Struk Pembelian - <?php echo $_GET['idt'];?></title>
	<style type="text/css">
	.kotak-struk{
		float: left;
		width: 380px;
		height: auto;
	}
	.kotak-struk .head p{
		text-align: center;
	}
	.kotak-struk .head .logo{
		font-weight: bold;
	}
	.kotak-struk .head .logo, .almt, .notelp{
		font-family: 'tahoma';
		line-height: 15px;
	}
	.kotak-struk .table1{
		margin: 0px 30px;
	}
	.kotak-struk .table1 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .table2{
		margin: 0px 30px;
	}
	.kotak-struk .table2 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .table3{
		float: right;
		margin: 0px 30px; 
	}
	.kotak-struk .table3 tr td{
		text-align: right;
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .table4{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .table4 tr td{
		text-align: right;
	}
	.kotak-struk .foot{
		float: left;
		text-align: center;
		line-height: 10px;
		margin: 0px 40px ;
		margin-top: 10px;
		font-family: 'tahoma';
	}
</style>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			<p class="logo">HISKIA STORE</p>
			<p class="almt">Jln. Bandungharjo RT.03/RW.05</p>
			<p class="notelp">085778608350</p>
		</div>
		<div class="isi">
			<table class="table1">
				<?php
				include '../sistem/proses.php';
				$qwe2=$db->get("pelanggan.nama","transaksi","INNER JOIN pelanggan on pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE transaksi.id_transaksi='$_GET[idt]'");
				$qwe1=$db->get("transaksi.tanggal_transaksi,transaksi.id_transaksi,user.username,user.level","transaksi","INNER JOIN user on user.id_user=transaksi.id_user WHERE transaksi.id_transaksi='$_GET[idt]'");
				$tmp2=$qwe2->fetch();
				$tmp1=$qwe1->fetch();
				if ($tmp2['nama']=="") {
					$plg="(...Tidak Pelanggan...)";
				}else{
					$plg=$tmp2['nama'];
				}
				?>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo $tmp1['tanggal_transaksi'];?></td>
				</tr>
				<tr>
					<td>Transaksi</td>
					<td>:</td>
					<td><?php echo $tmp1['id_transaksi'];?></td>
				</tr>
				<tr>
					<td>Operator</td>
					<td>:</td>
					<td><?php echo $tmp1['username'];?> (<?php echo $tmp1['level']?>)</td>
				</tr>
				<tr>
					<td>Pelanggan</td>
					<td>:</td>
					<td><?php echo $plg;?></td>
				</tr>
				<tr>
					<td colspan="4">
						===========================
					</td>
				</tr>
			</table>
			<table class="table2">
				<?php
				$qw3=$db->get("barang.nama_barang,barang.harga,detail_transaksi.jumlah_beli,detail_transaksi.sub_total","detail_transaksi","INNER JOIN barang on detail_transaksi.id_barang=barang.id_barang WHERE detail_transaksi.id_trans='$_GET[idt]' ORDER BY detail_transaksi.id_detail_trans ASC");
				foreach($qw3 as $tamp_detail_transaksi){
					?>
					<tr>
						<td><?php echo $tamp_detail_transaksi['nama_barang'];?></td>
						<td><?php echo $tamp_detail_transaksi['harga'];?></td>
						<td><?php echo $tamp_detail_transaksi['jumlah_beli'];?></td>
						<td><?php echo $tamp_detail_transaksi['sub_total'];?></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan="4">
						===========================
					</td>
				</tr>
			</table>
			<table class="table3">
				<?php
				// Query Bawah
				$qb=$db->get("transaksi.total,transaksi.diskon,transaksi.bayar","transaksi","WHERE transaksi.id_transaksi='$_GET[idt]'");
				$tb=$qb->fetch();

					// Grand Total
				$gt=$tb['total']-$tb['diskon'];
					// Kembalian
				$kb=$tb['bayar']-$gt;
				?>
				<tr>
					<td>Total</td>
					<td>:</td>
					<td><?php echo $tb['total'];?></td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td>:</td>
					<td><?php echo $tb['diskon'];?></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Grand Total</td>
					<td>:</td>
					<td><?php echo $gt;?></td>
				</tr>
				<tr>
					<td>Tunai</td>
					<td>:</td>
					<td><?php echo $tb['bayar'];?></td>
				</tr>
				<tr>
					<td colspan="4">
					-----------------------------------------</td>
				</tr>
			</table>
			<table class="table4">
				<tr style="font-size: 20px;">
					<td>Kembali</td>
					<td>:</td>
					<td><b><?php echo $kb;?></b></td>
				</tr>
			</table>
			<div class="foot">
				<p>--- Terimakasih ---</p>
				<p>Semoga Ada Puas Dengan Layanan Kami</p>
				<p>------------------------------------</p>
				<p>== HISKIA STORE ===</p>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">window.print();</script>