<?php 
session_start();
if (!isset($_SESSION['login_admin'])){
	header("location:login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIM Penjualan</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	/* Style the sidenav links and the dropdown button */
	.menu a, .dropdown-btn {
		color: #fff;
		text-decoration: none;
		font-size: 20px;
		font-family: segoe ui;
		padding: 10px;
		display: block;
	}
	.dropdown-btn{
		margin-left: 14px;
	}
	/* On mouse-over */
	.menu a:hover, .dropdown-btn:hover {
		background-color: #2c3b41;
	}

	/* Main content */
	.main {
		margin-left: 200px; /* Same as the width of the sidenav */
		font-size: 20px; /* Increased text to enable scrolling */
		padding: 0px 10px;
	}

	/* Add an active class to the active dropdown button */
	.active {
		background-color: green;
		color: white;
	}

	/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
	.dropdown-container {
		color: #fff;
		text-decoration: none;
		font-size: 20px;
		font-family: segoe ui;
		padding: 10px 16px;
		display: block;
		margin-left: 10px;
	}

	/* Optional: Style the caret down icon */
	.fa-caret-down {
		float: right;
		padding-right: 8px;
	}
</style>
</head>
<body>
	<div class="header">
		<div class="judul">
			<h1>SIM Penjualan</h1>
		</div>
	</div>
	<div class="sidebar">
		<div class="menu">
			<ul id="menu">
				<?php
				if($_SESSION['level']=="Admin"){
					$home="";
					$user="";
					$barang="";
					$pelanggan="";
					$jenis="";
					$transaksi="";
					$laporan="hidden";
					$gp="hidden";
				}elseif($_SESSION['level']=="Kasir"){
					$home="";
					$user="hidden";
					$barang="hidden";
					$pelanggan="hidden";
					$jenis="hidden";
					$transaksi="";
					$laporan="hidden";
					$gp="";
				}else{
					$home="";
					$user="hidden";
					$barang="hidden";
					$pelanggan="hidden";
					$jenis="hidden";
					$transaksi="hidden";
					$laporan="";
					$gp="";
				}
				?>
				<li <?php echo $home; ?>><a href="index.php"><i class="fa fa-home"></i> Beranda</a></li>
				<li <?php echo $user; ?>>
					<a href="index.php?p=user"><i class="fa fa-user"></i> User</a>
				</li>
				<li <?php echo $barang; ?>>
					<a href="index.php?p=barang"><i class="fa fa-shopping-cart"></i> Barang</a>
				</li>
				<li <?php echo $pelanggan; ?>>
					<a href="index.php?p=pelanggan"><i class="fa fa-users"></i> Pelanggan</a>
				</li>
				<li <?php echo $jenis; ?>>
					<a href="index.php?p=jenis"><i class="fa fa-cart-plus"></i> Jenis Barang</a>
				</li>
				<li <?php echo $transaksi; ?>>
					<a href="index.php?p=f_transaksi"><i class="fa fa-plus"></i> Transaksi</a>
				</li>
				<li <?php echo $gp; ?>>
					<a href="index.php?p=ganti_password"><i class="fa fa-pencil"></i> Ganti Password</a>
				</li>
				<li class="dropdown-btn"><i class="fa fa-cart-plus"></i> Laporan 
					<i class="fa fa-caret-down"></i>
				</li>
				<div class="dropdown-container">
					<a href="index.php?p=laporan_pertanggal">Laporan Per Tanggal</a>
					<a href="index.php?p=laporan_perbulan">Laporan Per Bulan</a>
					<a href="index.php?p=laporan_pertahun">Laporan Per Tahun</a>
				</div>
				<li <?php echo $home; ?>><a href="login/logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
			</ul>
		</div>
	</div>
	<div class="content">
		<?php
		if(empty($_GET['p'])){
			echo "<script>document.location.href='index.php?p=home'</script>";
		}else{
			$p=$_GET['p'];
			include "content/$p.php";
		}
		?>
	</div>
</body>
</html>
<script type="text/javascript">
	//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;
	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "none") {
				dropdownContent.style.display = "block";
			} else {
				dropdownContent.style.display = "none";
			}
		});
	}
</script>