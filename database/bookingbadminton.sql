-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 11:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingbadminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `tanggalbooking` date NOT NULL,
  `totalbooking` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `jambooking` text NOT NULL,
  `statusbooking` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`idbooking`, `id`, `notransaksi`, `tanggalbooking`, `totalbooking`, `nama`, `nohp`, `jambooking`, `statusbooking`, `catatan`, `waktu`) VALUES
(1, 4, 'TP20240521055912', '2024-05-21', '110000', 'Sugeng Uchiha', '0859215912', '11.00 - 13.00', 'Booking Di Terima', NULL, '2024-05-21 05:59:12'),
(2, 5, 'TP20240521062851', '2024-05-21', '110000', 'Jeslin', '08591295215', '13.00 - 15.00', 'Selesai', 'Oke', '2024-05-21 06:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `idbookingdetail` int(11) NOT NULL,
  `idbooking` int(11) NOT NULL,
  `idlapangan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `harga` text NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`idbookingdetail`, `idbooking`, `idlapangan`, `nama`, `harga`, `subharga`, `jumlah`) VALUES
(1, 1, 1, 'Lapangan 1', '55000', '110000', '2'),
(2, 2, 1, 'Lapangan 1', '55000', '110000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `jambooking`
--

CREATE TABLE `jambooking` (
  `idjambooking` int(11) NOT NULL,
  `jambooking` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jambooking`
--

INSERT INTO `jambooking` (`idjambooking`, `jambooking`) VALUES
(1, '10'),
(2, '11'),
(3, '12'),
(4, '13'),
(5, '14'),
(6, '15'),
(7, '16'),
(8, '17'),
(9, '18'),
(10, '19');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `idlapangan` int(11) NOT NULL,
  `idpengelola` int(11) NOT NULL,
  `namalapangan` text NOT NULL,
  `hargalapangan` text NOT NULL,
  `fotolapangan` text NOT NULL,
  `deskripsilapangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`idlapangan`, `idpengelola`, `namalapangan`, `hargalapangan`, `fotolapangan`, `deskripsilapangan`) VALUES
(1, 1, 'Lapangan 1', '55000', 'badminton1.png', '<p>-</p>'),
(37, 1, 'Lapangan 2', '55000', 'badminton2.jpg', '<p>-</p>'),
(38, 2, 'Lapangan 3', '55000', 'badminton3.jpg', '<p>-</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `idpengelola` int(11) NOT NULL,
  `namapengelola` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`idpengelola`, `namapengelola`, `created_at`, `updated_at`) VALUES
(1, 'Futura Badminton', '2023-08-14 02:54:58', '2023-10-31 02:18:37'),
(2, 'Clover Badminton', NULL, '2023-10-31 02:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `nohp`, `alamat`, `email`, `password`, `level`) VALUES
(1, 'admin', '', '', 'admin@gmail.com', 'admin', 'Admin'),
(4, 'Sugeng Uchiha', '0859215912', 'Jl. Palembang', 'sugeng@gmail.com', 'sugeng', 'Pelanggan'),
(5, 'Jeslin', '08591295215', 'Jl. Palembang', 'jeslin@gmail.com', 'jeslin', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`idbookingdetail`),
  ADD KEY `idpembelian` (`idbooking`,`idlapangan`),
  ADD KEY `idproduk` (`idlapangan`);

--
-- Indexes for table `jambooking`
--
ALTER TABLE `jambooking`
  ADD PRIMARY KEY (`idjambooking`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`idlapangan`),
  ADD KEY `idpengelola` (`idpengelola`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`idpengelola`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `idbookingdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jambooking`
--
ALTER TABLE `jambooking`
  MODIFY `idjambooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `idlapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `idpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD CONSTRAINT `bookingdetail_ibfk_1` FOREIGN KEY (`idbooking`) REFERENCES `booking` (`idbooking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
