-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2013 at 07:24 PM
-- Server version: 5.5.25a-log
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycontacts`
--
CREATE DATABASE `mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mycontacts`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_firstname` varchar(30) NOT NULL,
  `contact_lastname` varchar(30) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_phone` bigint(20) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_firstname`, `contact_lastname`, `contact_email`, `contact_phone`, `group_id`) VALUES
(4, 'Brandon', 'Marshall', 'Ghost', 4027775865, 2),
(7, 'Chris', ' Jameson', 'Nope@nope', 4444447777, 1),
(8, 'Captin ', 'Wasian', 'Wasin@Wasinrus', 8588888844, 2),
(9, 'Chris', ' Jameson', 'Nope@nope', 4444447777, 1),
(10, 'Captin ', 'Wasian', 'Wasin@Wasinrus', 8588888844, 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'Friends'),
(2, 'Coworkers'),
(3, 'Stalkers'),
(7, 'Chris');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(30) NOT NULL,
  `photo_des` text NOT NULL,
  `photo_ext` varchar(10) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_name`, `photo_des`, `photo_ext`) VALUES
(39, 'Chris', 'Jameson', 'chris.jpg'),
(40, 'Space', 'Pic of Space', 'green.jpg'),
(41, 'Brandon Marshall', 'Why is he here?', 'nl2.jpg'),
(42, 'Milky Way', 'Full of stars', 'north.jpg'),
(43, 'Captin Wasian', 'Asain for life', 'nl3.JPG'),
(44, 'Death Star', 'Its a trap', 'north.jpg'),
(46, 'Jew', 'Name is j Bless', 'space2.jpg'),
(47, 'Random City', 'Pretty', 'space.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
