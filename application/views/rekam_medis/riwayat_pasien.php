<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">

	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Riwayat Pasien</h3></center></td>
			</tr>
	</div>
	<div class="container">
		<table class="container">
			<tr>
				<td>Nama Pasien :</td>
			</tr>
			<tr>
				<td>Umur :</td>
			</tr>
			<tr>
				<td>Alamat :</td>
			</tr>
		</table>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active">
				<thead>
				<tr>
					<th>Tanggal</th>
					<th>Anamnese Pasien</th>
					<th>Diagnosa</th>
					<th>Terapi</th>
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

