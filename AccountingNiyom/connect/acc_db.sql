-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 09, 2018 at 06:56 PM
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
(53, '2018-11-01', '', 9, '200000.00', 'debit'),
(54, '2018-11-01', '', 14, '60000.00', 'debit'),
(55, '2018-11-01', '', 22, '260000.00', 'credit'),
(56, '2018-11-01', 'นายอ๊อฟเอาเงินสดกับอุปกรณ์มาลงทุน', 0, '0.00', 'note'),
(57, '2018-11-02', '', 13, '15000.00', 'debit'),
(58, '2018-11-02', '', 9, '15000.00', 'credit'),
(59, '2018-11-02', 'ชื้อกระเป๋าเข้าร้านเป็นเงินสด', 0, '0.00', 'note'),
(60, '2018-11-03', '', 15, '20000.00', 'debit'),
(61, '2018-11-03', '', 18, '20000.00', 'credit'),
(62, '2018-11-03', 'ชื้อเครื่องตกแต่งเป็นเงินเชื่อ', 0, '0.00', 'note'),
(63, '2018-11-04', '', 9, '2000.00', 'debit'),
(64, '2018-11-04', '', 13, '2000.00', 'credit'),
(65, '2018-11-04', 'ขายกระเป๋าออนไลน์ได้เป็นเงินสด', 0, '0.00', 'note'),
(66, '2018-11-05', '', 29, '500.00', 'debit'),
(67, '2018-11-05', '', 9, '500.00', 'credit'),
(68, '2018-11-05', 'จ่ายค่าใช้จ่ายอื่นๆ', 0, '0.00', 'note'),
(69, '2018-11-06', '', 30, '1500.00', 'debit'),
(70, '2018-11-06', '', 9, '1500.00', 'credit'),
(71, '2018-11-06', 'จ่ายค่าอินเตอร์เน็ต', 0, '0.00', 'note'),
(72, '2018-11-07', '', 10, '2000.00', 'debit'),
(73, '2018-11-07', '', 9, '2000.00', 'credit'),
(74, '2018-11-07', 'นำเงินสดฝากธนาคาร', 0, '0.00', 'note'),
(75, '2018-11-08', '', 18, '20000.00', 'debit'),
(76, '2018-11-08', '', 9, '20000.00', 'credit'),
(77, '2018-11-08', 'จ่ายชำระหนี้เครื่องตกแต่งเมื่อวันที่ 3 เป็นเงินสด', 0, '0.00', 'note'),
(78, '2018-11-09', '', 9, '40000.00', 'debit'),
(79, '2018-11-09', '', 32, '40000.00', 'credit'),
(80, '2018-11-09', 'กู้เงินจากธนาคาร', 0, '0.00', 'note'),
(81, '2018-11-10', '', 23, '2000.00', 'debit'),
(82, '2018-11-10', '', 9, '2000.00', 'credit'),
(83, '2018-11-10', 'นายอ๊อฟถอนเงินไปใช้ส่วนตัว', 0, '0.00', 'note'),
(84, '2018-11-11', '', 9, '3000.00', 'debit'),
(85, '2018-11-12', '', 9, '3000.00', 'debit'),
(86, '2018-11-11', '', 33, '3000.00', 'credit'),
(87, '2018-11-12', '', 33, '3000.00', 'credit'),
(88, '2018-11-11', 'ขายกระเป๋าได้รับเป็นเงินสด', 0, '0.00', 'note'),
(89, '2018-11-12', 'ขายกระเป๋าได้รับเป็นเงินสด', 0, '0.00', 'note'),
(90, '2018-11-13', '', 29, '1000.00', 'debit'),
(91, '2018-11-13', '', 9, '1000.00', 'credit'),
(92, '2018-11-13', 'จ่ายค่าใช้จ่ายอื่นๆ', 0, '0.00', 'note'),
(93, '2018-11-14', '', 9, '1000.00', 'debit'),
(94, '2018-11-14', '', 13, '1000.00', 'credit'),
(95, '2018-11-14', 'ขายกระเป๋าออนไลน์ได้รับเป็นเงินสด', 0, '0.00', 'note'),
(96, '2018-11-15', '', 27, '1000.00', 'debit'),
(97, '2018-11-15', '', 9, '1000.00', 'credit'),
(98, '2018-11-15', 'จ่ายค่าโฆษณา', 0, '0.00', 'note'),
(99, '2018-11-16', '', 9, '2000.00', 'debit'),
(100, '2018-11-16', '', 24, '2000.00', 'credit'),
(101, '2018-11-16', 'รับเงินค่าซ่อมกระเป๋า', 0, '0.00', 'note'),
(102, '2018-11-17', '', 9, '500.00', 'debit'),
(103, '2018-11-18', '', 9, '3000.00', 'debit'),
(104, '2018-11-17', '', 33, '500.00', 'credit'),
(105, '2018-11-18', '', 33, '3000.00', 'credit'),
(106, '2018-11-18', 'รับเงินค่ากระเป๋า', 0, '0.00', 'note'),
(107, '2018-11-17', 'รับเงินค่ากระเป๋า', 0, '0.00', 'note'),
(108, '2018-11-19', '', 23, '3000.00', 'debit'),
(109, '2018-11-19', '', 9, '3000.00', 'credit'),
(110, '2018-11-19', 'นายอ๊อฟถอนเงินไปใช้ส่วนตัว', 0, '0.00', 'note'),
(111, '2018-11-20', '', 9, '12000.00', 'debit'),
(112, '2018-11-20', '', 33, '12000.00', 'credit'),
(113, '2018-11-20', 'รับเงินค่ากระเป๋า', 0, '0.00', 'note'),
(114, '2018-11-21', '', 9, '2000.00', 'debit'),
(115, '2018-11-21', '', 33, '2000.00', 'credit'),
(116, '2018-11-21', 'ขายกระเป๋าออนไลน์ได้รับเป็นเงินสด', 0, '0.00', 'note'),
(117, '2018-11-22', '', 29, '500.00', 'debit'),
(118, '2018-11-22', '', 9, '500.00', 'credit'),
(119, '2018-11-22', 'จ่ายค่าใช้จ่ายอื่นๆ', 0, '0.00', 'note'),
(120, '2018-11-23', '', 13, '15000.00', 'debit'),
(121, '2018-11-23', '', 9, '15000.00', 'credit'),
(122, '2018-11-23', 'ชื้อกระเป๋าเข้าร้านเป็นเงินสด', 0, '0.00', 'note'),
(123, '2018-11-24', '', 9, '40000.00', 'debit'),
(124, '2018-11-24', '', 32, '40000.00', 'credit'),
(125, '2018-11-24', 'กู้เงินจากธนาคาร', 0, '0.00', 'note'),
(126, '2018-11-25', '', 23, '2000.00', 'debit'),
(127, '2018-11-25', '', 9, '2000.00', 'credit'),
(128, '2018-11-25', 'นายอ๊อฟถอนเงินไปใช้ส่วนตัว', 0, '0.00', 'note'),
(129, '2018-11-26', '', 9, '3000.00', 'debit'),
(130, '2018-11-26', '', 33, '3000.00', 'credit'),
(131, '2018-11-26', 'รับเงินค่ากระเป๋า', 0, '0.00', 'note'),
(132, '2018-11-27', '', 28, '1600.00', 'debit'),
(133, '2018-11-27', '', 9, '1600.00', 'credit'),
(134, '2018-11-27', 'จ่ายค่าน้ำ ค่าไฟ ค่าโทรศัพท์', 0, '0.00', 'note'),
(135, '2018-11-28', '', 26, '4500.00', 'debit'),
(136, '2018-11-28', '', 9, '4500.00', 'credit'),
(137, '2018-11-28', 'จ่ายค่าเช่าร้าน', 0, '0.00', 'note'),
(138, '2018-11-29', '', 9, '1200.00', 'debit'),
(139, '2018-11-29', '', 33, '1200.00', 'credit'),
(140, '2018-11-29', 'รับเงินค่ากระเป๋า', 0, '0.00', 'note'),
(141, '2018-11-30', '', 30, '1500.00', 'debit'),
(142, '2018-11-30', '', 9, '1500.00', 'credit'),
(143, '2018-11-30', 'จ่ายค่าอินเตอร์เน็ต', 0, '0.00', 'note');

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
(9, 101, 'เงินสด'),
(10, 102, 'เงินฝากธนาคาร'),
(13, 105, 'กระเป๋า'),
(14, 106, 'อุปกรณ์ร้าน'),
(15, 107, 'เครื่องตกแต่ง'),
(18, 201, 'เจ้าหนี้'),
(22, 301, 'ทุน - นาย'),
(23, 302, 'ถอนใช้ส่วนตัว'),
(24, 401, 'รายได้ค่าบริการ'),
(26, 501, 'ค่าเช่า'),
(27, 502, 'ค่าโฆษณา'),
(28, 503, 'ค่าน้ำ ค่าไฟ ค่าโทรศัพท์'),
(29, 504, 'ค่าใช้จ่ายอื่นๆ'),
(30, 505, 'ค่าอินเตอร์เน็ต'),
(32, 202, 'กู้เงิน - ธนาคาร'),
(33, 402, 'รายได้ค่ากระเป๋า');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account_book`
--
ALTER TABLE `tb_account_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tb_account_number`
--
ALTER TABLE `tb_account_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
