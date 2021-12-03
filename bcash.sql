-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 11:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

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
  `bottle_name` varchar(50) NOT NULL,
  `item_value` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recycle_transaction`
--

CREATE TABLE `recycle_transaction` (
  `trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `bottles` varchar(50) NOT NULL,
  `points_earned` int(50) NOT NULL,
  `trans_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_transaction`
--

CREATE TABLE `redeem_transaction` (
  `redeem_trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `points_deducted` int(50) NOT NULL,
  `trans_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

CREATE TABLE `shop_items` (
  `item_id` int(11) NOT NULL,
  `item_name` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(25) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `qrcode` varchar(75) NOT NULL,
  `total_points` int(50) NOT NULL,
  `total_bottles` int(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_num` int(50) NOT NULL,
  `admin` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `acc_id`, `password`, `qrcode`, `total_points`, `total_bottles`, `lname`, `fname`, `mname`, `email`, `mobile_num`, `admin`) VALUES
('louiel', 1, '123', '', 0, 0, '', '', '', '', 0, 0),
('louielxx', 36, '123', '$2y$10$hIdrsrRxTLa8iEvvSzosXe3TkrDqlbiFkX8cXqZGD1cf2RRVtGBa2', 0, 0, '', '', '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bottle_types`
--
ALTER TABLE `bottle_types`
  ADD PRIMARY KEY (`bottle_id`);

--
-- Indexes for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `recycle_acc_id` (`acc_id`);

--
-- Indexes for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  ADD PRIMARY KEY (`redeem_trans_id`),
  ADD KEY `redeem_acc_id` (`acc_id`);

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
  MODIFY `bottle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  MODIFY `redeem_trans_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `acc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  ADD CONSTRAINT `recycle_acc_id` FOREIGN KEY (`acc_id`) REFERENCES `user_login` (`acc_id`) ON UPDATE CASCADE;

--
-- Constraints for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  ADD CONSTRAINT `redeem_acc_id` FOREIGN KEY (`acc_id`) REFERENCES `user_login` (`acc_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
