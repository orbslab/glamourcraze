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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
