<?php 
include '../sistem/proses.php';
$hapus=$db->delete("jenis","id_jenis='$_GET[id_jenis]'");
if($hapus){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=jenis'</script>";
}else{
	echo "<script>alert('Gagal Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=jenis'</script>";
}
?>