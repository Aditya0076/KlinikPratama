<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<table class="container text-justify m-auto ">
		<tr>
			<td>Nama Kepala Keluarga</td>
			<td>:</td>
			<td>
				<form class="form-inline" method="post" action="<?= base_url('kepala_keluarga/search');?>">
					<input class="form-control mr-sm-2" type="text" placeholder="masukkan nama kepala keluarga" name="nama_kepala" >
					<button class="btn btn-success" type="submit">Cari</button>
				</form>
			</td>
		</tr>
	</table>
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Data Kepala Keluarga</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark ">
				<?php if ($this->session->flashdata('flash')):?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
				<?php endif;?>
				<tr><a type="button" class="btn btn-primary" href="<?= base_url('');?>belanja/create">Tambah Data</a></tr>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Barang</th>
					<th>Biaya Pengeluaran</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php $id = 1; foreach($full['belanja'] as $belanja) :?>

					<tr>
						<td><?=$id++;?></td>
						<td><?=$belanja['waktu'];?></td>
						<td><?=$belanja['nama_barang'];?></td>
						<td><?=$belanja['biaya'];?></td>
						<td>
							<a type="button" class="btn btn-warning" href="<?= base_url('belanja/update/' . $belanja['kode_belanja']);?>">Edit</a>
							<a type="button" href="<?= base_url('belanja/delete/' . $belanja['kode_belanja']);?>" class="btn btn-danger tombol-hapus" >Hapus</a>
						</td>
					</tr>
				<?php
				endforeach;
				?>
				</tbody>
			</table>
		</tr>
		</table>
	</div>
	<div class="jumbotron">
	</div>
</div>



<?php
require 'application/views/templete/footer.php';
?>

