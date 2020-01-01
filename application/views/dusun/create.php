<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Dusun</h3></center></td>
			</tr>

			<tr>

				<form class="form-control-sm form-group" action="">
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Dusun</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="dusun" placeholder="masukkan dusun"></td>
							</tr>
							<tr>
								<td>RT</td>
								<td>:</td>
								<td><input class="form-control" type="text" name="rt" placeholder="masukkan rt "></td>
							</tr>
							</tr>
							<td>Desa</td>
							<td>:</td>
							<td><input class="form-control" type="text" name="desa" placeholder="masukkan desa"></td>
							</tr>

							<tr>
								<td></td>
							</tr>

							<tr>
								<td colspan="3"> <center><input class="btn-success" type="button" value="Kirim"></center></td>
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
