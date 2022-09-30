-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2021 at 12:42 PM
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
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` varchar(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `faculty` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `faculty`) VALUES
('bbit', 'Bachelor of business information technology', 'copas'),
('bcom', 'Bachelor of Commerce', 'business');

-- --------------------------------------------------------

--
-- Table structure for table `examofficer`
--

DROP TABLE IF EXISTS `examofficer`;
CREATE TABLE IF NOT EXISTS `examofficer` (
  `id` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examofficer`
--

INSERT INTO `examofficer` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`) VALUES
('1234', 'admin', 'admin', 'admin@admin', 'admin', 7289276);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

DROP TABLE IF EXISTS `lecturer`;
CREATE TABLE IF NOT EXISTS `lecturer` (
  `id` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`) VALUES
('2346589', 'Patrick', 'Waweru', 'wawerupat@gmail.com', '0000', 8775783);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `reg` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(14) NOT NULL,
  PRIMARY KEY (`reg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg`, `firstname`, `lastname`, `email`, `password`, `phone`) VALUES
('HDB212-C005-0555/2020', 'Naima', 'Hussein', 'naimahusain@gmail.com', 'naima', 7123456);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE IF NOT EXISTS `timetable` (
  `examid` int(11) NOT NULL AUTO_INCREMENT,
  `unitid` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `faculty` longtext NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `venue` varchar(30) NOT NULL,
  `invigi` varchar(30) NOT NULL,
  PRIMARY KEY (`examid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`examid`, `unitid`, `unit`, `faculty`, `time`, `date`, `venue`, `invigi`) VALUES
(1, 'hcs121', 'Math for Business', 'cohred', '3: 30 pm', '2021-11-20', '601', 'Waweru'),
(2, 'hcs234', 'Business Statistics', 'business', '3: 30 pm', '2021-11-22', '601', 'Waweru');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `faculty` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `faculty`) VALUES
('hcs121', 'Math for Business', 'cohred'),
('hcs234', 'Business Statistics', 'business');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
