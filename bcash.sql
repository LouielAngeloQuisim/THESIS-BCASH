-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 05:07 AM
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
  `item_value` int(50) NOT NULL,
  `bottle_size` int(11) NOT NULL,
  `bottle_img` blob NOT NULL
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

--
-- Dumping data for table `daily_bottle_report`
--

INSERT INTO `daily_bottle_report` (`day_id`, `date`, `no_bottles`, `no_redeem`) VALUES
(1, '2021-12-11', 20, 30),
(2, '2021-12-12', 30, 10),
(3, '2021-12-13', 60, 10);

-- --------------------------------------------------------

--
-- Table structure for table `recycle_transaction`
--

CREATE TABLE `recycle_transaction` (
  `trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `bottles` varchar(50) NOT NULL,
  `points_earned` int(50) NOT NULL,
  `recycle_trans_time` datetime NOT NULL,
  `bottle_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recycle_transaction`
--

INSERT INTO `recycle_transaction` (`trans_id`, `acc_id`, `bottles`, `points_earned`, `recycle_trans_time`, `bottle_count`) VALUES
(1, 36, 'coke 290ml', 10, '2021-12-01 23:11:28', 5);

-- --------------------------------------------------------

--
-- Table structure for table `redeem_transaction`
--

CREATE TABLE `redeem_transaction` (
  `redeem_trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `points_deducted` int(50) NOT NULL,
  `redeem_trans_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `redeem_transaction`
--

INSERT INTO `redeem_transaction` (`redeem_trans_id`, `acc_id`, `item`, `points_deducted`, `redeem_trans_time`) VALUES
(2, 36, 'pencil', 10, '2021-11-03 21:33:44'),
(3, 36, 'pencil', 5, '2021-12-02 23:22:54');

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
  `mobile_num` bigint(50) NOT NULL,
  `admin` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `acc_id`, `password`, `qrcode`, `total_points`, `total_bottles`, `lname`, `fname`, `mname`, `email`, `mobile_num`, `admin`) VALUES
('louiel', 1, '123', '', 0, 0, '', '', '', '', 0, 0),
('louielxx', 36, 'louiel', '$2y$10$YSInPZMKBdYJ62ibc2Uit.EkqYm8a11lBpPGRl.MafUkY0x8sH06W', 0, 0, 'quisim', 'louiel ', 'coyoca', 'gg@gmail.com', 0, 0),
('admin', 37, 'admin', '', 0, 0, '', '', '', '', 0, 1),
('louielxxx', 38, '123', '$2y$10$f8i4tgz/NJtjMkN8j0CD6ekBp/7Ua64F.NqIcPGXxo5sOTF.0I4ui', 0, 0, '', '', '', '', 0, 0),
('Laine', 39, '123', '$2y$10$5OKWDkTGTLyjjqbYYGyzC.MGeDOOzWRx0dkBMtLwFIlHUEWFdqQ6a', 0, 0, '', '', '', '', 0, 0),
('Laine', 40, '123', '$2y$10$YQTJkNjBxVCQ4b5yoiXnG.4BU87wGulKPWw781lipNuzKlm7P2MVO', 0, 0, '', '', '', '', 0, 0),
('louielangelo', 43, '12322', '$2y$10$2SXILkWXa4YP6JcQOyXezeCyKfSok4rCmaYmiBt/k4Ljf/Eihn6VG', 0, 0, '', '', '', '', 0, 0),
('louielxx', 44, '1233', '$2y$10$vsv8tTU0gYNbm8CLHk88X.NS//6bEJjliZnbDdyDdCpsXXP7Q67CW', 0, 0, '', '', '', '', 0, 0),
('ggez1234', 53, '123', '', 0, 0, 'Quisim', 'louiel 2', 'Ortiguerra2', 'tatalipot@gmail.com', 2147483647, 0),
('louielangelo', 54, '123', '', 0, 0, 'Quisim', 'louiel 2', 'Coyoca', 'louiel_quisim@yajoo.com', 2147483647, 0),
('admin123', 55, '123', '', 0, 0, 'Quisim', 'Angelo', 'Coyoca', 'louiel_quisim@yajoo.com', 9080808080, 0),
('Laine', 56, '123', '', 0, 0, 'Quisim', 'Angelo', 'Coyoca', 'tatalipot@gmail.com', 12121, 0);

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
-- AUTO_INCREMENT for table `daily_bottle_report`
--
ALTER TABLE `daily_bottle_report`
  MODIFY `day_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  MODIFY `redeem_trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `acc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
