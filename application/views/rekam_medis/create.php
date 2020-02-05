<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Data Rekam Medis</h3></center></td>
			</tr>

			<tr>
				<form class="form-control-sm form-group" method="post" action="<?= base_url('rekam_medis/insert');?>" >
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
								<td>Tanggal</td>
								<td>:</td>
								<td>
									<input class="form-control" id="datepicker" type="date" name="waktu" placeholder="masukkan tanggal" width="276">
<!--									<script>-->
<!--                                        $('#datepicker').datepicker({-->
<!--                                            uiLibrary: 'bootstrap4'-->
<!--                                        });-->
<!--									</script>-->
								</td>
							</tr>
							<tr>
								<td>Nama Pasien</td>
								<td>:</td>
								<td>
									<select class="form-control" name="kode_pasien" >
										<?php foreach ($pasien as $pasien) : ?>
											<option value="<?=$pasien['kode_pasien'];?>">
												<?=$pasien['nama_pasien'];?>
											</option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							</tr>
							<td>Anamnese Pasien</td>
							<td>:</td>
							<td>
								<textarea class="form-control" name="anamnese" placeholder="masukkan anamnese"></textarea>
							</td>
							</tr>

							<tr>
								<td>Diagnosa</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="diagnosa" placeholder="masukkan diagnosa pasien"></td>
							</tr>

							<tr>
								<td>Terapi</td>
								<td>:</td>
								<td><textarea class="form-control" name="terapi" placeholder="masukkan terapi"></textarea></td>
							</tr>

							<tr>
								<td>Biaya</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="biaya" placeholder="masukkan biaya pasien" ></td>
							</tr>

							<tr>
								<center>
									<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
									<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>pasien"> Batal </a> </center></td>
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
