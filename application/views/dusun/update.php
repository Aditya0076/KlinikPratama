<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto">
			<tr>
				<td colspan=""> <center><h3 class="font-weight-bold">Edit Data Dusun</h3></center></td>
			</tr>
	</div>
	<div class="jumbotron-fluid">
		<tr>
			<form class="form-control-sm form-group" method="post" action="<?=base_url('dusun/replace/'.$dusun['kode_dusun']);?>">
				<table class="text-justify m-auto">
					<tr>
						<td>
							<?php if( validation_errors() ):?>
								<div role="alert" class="alert alert-danger ">
									<p> <?= validation_errors(); ?></p>
								</div>
							<?php endif;?>
						</td>
					</tr>
					<tr>
						<td>Dusun</td>
						<td>:</td>
						<td colspan="3"><input class="form-control" type="text" name="nama_dusun" value="<?=$dusun['nama_dusun'];?>"></td>
					</tr>
					<tr>
						<td>Desa</td>
						<td>:</td>
						<td colspan="">
							<select class="form-control" type="text" name="kode_desa">
							<?php foreach ($desa as $desa) : ?>
								<option value="<?=$desa['kode_desa']?>">
									<?=$desa['nama_desa']?>
								</option>
							<?php endforeach; ?>
							</select>
						</td>
					</tr>

					<tr>
						<td>Kode Dusun</td>
						<td>:</td>
						<td colspan="">
							<input class="form-control" type="text" value="<?=$dusun['simbol'];?>" disabled>
							<input type="text" name="simbol" value="<?=$dusun['simbol'];?>" hidden>
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
						<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>dusun"> Batal </a> </center></td>
					</tr>
				</table>
			</form>
			</table>
	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
