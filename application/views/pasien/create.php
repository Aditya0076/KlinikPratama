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
									<input type="radio" class="custom-control-input" id="customRadio" value="Laki-Laki" name="jenis_kelamin" >
									<label class="custom-control-label" for="customRadio">Laki_laki</label>
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
									<select class="form-control" name="kode_keluarga">
									<?php foreach ($kepala_keluarga as $kepala_keluarga) : ?>
										<option value="<?=$kepala_keluarga['kode_keluarga'];?>">
											<?=$kepala_keluarga['nama_kepala'];?>
										</option>
									<?php endforeach; ?>
									</select>
								</td>
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
								<td colspan="4"> <center><input class="btn-success" type="submit" value="Tambah"></center></td>
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
