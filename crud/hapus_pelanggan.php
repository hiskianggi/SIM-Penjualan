<?php 
include '../sistem/proses.php';
$hapus=$db->delete("pelanggan","id_pelanggan='$_GET[id_pelanggan]'");
if($hapus){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
}else{
	echo "<script>alert('Gagal Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
}
?>