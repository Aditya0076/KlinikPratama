<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan=""> <center><h3 class="font-weight-bold">Edit Data Kepala Keluarga</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<form class="form-control-sm form-group" method="post" action="<?=base_url('belanja/replace/'.$belanja['kode_belanja']);?>">
				<table class="text-justify m-auto">
					<tr>
						<td>
							<?php if( validation_errors() ):?>
								<div role="alert" class="alert alert-danger ">
									<p> <?= validation_errors(); ?></p>
								</div>
							<?php endif;?>
						</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td colspan="3"><input class="form-control" type="date" name="waktu" value="<?=$belanja['waktu'] ;?>"></td>
					</tr>
					<tr>
						<td>Nama Barang</td>
						<td>:</td>
						<td colspan="3"><input class="form-control" type="text" name="keterangan" value="<?=$belanja['nama_barang'];?>"></td>
					</tr>
					<tr>
						<td>Biaya Pengeluaran</td>
						<td>:</td>
						<td colspan="3"><input class="form-control" type="text" name="keluar" value="<?=$belanja['biaya'];?>"></td>
					</tr>

					</tr>
					<td></td>
					<td></td>
					<td></td>
					</tr>

					<tr>
						<td></td>
					</tr>

					<tr>
						<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
						<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>kepala_keluarga"> Batal </a> </center></td>
					</tr>
				</table>
			</form>
			</table>
	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
