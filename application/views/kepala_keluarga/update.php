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
						<td>Kode Pasien</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="kode_pasien" value="<?=$pasien['kode_pasien'];?>">
						</td>
					</tr>

					<tr>
						<td>Nama Kepala Keluarga</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="kode_keluarga" value="<?=$pasien['nama_kepala'];?>" disabled>
							<input type="text" name="kode_keluarga" value="<?=$pasien['kode_keluarga'];?>" hidden>
						</td>
					</tr>

					<tr>
						<td>Nama Pasien</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="nama_pasien" value="<?=$pasien['nama_pasien'];?>">
						</td>
					</tr>

					<tr>
						<td>Umur</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="umur" value="<?=$pasien['umur'];?>">
						</td>
						<td>Tahun</td>
					</tr>

					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" value="Laki-laki" name="jenis_kelamin" >
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
						<td>Alamat</td>
						<td>:</td>
						<td colspan="2">
							<input type="text" name="alamat" value="<?=$pasien['alamat'];?>" disabled>
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
