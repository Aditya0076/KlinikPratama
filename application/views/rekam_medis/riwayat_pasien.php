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
		<table >
			<tr>
				<td class="font-weight-bold">Nama Pasien</td>
				<td>:</td>
				<td></td>
				<td><?=$pasien['nama_pasien'];?></td>
			</tr>
			<tr >
				<td class="font-weight-bold">Umur</td>
				<td>:</td>
				<td></td>
				<td><?=$pasien['umur'];?></td>
			</tr>
		</table>
	</div>

	<div class="container">
		<table class="container-fluid">
			<tr><td><a type="button" class="btn btn-primary" href="<?= base_url('');?>rekam_medis/create">Tambah Data</a></td></tr>
		</table>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark">
				<?php if ($this->session->flashdata('flash')):?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
				<?php endif;?>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Anamnese Pasien</th>
					<th>Diagnosa</th>
					<th>Terapi</th>
					<th>Biaya</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody >
				<tr>
				<?php
					$id = 1;
					foreach ($rekam_medis as $rekam_medis) :
				?>
					<tr>
						<td><?= $id++;?></td>
						<td><?=$rekam_medis['waktu']; ?></td>
						<td><?=$rekam_medis['anamnese'];?></td>
						<td><?=$rekam_medis['diagnosa'];?></td>
						<td><?=$rekam_medis['terapi'];?></td>
						<td>Rp.<?=$rekam_medis['biaya'];?></td>
						<td>
							<a type="button" class="btn btn-warning" href="<?= base_url('rekam_medis/update/' . $rekam_medis['kode_rekam']);?>">Edit</a>
							<a type="button" href="<?= base_url('rekam_medis/delete/' . $rekam_medis['kode_rekam'] . '/' . $rekam_medis['kode_pasien']);?>"class="btn btn-danger tombol-hapus">Hapus</a>
						</td>
					</tr>
				<?php
					endforeach;
				?>
				</tr>
				</tbody>
				<center><?= $this->pagination->create_links(); ?></center>
			</table>
				<tr>
				  <a class="btn btn-primary" href="<?= base_url('pasien');?>">Kembali</a>
				</tr>
		</tr>
		</table>
		<div class="jumbotron"></div>
	</div>
	</div>
</div>


<?php
require 'application/views/templete/footer.php';
?>

