<?php 
session_start();
include '../sistem/proses.php';
if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = $db->get("*","user","WHERE username = '$username' AND password = '$password'");
	$dta = $query->fetch();
	$rows = $query->rowCount();
	if($rows == 0){
		echo "<script>alert('Maaf Username Belum Terdaftar')</script>";
		echo "<script>document.location = 'index.php'</script>";
	}else{
		if($password <> $dta['password']){
			echo "<script>alert('Maaf Password Salah')</script>";
			echo "<script>document.location = 'index.php'</script>";
		}else{
			$_SESSION['login_admin'] = $dta['username'];
			$_SESSION['login_id'] = $dta['id_user'];
			$_SESSION['level'] = $dta['level'];
			echo "<script>alert('Berhasil Login')</script>";
			echo "<script>document.location = '../index.php?p=home'</script>";
		}
	}
}else{

}
?>
