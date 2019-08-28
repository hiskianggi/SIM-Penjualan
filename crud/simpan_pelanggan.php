<?php
include "../sistem/proses.php";
if(isset($_POST['simpan'])){
	$simpan=$db->insert("pelanggan","'$_POST[id_pelanggan]',
		'$_POST[nama]',
		'$_POST[alamat]',
		'$_POST[no_telp]',
		'$_POST[email]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}
}else{
	$edit=$db->update("pelanggan","id_pelanggan='$_POST[id_pelanggan]',
		nama='$_POST[nama]',
		alamat='$_POST[alamat]',
		no_telp='$_POST[no_telp]',
		email='$_POST[email]'","id_pelanggan='$_POST[id_pelanggan]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
	}
}
?>