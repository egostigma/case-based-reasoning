-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 04:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `gejala_id` int(11) NOT NULL,
  `gejala_nama` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`gejala_id`, `gejala_nama`, `created_at`, `updated_at`) VALUES
(1, 'Bahan bakar boros', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mesin tersendat-sendat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Idling mesin buruk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Akselerasi buruk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Mesin susah hidup', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Mesin mogok', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Tarikan mesin lemah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Temperatur mesin tidak normal/full', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Tidak dapat idling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Uap air menyembur keluar ke radiator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Oli bercampur dengan air', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Suara mesin knocking', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Oli mesin berkurang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Mesin mengeluarkan asap', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Lampu oli hidup terus', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Mesin tidak dapat berputar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Suara mesin kasar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Temperatur mesin panas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Kram otak', '2018-11-17 10:39:51', '2018-11-17 10:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `kasus_id` int(11) NOT NULL,
  `kerusakan_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `kasus_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`kasus_id`, `kerusakan_id`, `gejala_id`, `kasus_bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 4, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 6, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 2, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 9, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 8, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 9, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 10, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, 11, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 3, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 4, 12, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 4, 13, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 4, 14, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 4, 15, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 4, 16, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 5, 7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 5, 17, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 5, 10, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 5, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 5, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 7, 18, 7, '2018-11-17 10:48:22', '0000-00-00 00:00:00'),
(27, 7, 20, 7, '2018-11-17 10:48:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `kerusakan_id` int(11) NOT NULL,
  `kerusakan_nama` varchar(200) NOT NULL,
  `kerusakan_solusi` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`kerusakan_id`, `kerusakan_nama`, `kerusakan_solusi`, `created_at`, `updated_at`) VALUES
(1, 'Busi', 'Melakukan penggantian busi sesuai buku panduan perbaikan dan penggunaan bahan bakar bebas timbal (pertamax)', '0000-00-00 00:00:00', '2018-11-17 09:16:51'),
(2, 'Pompa Bahan Bakar', 'Melakukan penggantian pompa bahan bakar dan mempertahankan volume bahan bakar di dalam tangki untuk pendinginan pompa agar pompa tidak cepat rusak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Radiator Bocor', 'Mengganti radiator dan menggunakan cairan pendingin yang khusus', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Ring Piston Longgar', 'Melakukan pembongkaran mesin dan melakukan penggantian ring piston dan piston', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Knalpot Sumbat', 'Melakukan pembersihan knalpot secara berkala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Otak', 'Servis', '2018-11-17 10:39:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `konsultasi_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`konsultasi_id`, `created_at`) VALUES
(1, '2018-11-16 17:01:14'),
(2, '2018-11-16 17:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_gejala`
--

CREATE TABLE `konsultasi_gejala` (
  `konsultasi_gejala_id` int(11) NOT NULL,
  `konsultasi_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultasi_gejala`
--

INSERT INTO `konsultasi_gejala` (`konsultasi_gejala_id`, `konsultasi_id`, `gejala_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 2),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(64) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_role` enum('admin','sales') COLLATE utf8_bin NOT NULL DEFAULT 'sales'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_role`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$ohVuLOOYZhHE1dDwe4Tdzud/eTN9LHU2TamsAkfGOpP9h71oc1hMC', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`gejala_id`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`kasus_id`),
  ADD KEY `kerusakan_id` (`kerusakan_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`kerusakan_id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`konsultasi_id`);

--
-- Indexes for table `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
  ADD PRIMARY KEY (`konsultasi_gejala_id`),
  ADD KEY `konsultasi_id` (`konsultasi_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `gejala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `kasus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `kerusakan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `konsultasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
  MODIFY `konsultasi_gejala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsultasi_gejala`
--
ALTER TABLE `konsultasi_gejala`
  ADD CONSTRAINT `konsultasi_gejala_ibfk_1` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`konsultasi_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
