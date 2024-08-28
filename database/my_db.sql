-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:26 PM
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
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'Steel'),
(5, 'Concrete'),
(6, 'Wood'),
(7, 'Stone');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `historyid` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pcontact` int(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`historyid`, `pname`, `pcontact`, `location`) VALUES
(3, 'asdasfa sda', 1234455, ''),
(4, 'asd', 0, 'asda'),
(5, 'Rons Goods', 995123929, 'Malitam'),
(6, 'hatdog', 1234455, ' sdasd asda');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`, `quantity`) VALUES
(54, 0, 'Textile', 100, '', NULL),
(55, 0, 'Blanket', 120, '', 150),
(56, 0, 'Linoleum', 150, '', 123),
(57, 0, 'Bed Sheets', 213, '', 123),
(58, 0, 'Pillow Case', 80, '', 1111111111),
(59, 0, 'Shower Curtains', 200, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(25, '', 2520, '2024-05-28 01:15:35'),
(26, '', 1200, '2024-05-28 18:56:53'),
(27, '', 320, '2024-06-01 06:57:03'),
(28, '', 9000, '2024-06-03 19:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 2),
(17, 9, 14, 2),
(18, 9, 17, 4),
(19, 9, 16, 1),
(20, 9, 20, 1),
(21, 9, 19, 1),
(22, 9, 18, 1),
(23, 10, 15, 1),
(24, 10, 14, 10),
(25, 10, 17, 1),
(26, 10, 16, 10),
(27, 10, 20, 1),
(28, 10, 19, 1),
(29, 10, 18, 1),
(30, 12, 15, 2),
(31, 12, 14, 1),
(32, 13, 23, 1),
(33, 13, 14, 1),
(34, 14, 24, 1),
(35, 14, 23, 1),
(36, 15, 1, 1),
(37, 15, 2, 2),
(38, 15, 3, 3),
(39, 15, 4, 1),
(40, 16, 14, 10),
(41, 16, 15, 10),
(42, 16, 20, 1),
(43, 17, 32, 2),
(44, 17, 40, 1),
(45, 17, 46, 2),
(46, 18, 20, 1),
(47, 18, 21, 2),
(48, 19, 50, 1),
(49, 20, 31, 10),
(50, 20, 32, 1),
(51, 21, 5, 1),
(52, 21, 6, 1),
(53, 22, 33, 100),
(54, 23, 38, 2),
(55, 23, 39, 2),
(56, 24, 45, 1),
(57, 24, 46, 1),
(58, 25, 1, 12),
(59, 25, 2, 12),
(60, 26, 8, 12),
(61, 27, 57, 2),
(62, 27, 55, 1),
(63, 28, 57, 12),
(64, 28, 55, 12),
(65, 28, 56, 12),
(66, 28, 58, 12),
(67, 28, 59, 12),
(68, 28, 54, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `historyid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
