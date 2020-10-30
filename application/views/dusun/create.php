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
				<?php if ($this->session->flashdata('flash')):?>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
				<?php endif;?>
				<form class="form-control-sm form-group" method="post" action="<?=base_url('dusun/insert');?>">
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Dusun</td>
								<td>:</td>
								<td colspan="2"><input class="form-control" type="text" name="nama_dusun" placeholder="masukkan dusun"></td>
							</tr>
							<tr>
							<td>Desa</td>
							<td>:</td>
							<td colspan="2">
								<select class="form-control" type="text" name="kode_desa" >
								<?php foreach ($desa as $desa) : ?>
									<option value="<?= $desa['kode_desa'];?>">
										<?=$desa['nama_desa'];?>
									</option>
								<?php endforeach; ?>
								</select>
							</td>
							</tr>
							<tr>
								<td>Kode Dusun</td>
								<td>:</td>
								<td colspan="2"><input type="text" class="form-control" name="simbol" placeholder="masukkan kode dusun" ></td>
							</tr>

							<tr>
								<td colspan="3"> <center><input class="btn btn-success " type="submit" value="Tambah"></center></td>
								<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>dusun"> Batal </a> </center></td>
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
