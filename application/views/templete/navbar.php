<?php
?>

<div class="navbar navbar-expand-sm navbar-dark" style="width: 1266px;height: 82px;left: 46px;top: 45px; background: #1C3387;border-radius: 20px;">
	<ul class="navbar-nav m-auto">
		<li class="nav-item " style="color: ghostwhite;">
			<a class="nav-link" href="<?= base_url('');?>petugas/read">Beranda</a>
		</li>
		<li class="nav-item dropdown" style="color: ghostwhite;">
			<a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Kepala Keluarga
			</a>
			<div class="dropdown-menu"aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="<?= base_url('');?>desa">Tambah Desa</a>
				<a class="dropdown-item" href="<?= base_url('');?>dusun">Tambah Dusun</a>
				<a class="dropdown-item" href="<?= base_url('');?>kepala_keluarga/create">Tambah Data Kepala Keluarga</a>
				<a class="dropdown-item" href="<?= base_url('');?>kepala_keluarga">Tampil Data Kepala Keluarga</a>
			</div>
		</li>
		<li class="nav-item dropdown" style="color: ghostwhite;">
			<a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Medis
			</a>
			<div class="dropdown-menu"aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="<?= base_url('');?>pasien/create">Tambah Data Pasien</a>
				<a class="dropdown-item" href="<?= base_url('');?>rekam_medis/create">Tambah Data Rekam</a>
				<a class="dropdown-item" href="<?= base_url('');?>pasien">Tampil Data Pasien</a>
			</div>
		</li>
		<li class="nav-item dropdown"style="color: ghostwhite;">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Obat
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="<?= base_url('');?>obat/create">Tambah Data Obat</a>
				<a class="dropdown-item" href="<?= base_url('');?>obat">Tampil Data Obat</a>

			</div>
		</li>
		<li class="nav-item dropdown" style="color: ghostwhite;">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Laporan
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="<?= base_url('');?>transaksi/create">Tambah Data Transaksi</a>
				<a class="dropdown-item" href="<?= base_url('');?>transaksi">Tampil Data Transaksi</a>
			</div>
		</li>
		<li class="nav-item" style="color: ghostwhite;">
			<a class="nav-link" href="<?= base_url('petugas/logout');?>">Logout</a>
		</li>
	</ul>
</div>
