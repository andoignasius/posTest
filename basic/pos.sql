-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2016 at 01:51 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `stok_barang`, `harga_barang`) VALUES
(1, 1, 'Pensil', 59, 1000),
(2, 1, 'Buku', 22, 2000),
(54, 21, 'ACER', 100, 2000),
(55, 30, 'nahabh', 25, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `no` int(11) NOT NULL,
  `id_barang_masuk` varchar(5) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk_detail`
--

CREATE TABLE `barang_masuk_detail` (
  `id_barang_masuk` varchar(5) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_order`
--

CREATE TABLE `barang_order` (
  `no` int(11) NOT NULL,
  `id_barang_order` varchar(5) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_order`
--

INSERT INTO `barang_order` (`no`, `id_barang_order`, `id_order`, `id_barang`, `jumlah_barang`) VALUES
(1, 'A0000', 1, 2, 10),
(2, 'A0000', 1, 1, 25),
(3, 'A0001', 2, 1, 3),
(90, 'Z1', 2, 1, 2),
(91, 'Z1', 2, 55, 5),
(92, 'Z1', 2, 54, 1),
(93, 'Z1', 2, 54, 8),
(94, 'Z1', 2, 1, 99),
(95, 'Z1', 2, 1, 7),
(96, 'Z1', 2, 55, 9);

-- --------------------------------------------------------

--
-- Table structure for table `idbrgorder`
--

CREATE TABLE `idbrgorder` (
  `no` int(11) NOT NULL,
  `charDpn` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idbrgorder`
--

INSERT INTO `idbrgorder` (`no`, `charDpn`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I'),
(10, 'J'),
(11, 'K'),
(12, 'L'),
(13, 'M'),
(14, 'N'),
(15, 'O'),
(16, 'P'),
(17, 'Q'),
(18, 'R'),
(19, 'S'),
(20, 'T'),
(21, 'U'),
(22, 'V'),
(23, 'W'),
(24, 'X'),
(25, 'Y'),
(26, 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username_karyawan` varchar(50) NOT NULL,
  `password_karyawan` varchar(50) NOT NULL,
  `firstname_karyawan` varchar(50) NOT NULL,
  `lastname_karyawan` varchar(50) NOT NULL,
  `status_karyawan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(21, 'handphone'),
(22, 'laptop'),
(28, ''),
(29, 'POWERBANK'),
(30, 'nokia');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_barang_order` varchar(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `no_telp_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_barang_masuk` (`id_barang_masuk`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  ADD KEY `id_barang_masuk` (`id_barang_masuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `barang_order`
--
ALTER TABLE `barang_order`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_order` (`id_barang_order`);

--
-- Indexes for table `idbrgorder`
--
ALTER TABLE `idbrgorder`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_barang_order` (`id_barang_order`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang_order`
--
ALTER TABLE `barang_order`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `idbrgorder`
--
ALTER TABLE `idbrgorder`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_order`
--
ALTER TABLE `barang_order`
  ADD CONSTRAINT `barang_order_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `barang_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_barang_order`) REFERENCES `barang_order` (`id_barang_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
