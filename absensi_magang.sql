-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2019 at 05:53 AM
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
-- Database: `absensi_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `no` int(11) NOT NULL,
  `magang_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `intime` time NOT NULL,
  `ket` varchar(5) NOT NULL DEFAULT 'alfa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`no`, `magang_id`, `tanggal`, `intime`, `ket`) VALUES
(1, 1, '2019-01-21', '09:00:00', 'hadir'),
(2, 1, '2019-01-22', '09:00:00', 'hadir'),
(3, 2, '2019-01-22', '09:48:30', 'hadir'),
(4, 1, '2019-01-23', '08:43:11', 'hadir'),
(9, 4, '2019-01-23', '09:14:13', 'hadir'),
(10, 3, '2019-01-23', '09:17:29', 'hadir'),
(11, 2, '2019-01-23', '10:29:30', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'zzigg', 'zzigg');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log` varchar(1000) NOT NULL,
  `tanggal_log` date NOT NULL,
  `logger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log`, `tanggal_log`, `logger_id`) VALUES
(1, 'Mulai membuat aplikasi absensi untuk mahasiswa magang', '2019-01-21', 1),
(2, 'Melanjutkan aplikasi absensi magang. Membuat aplikasi usable dan responsif.', '2019-01-22', 1),
(3, 'Membantu tugas sehari-hari pak Ashari', '2019-01-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `magang_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `mulai_magang` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`magang_id`, `nama`, `username`, `alamat`, `jk`, `tanggal_lahir`, `pic`, `mulai_magang`, `password`, `email`, `telp`) VALUES
(1, 'Ahmad Ruslan Almujaddidi', 'ruslanuchan', 'Jl. Cendrawasih VIII no.48 Pesanggrahan, Jakarta Selatan', 'L', '1997-07-18', '', '2019-01-21', 'forget-me-not', 'ruslanuchan97@gmail.com', '08159116878'),
(2, 'Karel', 'karel', '-', 'L', '2019-01-01', '', '2019-01-01', 'karel', 'karel@mail.com', '111222333'),
(3, 'Suryaman', 'suryaman', 'Jl.Pesanggrahan no. 40, RT 004/004 Cempaka Putih, Ciputat Timur, Tangerang Selatan', 'L', '1997-07-20', '-', '2019-01-23', 'suryaman', 'suryaman2007@gmail.com', '08980839805'),
(4, 'Hafizul Ihsan Fadli', 'ihsan', 'Jl. Semanggi II Cempaka Putih, Ciputat Timur, Tangerang Selatan', 'L', '1998-06-01', '-', '2019-01-23', 'ihsan', 'hafizulihsanfadli@gmail.com', '082284808654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`no`),
  ADD KEY `magang_id` (`magang_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `logger_id` (`logger_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`magang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `magang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`magang_id`) REFERENCES `mahasiswa` (`magang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`logger_id`) REFERENCES `mahasiswa` (`magang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
