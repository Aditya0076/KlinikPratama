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
				<form class="form-inline" method="post" action="<?= base_url('pasien/search');?>">
					<input class="form-control mr-sm-2" type="text" placeholder="masukkan nama pasien" name="nama_pasien" >
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
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark">
				<tr><a type="button" class="btn btn-primary" href="<?= base_url('');?>pasien/create">Tambah Data</a></tr>
				<?php if ($this->session->flashdata('flash')):?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
				<?php endif;?>
				<tr>
					<th>No</th>
					<th>Nama Kepala Keluarga</th>
					<th>Nama Pasien</th>
					<th>Umur</th>
					<th>Jenis Kelamin</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php 
					foreach ($pasien as $pasien) : 
				?>
					<tr>
						<td><?= ++$start;?></td>
						<td><?=$pasien['nama_kepala'];?></td>
						<td><?=$pasien['nama_pasien'];?></td>
						<td><?=$pasien['umur'];?></td>
						<td><?=$pasien['jenis_kelamin'];?></td>
						<td>
							<a type="button" class="btn btn-info" href="<?= base_url('rekam_medis/readRekam/'.$pasien['kode_pasien']);?>">Detail</a>
							<a type="button" class="btn btn-warning" href="<?= base_url('pasien/update/' . $pasien['kode_pasien']);?>">Edit</a>
							<a type="button" href="<?= base_url('pasien/delete/' . $pasien['kode_pasien']);?>"class="btn btn-danger tombol-hapus">Hapus</a>
						</td>
					</tr>
				<?php
					endforeach; 
				?>
				</tbody>
			</table>
			<?= $this->pagination->create_links(); ?>
		</tr>
		</table>
	</div>
	<div class="jumbotron">

	</div>
</div>



<?php
require 'application/views/templete/footer.php';
?>

