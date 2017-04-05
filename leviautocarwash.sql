-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 05:54 AM
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
  `id_detail_layanan` varchar(20) NOT NULL,
  `id_layanan` int(6) NOT NULL,
  `id_service` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_layanan`
--

INSERT INTO `detail_layanan` (`id_detail_layanan`, `id_layanan`, `id_service`) VALUES
('dtl_relation_1000001', 4, 'service_10001'),
('dtl_relation_1000002', 4, 'service_10003'),
('dtl_relation_1000003', 5, 'service_10001'),
('dtl_relation_1000004', 6, 'service_10002'),
('dtl_relation_1000005', 6, 'service_10003'),
('dtl_relation_1000006', 7, 'service_10002'),
('dtl_relation_1000007', 8, 'service_10001'),
('dtl_relation_1000008', 8, 'service_10002'),
('dtl_relation_1000009', 8, 'service_10003'),
('dtl_relation_1000010', 9, 'service_10001'),
('dtl_relation_1000011', 9, 'service_10002'),
('dtl_relation_1000012', 10, 'service_10001'),
('dtl_relation_1000013', 10, 'service_10003');

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

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_pelanggan`, `telepon`, `time_start`, `time_end`, `tanggal`, `status`, `harga_total`, `layanan_is_delete`) VALUES
(4, 'asturi', '', '11:29:29', '12:29:29', '2016-12-31', 'menunggu', '735000', 'no'),
(5, 'pambudi', '', '11:40:29', '11:50:29', '2016-12-31', 'menunggu', '35000', 'no'),
(6, 'dasfafasf', '', '11:42:16', '12:47:16', '2016-12-31', 'menunggu', '745000', 'no'),
(7, 'asdasd', '', '11:44:29', '11:59:29', '2016-12-31', 'menunggu', '45000', 'no'),
(8, 'draco', '', '11:45:01', '13:00:01', '2017-01-02', 'menunggu', '780000', 'no'),
(9, 'samir', '', '11:45:55', '12:10:55', '2017-01-03', 'menunggu', '80000', 'no'),
(10, 'diki sanjaya', '', '11:46:44', '12:46:44', '2017-01-04', 'menunggu', '735000', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_stock` varchar(20) NOT NULL,
  `total` bigint(15) NOT NULL,
  `keterangan` varchar(75) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pembelian_is_delete` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_stock`, `total`, `keterangan`, `tanggal_pembelian`, `pembelian_is_delete`) VALUES
(4, 'stocklist_10001', 1000000, 'add', '2017-01-02 20:01:13', 'no'),
(6, 'stocklist_10002', 1200000, 'add', '2017-01-02 20:01:27', 'no'),
(7, 'stocklist_10003', 5000000, 'add', '2017-01-02 23:01:27', 'no'),
(8, 'stocklist_10003', 5775000, 'restock', '2017-01-04 20:01:49', 'no'),
(9, '', 500000, 'Beli obat nyamuk dan raket', '2017-01-07 18:40:08', 'no');

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
(9, 1, 'admin', 'admin', '3f711f6c7388a8025beb0996aedf44e2caf735b9854746dcb86157a68a81cd76', 'b6244a316ae7d20b5fe1a29d3065decd', '', '', '', '', 'profile_default.jpg', '2017-02-24 03:46:40', '', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `previlege`
--

CREATE TABLE `previlege` (
  `id_previlege` int(11) NOT NULL,
  `nama_previlege` varchar(50) NOT NULL,
  `gaji` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previlege`
--

INSERT INTO `previlege` (`id_previlege`, `nama_previlege`, `gaji`) VALUES
(1, 'admin', 0),
(2, 'owner', 0),
(3, 'kasir', 0),
(4, 'pegawai', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `stocklist`
--

CREATE TABLE `stocklist` (
  `id_stock` varchar(15) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `stock_barang` int(8) NOT NULL,
  `harga_beli` bigint(15) NOT NULL,
  `harga_jual` bigint(15) NOT NULL,
  `stocklist_is_delete` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocklist`
--

INSERT INTO `stocklist` (`id_stock`, `nama_produk`, `stock_barang`, `harga_beli`, `harga_jual`, `stocklist_is_delete`) VALUES
('stocklist_10001', 'Oli Motul 500 ml', 20, 50000, 60000, 'no'),
('stocklist_10002', 'Oli Federal 750ml', 20, 60000, 65000, 'no'),
('stocklist_10003', 'oli castrol 1000ml', 55, 105000, 120000, 'no');

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

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
-- Indexes for table `stocklist`
--
ALTER TABLE `stocklist`
  ADD PRIMARY KEY (`id_stock`),
  ADD UNIQUE KEY `nama_produk_2` (`nama_produk`),
  ADD KEY `nama_produk` (`nama_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
