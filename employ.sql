-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 09:23 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employ`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `company` varchar(25) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `da` int(10) NOT NULL,
  `ta` int(10) NOT NULL,
  `hra` int(10) NOT NULL,
  `date` date NOT NULL,
  `experience` varchar(5) NOT NULL,
  `manager` text NOT NULL,
  PRIMARY KEY (`id`,`company`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `name`, `gender`, `designation`, `company`, `salary`, `da`, `ta`, `hra`, `date`, `experience`, `manager`) VALUES
('sense 111', 'Hello', 'Male', 'Manager', 'Sense', '1232131', 616065, 1500, 616066, '2013-12-09', '12', '- ');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE IF NOT EXISTS `employee_leave` (
  `id` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `el` int(11) NOT NULL,
  `cl` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `company`, `el`, `cl`, `sl`) VALUES
('sense 111', 'Sense', 12, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_status`
--

CREATE TABLE IF NOT EXISTS `employee_leave_status` (
  `id` varchar(25) NOT NULL,
  `company` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leave_status`
--

INSERT INTO `employee_leave_status` (`id`, `company`, `start_date`, `end_date`, `status`) VALUES
('sense 111', 'Sense', '9999-12-31', '9999-12-31', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_total`
--

CREATE TABLE IF NOT EXISTS `employee_leave_total` (
  `id` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `el` int(11) NOT NULL,
  `cl` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leave_total`
--

INSERT INTO `employee_leave_total` (`id`, `company`, `el`, `cl`, `sl`) VALUES
('sense 111', 'Sense', 12, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `employee_users`
--

CREATE TABLE IF NOT EXISTS `employee_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(15) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `company_id` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `company` varchar(20) NOT NULL,
  `salary` int(10) NOT NULL,
  `account_no` int(16) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_users`
--

INSERT INTO `employee_users` (`id`, `role`, `designation`, `company_id`, `username`, `firstname`, `lastname`, `address`, `company`, `salary`, `account_no`, `resume`, `image`) VALUES
(1, 'Employee', 'Manager', 'sense 111', 'Prashant', 'Prashant&nbsp;&nbsp;', 'Pandey&nbsp;&nbsp;&n', 'feel', 'Sense', 123433, 2147483647, 'h/Hellosense 111_resume.pdf', 'h/Hellosense 111_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hits_count`
--

CREATE TABLE IF NOT EXISTS `hits_count` (
  `count` int(11) NOT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hits_count`
--

INSERT INTO `hits_count` (`count`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `hits_ip`
--

CREATE TABLE IF NOT EXISTS `hits_ip` (
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE IF NOT EXISTS `leave_application` (
  `id` varchar(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `company` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_details`
--

CREATE TABLE IF NOT EXISTS `salary_details` (
  `id` varchar(15) NOT NULL,
  `basic` int(11) NOT NULL,
  `ta` int(11) NOT NULL,
  `da` int(11) NOT NULL,
  `hra` int(11) NOT NULL,
  `pf` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `net_salary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_details`
--

INSERT INTO `salary_details` (`id`, `basic`, `ta`, `da`, `hra`, `pf`, `tax`, `net_salary`) VALUES
('sense 111', 1232131, 1500, 616065, 616066, 493152, 246576, 1726033);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `permission` varchar(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CANDIDATE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `role`, `username`, `password`, `firstname`, `lastname`, `email_id`, `permission`) VALUES
(16, 'super-admin', 'Prashant1232123', '4e7d489b49ec93dbf53ce37aee778593', 'Prashant', 'Pandey', 'hello123@gmail.com', '1'),
(21, 'Employee', 'Prashant', '4e7d489b49ec93dbf53ce37aee778593', 'Prashant', 'Pandey', 'prashant123@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `company` varchar(25) NOT NULL,
  `salary` int(10) NOT NULL,
  `account_no` varchar(16) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CANDIDATE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `role`, `username`, `firstname`, `lastname`, `address`, `company`, `salary`, `account_no`, `image`) VALUES
(1, 'super-admin', 'Prashant1232123', 'Prashant', 'Pandey', 'Assdfas', 'Sense', 123123, '946210118546275', 'p/PrashantPrashant1232123_image.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
