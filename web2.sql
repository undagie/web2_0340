-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 05:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_0340`
--

CREATE TABLE `barang_0340` (
  `kd_barang` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_0340`
--

INSERT INTO `barang_0340` (`kd_barang`, `nama`, `merk`, `stok`, `harga`) VALUES
('B001', 'Indomie Goreng', 'Indomie', 100, 3000),
('B002', 'Sarimi Kuah', 'Sarimi', 100, 2500),
('B003', 'Aqua Air Mineral Gelas', 'Aqua', 50, 1000),
('B005', 'Pepsodent Pasta Gigi', 'Pepsodent', 25, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_0340`
--

CREATE TABLE `karyawan_0340` (
  `kd_karyawan` varchar(5) NOT NULL COMMENT 'kode karyawan',
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabel karyawan';

--
-- Dumping data for table `karyawan_0340`
--

INSERT INTO `karyawan_0340` (`kd_karyawan`, `nama`, `alamat`, `tmp_lahir`, `tgl_lahir`, `jk`) VALUES
('K001', 'Muhammad Ali', 'Jl. A. Yani Km 3.5', 'Banjarmasin', '1995-05-17', 'L'),
('K003', 'Siti Mutmainah', 'Jl. Kampung Melayu No. 9    ', 'Bandung', '1995-02-12', 'P'),
('K004', 'Muhammad Faiz', 'Jl. A. Yani Km 6.5      ', 'Banjarbaru', '1992-01-01', 'L'),
('K010', 'Ahmad Syauqi', 'Jl. Kampung Melayu No. 9 ', 'Bandung', '1995-02-12', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_0340`
--

CREATE TABLE `transaksi_0340` (
  `kd_transaksi` varchar(5) NOT NULL,
  `kd_karyawan` varchar(5) DEFAULT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_0340`
--

INSERT INTO `transaksi_0340` (`kd_transaksi`, `kd_karyawan`, `kd_barang`, `tanggal`, `nama`, `harga`, `jumlah`, `total`) VALUES
('T001', 'K001', 'B001', '2022-04-18', 'Dinda', 500, 10, 5000),
('T002', 'K001', 'B002', '2022-04-18', 'Dinda', 15000, 2, 30000),
('T003', 'K002', 'B002', '2022-04-20', 'Muhammad', 2500, 10, 25000),
('T004', 'K002', 'B003', '2022-04-20', 'Muhammad', 1000, 30, 30000),
('T005', 'K002', 'B004', '2022-04-20', 'Muhammad', 5000, 5, 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_0340`
--
ALTER TABLE `barang_0340`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `karyawan_0340`
--
ALTER TABLE `karyawan_0340`
  ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indexes for table `transaksi_0340`
--
ALTER TABLE `transaksi_0340`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `kd_karyawan` (`kd_karyawan`),
  ADD KEY `kd_barang` (`kd_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
