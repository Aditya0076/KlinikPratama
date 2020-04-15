<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="3"> <center><h3 class="font-weight-bold">Tambah Data Pengeluaran</h3></center></td>
			</tr>
			<tr>
				<form class="form-control-sm form-group" method="post" action="<?=base_url('belanja/insert');?>">
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td colspan="3"><input class="form-control" type="date" name="waktu" placeholder="masukkan tanggal"></td>
							</tr>
							<tr>
								<td>Nama Barang</td>
								<td>:</td>
								<td colspan="3"><input class="form-control" type="text" name="keterangan" placeholder="masukkan nama barang"></td>
							</tr>
							<tr>
								<td>Biaya Pengeluaran</td>
								<td>:</td>
								<td colspan="3"><input class="form-control" type="text" name="keluar" placeholder="masukkan biaya pengeluaran"></td>
							</tr>

							<tr>
								<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
								<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('belanja/read');?>kepala_keluarga"> Batal </a> </center></td>
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
