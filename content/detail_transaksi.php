<?php
include '../sistem/proses.php';
$idt=$_GET['idt'];
?>
<table class="tabel">
	<tr>
		<th>No</th>
		<th>ID Transaksi</th>
		<th>Nama Barang</th>
		<th>Jumlah Beli</th>
		<th>Sub Total</th>
		<th>Action</th>
	</tr>
	<?php
	$qw=$db->get("detail_transaksi.id_detail_trans,detail_transaksi.id_trans,barang.nama_barang,detail_transaksi.jumlah_beli,detail_transaksi.sub_total","detail_transaksi","INNER JOIN barang on detail_transaksi.id_barang=barang.id_barang WHERE detail_transaksi.id_trans='$idt' ORDER BY detail_transaksi.id_detail_trans ASC");
	$no=0;
	$tot=0;
	foreach($qw as $tamp_detail_transaksi){
		$no++;
		$tot=$tot+$tamp_detail_transaksi['sub_total'];
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $tamp_detail_transaksi['id_trans'];?></td>
			<td><?php echo $tamp_detail_transaksi['nama_barang'];?></td>
			<td><?php echo $tamp_detail_transaksi['jumlah_beli'];?></td>
			<td><?php echo $tamp_detail_transaksi['sub_total'];?></td>
			<td>
				<div class="kotak">
					<a href="#" onclick="hapus_detail(<?php echo $tamp_detail_transaksi['id_detail_trans'];?>)"><img src="assets/img/hapus.png"></a>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</table>
<script type="text/javascript">
	$("#totalsub33").val('<?php echo $tot;?>');
	total=$("#totalsub33").val();
	plh=$("#plg_cb").val();
	if(plh=="Pelanggan"){
		diskonnya=0.05;
		hasilnya33=total*diskonnya
		document.getElementById('diskon').value=hasilnya33;
	}else{
		document.getElementById('diskon').value=0;
	}
</script>