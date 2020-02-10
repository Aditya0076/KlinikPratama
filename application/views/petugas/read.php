<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">
		<table class="text-justify m-auto border border-dark rounded-sm" border="1" >
			<div class="container">
				<h1 class="text-center"> <b>Selamat Datang</b> </h1>
			</div>
			<tr>
				<td><img src="<?= base_url();?>/assets/Foto-Kartun-Dokter.gif" class="img-thumbnail" alt="Cinque Terre" width="158" height="158"></td>
				<td>
					<table class="text-justify m-auto ">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $petugas['nama_admin'];?></td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>:</td>
							<td><?php echo $petugas['umur']?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td>:</td>
							<td><?php echo $petugas['jabatan'];?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $petugas['alamat'];?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

	</div>
</div>

<?php
require 'application/views/templete/footer.php';
?>
