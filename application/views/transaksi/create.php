<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Data Transaksi</h3></center></td>
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
								<td>
									<select class="form-control" name="jenis_obat" >
										<option value=""> Default </option>
									</select>
								</td>
							</tr>
							</tr>
							<td>Total Pembayaran </td>
							<td>:</td>
							<td><input class="form-control" type="text" name="harga_obat" placeholder="masukkan harga obat"></td>
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
