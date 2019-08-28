<?php
include '../sistem/proses.php';
$id_barang = $_GET['id_barang'];
$query = $db->get("*","barang","where id_barang='$id_barang'");
$ambil = $query->fetch();
$data = array(
	'nama_barang'      =>  $ambil['nama_barang'],
	'harga'    		   =>  $ambil['harga'],);
echo json_encode($data);
?>