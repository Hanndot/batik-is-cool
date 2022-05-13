-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 03:08 PM
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
-- Database: `ta_psbd_batik`
--

-- --------------------------------------------------------

--
-- Table structure for table `batik`
--

CREATE TABLE `batik` (
  `id_batik` int(11) NOT NULL,
  `nama_batik` varchar(255) NOT NULL,
  `asal_batik` varchar(255) NOT NULL,
  `harga_batik` decimal(10,2) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batik`
--

INSERT INTO `batik` (`id_batik`, `nama_batik`, `asal_batik`, `harga_batik`, `is_delete`) VALUES
(1, 'Mega Mendung', 'Cirebon', '50000.00', b'0'),
(2, 'Parang Kusumo', 'Solo', '69000.00', b'0'),
(3, 'Sidomukti', 'Keraton Solo', '65000.00', b'0'),
(4, 'Kawung', 'Yogyakarta', '75000.00', b'0'),
(5, 'Tujuh Rupa', 'Pekalongan', '42000.00', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id_produsen` int(11) NOT NULL,
  `id_batik` int(11) NOT NULL,
  `nama_produsen` varchar(255) NOT NULL,
  `rating_produsen` varchar(255) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id_produsen`, `id_batik`, `nama_produsen`, `rating_produsen`, `is_delete`) VALUES
(1, 1, 'Sanggar Batik Cirebon', '7/11', b'0'),
(2, 2, 'Sanggar Batik Solo', '7/10', b'0'),
(3, 3, 'Sanggar Batik Solo', '7/10', b'0'),
(4, 4, 'Sanggar Batik Yogyakarta', '9/10', b'0'),
(5, 5, 'Sanggar Batik Pekalongan', '10/10', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_batik` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `is_delete` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_batik`, `jumlah_stok`, `is_delete`) VALUES
(1, 1, 69, b'0'),
(2, 2, 37, b'0'),
(3, 3, 42, b'0'),
(4, 4, 12, b'0'),
(5, 5, 30, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'test', 'test@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b'),
(3, 'farhan', 'farhanbatik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batik`
--
ALTER TABLE `batik`
  ADD PRIMARY KEY (`id_batik`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id_produsen`),
  ADD KEY `FK_batik2` (`id_batik`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `FK_batik` (`id_batik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batik`
--
ALTER TABLE `batik`
  MODIFY `id_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id_produsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produsen`
--
ALTER TABLE `produsen`
  ADD CONSTRAINT `FK_batik1` FOREIGN KEY (`id_batik`) REFERENCES `batik` (`id_batik`),
  ADD CONSTRAINT `FK_batik2` FOREIGN KEY (`id_batik`) REFERENCES `batik` (`id_batik`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `FK_batik` FOREIGN KEY (`id_batik`) REFERENCES `batik` (`id_batik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
