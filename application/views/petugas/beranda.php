<?php
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<title>Halaman Beranda</title>
</head>
<body>
<style>
	.klinik{
		width: 1354px;
		height: 43px;
		left: 329px;
		top: 112px;

		font-family: Roboto;
		font-style: normal;
		font-weight: 900;
		font-size: 64px;
		line-height: 75px;
		align-items: center;
		text-align: center;

		color: #000000;
	}
	span{
		width: 110px;height: 59px;left: 41px;top: 57px;
	}


</style>
<div class="klinik">
	<header>
            <span>
            <img src="doctor.png" style="width: 110px;height: 59px;left: 41px;top: 57px;">
            KLINIK PRATAMA AVICENA
            <img src="doctor.png" style="width: 110px;height: 59px;left: 41px;top: 57px;">
            </span>
	</header>
</div>

<div class="navbar navbar-expand-sm navbar-dark" style="width: 1266px;height: 82px;left: 46px;top: 45px; background: #1C3387;border-radius: 20px;">
	<ul class="navbar-nav m-auto">
		<li class="nav-item "style="">
			<a class="nav-link" href="#">Beranda</a>
		</li>
		<li class="nav-item dropdown" style="">
			<a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Pasien
			</a>
			<div class="dropdown-menu"aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Tambah Dusun</a>
				<a class="dropdown-item" href="#">Tambah Kepala Keluarga</a>
				<a class="dropdown-item" href="#">Tambah Pasien</a>
				<a class="dropdown-item" href="#">Tampil Data Pasien</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Data Medis
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Tambah Data Obat</a>
				<a class="dropdown-item" href="#">Tampil Data Obat</a>
				<a class="dropdown-item" href="#">Tambah Data Rekam</a>
				<a class="dropdown-item" href="#">Tampil Data Rekam</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Laporan
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Tambah Data Transaksi</a>
				<a class="dropdown-item" href="#">Tampil Data Transaksi</a>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Logout</a>
		</li>
	</ul>
</div>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td><img src="Foto-Kartun-Dokter.gif" class="img-thumbnail" alt="Cinque Terre" width="158" height="158"></td>
				<td>
					<table class="text-justify m-auto">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td> Aditya Bayu Prabowo</td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td>22</td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td>Dokter</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>Jalan Gorongan</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

	</div>
</div>
<div class="container-fluid footer "style="width: 1266px;height: 82px;background: #1C3387;border-radius: 20px;" >
	<div class="spacer"></div>
	<div class="container d-flex justify-content-between py-4">
		<h5 class="my-auto" style="color: ghostwhite">Copyright © 2019 KP </h5>
	</div>
</div>


</body>
</html>

