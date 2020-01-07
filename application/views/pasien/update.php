<?php 
	// require 'application/views/template/header.php';
	// require 'application/views/template/navbar.php';
 ?>
<div class="jumbotron m-lg-auto ">
	<div class="container">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Data Pasien</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<table class="container table  table-responsive-lg table-active">
				<tr>
					<th>Kode Pasien</th>
					<td>
						<input type="text" name="kode_pasien" value="<?=$pasien['kode_pasien'];?>">
					</td>
				</tr>
				<tr>
					<th>Nama Kepala Keluarga</th>
					<td><?//=$pasien['nama_kepala'];?></td>
						
				</tr>
				<tr>
					<th>Nama Pasien</th>
					<td>
						<input type="text" name="nama_pasien" value="<?=$pasien['nama_pasien'];?>">
					</td>
				</tr>
				<tr>
					<th>Umur</th>
					<td>
						<input type="text" name="umur" value="<?=$pasien['umur'];?>">
					</td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="customRadio" value="laki-laki" name="jenis_kelamin" >
							<label class="custom-control-label" for="customRadio">Laki_laki</label>
						</div>
					</td>
					<td>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="customRadio2" value="perempuan" name="jenis_kelamin" >
							<label class="custom-control-label" for="customRadio2">Perempuan</label>
						</div>
					</td>
				</tr>
			</table>

		</tr>
		</table>
	</div>
</div>

 <?php 
 	// require 'application/views/template/footer.php';
  ?>