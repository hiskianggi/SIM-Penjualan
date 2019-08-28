<?php 
include '../sistem/proses.php';
$hapus=$db->delete("barang","id_barang='$_GET[id_barang]'");
if($hapus){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=barang'</script>";
}else{
	echo "<script>alert('Gagal Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=barang'</script>";
}
?>