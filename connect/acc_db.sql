-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 24, 2018 at 10:00 PM
-- Server version: 5.7.24
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
-- Table structure for table `tb_account_book`
--

CREATE TABLE `tb_account_book` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_acc` int(11) DEFAULT NULL,
  `cost` decimal(9,2) DEFAULT NULL,
  `status` enum('debit','credit','note') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_account_book`
--

INSERT INTO `tb_account_book` (`id`, `date`, `detail`, `id_acc`, `cost`, `status`) VALUES
(27, '2018-11-01', '', 1, '40000.00', 'debit'),
(28, '2018-11-01', '', 2, '60000.00', 'debit'),
(29, '2018-11-01', '', 3, '50000.00', 'debit'),
(30, '2018-11-01', '', 4, '400000.00', 'debit'),
(31, '2018-11-01', '', 5, '60000.00', 'credit'),
(32, '2018-11-01', '', 6, '490000.00', 'credit'),
(33, '2018-11-01', 'บันทึกการลงทุนของนายออฟ', 0, '0.00', 'note'),
(34, '2018-11-05', '', 1, '3000.00', 'debit'),
(35, '2018-11-05', '', 7, '3000.00', 'credit'),
(36, '2018-11-05', 'รับเงินค่าซ่อมทีวี', 0, '0.00', 'note'),
(37, '2018-11-08', '', 3, '12000.00', 'debit'),
(38, '2018-11-08', '', 5, '12000.00', 'credit'),
(39, '2018-11-08', 'ซื้ออุปกรณ์ในการซ่อมเป็นเงินเชื่อ', 0, '0.00', 'note'),
(40, '2018-11-09', '', 8, '6000.00', 'debit'),
(41, '2018-11-09', '', 1, '6000.00', 'credit'),
(42, '2018-11-09', 'จ่ายค่าโฆษณา', 0, '0.00', 'note');

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
(2, 102, 'เงินฝากธนาคาร'),
(3, 103, 'อุปกรณ์'),
(4, 104, 'อาคาร'),
(5, 201, 'เจ้าหนี้'),
(6, 301, 'ทุน-นายออฟ'),
(7, 401, 'รายได้ค่าบริการ'),
(8, 501, 'ค่าโฆษณา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account_book`
--
ALTER TABLE `tb_account_book`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tb_account_book`
--
ALTER TABLE `tb_account_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_account_number`
--
ALTER TABLE `tb_account_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
