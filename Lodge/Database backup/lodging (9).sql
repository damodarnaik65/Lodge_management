-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2014 at 09:57 PM
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
  `expire_date` date NOT NULL,
  `paid_amt` float(10,2) NOT NULL,
  `refund` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `visitor_id`, `bill_date`, `payment_type`, `cardno`, `expire_date`, `paid_amt`, `refund`, `status`) VALUES
(2, 24, '2014-03-25', 'Credit card', '1211333', '2014-03-01', 3500.00, 0.00, 'Enabled'),
(3, 2, '2014-03-25', 'Debit card', '1211333', '2014-03-01', 600.00, 0.00, 'Enabled'),
(4, 2, '2014-03-25', 'VISA', '1211333', '2014-03-01', 2000.00, 0.00, 'Enabled'),
(5, 37, '2014-03-25', 'Debit card', '1211333', '2014-12-01', 2000.00, 0.00, 'Enabled');

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
(1, 11, 'Mahesh', 'Kumar', 'Bagnalorea', '859632147', 'admin', '12345', '2013-12-20', '2014-03-25 08:08:03', 'Enabled'),
(18, 11, 'Mahesh', 'Kumar', 'Mangalore', '9874563210', 'employee', '111', '2013-12-20', '2014-03-26 01:36:42', 'Enabled'),
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
(1, 11, 'ATM', 'ATM', 'ALL TIME MONEY', '118005page-img1.png', 'Enabled'),
(2, 12, 'PARKING', 'vehical parking', 'FREE PARKING', '6528Photo0335.jpg', 'Enabled'),
(3, 14, 'PARKING', 'parking', 'All time park', '12127Photo0334.jpg', 'Enabled'),
(4, 15, 'ATM', 'ATM', 'ALL TIME MONEY', '21165Icon_cash2.jpg', 'Enabled'),
(5, 15, 'PARKING', 'parking', 'free parking', '27146Photo0340.jpg', 'Enabled'),
(8, 1, '24x7 bANKING', 'Banking', 'Banking facilities', '13173Windows_icon_billing.png', 'Enabled'),
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
(1, 'KAVERI', 'Dharmasthala', '100', '28609Photo0316.jpg', 'Enabled'),
(11, 'RAJATHADRI', 'Dharmasthala', '2000 Meters', '19309shareiq-423254-1374149506-965746-jpg-uploadimagesresorts-267.jpg', 'Enabled'),
(12, 'GANGOTHRI', 'Dharmasthala', '2000 Meters', '2032Photo0338.jpg', 'Enabled'),
(13, 'NETHRAVATHI', 'Dharmasthala\r\n', '500 Meters', '13084Photo0348.jpg', 'Enabled'),
(14, 'VAISHALI', 'Dharmasthala', '700 Meters', '18200Photo0343.jpg', 'Enabled'),
(15, 'GAYATHRI', 'Dharmasthala', '300 Meters', '1715Photo0318.jpg', 'Enabled'),
(16, 'SHARAVATHI', 'Dharmasthala', '700 Meters', '6042(R)sharavathi(1.jpg', 'Enabled'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

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
(91, 30, '205', '', 'Enabled'),
(92, 33, '1BH', '', 'Enabled'),
(93, 33, '2BH', '', 'Enabled'),
(94, 33, '3BH', '', 'Enabled'),
(95, 33, '4BH', '', 'Enabled'),
(96, 33, '5BH', '', 'Enabled'),
(97, 33, '6BH', '', 'Enabled'),
(98, 47, '1H', '', 'Enabled'),
(99, 47, '2H', '', 'Enabled'),
(100, 47, '3H', '', 'Enabled'),
(101, 52, '1MH', '', 'Enabled'),
(102, 52, '2MH', '', 'Enabled'),
(103, 52, '3MH', '', 'Enabled'),
(104, 52, '4MH', '', 'Enabled'),
(105, 52, '5MH', '', 'Enabled'),
(106, 37, '1AC', '', 'Enabled'),
(107, 37, '2AC', '', 'Enabled'),
(108, 37, '2AC', '', 'Enabled'),
(109, 37, '4AC', '', 'Enabled'),
(110, 39, '11AB', '', 'Enabled'),
(111, 39, '12AB', '', 'Enabled'),
(112, 39, '13AB', '', 'Enabled'),
(113, 39, '14AB', '', 'Enabled'),
(114, 40, '21NB', '', 'Enabled'),
(115, 40, '22NB', '', 'Enabled'),
(116, 40, '23NB', '', 'Enabled'),
(117, 30, '105', '', 'Enabled'),
(118, 30, '106', '', 'Enabled'),
(119, 30, '107', '', 'Enabled'),
(120, 30, '108', '', 'Enabled'),
(121, 37, '111', '', 'Enabled'),
(122, 37, '112', '', 'Enabled'),
(123, 57, '1KH', '', 'Enabled'),
(124, 57, '2KH', '', 'Enabled'),
(125, 57, '3KH', '', 'Enabled'),
(126, 57, '4KH', '', 'Enabled'),
(127, 57, '5KH', '', 'Enabled'),
(128, 58, '1HL', '', 'Enabled'),
(129, 58, '2HL', '', 'Enabled'),
(130, 58, '3HL', '', 'Enabled'),
(131, 58, '4HL', '', 'Enabled'),
(132, 58, '5HL', '', 'Enabled'),
(133, 58, '124', '265592page-img10.jpg', 'Enabled'),
(134, 35, '125', '166033page-img11.jpg', 'Enabled'),
(135, 50, '126', '19123page-img12.jpg', 'Enabled');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`booking_id`, `bill_id`, `room_id`, `visitor_id`, `book_date`, `checkin_date`, `checkout_date`, `status`) VALUES
(1, 0, 34, 0, '2014-03-25', '2014-03-27', '2014-03-29', 'Disabled'),
(2, 2, 34, 24, '2014-03-25', '2014-03-27', '2014-03-29', 'Booked'),
(10, 2, 90, 24, '2014-03-25', '0000-00-00', '0000-00-00', 'Booked'),
(11, 0, 0, 24, '2014-03-25', '0000-00-00', '0000-00-00', 'Disabled'),
(12, 4, 71, 2, '2014-03-25', '2014-03-29', '2014-03-30', 'Booked'),
(15, 4, 44, 2, '2014-03-25', '2014-04-01', '2014-04-02', 'Booked'),
(16, 0, 35, 0, '2014-03-25', '2014-04-01', '2014-04-02', 'Disabled'),
(17, 5, 35, 37, '2014-03-25', '2014-04-01', '2014-04-02', 'Booked');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`room_type_id`, `lodge_id`, `room_type`, `room_capacity`, `advance`, `rent`, `return_amt`, `image`, `status`) VALUES
(30, 11, 'AC Room', 2, 1000.00, 800.00, 200.00, '46112page-img6.jpg', 'Enabled'),
(33, 12, 'Big Halls', 1, 1000.00, 600.00, 400.00, '44512page-img6.jpg', 'Enabled'),
(34, 15, 'VIP Rooms', 56, 500.00, 250.00, 259.00, '182182page-img11.png', 'Enabled'),
(35, 15, 'Attach bathroom rooms', 43, 200.00, 100.00, 100.00, '27442page-img12.png', 'Enabled'),
(36, 15, 'Halls', 5, 300.00, 200.00, 100.00, '112543page-img5.jpg', 'Enabled'),
(37, 13, 'AC Room', 16, 1000.00, 800.00, 200.00, '67563page-img13.jpg', 'Enabled'),
(38, 13, 'Non AC Room', 51, 500.00, 400.00, 100.00, '44823page-img6.jpg', 'Enabled'),
(39, 14, 'Attach bathroom rooms', 54, 200.00, 100.00, 100.00, '309282page-img13.png', 'Enabled'),
(40, 14, 'Non Attach bathroom rooms', 171, 100.00, 50.00, 50.00, '215303page-img1.jpg', 'Enabled'),
(41, 17, 'Mini Halls', 47, 400.00, 200.00, 200.00, '146322page-img12.png', 'Enabled'),
(42, 17, 'Big Halls', 12, 500.00, 300.00, 200.00, '61183page-img6.jpg', 'Enabled'),
(43, 17, 'Special VIP rooms', 12, 500.00, 300.00, 200.00, '163402page-img13.png', 'Enabled'),
(44, 17, 'VIP Rooms', 45, 300.00, 150.00, 150.00, '195703page-img11.jpg', 'Enabled'),
(45, 17, 'Attach bathroom rooms', 135, 200.00, 100.00, 100.00, '13443page-img12.jpg', 'Enabled'),
(46, 17, 'Non Attach bathroom rooms', 227, 100.00, 70.00, 30.00, '158063page-img8.jpg', 'Enabled'),
(47, 12, 'Halls', 28, 500.00, 300.00, 200.00, '306663page-img6.jpg', 'Enabled'),
(49, 11, '2 Bed-Rooms', 237, 300.00, 200.00, 100.00, '87332page-img11.png', 'Enabled'),
(50, 11, '4 Bed-rooms', 40, 500.00, 300.00, 200.00, '16353page-img6.jpg', 'Enabled'),
(51, 14, 'Halls', 6, 200.00, 100.00, 100.00, '108203page-img5.jpg', 'Enabled'),
(52, 12, 'Mini Halls', 20, 200.00, 100.00, 100.00, '312193page-img7.jpg', 'Enabled'),
(53, 12, 'Non Attach bathroom rooms', 127, 100.00, 50.00, 50.00, '147073page-img9.jpg', 'Enabled'),
(54, 16, '3 Bed Rooms', 13, 30.00, 20.00, 10.00, '27073page-img13.jpg', 'Enabled'),
(55, 16, '2 Bed-Rooms', 259, 30.00, 20.00, 10.00, '55823page-img7.jpg', 'Enabled'),
(56, 16, 'Select', 24, 30.00, 20.00, 10.00, '231733page-img5.jpg', 'Enabled'),
(57, 1, '2 Bed-Rooms', 2, 0.00, 0.00, 0.00, '214803page-img6.jpg', 'Enabled'),
(58, 1, 'Halls', 20, 0.00, 0.00, 0.00, '232713page-img13.jpg', 'Enabled'),
(59, 1, 'VIP Rooms', 2, 0.00, 0.00, 0.00, '', ''),
(60, 1, '4 Bed-rooms', 4, 0.00, 0.00, 0.00, '', ''),
(61, 1, 'Attach bathroom rooms', 2, 0.00, 0.00, 0.00, '', ' '),
(62, 16, '4 Bed-rooms', 4, 50.00, 30.00, 20.00, '', ' '),
(63, 13, '4 Bed-rooms', 2, 1000.00, 100.00, 100.00, '16320user_256.png', 'Enabled');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `email_id`, `visit_password`, `fname`, `lname`, `dob`, `visit_adrs`, `contact_num`, `mobile_no`, `status`) VALUES
(2, 'rajkiran@gmail.com', '111', 'amrutha', 'rao', '2014-01-15', 'Sirsi', '9545678987', '8976567898', 'Enabled'),
(4, 'mahesha@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(5, 'maheshkiran@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(6, 'mahesh@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(7, 'aravinda@technopulse.in', '12345', 'Peter', 'king', '1982-12-31', 'mangalore', '08251235536', '9874563210', 'Enabled'),
(8, 'xyz@gmail.com', 'technology', 'Mahesh', 'kiran', '2014-12-31', 'mangalore', '987563210', '7896541230', 'Enabled'),
(9, 'xyz33@gmail.com', '', 'aksha', 'rao', '0000-00-00', 'te', '5896589745', '4455666666', ''),
(10, 'raj@gmail.com', 'technolgoy', 'raj', 'kiran', '2014-12-31', 'mangaloer', '9845345678', '8547984765', 'Enabled'),
(13, 'bhavyav57@gmail.com', '', 'Bhavya', 'V', '0000-00-00', 'City light building,\r\n3rd floor', '5896589745', '4455666666', ''),
(14, 'bhavyav57@gmail.com', '', 'Bhavya', 'V', '0000-00-00', 'City light building,\r\n3rd floor', '5896589745', '4455666666', ''),
(15, 'bhavyav57@gmail.com', '', 'Bhavya', 'V', '0000-00-00', 'City light building,\r\n3rd floor', '5896589745', '4455666666', ''),
(16, 'bhavyav57@gmail.com', '', 'Bhavya', 'V', '0000-00-00', 'City light building,\r\n3rd floor', '5896589745', '4455666666', ''),
(17, 'clc@gmail.com', '', 'bhavua', 'ndndnn', '0000-00-00', 'ananna', '369316`6969699', '6996969969', ''),
(18, 'kavya@gmail.com', '', 'kavya', 'shree', '0000-00-00', 'banga36re', '567567576', '671627676', ''),
(21, 'ashakiran@gmail.com', '12345', 'asha', 'KIRAN', '1994-01-11', 'Manglore', '9878976547', '7849383737', 'Enabled'),
(22, 'shailu@gmail.com', '1111', 'shailesh', 'Kumar', '1984-12-01', 'manglore', '6758493095', '758698675', 'Enabled'),
(23, 'rajkiran@gmail.com', '', 'amrutha', 'rao', '0000-00-00', 'manglore', '9405968686', '7896857489', ''),
(24, 'rao@gmail.com', '111', 'amrutha', 'rao', '1994-04-11', 'manglore', '9480523109', '8968474849', 'Enabled'),
(25, 'raja@gmail.com', '1', 'rajendra', 'rao', '1994-04-11', 'manglore', '9876567898', '9876789876', 'Enabled'),
(26, 'rama@gmail.com', '123', 'rama', 'devi', '1994-01-11', 'manglore', '9485789999', '5465768498', 'Enabled'),
(27, 'game@gmail.com', '1', 'manu', '', '1982-04-11', 'manglore', '8765678987', '7876567876', 'Enabled'),
(28, 'rajkiran@gmail.com', '', 'amrutha', 'rao', '0000-00-00', 'manglore', '9405968686', '7896857489', ''),
(29, 'anithavv09@gmail.com', '123', 'anitha', 'vv', '1992-09-16', 'manglore', '9876789876', '987654568', 'Enabled'),
(30, 'sandesh@gmail.com', '123', 'sandesh', 'gudigar', '1994-03-29', 'manglore', '9878765678', '9878987657', 'Enabled'),
(31, 'askok@gmail.com', '111', 'ashok', '', '1992-08-04', 'manglore', '8979878689', '9878987678', 'Enabled'),
(32, 'rajkiran@gmail.com', '', 'amrutha', 'rao', '0000-00-00', 'mangalore', '6789999665', '67896543545', ''),
(33, 'sandesh@gmail.com', '', 'sandesh', 'gudigar', '0000-00-00', 'manglor', '9878765678', '9878987657', ''),
(34, 'peterking123@gmail.com', '123456', 'peter', 'king', '2014-01-31', 'Mangalore', '9876544331', '34545765756', 'Enabled'),
(35, 'mah123@gmail.com', '111111111', 'Mahesh', 'Gowda', '2014-03-12', 'Bangalore', '9876543219', '1234567898', 'Enabled'),
(36, 'raj1849@gmail.com', '1234567', 'mahesh', 'kiran', '1998-12-31', 'bangalore', '987652310', '1234567898', 'Enabled'),
(37, 'kirankumars@gmail.com', 'asdfghjkl', 'kiran', 'kumar', '2014-12-31', 'Bangalore', '', '', 'Enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
