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
			<table class="container table  table-responsive-lg table-active">
				<thead>
				<tr><a type="button" class="btn btn-primary" href="<?= base_url('');?>kepala_keluarga/create">Tambah Data</a></tr>
				<tr>
					<th>Kode Keluarga</th>
					<th>Nama Kepala Keluarga</th>
					<th>Dusun</th>
					<th>Desa</th>
					<th>RT</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php
				$id = 1;
				foreach ($kepala_keluarga as $kepala_keluarga) :
					?>
					<tr>
<!--						<td>--><?//=$id++;?><!--</td>-->
						<td><?=$kepala_keluarga['kode_keluarga'];?></td>
						<td><?=$kepala_keluarga['nama_kepala'];?></td>
						<td><?=$kepala_keluarga['nama_dusun'];?></td>
						<td><?=$kepala_keluarga['nama_desa'];?></td>
						<td><?=$kepala_keluarga['rt'];?></td>
						<td>
							<a type="button" class="btn btn-warning" href="<?= base_url('kepala_keluarga/update/' . $kepala_keluarga['kode_keluarga']);?>">Update</a>
							<a type="button" class="btn btn-danger" href="<?= base_url('kepala_keluarga/delete/' . $kepala_keluarga['kode_keluarga']);?>">Delete</a>
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

