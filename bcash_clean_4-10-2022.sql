-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 07:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcash`
--

-- --------------------------------------------------------

--
-- Table structure for table `bottle_types`
--

CREATE TABLE `bottle_types` (
  `bottle_id` int(11) NOT NULL,
  `bottle` varchar(50) NOT NULL,
  `bottle_value` decimal(50,2) NOT NULL,
  `bottle_size` int(11) NOT NULL,
  `bottle_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daily_bottle_report`
--

CREATE TABLE `daily_bottle_report` (
  `day_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `no_bottles` int(50) NOT NULL,
  `no_redeem` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recycle_transaction`
--

CREATE TABLE `recycle_transaction` (
  `trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `bottles` varchar(50) NOT NULL,
  `bottle_id` int(50) NOT NULL,
  `points_earned` decimal(50,2) NOT NULL,
  `recycle_trans_time` datetime NOT NULL,
  `day_id` int(50) NOT NULL,
  `bottle_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_transaction`
--

CREATE TABLE `redeem_transaction` (
  `redeem_trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `points_deducted` decimal(50,2) NOT NULL,
  `redeem_trans_time` datetime NOT NULL,
  `day_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

CREATE TABLE `shop_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(50,2) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `item_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(70) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `qrcode` varchar(75) NOT NULL,
  `total_points` decimal(50,2) NOT NULL,
  `total_bottles` int(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `program` varchar(500) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `mobile_num` bigint(50) NOT NULL,
  `stud_num` varchar(10) NOT NULL,
  `admin` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `acc_id`, `password`, `qrcode`, `total_points`, `total_bottles`, `lname`, `fname`, `mname`, `sex`, `age`, `email`, `program`, `year_level`, `mobile_num`, `stud_num`, `admin`) VALUES
('admin', 1, 'admin', 'none', '0.00', 0, '', '', '', '', 0, '', '', '', 0, '', 1),
('shopadmin', 2, 'shopadmin', '', '0.00', 0, '', '', '', '', 0, '', '', '', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bottle_types`
--
ALTER TABLE `bottle_types`
  ADD PRIMARY KEY (`bottle_id`);

--
-- Indexes for table `daily_bottle_report`
--
ALTER TABLE `daily_bottle_report`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `recycle_acc_id` (`acc_id`),
  ADD KEY `bottle_type` (`bottle_id`),
  ADD KEY `daily_date` (`day_id`);

--
-- Indexes for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  ADD PRIMARY KEY (`redeem_trans_id`),
  ADD KEY `redeem_acc_id` (`acc_id`),
  ADD KEY `date_daily` (`day_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `shop_items`
--
ALTER TABLE `shop_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bottle_types`
--
ALTER TABLE `bottle_types`
  MODIFY `bottle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daily_bottle_report`
--
ALTER TABLE `daily_bottle_report`
  MODIFY `day_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  MODIFY `redeem_trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `acc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  ADD CONSTRAINT `bottle_type` FOREIGN KEY (`bottle_id`) REFERENCES `bottle_types` (`bottle_id`),
  ADD CONSTRAINT `daily_date` FOREIGN KEY (`day_id`) REFERENCES `daily_bottle_report` (`day_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recycle_acc_id` FOREIGN KEY (`acc_id`) REFERENCES `user_login` (`acc_id`) ON UPDATE CASCADE;

--
-- Constraints for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  ADD CONSTRAINT `date_daily` FOREIGN KEY (`day_id`) REFERENCES `daily_bottle_report` (`day_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `shop_items` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `redeem_acc_id` FOREIGN KEY (`acc_id`) REFERENCES `user_login` (`acc_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
