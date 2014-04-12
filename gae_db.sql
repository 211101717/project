-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2014 at 07:52 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gae_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_no` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_capacity` varchar(50) NOT NULL,
  `room_rate` decimal(10,0) NOT NULL,
  `room_pic` varchar(60) NOT NULL,
  `room_feat` varchar(250) NOT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_type`, `room_capacity`, `room_rate`, `room_pic`, `room_feat`) VALUES
(1, 'Deluxe', 'King', '570', '2.jpg', 'dstv,shower,double bed,bar fridge'),
(20, 'Standard', 'Single', '300', '20.png', 'double bed'),
(60, 'Deluxe', 'King', '600', '60.png', 'tv');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_mail` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `u_type` varchar(20) NOT NULL,
  `u_lname` varchar(50) NOT NULL,
  `u_fname` varchar(50) NOT NULL,
  `u_id` varchar(50) DEFAULT NULL,
  `reg` varchar(50) NOT NULL,
  PRIMARY KEY (`u_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_mail`, `u_pass`, `u_type`, `u_lname`, `u_fname`, `u_id`, `reg`) VALUES
('', '', 'visitor', '', '', NULL, 'pending'),
('admin@gae.co.za', '123456', 'admin', 'Sda', 'Dasd', NULL, 'complete'),
('mashego@yahoo.com', 'mello', 'visitor', 'Thabisos', 'Mashego', NULL, 'complete'),
('mrtmello@yahoo.com', '123456', 'visitor', 'Mello', 'Raymond', NULL, 'complete'),
('mrtrmello@yahoo.com', '123456', 'visitor', 'Nchabeleng', 'Ngoato', NULL, 'complete');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
