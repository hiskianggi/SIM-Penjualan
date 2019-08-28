<?php 
include '../sistem/proses.php';
$hapus=$db->delete("user","id_user='$_GET[id_user]'");
if($hapus){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=user'</script>";
}else{
	echo "<script>alert('Gagal Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=user'</script>";
}
?>