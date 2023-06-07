-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2023 at 02:58 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasien`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tl` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nik`, `nama`, `tempat`, `tl`, `gender`, `email`, `telp`) VALUES
(1, '1234561001', 'Dinda', 'Bandung', '2020-12-11', 'Female', 'dindawahyu@upi.edu', '088970803025'),
(2, '6754327002', 'Wahyu', 'Cimahi', '2020-12-14', 'Laki-laki', 'wah@upi.edu', '089678898545'),
(4, '7890654001', 'Ayang', 'Bandung', '2020-11-29', 'Perempuan', 'ay@gmail.com', '081321778980'),
(5, '9876576008', 'Zulfan', 'bandung', '2021-01-04', 'Laki-laki', 'jull@gmai.com', '088970803025'),
(6, '1234567009', 'Prilla', 'Seoul', '2001-05-05', 'Perempuan', 'prillarosaria@upi.edu', '081234876235'),
(7, '7135712004', 'Son', 'Canada', '1994-02-21', 'Perempuan', 'chrstjsmn@gmail.com', '081573038425'),
(9, '8795642002', 'Mark', 'Canada', '1999-08-20', 'Laki-laki', 'mark@upi.edu', '08237218473'),
(32, '9090', 'tari', 'bdg', '2023-05-28', 'Female', 'destsaras@gmail.com', '0851552122333');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
