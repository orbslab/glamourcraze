-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 06:10 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'glamourcraze', 'J_zqAU6j%''');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_num`, `p_id`, `price`, `time`, `user_name`, `user_add`, `user_num`, `user_email`, `status`) VALUES
(1, '4,5,2', 1290, '2018-03-22 03:00:00', 'Azharul Islam', '51/A, Medical Road, Sylhet', '01730898278', 'azharul.sylhet@gmail.com', 1),
(2, '5', 799, '2018-03-22 06:07:18', 'Ariful Islam', 'Dhaka', '0154984464', 'azharul.sylhet@gmail.com', 2),
(3, '6', 560, '2018-04-01 07:14:07', 'Easin Arafat', '32/1 Amborkhana, Sylhet', '019820356', 'azharul.sylhet@gmail.com', 2),
(7, '20,19,16,18,17', 3720, '2018-04-15 02:08:03', 'Akif Rahman', 'Subhanighat', '1730898278', 'glamourcrazebd@gmail.com', 1);

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
  `review` int(255) NOT NULL,
  `up_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `details`, `img`, `status`, `price`, `category`, `review`, `up_date`) VALUES
(15, 'Jamdani Sarri', 'Color: Red, White\r\nSize: 32, 34', 0x70726f647563745f7069632f313532333533393533385361727269202835292e6a7067, '30', 590, 'Saari', 0, '2018-04-12'),
(16, 'Bed Cover', 'Color: Red White Mixed\r\nSize: Any', 0x70726f647563745f7069632f313532333533393538316265642e6a7067, '90', 420, 'Bedsheet', 0, '2018-04-12'),
(17, 'New Kameez', 'Color: Any\r\nSize: Any', 0x70726f647563745f7069632f31353233353339363232736b342e6a7067, 'sold out', 670, 'Kameez', 3, '2018-04-12'),
(18, 'New Sarri', 'Color: Cream, Paste\r\nSize: 12, 14', 0x70726f647563745f7069632f313532333533393830375361727269202836292e6a7067, 'sold out', 780, 'Saari', 0, '2018-04-12'),
(19, 'Bed Cover', 'Color: Any\r\nSize: Custome', 0x70726f647563745f7069632f313532333533393934375361727269202836292e6a7067, '20', 1275, 'Bedsheet', 0, '2018-04-12'),
(20, 'Black Kamezz', 'Color: Only Black\r\nSize: Any Size', 0x70726f647563745f7069632f31353233353430303034332e6a7067, '', 575, 'Kameez', 14, '2018-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `comment` varchar(999) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `p_id`, `user_name`, `rating`, `comment`, `time`) VALUES
(1, 20, 'Azharul Islam', 4, 'Its a very good market place', '2018-03-23'),
(2, 20, 'Akif', 5, 'This is just awesome', '2018-04-12'),
(3, 20, 'Arif', 5, 'Joss', '2018-04-12'),
(4, 17, 'Akif', 3, 'Awesome', '2018-04-18'),
(5, 17, 'Akif', 3, 'Awesome', '2018-04-18');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_num` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
