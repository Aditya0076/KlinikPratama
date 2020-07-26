<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Data Pasien</h3></center></td>
			</tr>

			<tr>

				<form class="form-control-sm form-group" method="post" action="<?=base_url('pasien/insert');?>">
					<td></td>
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
								<td>Nama Pasien</td>
								<td>:</td>
								<td colspan="2"><input class="form-control" type="text" name="nama_pasien" placeholder="masukkan nama pasien"></td>
							</tr>
							<tr>
								<td>Umur</td>
								<td>:</td>
								<td colspan="2"><input class="form-control" type="text" name="umur" placeholder="masukkan umur pasien"></td>
								<td>Tahun</td>
							</tr>

							</tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio" value="Laki-laki" name="jenis_kelamin" >
									<label class="custom-control-label" for="customRadio">Laki-laki</label>
								</div>
							</td>
							<td>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="customRadio2" value="Perempuan" name="jenis_kelamin" >
									<label class="custom-control-label" for="customRadio2">Perempuan</label>
								</div>
							</td>
							</tr>

							<tr>
								<td>Nama Kepala Keluarga</td>
								<td>:</td>
								<td>
									<input type="text" name="kode_keluarga" class="form-control kepala_keluarga" placeholder="masukkan nama kepala keluarga">
<!--									<select class="kepala_keluarga form-control" name="kode_keluarga">-->
<!--										<option value="0">--Pilih Kepala Keluarga</option>-->
<!--									</select>-->
									<!-- <select class="form-control" name="kode_keluarga">
									<php foreach ($kepala_keluarga as $kepala_keluarga) : ?>
										<option value="<=$kepala_keluarga['kode_keluarga'];?>">
											<=$kepala_keluarga['nama_kepala'];?>
										</option>
									<php endforeach; ?> 
									</select>-->
								</td>
							</tr>
							</tr>
							<td></td>
							<td></td>
							<td></td>
							</tr>
							<tr>
								<td colspan="3"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
								<td colspan="3"><a type="button" class="btn btn-danger" href="<?= base_url('');?>pasien"> Batal </a></td>
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
