-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 08:00 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloth_table`
--

CREATE TABLE `cloth_table` (
  `id` int(11) NOT NULL,
  `cloth_name` varchar(110) NOT NULL,
  `portion` varchar(110) NOT NULL,
  `gender` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloth_table`
--

INSERT INTO `cloth_table` (`id`, `cloth_name`, `portion`, `gender`) VALUES
(1, 'shirt', 'upper', 'Female'),
(2, 'dothi', 'lower', 'Female'),
(3, 'half shiirt', 'upper', 'Male'),
(4, 'paijama', 'lower', 'Male'),
(5, 'paijama-aligadi', 'lower', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `mobile1` bigint(10) NOT NULL,
  `mobile2` bigint(10) NOT NULL,
  `address` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`cust_id`, `name`, `mobile1`, `mobile2`, `address`) VALUES
(1, 'ramu', 123, 0, 'kak'),
(2, 'fghjk', 456, 0, 'serdtfgyuhijokhgf'),
(3, 'chaman', 789, 0, 'bahar'),
(4, 'asfdsad', 693, 0, 'wef'),
(5, 'sourabh verma', 741, 0, '18/A street no :-31 sector 10 bhilai'),
(6, 'gyatri', 788, 0, '18/1 tama'),
(7, 'rupesh', 889683905, 6712828, '5622772772'),
(8, 'fahruk', 9998887776, 0, '12/aa bihar');

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `bill_num` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `bill_date` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `cloth_type` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pending` int(11) NOT NULL,
  `homedelivery` int(11) NOT NULL,
  `treat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `bill_num`, `cust_id`, `bill_date`, `delivery_date`, `cloth_type`, `qty`, `price`, `total`, `pending`, `homedelivery`, `treat`) VALUES
(1, 18062301, 1, '2018-06-23', '2018-06-30', '1', 12, 324, 3888, 1, 1, 'r'),
(3, 18062301, 1, '2018-06-23', '2018-06-30', '1', 12, 324, 3888, 1, 1, 'r'),
(4, 18062301, 1, '2018-06-23', '2018-06-30', '4', 24, 2, 32, 1, 1, 'p'),
(5, 18062302, 5, '2018-06-23', '2018-12-31', '4', 2, 233, 466, 1, 1, 'p'),
(6, 18062302, 5, '2018-06-23', '2018-06-30', '1', 2, 900, 1800, 1, 1, 'p'),
(7, 18062303, 6, '2018-06-23', '0008-08-01', '1', 2, 3300, 6600, 1, 1, 'p'),
(8, 18062303, 6, '2018-06-23', '2018-07-01', '4', 5, 5, 25, 1, 1, 'p'),
(9, 18062304, 1, '2018-06-23', '2018-12-31', '1', 2, 4990, 9980, 1, 1, 'p'),
(10, 18062304, 1, '2018-06-23', '2018-06-01', '4', 43, 56, 2408, 1, 1, 'p'),
(11, 18062305, 5, '2018-06-23', '0111-02-12', '1', 1, 200, 200, 1, 1, 'p'),
(12, 18062306, 1, '2018-06-23', '2018-07-01', '1', 2, 465, 930, 1, 1, 'p'),
(13, 18062307, 8, '2018-06-23', '2019-01-01', '1', 2, 1200, 2400, 1, 1, 'p'),
(14, 18062307, 8, '2018-06-23', '2018-12-31', '4', 3, 1222, 3666, 1, 1, 'r'),
(15, 18062308, 1, '2018-06-23', '2018-06-30', '2', 2, 340, 680, 1, 1, 'p'),
(16, 18062308, 1, '2018-06-23', '2018-06-30', '3', 2, 240, 480, 1, 1, 'p'),
(17, 18062309, 1, '2018-06-23', '', '', 2, 123, 246, 1, 1, 'p'),
(18, 18062309, 1, '2018-06-23', '', '', 0, 0, 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `main_bill`
--

CREATE TABLE `main_bill` (
  `id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `customer_name` varchar(110) NOT NULL,
  `mobile` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pending` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `date` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_bill`
--

INSERT INTO `main_bill` (`id`, `bill_no`, `customer_name`, `mobile`, `total`, `pending`, `paid`, `date`) VALUES
(1, 18062302, 'sourabh verma', 741, 2266, 2266, 1200, ''),
(2, 18062303, 'gyatri', 788, 6625, 3625, 3000, ''),
(3, 18062304, 'ramu', 123, 12388, 6388, 6000, '18-06-23'),
(4, 18062305, 'sourabh verma', 741, 200, 180, 20, '18-06-23'),
(5, 18062306, 'ramu', 123, 930, 530, 400, '18-06-23'),
(6, 18062307, 'fahruk', 2147483647, 6066, 2066, 4000, '18-06-23'),
(7, 18062308, 'ramu', 123, 1160, 1000, 160, '18-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `mesurement`
--

CREATE TABLE `mesurement` (
  `mid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `l1` float NOT NULL,
  `l2` float NOT NULL,
  `l3` float NOT NULL,
  `l4` float NOT NULL,
  `l5` float NOT NULL,
  `l6` float NOT NULL,
  `l7` float NOT NULL,
  `l8` float NOT NULL,
  `l9` float NOT NULL,
  `remark` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesurement`
--

INSERT INTO `mesurement` (`mid`, `id`, `l1`, `l2`, `l3`, `l4`, `l5`, `l6`, `l7`, `l8`, `l9`, `remark`) VALUES
(1, 1, 23, 4, 4, 4, 24, 24, 24, 42, 0, '42'),
(2, 1, 32, 32, 2, 42, 42, 42, 42, 42, 0, '42'),
(3, 1, 23, 4, 4, 4, 24, 24, 24, 42, 0, '42'),
(4, 1, 32, 32, 2, 42, 42, 42, 42, 42, 0, '42'),
(5, 1, 2, 0, 2, 22, 222, 2, 2, 2, 0, 'dwgegwewg'),
(6, 1, 2, 33, 4, 4, 5, 5, 3, 2, 0, 'ygiuhojk'),
(7, 1, 24, 5, 6, 6, 0, 7, 7, 7, 0, '7'),
(8, 1, 0, 5, 0, 6, 6, 6, 7, 7, 0, ''),
(9, 1, 34, 34, 45, 0, 54, 65, 6, 67, 0, '6rtyfugihojp'),
(10, 1, 6767, 675, 5686, 5, 65, 7, 5765, 765, 0, '7rdtyfughi'),
(11, 1, 1, 2, 3, 4, 5, 6, 7, 8, 0, 'this is amazing'),
(12, 1, 0, 1, 2, 34, 5, 5, 6, 0, 0, '6rtdthfyghj'),
(13, 1, 28.7, 22.7, 223.4, 4, 4, 4, 0.5, 0.5, 0, 'jksadahjsdalsdl'),
(14, 1, 221, 23, 32, 32, 32, 3, 2, 3, 0, 'fghsadsaasa'),
(15, 1, 1, 2, 3, 4, 5, 6, 7, 8, 0, 'no entry'),
(16, 1, 1, 2, 3, 4, 5, 6, 7, 8, 0, '1.cross pocket\n2.'),
(17, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(18, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloth_table`
--
ALTER TABLE `cloth_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `mobile1` (`mobile1`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_bill`
--
ALTER TABLE `main_bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bill_no` (`bill_no`);

--
-- Indexes for table `mesurement`
--
ALTER TABLE `mesurement`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloth_table`
--
ALTER TABLE `cloth_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `main_bill`
--
ALTER TABLE `main_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mesurement`
--
ALTER TABLE `mesurement`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
