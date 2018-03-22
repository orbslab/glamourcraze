-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 07:16 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
