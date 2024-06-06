-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 10:48 AM
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
-- Database: `Badminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idevent`, `judul`, `deskripsi`, `foto`, `tanggal`) VALUES
(1, 'TERKAGET KAGET DI ANGKRINGAN Badminton !!', '<p>IT&#39;S OFFICIAL THE FAMOUS SUNDAY MARKET GOING TO WEST! See on 23rd of July, there&#39;s gonna alot of activities, thrift, preloved tenants and tunes! see u there!</p>', 'Screenshot 2023-11-01 143849.png', '2023-11-01');

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
(1, 'Makanan', '2023-08-14 02:54:58', '2023-10-31 02:18:37'),
(2, 'Minuman', NULL, '2023-10-31 02:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `idmeja` int(11) NOT NULL,
  `nomeja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`idmeja`, `nomeja`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `tanggalbooking` date NOT NULL,
  `totalbooking` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `nomeja` varchar(5) NOT NULL,
  `metodepembayaran` varchar(30) NOT NULL,
  `statusbooking` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `statusbayar` varchar(255) NOT NULL,
  `snaptoken` varchar(255) DEFAULT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `idlapangan` int(11) NOT NULL,
  `idsubpengelola` int(11) NOT NULL,
  `namalapangan` text NOT NULL,
  `hargalapangan` text NOT NULL,
  `fotolapangan` text NOT NULL,
  `deskripsilapangan` text NOT NULL,
  `ketersediaanlapangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`idlapangan`, `idsubpengelola`, `namalapangan`, `hargalapangan`, `fotolapangan`, `deskripsilapangan`, `ketersediaanlapangan`) VALUES
(1, 1, 'Nasi Bakar Goreng', '24000', 'resep-nasi-goreng-bakar.jpg', '<p>-</p>', 'Tersedia'),
(3, 6, 'Mie Tumis', '15000', 'mietumis.jpg', '<p>-</p>\r\n\r\n<p>&nbsp;</p>', 'Tersedia'),
(10, 5, 'Kopi Susu Banana', '24000', 'kopisusubanana.webp', '<p>-</p>', 'Tersedia'),
(13, 3, 'Americano', '18000', 'americano.jpg', '<p>-</p>', 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `subpengelola`
--

CREATE TABLE `subpengelola` (
  `idsubpengelola` int(11) NOT NULL,
  `idpengelola` int(11) NOT NULL,
  `namasubpengelola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subpengelola`
--

INSERT INTO `subpengelola` (`idsubpengelola`, `idpengelola`, `namasubpengelola`) VALUES
(1, 1, 'Nasi'),
(2, 1, 'Gorengan'),
(3, 2, 'Teh'),
(4, 2, 'Jus'),
(5, 2, 'Kopi'),
(6, 1, 'Mie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`idpengelola`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`idmeja`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`idbookingdetail`),
  ADD KEY `idbooking` (`idbooking`,`idlapangan`),
  ADD KEY `idlapangan` (`idlapangan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`idlapangan`),
  ADD KEY `idpengelola` (`idsubpengelola`),
  ADD KEY `idsubpengelola` (`idsubpengelola`);

--
-- Indexes for table `subpengelola`
--
ALTER TABLE `subpengelola`
  ADD PRIMARY KEY (`idsubpengelola`),
  ADD KEY `idpengelola` (`idpengelola`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `idpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `idmeja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `idbookingdetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `idlapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subpengelola`
--
ALTER TABLE `subpengelola`
  MODIFY `idsubpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD CONSTRAINT `bookingdetail_ibfk_1` FOREIGN KEY (`idbooking`) REFERENCES `booking` (`idbooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingdetail_ibfk_2` FOREIGN KEY (`idlapangan`) REFERENCES `lapangan` (`idlapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`idsubpengelola`) REFERENCES `subpengelola` (`idsubpengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subpengelola`
--
ALTER TABLE `subpengelola`
  ADD CONSTRAINT `subpengelola_ibfk_1` FOREIGN KEY (`idpengelola`) REFERENCES `pengelola` (`idpengelola`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
