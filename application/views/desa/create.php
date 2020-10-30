<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>

<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Desa</h3></center></td>
			</tr>

			<tr>

				<form class="form-control-sm form-group" method="post" action="<?=base_url('desa/insert');?>">
					<td></td>
					<td>
						<table class="text-justify m-auto">

							</tr>
							<td>Desa</td>
							<td>:</td>
							<td colspan="2">
								<input class="form-control" type="text" name="nama_desa" placeholder="masukkan nama desa">
							</td>
							</tr>

							<tr>
								<td></td>
							</tr>

							<tr>
								<td colspan="3"> <center><input class="btn btn-success" type="submit" value="Tambah"></center></td>
								<td colspan="2"> <center> <a type="button" class="btn btn-danger" href="<?= base_url('');?>dusun"> Batal </a> </center></td>
							</tr>
							<?php if ($this->session->flashdata('flash')):?>
								<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
							<?php endif;?>
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
