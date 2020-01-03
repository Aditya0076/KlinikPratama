<?php
	require 'application/views/templete/header.php';
	require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Kepala Keluarga</h3></center></td>
			</tr>

			<tr>

				<form class="form-control-sm form-group" action="">
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Nama Kepala Keluarga</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="dusun" placeholder="masukkan nama kepala keluarga"></td>
							</tr>
							<tr>
								<td>Dusun</td>
								<td>:</td>
								<td>
									<select class="form-control">
										<option>Default select</option>
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
