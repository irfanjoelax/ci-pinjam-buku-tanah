-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2022 at 07:05 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_pinjam_buku_tanah`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `kode_desa` int(11) UNSIGNED NOT NULL,
  `nama_desa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`kode_desa`, `nama_desa`) VALUES
(3001, 'JANTIGANGGONG'),
(3002, 'SAMARINDA');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hak`
--

CREATE TABLE `jenis_hak` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_hak`
--

INSERT INTO `jenis_hak` (`id_jenis`, `nama_jenis`) VALUES
(1, 'HAK MILIK'),
(2, 'HAK GUNA');

-- --------------------------------------------------------

--
-- Table structure for table `keperluan`
--

CREATE TABLE `keperluan` (
  `id_keperluan` int(11) NOT NULL,
  `jenis_keperluan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keperluan`
--

INSERT INTO `keperluan` (`id_keperluan`, `jenis_keperluan`) VALUES
(1, 'PENGECEKAN'),
(3, 'BALIK NAMA');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `jenis_petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `jenis_petugas`) VALUES
(3, 'LOKET PENDAFTARAN'),
(4, 'KONSEP'),
(5, 'PENGECEKAN'),
(6, 'SKPT'),
(7, 'BUKU TANAH'),
(8, 'LAIN-LAIN'),
(9, 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `desa_kode` int(11) UNSIGNED NOT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `keperluan_id` int(11) DEFAULT NULL,
  `user_nip` varchar(100) NOT NULL,
  `nomer_berkas` varchar(50) DEFAULT NULL,
  `nomer_hak` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `desa_kode`, `jenis_id`, `keperluan_id`, `user_nip`, `nomer_berkas`, `nomer_hak`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 3001, 1, 3, '150105001', 'a1', 100, '2022-08-29', '2022-08-29', 'SETUJU'),
(2, 3001, 1, 1, '150105001', 'a1', 3001, '2022-08-01', '2022-08-30', 'SETUJU'),
(3, 3001, 1, 3, '150105001', 'a1', 100, '2022-07-01', '2022-08-30', 'SETUJU'),
(4, 3001, 1, 3, '150105001', 'A1', 100, '2022-08-01', '2022-08-30', 'SETUJU'),
(5, 3001, 1, 3, '150105001', 'A1', 100, '2022-08-09', '2022-08-30', 'SETUJU'),
(6, 3001, 1, 3, '150105002', 'A1', 101, '2022-08-03', '2022-08-30', 'SETUJU'),
(7, 3001, 1, 3, '150105001', 'ASDF', 101, '2022-09-24', NULL, 'TERLIHAT'),
(8, 3002, 2, 1, '150105001', 'QWER', 101, '2022-09-24', '2022-09-24', 'SETUJU');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(100) NOT NULL,
  `nama_user` varchar(250) DEFAULT NULL,
  `email_user` varchar(250) DEFAULT NULL,
  `pass_user` varchar(250) DEFAULT NULL,
  `level_user` varchar(10) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `nama_user`, `email_user`, `pass_user`, `level_user`, `petugas_id`) VALUES
('1501005011', 'MUHAMMAD IRFAN PERMANA', 'irfanthejoelax@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'petugas', 5),
('150105001', 'ADMINISTRATOR WEBSITE', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 9),
('150105002', 'PETUGAS WEBSITE', 'petugas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'petugas', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`kode_desa`);

--
-- Indexes for table `jenis_hak`
--
ALTER TABLE `jenis_hak`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `keperluan`
--
ALTER TABLE `keperluan`
  ADD PRIMARY KEY (`id_keperluan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK__jenis_hak` (`jenis_id`),
  ADD KEY `FK_transaksi_desa` (`desa_kode`),
  ADD KEY `FK_transaksi_keperluan` (`keperluan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_hak`
--
ALTER TABLE `jenis_hak`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keperluan`
--
ALTER TABLE `keperluan`
  MODIFY `id_keperluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK__jenis_hak` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_hak` (`id_jenis`),
  ADD CONSTRAINT `FK_transaksi_desa` FOREIGN KEY (`desa_kode`) REFERENCES `desa` (`kode_desa`),
  ADD CONSTRAINT `FK_transaksi_keperluan` FOREIGN KEY (`keperluan_id`) REFERENCES `keperluan` (`id_keperluan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
