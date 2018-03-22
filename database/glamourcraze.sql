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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Saari'),
(2, 'Kameez'),
(3, 'Bedsheet');

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

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE IF NOT EXISTS `product_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(999) NOT NULL,
  `img` blob NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `up_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `details`, `img`, `status`, `price`, `category`, `up_date`) VALUES
(1, 'Red Kameez', 'Color : Red, Green, Black\r\nSize : L, M, S', 0x2e2e2f70726f647563745f7069632f31353231373037353139, '30', 799, 'Saari', '2018-03-22'),
(2, 'Green Bedsheet', 'Color: Red, Green, Yellow\r\nSize: L, M, S', 0x70726f647563745f7069632f3135323136343631363750656e6775696e732e6a7067, 'sold out', 1080, 'bedsheet', '2018-03-21'),
(3, 'Black Shaari', 'Color: Black', 0x2e2e2f70726f647563745f7069632f31353231363935393232, '40', 850, 'Kameez', '2018-03-22'),
(4, 'Blue Kameez', 'Color: Blue\r\nSize: L, M, S', 0x2e2e2f70726f647563745f7069632f31353231373038323239, '20', 599, 'kameez', '2018-03-22'),
(5, 'Red Desert', 'Color: Black, Blue\r\nSize: L, M, S', 0x2e2e2f70726f647563745f7069632f313532313639353832354465736572742e6a7067, '50', 599, 'Saari', '2018-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `comment` varchar(999) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_name`, `rating`, `comment`, `time`) VALUES
(1, 'Azharul Islam', 4, 'Its a very good market place', '2018-03-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_num`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_num` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
