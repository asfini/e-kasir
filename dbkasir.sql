-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 03:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(3) NOT NULL,
  `id_order` varchar(5) NOT NULL,
  `id_masakan` varchar(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_detail_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `jumlah`, `keterangan`, `status_detail_order`) VALUES
(19, 'OD001', 'M001', 1, 'ok', 'Tersedia'),
(20, 'OD001', 'M002', 2, 'ok', 'Tersedia'),
(21, 'OD002', 'M003', 5, 'ok', 'Tersedia'),
(22, 'OD002', 'M004', 5, 'ok', 'Tersedia'),
(23, 'OD003', 'M003', 4, 'ok', 'Tersedia'),
(24, 'OD003', 'M005', 5, 'ok', 'Tersedia'),
(25, 'OD004', 'M001', 2, 'ok', 'Tersedia'),
(26, 'OD004', 'M005', 2, 'ok', 'Tersedia'),
(27, 'OD005', 'M002', 2, 'ok', 'Tersedia'),
(28, 'OD005', 'M003', 3, 'ok', 'Tersedia'),
(29, 'OD006', 'M001', 1, 'ok', 'Tersedia'),
(30, 'OD006', 'M005', 1, 'ok', 'Tersedia'),
(31, 'OD007', 'M002', 2, 'ok', 'Tersedia'),
(32, 'OD008', 'M002', 2, 'ok', 'Tersedia'),
(33, 'OD008', 'M004', 2, 'ok', 'Tersedia'),
(34, 'OD009', 'M001', 2, '', 'Tersedia'),
(35, 'OD009', 'M003', 4, '', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` varchar(10) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
('1', 'admin'),
('2', 'waiter'),
('3', 'kasir'),
('4', 'owner'),
('5', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` varchar(5) NOT NULL,
  `nama_masakan` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL,
  `status_masakan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`) VALUES
('M001', 'Nasi Goreng', 10000, 'Tersedia'),
('M002', 'Sate', 12000, 'Tersedia'),
('M003', 'Nasi Uduk', 8000, 'Tersedia'),
('M004', 'Bakso', 10000, 'Tersedia'),
('M005', 'Mie Ayam', 8000, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_order` varchar(5) NOT NULL,
  `no_meja` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(3) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES
('OD001', 1, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD002', 2, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD003', 3, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD004', 1, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD005', 5, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD006', 6, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD007', 7, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD008', 8, '2019-02-20', 1, 'ok', 'Tersedia'),
('OD009', 1, '2020-03-20', 1, '', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_order` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total`, `bayar`, `kembalian`) VALUES
(1, 1, '0', '2019-02-20', 36000, 50000, 14000),
(2, 1, '0', '2019-02-20', 48000, 100000, 52000),
(3, 1, '0', '2019-02-20', 18000, 20000, 2000),
(4, 1, 'OD008', '2019-02-20', 44000, 100000, 56000),
(5, 1, 'OD009', '2020-03-20', 52000, 100000, 48000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', 'admin', 'Jelly Asfini', '1'),
(2, 'waiter', 'waiter', 'waiter', '2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_detail` (
`id_detail_order` int(3)
,`id_order` varchar(5)
,`id_user` int(3)
,`tanggal` date
,`no_meja` int(5)
,`id_masakan` varchar(5)
,`nama_masakan` varchar(50)
,`jumlah` int(5)
,`harga` int(100)
,`subtotal` bigint(66)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_registrasi`
-- (See below for the actual view)
--
CREATE TABLE `view_registrasi` (
`id_user` int(3)
,`username` varchar(10)
,`password` varchar(10)
,`nama_user` varchar(50)
,`level` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_detail`
--
DROP TABLE IF EXISTS `view_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail`  AS  select `detail_order`.`id_detail_order` AS `id_detail_order`,`detail_order`.`id_order` AS `id_order`,`orderan`.`id_user` AS `id_user`,`orderan`.`tanggal` AS `tanggal`,`orderan`.`no_meja` AS `no_meja`,`masakan`.`id_masakan` AS `id_masakan`,`masakan`.`nama_masakan` AS `nama_masakan`,`detail_order`.`jumlah` AS `jumlah`,`masakan`.`harga` AS `harga`,(`detail_order`.`jumlah` * `masakan`.`harga`) AS `subtotal` from ((`masakan` join `orderan`) join `detail_order`) where ((`detail_order`.`id_order` = `orderan`.`id_order`) and (`detail_order`.`id_masakan` = `masakan`.`id_masakan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_registrasi`
--
DROP TABLE IF EXISTS `view_registrasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_registrasi`  AS  select `user`.`id_user` AS `id_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`nama_user` AS `nama_user`,`level`.`nama_level` AS `level` from (`user` join `level`) where (`user`.`id_level` = `level`.`id_level`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`id_level`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
