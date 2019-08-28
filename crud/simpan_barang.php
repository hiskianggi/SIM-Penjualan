<?php
include "../sistem/proses.php";
if(isset($_POST['simpan'])){
	$simpan=$db->insert("barang","'$_POST[id_barang]',
		'$_POST[nama_barang]',
		'$_POST[harga]',
		'$_POST[stok]',
		'$_POST[tgl_expired]',
		'$_POST[id_jenis]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}
}else{
	$edit=$db->update("barang","id_barang='$_POST[id_barang]',
		nama_barang='$_POST[nama_barang]',
		harga='$_POST[harga]',
		stok='$_POST[stok]',
		tgl_expired='$_POST[tgl_expired]',
		id_jenis='$_POST[id_jenis]'",
		"id_barang='$_POST[id_barang]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../index.php?p=barang'</script>";
	}
}
?>