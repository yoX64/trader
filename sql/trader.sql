-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 06:29 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trader`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'Motherboards', 'This category contains motherboards.'),
(2, 'CPU', 'This category contains CPUs.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `products` text NOT NULL,
  `quantity` text NOT NULL,
  `address` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 - order is not resolved, 0 - order is resolved',
  `canceled` int(11) NOT NULL DEFAULT '0' COMMENT '1 - order is canceled, 0 - order is not canceled',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `fname`, `lname`, `email`, `phone`, `products`, `quantity`, `address`, `order_date`, `status`, `canceled`) VALUES
(4, 1, 'John', 'Doe', 'doe@gmail.com', '5234', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:14:48', 1, 0),
(5, 1, 'John', 'Doe', 'doe@gmail.com', '234646', 'a:1:{i:0;s:1:"3";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:14:50', 1, 0),
(6, 1, 'John', 'Doe', 'doe@gmail.com', '4235234', 'a:2:{i:0;s:1:"3";i:1;s:1:"1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'Timisoara', '2015-06-29 17:14:52', 1, 0),
(7, 1, 'John', 'Doe', 'doe@gmail.com', '2634543', 'a:1:{i:0;s:1:"1";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:14:54', 1, 0),
(8, 1, 'John', 'Doe', 'doe@gmail.com', '23465', 'a:1:{i:0;s:1:"1";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:14:56', 1, 0),
(9, 1, 'John', 'Doe', 'doe@gmail.com', '32645', 'a:2:{i:0;s:1:"4";i:1;s:1:"3";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', 'Timisoara', '2015-06-29 17:14:58', 1, 0),
(10, 1, 'John', 'Doe', 'doe@gmail.com', '342645', 'a:1:{i:0;s:1:"3";}', 'a:1:{i:0;s:1:"3";}', 'Timisoara', '2015-06-29 17:14:59', 1, 0),
(11, 1, 'John', 'Doe', 'doe@gmail.com', '0723 345 283', 'a:1:{i:0;s:1:"3";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:15:49', 1, 0),
(12, 1, 'John', 'Doe', 'doe@gmail.com', '0723 345 283', 'a:1:{i:0;s:1:"4";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:36:07', 1, 0),
(13, 1, 'John', 'Doe', 'doe@gmail.com', '0723 345 283', 'a:1:{i:0;s:1:"2";}', 'a:1:{i:0;s:1:"1";}', 'Timisoara', '2015-06-29 17:36:21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `stock`, `image`, `sold`) VALUES
(1, 2, 'Intel Core i5-4440', 'CPU Socket: 1150', 800, 1, 'procesor-intel-core-i5-4440-31ghz-socket-1150-box.jpg', 0),
(2, 2, 'AMD FX-6300', 'CPU Socket: AM3+', 500, 1, 'procesor-amd-fx-6300-x6-6-core-socket-am3-.jpg', 1),
(3, 1, 'Asus H97M-E', 'CPU Socket: 1150', 400, 4, 'placa-de-baza-asus-h97m-e-socket-1150.jpg', 0),
(4, 1, 'Gigabyte 78LMT', 'CPU Socket: AM3+', 200, 3, 'placa-de-baza-gigabyte-78lmt-usb3-socket-am3+.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'user_1', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`data_id`, `user_id`, `fname`, `lname`, `address`, `email`, `phone`) VALUES
(1, 1, 'John', 'Doe', 'Timisoara', 'doe@gmail.com', '0723 345 283');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
