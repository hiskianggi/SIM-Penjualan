-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 02:42 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `harga` int(12) DEFAULT NULL,
  `stok` int(12) DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `id_jenis` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `tgl_expired`, `id_jenis`) VALUES
('BR001', 'Paku', 1000, 0, '0000-00-00', '002'),
('BR002', 'Sabun', 2900, 7, '2018-10-18', '004'),
('BR003', 'Super Magic', 4000, 9, '2018-10-25', '001'),
('BR004', 'Kulkas', 1500000, 9, '2018-11-15', '002'),
('BR005', 'Yakult', 2000, 1000, '2025-01-01', '004');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_trans` int(11) NOT NULL,
  `id_trans` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `jumlah_beli` int(10) NOT NULL,
  `sub_total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_trans`, `id_trans`, `id_barang`, `jumlah_beli`, `sub_total`) VALUES
(16, 'TR001', 'BR002', 10, 29000),
(17, 'TR001', 'BR003', 100, 400000),
(18, 'TR002', 'BR001', 4, 4000),
(19, 'TR002', 'BR003', 10, 40000),
(20, 'TR003', 'BR001', 3, 3000),
(21, 'TR004', 'BR001', 3, 3000),
(22, 'TR005', 'BR001', 3, 3000),
(23, 'TR006', 'BR001', 3, 3000),
(24, 'TR006', 'BR003', 3, 12000),
(25, 'TR006', 'BR004', 1, 1500000),
(26, 'TR007', 'BR001', 5, 5000),
(27, 'TR008', 'BR001', 10, 10000),
(28, 'TR009', 'BR001', 3, 3000),
(29, 'TR009', 'BR002', 100, 290000),
(30, 'TR009', 'BR003', 1000, 4000000),
(31, 'TR010', 'BR003', 100, 400000),
(32, 'TR010', 'BR002', 1100, 3190000),
(33, 'TR011', 'BR001', 20, 20000),
(34, 'TR011', 'BR004', 5, 7500000),
(35, 'TR012', 'BR001', 2, 2000),
(36, 'TR012', 'BR002', 3, 8700),
(37, 'TR012', 'BR003', 9, 36000),
(38, 'TR013', 'BR003', 6, 24000),
(39, 'TR013', 'BR002', 10, 29000),
(40, 'TR014', 'BR001', 3, 3000),
(41, 'TR015', 'BR002', 3, 8700),
(42, 'TR016', 'BR001', 3, 3000),
(43, 'TR017', 'BR001', 7, 7000),
(44, 'TR017', 'BR002', 7, 7000),
(45, 'TR017', 'BR002', 2, 5800),
(46, 'TR018', 'BR002', 2, 5800);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(8) NOT NULL,
  `nama_jenis` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
('001', 'Sembako'),
('002', 'Peralatan'),
('003', 'Makan'),
('004', 'Minuman'),
('005', 'Elektronika');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_telp`, `email`) VALUES
('PLG001', 'Fitria Novianti', 'Banyumanis', '+6282220655118', 'mail@yahoo.com'),
('PLG002', 'Tante KARA', 'Ujungwatu', '+62743764738', 'tante@kara.com'),
('PLG003', 'Amin', 'Jlegong', '+6278436385', 'amin@taek.com'),
('PLG004', 'Irvan', 'Kelet', '+62626482498247', 'irvan@asu.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `id_pelanggan` varchar(8) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` int(12) NOT NULL,
  `diskon` int(12) NOT NULL,
  `bayar` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_user`, `tanggal_transaksi`, `total`, `diskon`, `bayar`) VALUES
('TR001', 'PLG002', 'US001', '2018-11-08', 429000, 21450, 500000),
('TR002', 'PLG001', 'US002', '2018-11-08', 44000, 2200, 50000),
('TR003', '-', 'US001', '2018-11-09', 3000, 0, 5000),
('TR004', 'PLG001', 'US001', '2018-11-10', 3000, 150, 10000),
('TR005', '-', 'US001', '2018-11-09', 3000, 0, 9000),
('TR006', 'PLG002', 'US001', '2018-11-09', 1515000, 75750, 2000000),
('TR007', 'PLG001', 'US001', '2018-11-09', 5000, 250, 5000),
('TR008', 'PLG001', 'US001', '2018-11-09', 10000, 500, 10000),
('TR009', 'PLG001', 'US001', '2018-11-09', 4293000, 214650, 5000000),
('TR010', 'PLG001', 'US001', '2018-11-13', 3590000, 179500, 4000000),
('TR011', 'PLG001', 'US001', '2018-11-14', 7520000, 376000, 10000000),
('TR012', 'PLG001', 'US001', '2018-11-14', 46700, 2335, 50000),
('TR013', 'PLG003', 'US001', '2018-11-14', 53000, 2650, 60000),
('TR014', 'PLG001', 'US001', '2018-11-21', 3000, 150, 3000),
('TR015', 'PLG001', 'US001', '2018-12-03', 8700, 435, 30000),
('TR016', '-', 'US001', '2018-12-03', 3000, 0, 3000),
('TR017', 'PLG001', 'US001', '2018-12-03', 19800, 990, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(7) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('US001', 'or', 'e81c4e4f2b7b93b481e13a8553c2ae1b', 'Admin'),
('US002', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir'),
('US003', 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_trans`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
