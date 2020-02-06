-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2020 pada 05.15
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_avicena`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nama_admin` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nama_admin`, `umur`, `jabatan`, `alamat`, `username`, `password`) VALUES
('Aditya Bayu Prabowo', 20, 'karyawan', 'barat UPNVY condong catur', 'adit', 'adit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `kode_pasien` int(11) NOT NULL,
  `kode_keluarga` varchar(4) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `kode_desa` int(11) NOT NULL,
  `nama_desa` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`kode_desa`, `nama_desa`) VALUES
(7, 'TEMUWUH'),
(8, 'JATIMULYO'),
(9, 'DLINGO'),
(10, 'MANGUNAN'),
(11, 'MUNTUK'),
(12, 'TERONG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dusun`
--

CREATE TABLE `dusun` (
  `kode_dusun` int(3) NOT NULL,
  `nama_dusun` varchar(30) NOT NULL,
  `kode_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dusun`
--

INSERT INTO `dusun` (`kode_dusun`, `nama_dusun`, `kode_desa`) VALUES
(8, 'DLINGO 1', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_keluarga`
--

CREATE TABLE `kepala_keluarga` (
  `kode_keluarga` varchar(4) NOT NULL,
  `kode_dusun` int(11) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `rt` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepala_keluarga`
--

INSERT INTO `kepala_keluarga` (`kode_keluarga`, `kode_dusun`, `nama_kepala`, `rt`) VALUES
('001', 8, 'Aditya Bayu P', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `jenis_obat` varchar(64) NOT NULL,
  `jumlah_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `jumlah_obat`) VALUES
(1, 'Magh', 'Pereda Lambung', 11),
(5, 'ventilasi', 'Pereda Lambung', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `kode_rekam` int(11) NOT NULL,
  `waktu` date DEFAULT NULL,
  `kode_pasien` int(11) NOT NULL,
  `anamnese` text NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `terapi` text DEFAULT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `kode_pasien` int(11) NOT NULL,
  `harga_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`kode_pasien`),
  ADD KEY `kode_keluarga` (`kode_keluarga`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`kode_desa`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`kode_dusun`),
  ADD KEY `fk_kode_desa` (`kode_desa`);

--
-- Indeks untuk tabel `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD UNIQUE KEY `kode_keluarga` (`kode_keluarga`),
  ADD KEY `fk_kode_dusun` (`kode_dusun`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`kode_rekam`),
  ADD KEY `fk_kode_pasien` (`kode_pasien`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `kode_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `kode_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dusun`
--
ALTER TABLE `dusun`
  MODIFY `kode_dusun` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `kode_rekam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD CONSTRAINT `data_pasien_ibfk_1` FOREIGN KEY (`kode_keluarga`) REFERENCES `kepala_keluarga` (`kode_keluarga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD CONSTRAINT `fk_kode_desa` FOREIGN KEY (`kode_desa`) REFERENCES `desa` (`kode_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD CONSTRAINT `fk_kode_dusun` FOREIGN KEY (`kode_dusun`) REFERENCES `dusun` (`kode_dusun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `fk_kode_pasien` FOREIGN KEY (`kode_pasien`) REFERENCES `data_pasien` (`kode_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
