-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2014 at 12:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gae_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `room_no` int(11) NOT NULL,
  `u_mail` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `invoice_no` varchar(100) NOT NULL,
  PRIMARY KEY (`checkin`,`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`checkin`, `checkout`, `room_no`, `u_mail`, `status`, `invoice_no`) VALUES
('2014-04-19', '2014-04-20', 60, 'mrtrmello@yahoo.com', 'complete', 'mrtrmello@yahoo.com28'),
('2014-04-21', '2014-04-25', 12, 'mrtrmello@yahoo.com', 'complete', 'mrtrmello@yahoo.com28'),
('2014-04-23', '2014-04-28', 60, 'mrtrmello@yahoo.com', 'complete', 'mrtrmello@yahoo.com28');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_no` int(11) NOT NULL AUTO_INCREMENT,
  `u_mail` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `amount_due` double NOT NULL,
  `amount_paid` double NOT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `u_mail`, `date`, `amount_due`, `amount_paid`) VALUES
(28, 'mrtrmello@yahoo.com', '2014-04-19', 6000, 0);

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
(1, 'Deluxe', 'King', 570, '2.jpg', 'dstv,shower,double bed,bar fridge');

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
('admin@gae.co.za', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 'Renkie', 'Moswane', NULL, 'complete'),
('mrtrmello@yahoo.com', 'a16a93e4e72608e6c23878a79d37b121', 'visitor', 'Raymond', 'Mello', NULL, 'complete'),
('thabo@mail.com', '82d0ec7f8878e83d4c80669b708ad286', 'visitor', 'Thabo', 'Mello', NULL, 'complete');
