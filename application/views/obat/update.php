<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Edit Data Obat</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<form class="form-control-sm form-group" method="post" action="<?= base_url('obat/replace/' . $obat['id_obat']);?>">
				<td></td>
				<td>
					<table class="text-justify m-auto">
						<tr>
							<td>Nama Obat</td>
							<td>:</td>
							<td>
								<input class="form-control" type="text" name="nama_obat" value="<?= $obat['nama_obat'];?>" >
							</td>
						</tr>
						<tr>
							<td>Jenis Obat</td>
							<td>:</td>
							<td>
								<input class="form-control" type="text" name="jenis_obat" value="<?= $obat['jenis_obat'];?>" >
							</td>
						</tr>
						</tr>

						</tr>
						<td>Jumlah Obat</td>
						<td>:</td>
						<td><input class="form-control" type="text" name="jumlah_obat" value="<?=$obat['jumlah_obat'];?>"></td>
						</tr>

						<tr>
							<td></td>
						</tr>

						<tr>
							<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
							<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>obat"> Batal </a> </center></td>
						</tr>
					</table>
				</td>
			</form>
			</table>
	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
