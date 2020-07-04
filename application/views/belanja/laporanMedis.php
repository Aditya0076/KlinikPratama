<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Laporan Harian</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark ">
				<tr>
				  <div class="row">
					<div  class=" col-6 col-md-12">
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
				<tr>
					<th>Nama Kepala</th>
					<th>Nama Dusun</th>
					<th>Kode Keluarga</th>
					<th>Nama Pasien</th>
					<th>Kode Rekam</th>
					<th>Diagnosa</th>
					<th>Biaya</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php if(empty($medis)) : ?>
				<tr>
					<td colspan="7" >
						<div class="alert alert-danger" role='alert' >
							Data tidak ditemukan
						</div>
					</td>
				</tr>
				<?php endif; ?>
				<?php foreach($medis as $medis) :?>

					<tr>
						<td><?=$medis['nama_kepala'];?></td>
						<td><?=$medis['nama_dusun'];?></td>
						<td><?=$medis['kode_keluarga'];?></td>
						<td><?=$medis['nama_pasien'];?></td>
						<td><?=$medis['kode_rekam'];?></td>
						<td><?=$medis['diagnosa'];?></td>
						<td><?=$medis['biaya'];?></td>
					</tr>
				<?php endforeach;?>
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

