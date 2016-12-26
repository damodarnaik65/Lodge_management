-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2014 at 04:35 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lodging`
--
CREATE DATABASE IF NOT EXISTS `lodging` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lodging`;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `visitor_id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `paid_amt` float(10,2) NOT NULL,
  `refund` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `visitor_id`, `bill_date`, `payment_type`, `cardno`, `paid_amt`, `refund`, `status`) VALUES
(1, 6, '2013-12-11', '400', '2234234234', 100.00, 45.00, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `lodge_id` int(10) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `emp_adrs` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `join_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `lodge_id`, `first_name`, `last_name`, `emp_adrs`, `contact_no`, `login_id`, `password`, `join_date`, `last_login`, `status`) VALUES
(1, 11, 'Mahesh', 'Kumar', 'Bagnalorea', '859632147', 'admin', '12345', '2013-12-20', '2014-02-26 07:41:05', 'Enabled'),
(18, 11, 'Mahesh', 'Kumar', 'Mangalore', '9874563210', 'employee', '111', '2013-12-20', '2014-02-13 09:00:12', 'Enabled'),
(19, 13, 'raj', 'kiran', 'mangalore', '789456123', 'rajkiran', '123', '2014-02-12', '0000-00-00 00:00:00', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `facility_id` int(10) NOT NULL AUTO_INCREMENT,
  `lodge_id` int(10) NOT NULL,
  `facility` varchar(25) NOT NULL,
  `facility_type` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `lodge_id`, `facility`, `facility_type`, `description`, `image`, `status`) VALUES
(1, 11, 'ATM', 'ATM', 'ALL TIME MONEY', '', 'Enabled'),
(2, 12, 'PARKING', 'PASFDJ', 'gjgckglglgu', '11312page-img5.jpg', 'Enabled'),
(3, 14, 'PARKING', 'PASFDJ', 'gjgckglglgu', '11312page-img5.jpg', 'Enabled'),
(4, 15, 'ATM', 'ATM', 'ALL TIME MONEY', '25628Photo0318.jpg', 'Enabled'),
(5, 15, 'PARKING', 'PASFDJ', 'gjgckglglgu', '11312page-img5.jpg', 'Enabled'),
(6, 0, 'gveg', 'egw', 'egws', '', 'Enabled'),
(7, 0, 'gvrsgsg', 'sggzg', 'szgz', '', 'Enabled'),
(8, 1, '24x7 bANKING', 'Banking', 'test page', '32714Penguins.jpg', 'Enabled'),
(9, 11, 'BANKING', '24X7 BANKING', 'ITS A BANKING FACILITY PROVIDED BY THIS LODGE', '4584download.jpg', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `lodges`
--

CREATE TABLE IF NOT EXISTS `lodges` (
  `lodge_id` int(10) NOT NULL AUTO_INCREMENT,
  `lodge_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `distance` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`lodge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `lodges`
--

INSERT INTO `lodges` (`lodge_id`, `lodge_name`, `address`, `distance`, `image`, `status`) VALUES
(1, 'KAVERI', 'Dharmasthala', '200 Meters', '19643Photo0314.jpg', 'Enabled'),
(11, 'RAJATHADRI', 'Dharmasthala', '2000 Meters', '19309shareiq-423254-1374149506-965746-jpg-uploadimagesresorts-267.jpg', 'Enabled'),
(12, 'GANGOTHRI', 'Dharmasthala', '2000 Meters', '2032Photo0338.jpg', 'Enabled'),
(13, 'NETHRAVATHI', 'Dharmasthala\r\n', '500 Meters', '13084Photo0348.jpg', 'Enabled'),
(14, 'VAISHALI', 'Dharmasthala', '700 Meters', '23211Photo0343.jpg', 'Enabled'),
(15, 'GAYATHRI', 'Dharmasthala', '300 Meters', '1715Photo0318.jpg', 'Enabled'),
(16, 'SHARAVATHI', 'Dharmasthala', '700 Meters', '22638Photo0337.jpg', 'Enabled'),
(17, 'SAKETH', 'Dharmasthala', '500 Meters', '30117Photo0328.jpg', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `room_image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type_id`, `room_no`, `room_image`, `status`) VALUES
(34, 30, '105', '23796imagesJun2011img-D6-18-2011T8-48-59AM-cm2010-n.jpg', 'Disabled'),
(35, 30, '110', '7197imagesJun2011img-D6-23-2011T11-32-16PM-G.jpg', 'Enabled'),
(38, 8, '111', '32402img-D6-18-2011T8-48-59AM-cm2010-n.jpg', 'Enabled'),
(39, 8, '113', '4195img-D6-23-2011T11-32-16PM-G.K.Vasan.jpg', 'Enabled'),
(40, 8, '115', '21600pitch1.jpg', 'Enabled'),
(41, 31, '102', '23833pitch4.jpg', 'Enabled'),
(42, 31, '103', '29150pitch5.jpg', 'Enabled'),
(43, 31, '104', '20415pitch6.jpg', 'Enabled'),
(44, 30, '110', '22156', 'Enabled'),
(45, 5, '200', '1059', 'Enabled'),
(48, 5, '201', '7456', 'Enabled'),
(49, 30, '205', '45271381766034_compass.png', 'Enabled'),
(52, 30, '206', '', 'Enabled'),
(54, 30, '207', '', 'Enabled'),
(55, 31, '300', '114181381766034_compass.png', 'Enabled'),
(57, 31, '301', '', 'Enabled'),
(60, 31, '302', '', 'Enabled'),
(61, 31, '401', '1959dr.apj-abdul-kalam-quotes-hd-wallpapers (1).jpg', 'Enabled'),
(62, 31, '402', '', 'Enabled'),
(63, 31, '403', '', 'Enabled'),
(64, 8, '501', '', 'Enabled'),
(65, 8, '513', '', 'Enabled'),
(66, 32, '301', '9728Penguins.jpg', 'Enabled'),
(67, 32, '102', '19901Desert.jpg', 'Enabled'),
(68, 32, '103', '24498Hydrangeas.jpg', 'Enabled'),
(69, 5, '203', '', 'Enabled'),
(70, 5, '204', '', 'Enabled'),
(71, 49, '1A', '127602page-img10.jpg', 'Enabled'),
(72, 49, '2A', '146412page-img11.png', 'Enabled'),
(73, 49, '3A', '307423page-img8.jpg', 'Enabled'),
(74, 49, '4A', '14313page-img6.jpg', 'Enabled'),
(75, 49, '5A', '49963page-img7.jpg', 'Enabled'),
(76, 49, '6A', '141893page-img8.jpg', 'Enabled'),
(77, 49, '7A', '326743page-img13.jpg', 'Enabled'),
(78, 49, '8A', '256513page-img2.jpg', 'Enabled'),
(79, 49, '9A', '255843page-img5.jpg', 'Enabled'),
(80, 49, '10A', '239133page-img7.jpg', 'Enabled'),
(81, 50, '1B', '', 'Enabled'),
(82, 50, '2B', '', 'Enabled'),
(83, 50, '3B', '', 'Enabled'),
(84, 50, '4B', '', 'Enabled'),
(85, 50, '5B', '', 'Enabled'),
(86, 50, '6B', '', 'Enabled'),
(87, 50, '7B', '', 'Enabled'),
(88, 50, '8B', '', 'Enabled'),
(89, 50, '9B', '', 'Enabled'),
(90, 50, '10B', '', 'Enabled'),
(91, 30, '205', '', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE IF NOT EXISTS `room_booking` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `bill_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `visitor_id` int(10) NOT NULL,
  `book_date` date NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`booking_id`, `bill_id`, `room_id`, `visitor_id`, `book_date`, `checkin_date`, `checkout_date`, `status`) VALUES
(1, 1, 38, 0, '2013-12-11', '2013-12-11', '2013-12-11', 'Enabled'),
(2, 1, 23, 0, '2013-12-11', '2013-12-11', '2013-12-11', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE IF NOT EXISTS `room_types` (
  `room_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `lodge_id` int(10) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `room_capacity` int(10) NOT NULL,
  `advance` float(10,2) NOT NULL,
  `rent` float(10,2) NOT NULL,
  `return_amt` float(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`room_type_id`, `lodge_id`, `room_type`, `room_capacity`, `advance`, `rent`, `return_amt`, `image`, `status`) VALUES
(4, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(5, 1, '2 Bed-Rooms', 10, 1000.00, 500.00, 500.00, '11587pitch3.jpg', 'Enabled'),
(6, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(7, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(9, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(10, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(11, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(12, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(13, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(14, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(15, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(16, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(17, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(18, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(19, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(20, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(21, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(22, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(23, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(24, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(25, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(26, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(27, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(28, 12, 'Attach bathroom rooms', 100, 1000.00, 1000.00, 500.00, '27862Hydrangeas.jpg', 'Enabled'),
(30, 11, 'AC Room', 2, 1000.00, 800.00, 200.00, '10438Pros and Cons of Social Networking.jpg', 'Enabled'),
(32, 13, '4 Bed-rooms', 3, 1000.00, 500.00, 500.00, '139281003195_705066926193685_1966589445_n.jpg', 'Enabled'),
(33, 12, 'Big Halls', 1, 1000.00, 600.00, 400.00, '44512page-img6.jpg', 'Enabled'),
(34, 15, 'VIP Rooms', 56, 500.00, 250.00, 259.00, '182182page-img11.png', 'Enabled'),
(35, 15, 'Attach bathroom rooms', 43, 200.00, 100.00, 100.00, '27442page-img12.png', 'Enabled'),
(36, 15, 'Halls', 5, 300.00, 200.00, 100.00, '112543page-img5.jpg', 'Enabled'),
(37, 13, 'AC Room', 16, 1000.00, 800.00, 200.00, '67563page-img13.jpg', 'Enabled'),
(38, 13, 'Non AC Room', 51, 500.00, 400.00, 100.00, '44823page-img6.jpg', 'Enabled'),
(39, 14, 'Attach bathroom rooms', 54, 200.00, 100.00, 100.00, '309282page-img13.png', 'Enabled'),
(40, 14, 'Non Attach bathroom rooms', 171, 100.00, 800.00, 200.00, '215303page-img1.jpg', 'Enabled'),
(41, 17, 'Mini Halls', 47, 400.00, 200.00, 200.00, '146322page-img12.png', 'Enabled'),
(42, 17, 'Big Halls', 12, 500.00, 300.00, 200.00, '61183page-img6.jpg', 'Enabled'),
(43, 17, 'Special VIP rooms', 12, 500.00, 300.00, 200.00, '163402page-img13.png', 'Enabled'),
(44, 17, 'VIP Rooms', 45, 300.00, 150.00, 150.00, '195703page-img11.jpg', 'Enabled'),
(45, 17, 'Attach bathroom rooms', 135, 200.00, 100.00, 100.00, '13443page-img12.jpg', 'Enabled'),
(46, 17, 'Non Attach bathroom rooms', 227, 100.00, 70.00, 30.00, '158063page-img8.jpg', 'Enabled'),
(47, 12, 'Halls', 28, 500.00, 300.00, 200.00, '306663page-img6.jpg', 'Enabled'),
(48, 12, 'Non Attach bathroom rooms', 127, 100.00, 50.00, 50.00, '154482page-img12.png', 'Enabled'),
(49, 11, '2 Bed-Rooms', 237, 300.00, 200.00, 100.00, '87332page-img11.png', 'Enabled'),
(50, 11, '4 Bed-rooms', 40, 500.00, 300.00, 200.00, '16353page-img6.jpg', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `visitor_id` int(10) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(25) NOT NULL,
  `visit_password` varchar(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `visit_adrs` text NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `email_id`, `visit_password`, `fname`, `lname`, `dob`, `visit_adrs`, `contact_num`, `mobile_no`, `status`) VALUES
(2, 'rajkiran@gmail.com', '111', 'amrutha', 'rao', '2014-01-15', 'Sirsi', '5652652', '56565', 'Enabled'),
(4, 'mahesha@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(5, 'maheshkiran@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(6, 'mahesh@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(7, 'aravinda@technopulse.in', '12345', 'Peter', 'king', '1982-12-31', 'mangalore', '08251235536', '9874563210', 'Enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
