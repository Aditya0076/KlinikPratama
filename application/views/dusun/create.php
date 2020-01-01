<?php

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Halaman Tambah Data Dusun</title>
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
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Dusun</h3></center></td>
			</tr>

			<tr>

				<form class="form-control-sm form-group" action="">
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Dusun</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="dusun" placeholder="masukkan dusun"></td>
							</tr>
							<tr>
								<td>RT</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="rt" placeholder="masukkan rt "></td>
							</tr>
							</tr>
							<td>Desa</td>
							<td>:</td>
							<td><input class="form-control" type="text" name="desa" placeholder="masukkan desa"></td>
							</tr>

							<tr>
								<td></td>
							</tr>

							<tr>
								<td colspan="3"> <center><input class="btn-success" type="button" value="Kirim"></center></td>
							</tr>
						</table>
					</td>
				</form>

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
