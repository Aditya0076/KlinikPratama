<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<table class="container text-justify m-auto ">
		<tr>
			<td>Nama Obat</td>
			<td>:</td>
			<td>
				<form class="form-inline" action="/action_page.php">
					<input class="form-control mr-sm-2" type="text" placeholder="masukkan nama obat">
					<button class="btn btn-success" type="submit">Cari</button>
				</form>
			</td>
		</tr>
	</table>
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Data Obat</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark">
				<tr><a type="button" class="btn btn-primary" href="<?= base_url('');?>obat/create">Tambah Data</a></tr>
				<tr>
					<?php if ($this->session->flashdata('flash')):?>
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
					<?php endif;?>
				</tr>
				<tr>
					<th>No</th>
					<th>Nama obat</th>
					<th>Jenis Obat</th>
					<th>Jumlah</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php $id = 1; foreach ($obat as $obat) : ?>
					<tr>
						<td><?=$id++;?></td>
						<td><?=$obat['nama_obat'];?></td>
						<td><?=$obat['jenis_obat'];?></td>
						<td><?=$obat['jumlah_obat'];?></td>
						<td>
							<a type="button" class="btn btn-warning" href="<?= base_url('obat/update/' . $obat['id_obat']);?>">Update</a>
							<a type="button" href="<?= base_url('obat/delete/' . $obat['id_obat']);?>"  class="btn btn-danger tombol-hapus">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
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

