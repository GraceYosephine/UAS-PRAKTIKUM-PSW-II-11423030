-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 12:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badminton_court`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_lapangan`
--

CREATE TABLE `booking_lapangan` (
  `id_booking_lapangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(100) NOT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `jam_buka` datetime NOT NULL,
  `jam_tutup` datetime NOT NULL,
  `harga_per_jam` bigint(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_lapangan`
--

CREATE TABLE `lokasi_lapangan` (
  `id_lokasi_lapangan` int(50) NOT NULL,
  `id_lapangan` int(100) NOT NULL,
  `nama_lokasi_lapangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_lapangan`
--

CREATE TABLE `report_lapangan` (
  `id_report_lapangan` int(50) NOT NULL,
  `id_lapangan` int(50) NOT NULL,
  `id_booking_lapangan` int(50) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `id_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_lapangan`
--
ALTER TABLE `booking_lapangan`
  ADD PRIMARY KEY (`id_booking_lapangan`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `lokasi_lapangan`
--
ALTER TABLE `lokasi_lapangan`
  ADD PRIMARY KEY (`id_lokasi_lapangan`),
  ADD UNIQUE KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `id_role` (`id_lokasi_lapangan`);

--
-- Indexes for table `report_lapangan`
--
ALTER TABLE `report_lapangan`
  ADD PRIMARY KEY (`id_report_lapangan`),
  ADD UNIQUE KEY `id_lapangan` (`id_lapangan`),
  ADD UNIQUE KEY `id_booking_lapangan` (`id_booking_lapangan`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_lapangan`
--
ALTER TABLE `booking_lapangan`
  MODIFY `id_booking_lapangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_lapangan`
--
ALTER TABLE `lokasi_lapangan`
  MODIFY `id_lokasi_lapangan` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_lapangan`
--
ALTER TABLE `report_lapangan`
  MODIFY `id_report_lapangan` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_lapangan`
--
ALTER TABLE `booking_lapangan`
  ADD CONSTRAINT `booking_lapangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `booking_lapangan_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`);

--
-- Constraints for table `lokasi_lapangan`
--
ALTER TABLE `lokasi_lapangan`
  ADD CONSTRAINT `lokasi_lapangan_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`);

--
-- Constraints for table `report_lapangan`
--
ALTER TABLE `report_lapangan`
  ADD CONSTRAINT `report_lapangan_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`),
  ADD CONSTRAINT `report_lapangan_ibfk_2` FOREIGN KEY (`id_report_lapangan`) REFERENCES `booking_lapangan` (`id_booking_lapangan`),
  ADD CONSTRAINT `report_lapangan_ibfk_3` FOREIGN KEY (`id_booking_lapangan`) REFERENCES `booking_lapangan` (`id_booking_lapangan`),
  ADD CONSTRAINT `report_lapangan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
