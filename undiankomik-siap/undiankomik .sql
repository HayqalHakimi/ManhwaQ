-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2026 at 03:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `undiankomik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(5) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namaadmin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `password`, `namaadmin`) VALUES
('AD0', 'MIN1', 'EQAL');

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `idcalon` varchar(3) NOT NULL,
  `namacalon` varchar(20) DEFAULT NULL,
  `gambar` varchar(20) DEFAULT NULL,
  `moto` varchar(20) DEFAULT NULL,
  `idadmin` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`idcalon`, `namacalon`, `gambar`, `moto`, `idadmin`) VALUES
('C00', 'Belum Mengundi', 'C00.png', '0.00', 'AD01'),
('C01', 'KILLER PETER', 'C01.png', 'ACTION', 'AD0'),
('C02', 'WINDBREAKER', 'C02.png', 'SPORT', 'AD0'),
('C03', 'ORV', 'C03.png', 'FANTASY', 'AD0');

-- --------------------------------------------------------

--
-- Table structure for table `pengundi`
--

CREATE TABLE `pengundi` (
  `idpengundi` varchar(4) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namapengundi` varchar(30) DEFAULT NULL,
  `idcalon` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengundi`
--

INSERT INTO `pengundi` (`idpengundi`, `password`, `namapengundi`, `idcalon`) VALUES
('orv1', '123', 'orv1', 'C03'),
('pet', '123', 'peter', 'C01'),
('win', '123', 'wind', 'C02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`idcalon`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Indexes for table `pengundi`
--
ALTER TABLE `pengundi`
  ADD PRIMARY KEY (`idpengundi`),
  ADD KEY `idcalon` (`idcalon`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengundi`
--
ALTER TABLE `pengundi`
  ADD CONSTRAINT `pengundi_calon` FOREIGN KEY (`idcalon`) REFERENCES `calon` (`idcalon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
