-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2015 at 03:19 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`) VALUES
('Accessories'),
('Laptop'),
('Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `category` varchar(50) COLLATE utf8_bin NOT NULL,
  `image` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `category_2` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `image`) VALUES
(1, 'dell_inspiron_n5110', 'Laptop', 'dell_inspiron_n5110.jpg'),
(2, 'iphone 5', 'Mobile', 'iphone-5s-Silver1.jpg'),
(3, 'headphone', 'Accessories', 'rh1060-wireless-stereo-headphones.jpg'),
(4, 'hp pavilion 155', 'Laptop', 'hp.jpeg'),
(5, 'dell_inspiron mini', 'Laptop', 'dell_mini_10_ansicht_008_01.jpg'),
(6, 'note 2', 'Mobile', 'note2.jpeg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
