<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		body, html {
			height: 100%;
		}
		.background{
			background-size: cover;
			background-image: url(<?php echo  base_url("");?>/assets/doctor-4068134_960_720.jpg);
			background-repeat: no-repeat;
			height: 100%;
		}
		.kotak{
			position: absolute;
			width: 444px;
			height: 263px;
			left: 684px;
			top: 249px;
			background: #1C3387;
			border-radius: 20px;
		}
	</style>
	<link rel="stylesheet"  href="<?php echo base_url('');?>/assets/bootstrap/css/bootstrap.min.css" >
	<script src="<?php echo base_url('');?>/assets/bootstrap/js/jquery.min.js" ></script>
	<script src="<?php echo base_url('');?>/assets/bootstrap/js/popper.min.js" ></script>
	<script src="<?php echo base_url('');?>/assets/bootstrap/js/bootstrap.js" ></script>
	<title>Login Petugas</title>
</head>
<body>
<div class="background" >
	<div class="kotak">
		<div class="container">
			<center><h3>KLINIK PRATAMA AVICENA</h3></center>
			<form class="form-horizontal" action="<?= base_url('petugas/authenticate')?>" method="post" >

				<div class="form-group">
					<label class="control-label col-sm-2" for="username">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control"  placeholder="masukkan username" name="username">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" placeholder="masukkan password" name="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
