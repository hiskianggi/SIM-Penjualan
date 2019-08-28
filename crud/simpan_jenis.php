<?php
include "../sistem/proses.php";
if(isset($_POST['simpan'])){
	$simpan=$db->insert("jenis","'$_POST[id_jenis]',
		'$_POST[nama_jenis]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=jenis'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=jenis'</script>";
	}
}else{
	$edit=$db->update("jenis","id_jenis='$_POST[id_jenis]',
		nama_jenis='$_POST[nama_jenis]'","id_jenis='$_POST[id_jenis]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=jenis'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=jenis'</script>";
	}
}
?>