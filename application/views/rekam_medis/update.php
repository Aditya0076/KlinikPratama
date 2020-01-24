<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Edit Data Rekam Medis</h3></center></td>
			</tr>

			<tr>
				<form class="form-control-sm form-group" method="post" action="<?= base_url('rekam_medis/replace/'.$rekam_medis['kode_rekam']);?>" >
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td>
									<input class="form-control" id="datepicker" type="date" name="waktu" value="<?=$rekam_medis['waktu'];?>" width="276">
								</td>
							</tr>
							<tr>
								<td>Nama Pasien</td>
								<td>:</td>
								<td>
									<input class="form-control" type="text" name="kode_pasien" value="<?=$rekam_medis['nama_pasien'];?>" disabled>
									<input class="form-control" type="text" name="kode_pasien" value="<?=$rekam_medis['kode_pasien'];?>" hidden>
								</td>
							</tr>
							</tr>
							<td>Anamnese Pasien</td>
							<td>:</td>
							<td>
								<textarea class="form-control" name="anamnese" ><?=$rekam_medis['anamnese'];?></textarea>
							</td>
							</tr>

							<tr>
								<td>Diagnosa</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="diagnosa" value="<?=$rekam_medis['diagnosa'];?>"></td>
							</tr>

							<tr>
								<td>Terapi</td>
								<td>:</td>
								<td><textarea class="form-control" name="terapi"><?=$rekam_medis['terapi'];?></textarea></td>
							</tr>

							<tr>
								<center>
									<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
									<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('rekam_medis/readRekam/'.$rekam_medis['kode_pasien']);?>"> Batal </a> </center></td>
								</center>
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
