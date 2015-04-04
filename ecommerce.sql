-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 01:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` varchar(10) NOT NULL,
  `customerName` text,
  `customerAddress` text,
  `phone` varchar(10) NOT NULL,
  `customerEmail` varchar(30) DEFAULT NULL,
  `Username` varchar(15) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `customerAddress`, `phone`, `customerEmail`, `Username`) VALUES
('ECOMM11111', 'Niena Alhassan', 'Berekuso, Eastern Region', '0267773618', 'niena.alhassan@gmail.com', 'Niena'),
('ECOMM11131', 'Marty', 'Madina', '0271314131', 'marty@hotmail.com', 'Marty');

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE IF NOT EXISTS `customerorder` (
  `orderID` varchar(8) NOT NULL,
  `customerID` varchar(10) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`orderID`, `customerID`, `order_date`) VALUES
('EOR00001', 'ECOMM11111', '2014-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

CREATE TABLE IF NOT EXISTS `networks` (
  `myName` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderID` varchar(8) DEFAULT NULL,
  `productId` varchar(10) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  KEY `orderID` (`orderID`),
  KEY `productId` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `productId`, `quantity`, `price`) VALUES
('EOR00001', 'PRODUCT004', 5, 30.00),
('EOR00001', 'PRODUCT001', 5, 30.00),
('EOR00001', 'PRODUCT002', 5, 30.00),
('EOR00001', 'PRODUCT008', 1, 0.00),
('EOR00001', 'PRODUCT008', 1, 0.00),
('EOR00001', 'PRODUCT001', 3, 30.00),
('EOR00001', 'PRODUCT008', 10, 40.00),
('EOR00001', 'PRODUCT008', 10, 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(5) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `item` varchar(25) DEFAULT NULL,
  `post_type` set('buy','sell') DEFAULT NULL,
  `min_price` decimal(8,2) DEFAULT NULL,
  `max_price` decimal(8,2) DEFAULT NULL,
  `post_status` set('closed','pending') DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` varchar(10) NOT NULL,
  `producer` varchar(50) DEFAULT NULL,
  `productName` varchar(25) DEFAULT NULL,
  `productImage` varchar(25) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `producer`, `productName`, `productImage`, `price`) VALUES
('PRODUCT001', 'NESTLE', 'MILO', 'images/milo.jpg', 10.00),
('PRODUCT002', 'GUCCI', 'Handbag', 'images/gucciPurse.jpg', 500.00),
('PRODUCT003', 'TikiWorks', 'Hanger', 'images/hanger.jpg', 4.00),
('PRODUCT004', 'TikiWorks', 'Notebook', 'images/notebook.jpg', 5.00),
('PRODUCT005', 'TikiWorks', 'plate', 'images/plate.jpg', 6.00),
('PRODUCT006', 'GUCCI', 'scarf', 'images/scarf.jpg', 6.00),
('PRODUCT007', 'COACH', 'sunglasses', 'images/shades.jpg', 6.00),
('PRODUCT008', 'Stichyz', 'socks', 'images/socks.jpg', 5.00),
('PRODUCT009', 'TikiWorks', 'vase', 'images/vase.jpg', 50.00),
('PRODUCT010', 'Xiaomi', 'phone', 'images/xiaomiPhone.jpg', 800.00),
('PRODUCT011', 'TikiWorks', 'Kitchen Set', 'images/kitchenette.jpg', 1500.00),
('PRODUCT012', 'Tiki Farms', 'Peach fruits', 'images/peaches5.jpg', 10.00),
('PRODUCT013', 'Stichyz', 'Pink Mini Dress', 'images/pink_robe.JPG', 75.00),
('PRODUCT014', 'TikiWorks', 'Dining Room Set', 'images/green kitchen.jpg', 1000.00),
('PRODUCT015', 'Stichyz', 'Sneakers with bows ', 'images/cool.JPG', 100.00),
('PRODUCT016', 'Stichyz', 'Pink back pack', 'images/back_pack.jpg', 150.00),
('PRODUCT017', 'Stichyz', 'Black Coat', 'images/black dresses.PNG', 150.00),
('PRODUCT018', 'TikiWorks', 'Happy Flower Pots', 'images/flowerpots.jpg', 50.00),
('PRODUCT019', 'TikiWorks', 'Twin Bed Set', 'images/twinbeds.jpg', 1500.00),
('PRODUCT020', 'Stichyz', 'Black Wedge', 'images/blackwedge.JPG', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `product1`
--

CREATE TABLE IF NOT EXISTS `product1` (
  `productId` varchar(10) NOT NULL,
  `producer` varchar(50) DEFAULT NULL,
  `productName` text,
  `productImage` varchar(25) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  FULLTEXT KEY `productName` (`productName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product1`
--

INSERT INTO `product1` (`productId`, `producer`, `productName`, `productImage`, `price`) VALUES
('PRODUCT005', 'TikiWorks', 'Monkeys like banana', 'plate.jpg', 6.00),
('PRODUCT006', 'GUCCI', 'I have a lot of likes on facebook', 'scarf.jpg', 6.00),
('PRODUCT007', 'COACH', 'sunglasses look so cool', 'shades.jpg', 6.00),
('PRODUCT008', 'Stichyz', 'socks are like petty stuff to quarrel over', 'socks.jpg', 5.00),
('PRODUCT009', 'TikiWorks', 'vase or naah', 'vase.jpg', 50.00),
('PRODUCT010', 'Xiaomi', 'i like phones phone ', 'xiaomiPhone.jpg', 800.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(6) NOT NULL,
  `User_Name` text,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD CONSTRAINT `customerorder_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `customerorder` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
