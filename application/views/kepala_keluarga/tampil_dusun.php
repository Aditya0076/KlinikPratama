<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Data Dusun</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active table-striped">
				<thead class="table-dark ">
				<tr>
					<div class="row">
						<div class="col-12 col-md-8">
						</div>
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
				<!-- <tr><a type="button" class="btn btn-primary" href="<= base_url('');?>kepala_keluarga/create">Tambah Data</a></tr>
				<tr> -->
				<th>No</th>
				<th>Desa</th>
				<th>Dusun</th>
				<th>Kode Dusun</th>
				<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php if(empty($dusun)) : ?>
					<tr>
						<td colspan="7" >
							<div class="alert alert-danger" role='alert' >
								Data tidak ditemukan
							</div>
						</td>
					</tr>
				<?php endif; ?>
				<?php
				foreach ($dusun as $dusun) :
					?>
					<tr>
						<td><?=++$start;?></td>
						<td><?=$dusun['nama_desa'];?></td>
						<td><?=$dusun['nama_dusun'];?></td>
						<td><?=$dusun['simbol'];?></td>
						<td>
							<form method="post" action="<?= base_url('kepala_keluarga/')?>" >
							<?php $this->session->unset_userdata('keyword','kelas'); ?>
								<input type="text" name="kode_dusun" value="<?=$dusun['kode_dusun']?>" hidden>
								<input type="submit" class="btn btn-info" value="Tampil Data Kepala Keluarga" >
							</form>
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

