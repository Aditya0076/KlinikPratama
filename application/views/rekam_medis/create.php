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
				<form class="form-control-sm form-group" action="">
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td>
									<input class="form-control" id="datepicker" name="tanggal" placeholder="masukkan tanggal"width="276">
									<script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4'
                                        });
									</script>
								</td>
							</tr>
							<tr>
								<td>Nama Pasien</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="nama_pasien" placeholder="masukkan nama pasien "></td>
							</tr>
							</tr>
							<td>Anamnese Pasien</td>
							<td>:</td>
							<td>
								<textarea class="form-control" name="anamnese"></textarea>
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
								<td><textarea class="form-control" name="terapi"></textarea></td>
							</tr>

							<tr>
								<td colspan="3"> <center><input class="btn-success" type="button" value="Tambah"></center></td>
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
