<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan=""> <center><h3 class="font-weight-bold">Edit Data Kepala Keluarga</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<form class="form-control-sm form-group" method="post" action="<?=base_url('kepala_keluarga/replace/'.$kepala_keluarga['kode_keluarga']);?>">
				<table class="text-justify m-auto">
<!--					<tr>-->
<!--						<td>Kode Kepala Keluarga</td>-->
<!--						<td>:</td>-->
<!--						<td><input type="text" name="kode_keluarga" value="--><?//=$kepala_keluarga['kode_keluarga'];?><!--"></td>-->
<!--					</tr>-->

					<tr>
						<td>Nama Kepala Keluarga</td>
						<td>:</td>
						<td colspan="">
							<input class="form-control" type="text" name="nama_kepala" value="<?=$kepala_keluarga['nama_kepala'];?>">
						</td>
					</tr>

					<tr>
						<td>Dusun</td>
						<td>:</td>
						<td colspan="">
							<select class="form-control" name="kode_dusun" >
								<?php foreach ($dusun as $dusun) : ?>
									<option value="<?=$dusun['kode_dusun'];?>">
										<?=$dusun['nama_dusun'] . ', ' . $dusun['nama_desa'];?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>

					<tr>
						<td>RT</td>
						<td>:</td>
						<td colspan="">
							<input class="form-control" type="text" name="rt" value="<?=$kepala_keluarga['rt'];?>" >
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
						<td colspan="2"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
						<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>kepala_keluarga"> Batal </a> </center></td>
					</tr>
				</table>
			</form>
			</table>
	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
