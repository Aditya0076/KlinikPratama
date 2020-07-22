<?php
	require 'application/views/templete/header.php';
	require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="3"> <center><h3 class="font-weight-bold">Tambah Kepala Keluarga</h3></center></td>
			</tr>

			<tr>
				<form class="form-control-sm form-group" method="post" action="<?=base_url('kepala_keluarga/insert');?>">
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>
								<?php if( validation_errors() ):?>
										<div class="alert alert-dark alert-dismissible fade show" role="alert">
											<p> <?= validation_errors(); ?></p>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif;?>
								</td>
							</tr>
							<tr>
								<td>Kode Keluarga</td>
								<td>:</td>
								<td colspan="3"><input class="form-control" type="text" name="kode_keluarga" placeholder="masukkan kode kepala keluarga"></td>
							</tr>
							<tr>
								<td>Dusun</td>
								<td>:</td>
								<td colspan="3">
									<select class="form-control dusun" name="kode_dusun">
										<option value="0">--Pilih dusun--</option>
									</select>
									<!-- <select class="form-control" name="kode_dusun" >
									<php foreach ($dusun as $dusun) : ?>
										<option value="<=$dusun['kode_dusun'];?>">
											<=$dusun['nama_dusun'] . ', ' . $dusun['nama_desa'];?>
										</option>
									<php endforeach; ?>
									</select> -->
								</td>
							</tr>
							<tr>
								<td>Nama Kepala Keluarga</td>
								<td>:</td>
								<td colspan="3"><input class="form-control" type="text" name="nama_kepala" placeholder="masukkan nama kepala keluarga"></td>
							</tr>
							<tr>
								<td>RT</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="rt" placeholder="masukkan RT"></td>
							</tr>

							<tr>
								<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
								<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>kepala_keluarga"> Batal </a> </center></td>
							</tr>
						</table>
					</td>
				</form>

			</tr>
		</table>

	</div>
</div>

<?php
	require 'application/views/templete/footer.php';
	?>
