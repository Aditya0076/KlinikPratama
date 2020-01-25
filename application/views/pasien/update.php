<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Edit Data Pasien</h3></center></td>
			</tr>
			</div>
			<div class="jumbotron-fluid">
			<tr>
				<form class="form-control-sm form-group" method="post" action="<?=base_url('pasien/replace/'.$pasien['kode_pasien']);?>">
				<table class="text-justify m-auto">

				<tr>
					<td>Nama Kepala Keluarga</td>
					<td>:</td>
					<td colspan="2">
						<select class="form-control" name="kode_keluarga" >
							<?php foreach ($kepala as $kepala):
								if($kepala['kode_keluarga'] == $pasien['kode_keluarga']){
							?>
								<option  value="<?=$pasien['kode_keluarga'];?>" selected><?=$pasien['nama_kepala'];?></option>
							<?php }else{ ?>
								<option value="<?=$kepala['kode_keluarga'];?>"><?=$kepala['nama_kepala'];?></option>
							<?php }endforeach;?>
						</select>
					</td>
				</tr>

				<tr>
					<td>Nama Pasien</td>
					<td>:</td>
					<td colspan="2">
						<input class="form-control" type="text" name="nama_pasien" value="<?=$pasien['nama_pasien'];?>">
					</td>
				</tr>

				<tr>
					<td>Umur</td>
					<td>:</td>
					<td colspan="2">
						<input class="form-control" type="text" name="umur" value="<?=$pasien['umur'];?>">
					</td>
					<td>Tahun</td>
				</tr>

				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="customRadio" value="Laki-laki" <?php echo (strcmp($pasien['jenis_kelamin'],'Laki-laki') ? '' : ' checked'); ?> name="jenis_kelamin" >
							<label class="custom-control-label" for="customRadio">Laki-laki</label>
						</div>
					</td>
					<td>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="customRadio2" value="Perempuan"<?php echo ($pasien['jenis_kelamin'] == 'Perempuan' ? ' checked' : ''); ?> name="jenis_kelamin" >
							<label class="custom-control-label" for="customRadio2">Perempuan</label>
						</div>
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
					<td colspan="3"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
					<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>pasien"> Batal </a> </center></td>
				</tr>

				</table>
				</form>
		</table>
	</div>
</div>

<?php
require 'application/views/templete/footer.php';

?>
