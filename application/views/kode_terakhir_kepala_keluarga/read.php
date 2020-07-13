<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<!-- <table class="container text-justify m-auto ">
		<tr>
			<td>Nama Kepala Keluarga</td>
			<td>:</td>
			<td>
				<form class="form-inline" method="post" action="< base_url('kepala_keluarga/search');?>">
					<input class="form-control mr-sm-2" type="text" placeholder="masukkan nama kepala keluarga" name="nama_kepala" >
					<button class="btn btn-success" type="submit">Cari</button>
				</form>
			</td>
		</tr>
	</table> -->
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Data Kode Terakhir Kepala Keluarga</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark ">
				<tr>
					<div class="row">
						<div  class=" col-6 col-md-4">
							<form  action="" method="post">
								<div class="input-group mb-3">
									<input name="keyword" type="text" class="form-control" placeholder="masukkan nama dusun" autofocus>
										<div class="input-group-append">
										<input type="submit" class="btn btn-primary" name="submit" value="cari">
									</div>
								</div>
							</form>
						</div>
					</div>
				</tr>
				<?php if ($this->session->flashdata('flash')):?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
				<?php endif;?>
				<th>No</th>
				<th>Desa</th>
				<th>Dusun</th>
				<th>Kode Terakhir Kepala Keluarga</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php if(empty($kode)) : ?>
					<tr>
						<td colspan="7" >
							<div class="alert alert-danger" role='alert' >
								Data tidak ditemukan
							</div>
						</td>
					</tr>
				<?php endif; ?>
				<?php
				$id = 1;
				foreach ($kode as $kode) :
					?>

					<tr>
						<td><?=++$start;?></td>
						<td><?=$kode['nama_desa'];?></td>
						<td><?=$kode['nama_dusun'];?></td>
						<td><?=$kode['kode_terakhir'];?></td>
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

