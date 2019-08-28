<?php
include "../sistem/proses.php";
$pwbiasa = md5($_POST['passwordlama']);
$pwmd5 = md5($_POST['konfpassword']); 
$query = $db->get("*","user","WHERE username = '$_POST[username]' AND password = '$pwbiasa'");
$dta = $query->fetch();
if ($pwbiasa <> $dta['password']) {
	echo "<script>alert('Password Lama Salah! $pwbiasa')</script>";
	echo "<script>document.location.href='../index.php?p=ganti_password'</script>";
}else{
	if ($_POST['konfpassword']==$_POST['passwordlama']) {
		if(isset($_POST['edit'])){
			$edit=$db->update("user","password='$pwmd5'","id_user='$_POST[id_user]'");
			if($edit){
				echo "<script>alert('Berhasil Diedit')</script>";
				echo "<script>document.location.href='../index.php?p=ganti_password'</script>";
			}else{
				echo "<script>alert('Gagal Diedit')</script>";
				echo "<script>document.location.href='../index.php?p=ganti_password'</script>";
			}
		}
	}else{
		echo "<script>alert('Konfirmasi Password Salah')</script>";
		echo "<script>document.location.href='../index.php?p=ganti_password'</script>";
	}
}
?>