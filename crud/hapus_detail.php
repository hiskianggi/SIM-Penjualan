<?php 
include '../sistem/proses.php';
$hapus=$db->delete("detail_transaksi","id_detail_trans='$_POST[id_detail_trans]'");
if($hapus){
	echo "Berhasil Dihapus";
}else{
	echo "Gagal Dihapus";
}
?>