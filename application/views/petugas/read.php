<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td><img src="<?= base_url();?>/assets/Foto-Kartun-Dokter.gif" class="img-thumbnail" alt="Cinque Terre" width="158" height="158"></td>
				<td>
					<table class="text-justify m-auto">
						<?php
						$no = 1;
						foreach($petugas  as $u){
						?>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $u->nama_admin;?></td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td><?php echo $u->umur;?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td><?php echo $u->jabatan;?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $u->alamat;?></td>
						</tr>
						<?php } ?>
					</table>
				</td>
			</tr>
		</table>

	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
