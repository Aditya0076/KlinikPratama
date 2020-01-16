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
				<?php
				$id = 1;
				foreach ($rekam_medis as $rekam_medis) :
					?>
					<tr>
						<td><?= $id++;?></td>
						<td><?=$rekam_medis['tanggal'];?></td>
						<td><?=$rekam_medis['anamnesa'];?></td>
						<td><?=$rekam_medis['diagnosa'];?></td>
						<td><?=$rekam_medis['terapi'];?></td>
						<td>
							<a type="button" class="btn btn-warning" href="<?= base_url('rekam_medis/update/' . $pasien['kode_pasien']);?>">Update</a>
							<a type="button" class="btn btn-danger" href="<?= base_url('rekam_medis/delete/' . $pasien['kode_pasien']);?>">Delete</a>
						</td>
					</tr>
					<?php
					$id++;
				endforeach;
				?>
				</tbody>
			</table>

		</tr>
		</table>
	</div>
</div>



<?php
require 'application/views/templete/footer.php';
?>

