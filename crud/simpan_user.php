<?php
include "../sistem/proses.php";
$pw=md5($_POST[password]);
if(isset($_POST['simpan'])){
	$simpan=$db->insert("user","'$_POST[id_user]',
		'$_POST[username]',
		'$pw',
		'$_POST[level]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=user'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=user'</script>";
	}
}else{
	$edit=$db->update("user","id_user='$_POST[id_user]',
		username='$_POST[username]',
		password='$pw',
		level='$_POST[level]'","id_user='$_POST[id_user]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=user'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=user'</script>";
	}
}
?>