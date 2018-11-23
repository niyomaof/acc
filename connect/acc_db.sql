-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 23, 2018 at 07:19 AM
-- Server version: 10.3.11-MariaDB-1:10.3.11+maria~bionic
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account_number`
--

CREATE TABLE `tb_account_number` (
  `id` int(11) NOT NULL,
  `acc_number` int(11) NOT NULL,
  `acc_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_account_number`
--

INSERT INTO `tb_account_number` (`id`, `acc_number`, `acc_title`) VALUES
(1, 101, 'เงินสด'),
(5, 103, 'ลูกนี้การค้า'),
(7, 102, 'เงินฝากธนาคาร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account_number`
--
ALTER TABLE `tb_account_number`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acc_number` (`acc_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account_number`
--
ALTER TABLE `tb_account_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
