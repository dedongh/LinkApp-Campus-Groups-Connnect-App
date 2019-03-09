-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2019 at 10:58 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` longtext NOT NULL,
  `GroupName` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(100) NOT NULL,
  `Icon` varchar(100) NOT NULL,
  `g_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ann_id` (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='table containing various announcements by the groups';

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `Description`, `GroupName`, `Date`, `Title`, `Icon`, `g_id`) VALUES
(1, 'something to try with', 'trial', '2018-08-17 02:02:43', 'testing annon', '02.jpg', 1),
(2, 'trying announcements', 'trial', '2018-08-17 02:41:35', 'testing 1 2', '01.jpg', 1),
(3, 'trying announcements', 'trial', '2018-08-17 02:42:16', 'testing 1 2', '02.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EventDesc` longtext NOT NULL,
  `EventName` varchar(255) NOT NULL,
  `Icon` varchar(100) NOT NULL,
  `GroupName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `EventDesc`, `EventName`, `Icon`, `GroupName`) VALUES
(1, 'notes', 'enkasa', '02.jpg', 'linkapp'),
(2, 'notes', 'enkasa', '02.jpg', 'linkapp'),
(3, 'notes', 'kasa', '01.jpg', 'linkapp');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(100) NOT NULL,
  `About` longtext NOT NULL,
  `Aim` longtext NOT NULL,
  `Icon` varchar(100) NOT NULL,
  `Vision` longtext NOT NULL,
  `Contact` varchar(150) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='table containing group info';

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`g_id`, `GroupName`, `About`, `Aim`, `Icon`, `Vision`, `Contact`) VALUES
(1, 'trial', 'qwerty', 'qwerty', '04.jpg', 'qwerty', '1234567'),
(2, 'testing', 'about us', 'our aim', '03.jpg', 'our vision', 'contact us');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
CREATE TABLE IF NOT EXISTS `meetings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Time` varchar(10) NOT NULL,
  `Day` varchar(30) NOT NULL,
  `Venue` varchar(150) NOT NULL,
  `Latitude` varchar(100) DEFAULT NULL,
  `Longitude` varchar(100) DEFAULT NULL,
  `g_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_met_id` (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='meeting days of the various groups';

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `Time`, `Day`, `Venue`, `Latitude`, `Longitude`, `g_id`) VALUES
(1, '2:00 am', 'monday', 'great hall', '', '', 1),
(2, '3:00 am', 'tuesday', 'voltahall', '', '', 2),
(3, '3:00 am', 'tuesday', 'voltahall', '', '', 1),
(4, '3:00 am', 'tuesday', 'voltahall', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_token` varchar(100) NOT NULL,
  `g_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_ky` (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `device_token`, `g_id`) VALUES
(1, 'qw345rgfg67', 1),
(2, '34553', 2),
(4, '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_groups`
--

DROP TABLE IF EXISTS `sub_groups`;
CREATE TABLE IF NOT EXISTS `sub_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `g_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `GroupName` varchar(150) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='table containing all registered users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Role`, `Phone`, `GroupName`, `Password`) VALUES
(1, 'Bra Emma', 'slimshades68@gmail.com', 'admin', '0209047187', 'Link App', 'qwerty'),
(2, 'Joe Hayfron', 'admin@engineerskasa.com', 'admin', '0209047187', 'Link App', 'adminkasa99');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
