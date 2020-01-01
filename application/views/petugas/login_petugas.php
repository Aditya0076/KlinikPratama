<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<title>Login Petugas</title>
</head>
<body>
<style>
	body, html {
		height: 100%;
	}
	.background{
		background-size: cover;
		background-image: url('doctor-4068134_960_720.jpg');
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
<div class="background">
	<div class="kotak">
		<div class="container">
			<center><h3>KLINIK PRATAMA AVICENA</h3></center>
			<form class="form-horizontal" action="#">
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
