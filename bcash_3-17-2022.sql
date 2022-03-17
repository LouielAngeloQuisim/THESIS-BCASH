-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:06 AM
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
  `bottle` varchar(50) NOT NULL,
  `bottle_value` decimal(50,3) NOT NULL,
  `bottle_size` int(11) NOT NULL,
  `bottle_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bottle_types`
--

INSERT INTO `bottle_types` (`bottle_id`, `bottle`, `bottle_value`, `bottle_size`, `bottle_img`) VALUES
(8, 'Coke Mismo', '0.600', 290, '6231e5f36bb623.41218991.png'),
(9, 'Sprite Mismo', '0.600', 290, '6231e7f550b9a3.74530510.png'),
(14, 'Royal Mismp', '0.500', 290, '6231e8f8b4f3d3.23356672.png');

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
(11, '2022-03-16', 0, 0),
(12, '2022-03-17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recycle_transaction`
--

CREATE TABLE `recycle_transaction` (
  `trans_id` int(50) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `bottles` varchar(50) NOT NULL,
  `bottle_id` int(50) NOT NULL,
  `points_earned` decimal(50,3) NOT NULL,
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
  `points_deducted` decimal(50,3) NOT NULL,
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
  `item_price` decimal(50,3) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `item_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_items`
--

INSERT INTO `shop_items` (`item_id`, `item_name`, `item_price`, `item_stock`, `item_img`) VALUES
(3, 'Printing/Xerox', '10.000', 100, '61e6d00dd0dd34.03557371.png'),
(4, 'ballpen', '5.000', 50, '61ea31cf968e07.04294805.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(25) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `qrcode` varchar(75) NOT NULL,
  `total_points` decimal(50,3) NOT NULL,
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
('louiel', 1, '123', '', '0.000', 0, '', '', '', '', 0, 0),
('louielxx', 36, 'louiel', '$2y$10$YSInPZMKBdYJ62ibc2Uit.EkqYm8a11lBpPGRl.MafUkY0x8sH06W', '60.000', 3, 'quisim', 'louiel ', 'coyoca', 'gg@gmail.com', 0, 0),
('admin', 37, 'admin', '', '0.000', 0, '', '', '', '', 0, 1),
('louielxxx', 38, '123', '$2y$10$f8i4tgz/NJtjMkN8j0CD6ekBp/7Ua64F.NqIcPGXxo5sOTF.0I4ui', '0.000', 0, '', '', '', '', 0, 0),
('Laine', 39, '123', '$2y$10$5OKWDkTGTLyjjqbYYGyzC.MGeDOOzWRx0dkBMtLwFIlHUEWFdqQ6a', '0.000', 0, '', '', '', '', 0, 0),
('Laine', 40, '123', '$2y$10$YQTJkNjBxVCQ4b5yoiXnG.4BU87wGulKPWw781lipNuzKlm7P2MVO', '0.000', 0, '', '', '', '', 0, 0),
('louielangelo', 43, '12322', '$2y$10$2SXILkWXa4YP6JcQOyXezeCyKfSok4rCmaYmiBt/k4Ljf/Eihn6VG', '0.000', 0, '', '', '', '', 0, 0),
('louielxx', 44, '1233', '$2y$10$vsv8tTU0gYNbm8CLHk88X.NS//6bEJjliZnbDdyDdCpsXXP7Q67CW', '0.000', 0, '', '', '', '', 0, 0),
('jmxx', 62, '123', '$2y$10$Ut8ogN7KtEmCb3U1LWZ/meBv8Utcr8ycr4287hcET6zfyM9mtZel2', '20.000', 2, 'quisim', 'jm', 'coyoca', 'tatalipot@gmail.com', 9080808080, 0),
('maan', 63, '123', '$2y$10$LF0IlgNDzxboocYIS6oGJOVwaeJej/WI9bXrEH3GQyBr7u7U0HPNS', '0.000', 0, 'maan', 'meen', 'jm', 'tatalipot@gmail.com', 9080808080, 0),
('dwada', 64, '123', '$2y$10$EN8HSlDIVoDMa1X1wLZ8J.IqgrZw63munzrCLWcrjEOyyumyXDWJm', '0.000', 0, 'quisim', 'louiel ', 'coyoca', 'tatalipot@gmail.com', 9080808080, 0),
('ggg', 65, '123', '$2y$10$/P6yuQO7.w2j7Kuza2wVuufc0iwwf59kaj2D0ed1uuGmJ/xtlVs8a', '92.000', 10, 'quisim', 'louiel ', 'coyoca', 'tatalipot@gmail.com', 9080808080, 0),
('gg50', 66, '123', '$2y$10$aEOyZO/kTnNFjnk6gfJFmOVbkmL06MCHxuClnic3YTAG19y3vtWK.', '0.000', 0, 'Miranda2', 'Louiel Angelo gg', 'coyoca', 'gg@yahoo.com', 11212121, 0),
('ggez50', 67, '123', '$2y$10$LAR1F60QHm0pUu5PfxTfgOy5aloDUkTLcf0Y5kLMIo3G3LCicR3EK', '18.000', 2, 'Quisim', 'Louiel Angeloxx', 'coyoca2', 'keqing@genshin.com', 967893423, 0),
('elaine', 68, 'mabuting', '$2y$10$lnmnUg.HNUenzHgh2ZaiyuaxzPejNctfjeuUhf6Hsy2ws1SMLHrOy', '18.000', 2, 'Olinares', 'Elaine', 'Mabunting', 'elaineolinares@gmail.com', 9095125610, 0);

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
  MODIFY `bottle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daily_bottle_report`
--
ALTER TABLE `daily_bottle_report`
  MODIFY `day_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recycle_transaction`
--
ALTER TABLE `recycle_transaction`
  MODIFY `trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `redeem_transaction`
--
ALTER TABLE `redeem_transaction`
  MODIFY `redeem_trans_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_items`
--
ALTER TABLE `shop_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `acc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
