<?php

include '../sistem/proses.php';
$id_pelanggan = $_GET['id_pelanggan'];
$query = $db->get("*","pelanggan","where id_pelanggan='$id_pelanggan'");
$ambil = $query->fetch();
$data = array(
	'nama'      =>  $ambil['nama'],);
echo json_encode($data);
?>