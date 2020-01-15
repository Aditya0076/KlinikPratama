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
				<?= $this->session->flashdata('messenger'); ?>
				<form class="form-control-sm form-group" method="post" action="<?=base_url('desa/insert');?>">
					<td></td>
					<td>
						<table class="text-justify m-auto">

							</tr>
							<td>Desa</td>
							<td>:</td>
							<td>
								<input class="form-control" type="text" name="nama_desa" placeholder="masukkan nama desa">
							</td>
							</tr>

							<tr>
								<td></td>
							</tr>

							<tr>
								<td colspan="3"> <center><input class="btn-success" type="submit" value="Tambah"></center></td>

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
