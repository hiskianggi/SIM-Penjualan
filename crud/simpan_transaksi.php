<?php
include "../sistem/proses.php";
$plgnya=$_POST['id_pelanggan'];
if($plgnya=="") {
	$simpan=$db->insert("transaksi","'$_POST[id_transaksi]',
		'-',
		'$_POST[id_usernya]',
		'$_POST[tanggal_transaksi]',
		'$_POST[totalsub33]',
		'$_POST[diskon]',
		'$_POST[bayarnya]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>window.open('../struk/$_POST[id_transaksi]')</script>";
		echo "<script>document.location.href='../index.php?p=f_transaksi'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=f_transaksi'</script>";
	}
}else{
	$simpan=$db->insert("transaksi","'$_POST[id_transaksi]',
		'$_POST[id_pelanggan]',
		'$_POST[id_usernya]',
		'$_POST[tanggal_transaksi]',
		'$_POST[totalsub33]',
		'$_POST[diskon]',
		'$_POST[bayarnya]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>window.open('../struk/$_POST[id_transaksi]')</script>";
		echo "<script>document.location.href='../index.php?p=f_transaksi'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=f_transaksi'</script>";
	}
}
?>