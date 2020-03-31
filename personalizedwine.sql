-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 01:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalizedwine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_fullname`, `user_email`, `user_name`, `hashed_password`, `date_created`) VALUES
(1, 'personalized wine', 'wine@gmail.com', 'wine', 'password123*', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pages`
--

DROP TABLE IF EXISTS `admin_pages`;
CREATE TABLE `admin_pages` (
  `id` int(100) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pages`
--

INSERT INTO `admin_pages` (`id`, `page`) VALUES
(1, 'PRODUCTS'),
(2, 'STOCKS');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_image` text NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_image`, `product_code`, `date_created`, `keyword`) VALUES
(1, 'congo', 'purple wine', 300, 'label2.png', 'WRO', '0000-00-00 00:00:00', ''),
(2, 'manga', 'purple line', 300, 'label2.png', 'WRO', '2020-03-17 00:00:00', ''),
(3, 'brunt', 'purple black 25%', 300, 'label2.png', 'WET', '2020-03-17 00:00:00', ''),
(4, 'brunt', 'purplegrey', 300, 'red.png', 'WRE', '2020-03-17 00:00:00', ''),
(8, 'chardonnay', 'nice', 356, 'red.png', 'WRO', '2020-03-18 00:00:00', 'chardonnay'),
(9, 'Cabernet Sauvignon Reserve', 'red wine - 750ml', 10000, 'red2.jpg', 'WRO', '2020-03-19 00:00:00', 'red2'),
(12, 'Cabernet Sauvignon Reserve', 'White -250cl', 10000, 'white1.png', 'WWH', '2020-03-18 00:00:00', 'white'),
(13, 'chardonnay', 'whitish red', 356, 'red.png', 'WWH', '2020-03-18 00:00:00', 'white'),
(14, 'Wedding Tag', 'Anike wedding tag made by sarah', 356, 'label2.png', 'WLT', '2020-03-18 00:00:00', 'tags'),
(15, 'Cabernet Sauvignon Reserve', 'red wine - 750ml', 10000, 'engrave3.png', 'WEA', '2020-03-18 00:00:00', 'engraving'),
(16, 'Cabernet Sauvignon Reserve', '220ml 25%', 356, 'engrave2.png', 'wecon', '2020-03-11 00:00:00', 'engrave'),
(17, 'Cabernet Sauvignon Reserve', 'gin mixed 225ml', 356, 'engrave1.png', 'WECER', '2020-03-19 00:00:00', 'engrave'),
(18, 'Kagor', 'regular wine', 10000, 'kagor.png', 'NCW', '2020-03-19 00:00:00', 'kagor'),
(19, 'kagor2', 'sweet', 356, 'red.png', 'NCW', '2020-03-19 00:00:00', 'kagor'),
(20, 'Cabernet Sauvignon Reserve', 'red', 356, 'red.png', 'wre', '2020-03-19 00:00:00', 'red'),
(21, 'chardonnay', 'engraved', 2000, 'engrave2.png', 'wea', '2020-03-19 00:00:00', 'chardonnay');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `display` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `comments`, `display`) VALUES
(1, 'jake', 'epic service', 0),
(2, 'OBODOMECHINE', 'greaT STURV', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(5) NOT NULL,
  `meta_name` varchar(100) DEFAULT NULL,
  `meta_description` varchar(100) DEFAULT NULL,
  `meta_value` varchar(250) DEFAULT NULL,
  `meta_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_name`, `meta_description`, `meta_value`, `meta_status`) VALUES
(1, 'SSK', 'Paystack Set Secret Key', 'sk_test_a91f37f8fb5f44ebcad860b3e7f95a6fa69c26ce', 1),
(2, 'SPK', 'Paystack Set Public Key', 'pk_test_4b13c68bf8ed3efd981699d75e2a7cf971fcd54f', 1),
(3, 'SDC', 'set delivery charge', '2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(100) NOT NULL,
  `category` varchar(256) DEFAULT NULL,
  `sub_category` varchar(256) DEFAULT NULL,
  `quantity` varchar(256) DEFAULT NULL,
  `product_code` varchar(256) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `category`, `sub_category`, `quantity`, `product_code`, `date_created`) VALUES
(1, 'wine labelling', 'rose', '3', 'WRO', '0000-00-00 00:00:00'),
(2, 'wine labelling', 'red', '5', 'WRE', '2020-03-07 00:00:00'),
(3, 'wine engraving', 'thanks', '5', 'WET', '2020-03-07 00:00:00'),
(5, 'Non-customized Wine', 'none', '5', 'NCW', '0000-00-00 00:00:00'),
(7, 'wine labelling', 'white', '55', 'WWH', '2020-03-18 02:29:30'),
(9, 'WINE LABELS', 'Tags', '8', 'WLT', '2020-03-18 00:00:00'),
(10, 'Wine Engraving', 'Anniversary', '6', 'WEA', '2020-03-18 00:00:00'),
(11, 'Wine Engraving', 'Congratulation', '20', 'WECON', '2020-03-18 00:00:00'),
(12, 'Wine Engraving', 'Ceremony', '23', 'WECER', '2020-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'jaketuriacada@gmail.com'),
(2, 'jaketuriacada@gmail.com'),
(3, 'justpeace91@ymail.com'),
(4, 'justpeace91@ymail.com'),
(5, 'user@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin_pages`
--
ALTER TABLE `admin_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `productcode` (`product_code`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_pages`
--
ALTER TABLE `admin_pages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productcode` FOREIGN KEY (`product_code`) REFERENCES `stock` (`product_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
