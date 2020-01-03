<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<table class="container text-justify m-auto ">
		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td>
				<form class="form-inline" action="/action_page.php">
					<input class="form-control mr-sm-2" type="text" placeholder="masukkan nama pasien">
					<button class="btn btn-success" type="submit">Cari</button>
				</form>
			</td>
		</tr>
	</table>
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Data Pasien</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active">
				<thead>
				<tr>
					<th>No</th>
					<th>Nama Kepala Keluarga</th>
					<th>Nama Pasien</th>
					<th>Umur</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">

				</tbody>
			</table>

		</tr>
		</table>
	</div>
</div>



<?php
require 'application/views/templete/footer.php';
?>

