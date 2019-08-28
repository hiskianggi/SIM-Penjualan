<?php
include '../sistem/proses.php';
$simpan=$db->insert("detail_transaksi","'',
	'$_POST[id_trans]',
	'$_POST[id_barang]',
	'$_POST[jumlah_beli]',
	'$_POST[sub_total]'");
if($simpan){
	echo "Berhasil Disimpan";
}else{
	echo "Gagal Disimpan";
}
?>