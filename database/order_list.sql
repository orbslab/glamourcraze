-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 07:15 PM
-- Server version: 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glamourcraze`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `order_num` int(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `time` datetime NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_add` varchar(255) NOT NULL,
  `user_num` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_num`, `p_id`, `price`, `time`, `user_name`, `user_add`, `user_num`, `user_email`, `status`) VALUES
(1, '4,5,2', 1290, '2018-03-22 03:00:00', 'Azharul Islam', 'Sylhet', '01730898278', 'azharul.sylhet@gmail.com', 1),
(2, '5', 799, '2018-03-22 06:07:18', 'Ariful Islam', 'Dhaka', '0154984464', 'azharul.sylhet@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_num` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
