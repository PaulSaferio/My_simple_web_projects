-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2021 at 09:17 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `firstname`, `lastname`, `email`, `password`) VALUES
(33524459, 'Paul', 'Owaki', 'owakipaul@gmail.com', 'paul');

-- --------------------------------------------------------

--
-- Table structure for table `chiff`
--

DROP TABLE IF EXISTS `chiff`;
CREATE TABLE IF NOT EXISTS `chiff` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Description` varchar(80) NOT NULL,
  `image` longtext NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chiff`
--

INSERT INTO `chiff` (`id`, `name`, `Description`, `image`, `price`) VALUES
('ch001', 'chocolate chiffon ca', 'sweetness is all you get @2KG													\r\n												', 'chiff1.jpg', 2000),
('ch002', 'cheese cake', 'sweetness is greatness													\r\n												', 'chiff.jpg', 1200),
('ch003', 'Simple chiffon', 'The simpler the sweeter													\r\n												', 'chiff2.jpg', 1000),
('ch004', 'Lemon cake', 'Lemmon fruit cake 1KG													\r\n												', 'chiff3.jpg', 1500),
('ch005', 'Mixed pine cake', 'Mixed flavours 1KG													\r\n												', 'chiff5.jpg', 1000),
('ch006', 'Pinacolada cake', 'Pineapple, chocolate, coconut and vanilla all included													\r\n											', 'chiff4.JPG', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `Id` int(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`firstname`, `lastname`, `email`, `phone`, `password`, `Id`) VALUES
('amne', 'faraj', 'amne@amne', 788485, 'amne', 222334),
('Paul', 'Owaki', 'owakipaul@gmail.com', 774522974, 'paul', 33524459);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timen` varchar(45) NOT NULL,
  `datel` varchar(45) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `delitype` varchar(15) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `mpesa` varchar(15) NOT NULL,
  `amount` int(10) NOT NULL,
  `approval` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `timen`, `datel`, `pid`, `name`, `type`, `cname`, `quantity`, `delitype`, `payment`, `mpesa`, `amount`, `approval`) VALUES
(1, '11:42:35am', '21-04-02', 'sh005', 'Fondant', '', 'Paul Owaki', 1, 'Delivery', 'Mpesa', '', 0, 'approved'),
(2, '11:56:59am', '21-04-02', 'ch005', 'Mixed', '', 'Paul Owaki', 3, 'pick', 'pick', '', 0, ''),
(3, '12:15:33pm', '21-04-02', 'sp001', 'Speciality1', '', 'Paul Owaki', 0, 'Delivery', 'Mode of Payment', '', 0, ''),
(4, '12:15:51pm', '21-04-02', 'sh003', 'Oreo', '', 'Paul Owaki', 3, 'pick', 'pick', '', 7500, ''),
(5, '12:27:40pm', '21-04-02', 'ch005', 'Mixed', 'chiff', 'Paul Owaki', 1, 'pick', 'pick', '', 1000, ''),
(6, '03:05:29pm', '21-04-02', 'sp006', 'Strawbery', 'sponge', 'amne faraj', 2, 'delivered', 'Mpesa', 'Msoto234566', 4000, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `short`
--

DROP TABLE IF EXISTS `short`;
CREATE TABLE IF NOT EXISTS `short` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `short`
--

INSERT INTO `short` (`id`, `name`, `Description`, `image`, `price`) VALUES
('SH001', 'Pinacolada cake', 'The sweetest you can ever find 2KG														\r\n													', 'shot.gif', 1000),
('sh002', 'macademia cake', 'On of the best offers you can ever find @2KG														\r\n													', 'shot5.jpg', 1500),
('sh003', 'Oreo short cake', 'Very deliciously made @2KG														\r\n													', 'shot4.jpg', 2500),
('sh004', 'Pine strawberry cake', 'At the best price you can find @2KG														\r\n													', 'shot2.jpg', 1000),
('sh005', 'Fondant shortcake', 'A very delicious fondant with moderate sugar for your sweet tooth @2KG														\r\n													', 'shot3.jpg', 1500),
('sh006', 'simple short cake', 'the simplest short cake you can ever find @2KG														\r\n													', 'shot1.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sponge`
--

DROP TABLE IF EXISTS `sponge`;
CREATE TABLE IF NOT EXISTS `sponge` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponge`
--

INSERT INTO `sponge` (`id`, `name`, `Description`, `image`, `price`) VALUES
('sp001', 'Speciality1', 'The very best of our speciality cakes 2KG														\r\n													', 'sponge2.jpg', 3000),
('sp002', 'simple sponge cake', 'The best one at our plate per slice														\r\n													', 'SPONGE.jpg', 70),
('sp003', 'Mild cheese sponge c', 'With the best cheese you can ever find														\r\n													', 'sponge4.jpg', 1200),
('sp004', 'cubed sponge', 'comes in 3 cubes														\r\n													', 'sponge6.jpg', 400),
('sp006', 'Strawbery fruitcake', 'The sweetness you can ever imagine @2KG														\r\n													', 'sponge3.jpg', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `sugge`
--

DROP TABLE IF EXISTS `sugge`;
CREATE TABLE IF NOT EXISTS `sugge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(31) NOT NULL,
  `suggestion` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sugge`
--

INSERT INTO `sugge` (`id`, `name`, `suggestion`) VALUES
(1, 'yasser', 'you should add shawarma to your menu												\r\n											'),
(2, 'Jaribu', 'You should add more variations of cakes											\r\n										');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
