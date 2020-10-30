<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
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
				<tr>
				  <div class="row">
				    <div class="col-12 col-md-2">
					  <a type="button" class="btn btn-primary" href="<?= base_url('');?>kepala_keluarga/create">Tambah Data</a>
					</div>
					<div class="col-6 col-md-6">
						<a type="button" class="btn btn-info" href="<?= base_url('')?>kepala_keluarga/tampil_dusun">Kembali</a>
					</div>
					<div  class=" col-6 col-md-4">
					  <form  action="" method="post">
					    <div class="input-group mb-3">
						  <input name="keyword" type="text" class="form-control" placeholder="masukkan nama kepala keluarga" autofocus>
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
				<!-- <tr><a type="button" class="btn btn-primary" href="<?= base_url('');?>kepala_keluarga/create">Tambah Data</a></tr>
				<tr> -->
					<th>Kode Keluarga</th>
					<th>Nama Kepala Keluarga</th>
					<!-- <th>Dusun</th> -->
					<!-- <th>Desa</th> -->
					<th>RT</th>
					<th>Pilihan</th>
				</tr>
				</thead>
				<tbody class="table-light">
				<?php if(empty($kepala_keluarga)) : ?>
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
				foreach ($kepala_keluarga as $kepala_keluarga) :
					?>

					<tr>
<!--						<td>--><?//=$id++;?><!--</td>-->
						<td><?=$kepala_keluarga['kode_keluarga'];?></td>
						<td><?=$kepala_keluarga['nama_kepala'];?></td>
						<!-- <td><=$kepala_keluarga['nama_dusun'];?></td> -->
						<!-- <td><=$kepala_keluarga['nama_desa'];?></td> -->
						<td><?=$kepala_keluarga['rt'];?></td>
						<td>
							<a type="button" class="btn btn-warning" href="<?= base_url('kepala_keluarga/update/' . $kepala_keluarga['kode_keluarga']);?>">Edit</a>
							<a type="button" href="<?= base_url('kepala_keluarga/delete/' . $kepala_keluarga['kode_keluarga']);?>" class="btn btn-danger tombol-hapus" >Hapus</a>
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

