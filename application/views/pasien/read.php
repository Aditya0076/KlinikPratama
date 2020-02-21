<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
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
				<tr>
					<div class="row">
					  <div class="col-12 col-md-8">
					  	<a type="button" class="btn btn-primary" href="<?= base_url('');?>pasien/create">Tambah Data</a>				  	
					  </div>
					  <div  class=" col-6 col-md-4">
						<form  action="" method="post">
						  <div class="input-group mb-3">
							<input name="keyword" type="text" class="form-control" placeholder="Search" autofocus>
							<div class="input-group-append">
							  <input type="submit" class="btn btn-primary" name="submit">
						  	</div>
						  </div>
						</form>
					  </div>
					</div>
				  </tr>
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
			<center><?= $this->pagination->create_links(); ?></center>
		</tr>
		</table>
	</div>
	<div class="jumbotron">

	</div>
</div>



<?php
require 'application/views/templete/footer.php';
?>

