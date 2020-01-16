<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Edit Data Kepala Keluarga</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<form class="form-control-sm form-group" method="post" action="<?=base_url('pasien/insert');?>">
				<table class="text-justify m-auto">

					<tr>
						<td>Nama Kepala Keluarga</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="kode_keluarga" value="<?=$kepala_keluarga['nama_kepala'];?>">
						</td>
					</tr>

					<tr>
						<td>Dusun</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="nama_dusun" value="<?=$kepala_keluarga['nama_dusun'];?>">
						</td>
					</tr>

					<tr>
						<td>Desa</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="nama_desa" value="<?=$kepala_keluarga['nama_desa'];?>">
						</td>
					</tr>


					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="alamat" value="<?=$kepala_keluarga['alamat'];?>" >
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
						<td colspan="3"> <center><input class="btn-success" type="submit" value="Tambah"></center></td>
					</tr>
				</table>
			</form>
			</table>
	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
