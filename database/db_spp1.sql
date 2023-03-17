-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2023 pada 10.10
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp1`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cekLoginPetugas` (IN `uname` VARCHAR(100), IN `pass` VARCHAR(100))   BEGIN
	SELECT * FROM petugas WHERE username = uname AND PASSWORD = pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cekLoginSiswa` (IN `nis_` VARCHAR(100), IN `pass` VARCHAR(100))   BEGIN
SELECT * FROM siswa WHERE nis = nis_ AND PASSWORD = pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `levelPetugas` (IN `uname` VARCHAR(100), IN `pass` VARCHAR(100))   BEGIN
SELECT * FROM petugas WHERE username = uname AND PASSWORD = pass;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilData` (IN `tabel` VARCHAR(50), IN `kolom` VARCHAR(50))   BEGIN 
DECLARE tab varchar(50);
SET tab = tabel;
SELECT * FROM tab ORDER BY kolom desc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` enum('10 RPL 1','10 RPL 2','10 RPL 3','10 TKJ 1','10 TKJ 2','10 TKJ 3','10 BDP 1','10 BDP 2','10 BDP 3','10 OTKP 1','10 OTKP 2','10 OTKP 3','10 AKL 1','10 AKL 2','10 AKL 3','10 AKL 4','10 UPW 1','10 UPW 2','11 RPL 1','11 RPL 2','11 RPL 3','11 TKJ 1','11 TKJ 2','11 TKJ 3','11 BDP 1','11 BDP 2','11 BDP 3','11 OTKP 1','11 OTKP 2','11 OTKP 3','11 AKL 1','11 AKL 2','11 AKL 3','11 AKL 4','11 UPW 1','11 UPW 2','12 RPL 1','12 RPL 2','12 RPL 3','12 TKJ 1','12 TKJ 2','12 TKJ 3','12 BDP 1','12 BDP 2','12 BDP 3','12 OTKP 1','12 OTKP 2','12 OTKP 3','12 AKL 1','12 AKL 2','12 AKL 3','12 AKL 4','12 UPW 1','12 UPW 2') NOT NULL,
  `kompetensi_keahlian` enum('Rekayasa Perangkat Lunak','Teknik Komputer dan Jaringan','Otomatisasi Tata Kelola Perkantoran','Akutansi Keuangan Lembaga','Bisnis Daring Pemasaran','Usaha Perjalanan Wisata') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, '11 RPL 1', 'Rekayasa Perangkat Lunak'),
(2, '11 RPL 2', 'Rekayasa Perangkat Lunak'),
(3, '11 RPL 3', 'Rekayasa Perangkat Lunak'),
(4, '11 TKJ 1', 'Teknik Komputer dan Jaringan'),
(5, '11 TKJ 2', 'Teknik Komputer dan Jaringan'),
(6, '11 UPW 2', 'Usaha Perjalanan Wisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` enum('January','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun_dibayar` year(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(4, 1, '003', '2023-03-13', 'Maret', 2023, 4, 105000),
(5, 2, '005', '2023-03-13', 'Maret', 2023, 5, 100000),
(6, 1, '002', '2023-03-14', 'Maret', 2023, 3, 110000),
(8, 1, '003', '2023-03-14', 'Maret', 2023, 3, 110000),
(9, 1, '005', '2023-03-14', 'Maret', 2023, 5, 100000),
(10, 1, '001', '2023-03-14', 'Maret', 2023, 2, 115000),
(11, 1, '004', '2023-03-14', 'Maret', 2023, 4, 105000),
(12, 1, '003', '2023-03-15', 'Maret', 2023, 3, 110000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin1', '202cb962ac59075b964b07152d234b70', 'Na Musa\'idah', 'admin'),
(2, 'admin2', '202cb962ac59075b964b07152d234b70', ' Jaemin ', 'admin'),
(3, 'petugas1', '202cb962ac59075b964b07152d234b70', ' Renjun Syah', 'petugas'),
(5, 'petugas2', '202cb962ac59075b964b07152d234b70', 'Tama Mark ', 'petugas'),
(6, 'petugas3', '202cb962ac59075b964b07152d234b70', 'Mu\'tasim Billah', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(12) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `password`, `alamat`, `no_telp`, `id_spp`) VALUES
('001', '202110065068', 'Rika N', 1, '202cb962ac59075b964b07152d234b70', 'Cigadung', '087765467856', 2),
('002', '202110065069', 'Riska F', 2, '202cb962ac59075b964b07152d234b70', 'Sukamulya', '088865776899', 3),
('003', '202110065070', 'Romi N A', 1, '202cb962ac59075b964b07152d234b70', 'Babakan', '089765434956', 3),
('004', '202110065071', 'Syaidatul M', 2, 'd81f9c1be2e08964bf9f24b15f0e4900', 'Sindangsari', '089699716544', 4),
('005', '202110065072', 'Sylvia A', 4, 'd81f9c1be2e08964bf9f24b15f0e4900', 'Ciherang', '087754676564', 5),
('006', '202110065073', 'Tamara A', 4, '202cb962ac59075b964b07152d234b70', 'Awirarangan', '089753256532', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2024, 120000),
(2, 2023, 115000),
(3, 2022, 110000),
(4, 2021, 105000),
(5, 2020, 100000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
