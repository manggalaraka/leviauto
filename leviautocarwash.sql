-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 01:39 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leviautocarwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan`
--

CREATE TABLE `detail_layanan` (
  `id_detail_layanan` varchar(16) NOT NULL,
  `id_layanan` int(6) NOT NULL,
  `id_service` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('menunggu','selesai') NOT NULL DEFAULT 'menunggu',
  `harga_total` varchar(10) NOT NULL,
  `layanan_is_delete` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `id_previlege` int(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `pertanyaan_pemulih` varchar(200) NOT NULL,
  `jawaban_pemulih` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'profile_default.jpg',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_login` varchar(32) NOT NULL,
  `activated` enum('yes','no') NOT NULL DEFAULT 'no',
  `user_is_delete` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `id_previlege`, `nama`, `username`, `password`, `token`, `pertanyaan_pemulih`, `jawaban_pemulih`, `alamat`, `telepon`, `foto`, `last_login`, `status_login`, `activated`, `user_is_delete`) VALUES
(9, 1, 'admin', 'admin', '3f711f6c7388a8025beb0996aedf44e2caf735b9854746dcb86157a68a81cd76', '74a280c2a303eaf41ac13117b6702d1d', '', '', '', '', 'profile_default.jpg', '2016-12-11 02:33:03', '', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `previlege`
--

CREATE TABLE `previlege` (
  `id_previlege` int(11) NOT NULL,
  `nama_previlege` varchar(50) NOT NULL,
  `gaji` bigint(15) NOT NULL,
  `layout_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previlege`
--

INSERT INTO `previlege` (`id_previlege`, `nama_previlege`, `gaji`, `layout_type`) VALUES
(1, 'admin', 0, ''),
(2, 'owner', 0, ''),
(3, 'kasir', 0, ''),
(4, 'pegawai', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` varchar(13) NOT NULL,
  `nama_service` varchar(50) NOT NULL,
  `keterangan_service` varchar(200) NOT NULL,
  `estimasi_service` time NOT NULL,
  `harga_service` int(11) NOT NULL,
  `service_is_delete` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `nama_service`, `keterangan_service`, `estimasi_service`, `harga_service`, `service_is_delete`) VALUES
('service_10001', 'Cuci Mobil', '', '00:10:00', 35000, 'no'),
('service_10002', 'Dorsmir Mobil', '', '00:15:00', 45000, 'no'),
('service_10003', 'Salon Mobil', '', '00:50:00', 700000, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  ADD PRIMARY KEY (`id_detail_layanan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `telepon` (`telepon`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `previlege`
--
ALTER TABLE `previlege`
  ADD PRIMARY KEY (`id_previlege`),
  ADD UNIQUE KEY `nama_previlege` (`nama_previlege`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD UNIQUE KEY `nama_service` (`nama_service`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `previlege`
--
ALTER TABLE `previlege`
  MODIFY `id_previlege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
