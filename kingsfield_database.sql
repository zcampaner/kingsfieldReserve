-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2014 at 03:28 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kingsfield_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `category_id` int(15) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  `category_details` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `category_details`, `category_image`) VALUES
(1, 'Superior', 'Fully Aircondition with garage,telephone and wifi connection', 'upload/Vip room with garage.jpg'),
(2, 'Standard Deluxe', 'Fully Aircondition without window with garage', 'upload/Vip room without Garage.jpg'),
(3, 'Standard', 'Fully Aircondition without window without garage', 'upload/without window and without garage room.jpg'),
(4, 'Deluxe', 'Fully Aircondition with window without garage', 'upload/window side room without garage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guest`
--

CREATE TABLE IF NOT EXISTS `tb_guest` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date_reg` varchar(40) DEFAULT NULL,
  `time_reg` varchar(40) DEFAULT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tb_guest`
--

INSERT INTO `tb_guest` (`id_user`, `name`, `email`, `phone_number`, `username`, `password`, `date_reg`, `time_reg`, `confirmcode`) VALUES
(45, 'Jose Michael Galanza', 'kringcarl_j@yahoo.com', '09462390968', 'hunter', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sunday, June 01, 2014', '4:43:36 A.M.', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
  `message_id` int(15) NOT NULL AUTO_INCREMENT,
  `id_user` int(40) NOT NULL,
  `sender_id` int(15) NOT NULL,
  `message` varchar(40) NOT NULL,
  `message_date` varchar(40) DEFAULT NULL,
  `message_time` varchar(40) DEFAULT NULL,
  `message_status` int(40) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservation`
--

CREATE TABLE IF NOT EXISTS `tb_reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `roomID` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `payable` int(11) NOT NULL,
  `status_id` int(15) NOT NULL DEFAULT '1',
  `booked` date NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=346 ;

--
-- Dumping data for table `tb_reservation`
--

INSERT INTO `tb_reservation` (`reservation_id`, `roomID`, `id_user`, `arrival`, `departure`, `payable`, `status_id`, `booked`, `confirmation`) VALUES
(340, 96, 45, '03/06/2014', '07/06/2014', 4400, 3, '0000-00-00', 'EAMO8M6ZXZ'),
(342, 112, 45, '04/06/2014', '05/06/2014', 900, 1, '0000-00-00', 'VSNBRQOSOU'),
(343, 120, 45, '04/06/2014', '05/06/2014', 950, 1, '0000-00-00', 'WJPT27TWT8'),
(344, 96, 45, '04/06/2014', '05/06/2014', 1100, 1, '0000-00-00', '2KHSH80S0W'),
(345, 126, 45, '04/06/2014', '05/06/2014', 990, 1, '0000-00-00', 'RDFVTIXYDY');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE IF NOT EXISTS `tb_rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(15) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `tb_rooms`
--

INSERT INTO `tb_rooms` (`roomID`, `name`, `description`, `category_id`, `price`, `location`, `status`) VALUES
(100, '5', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(99, '3', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(96, '12', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(98, '1', 'Fully Aircondition w/ window w/ garage', 4, 1100, 'upload/Vip room with garage.jpg', 'Available'),
(97, '13', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(95, '11', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(94, '10', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(93, '9', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(92, '8', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(91, '7', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(90, '6', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(89, '4', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(88, '2', 'Fully Aircondition', 3, 1100, 'upload/Vip room without Garage.jpg', 'Available'),
(101, '16', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(102, '18', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(103, '19', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(104, '20', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(105, '22', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(106, '23', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(107, '24', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(111, '30', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(112, '31', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(113, '32', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(114, '33', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(115, '35', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(116, '36', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(117, '37', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(118, '39', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(119, '40', 'Fully Aircondition', 1, 900, 'upload/without window and without garage room.jpg', 'Available'),
(120, '17', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(121, '21', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(122, '25', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Reserved'),
(123, '29', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Reserved'),
(124, '34', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(125, '38', 'Fully Aircondition w/out Garage', 2, 950, 'upload/window side room without garage.jpg', 'Available'),
(126, '2', 'with aircon', 4, 990, 'upload/1.JPG', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE IF NOT EXISTS `tb_slider` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `slider_title` varchar(50) NOT NULL,
  `slider_details` varchar(500) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `slider_title`, `slider_details`, `slider_image`) VALUES
(1, 'Welcome To Kingsfield Express Inn', 'Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms. Enjoy an intimate and peaceful nights rest in the city.', 'IMG_5560.jpg'),
(2, 'Welcome To Kingsfield Express Inn', 'Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms. Enjoy an intimate and peaceful nights rest in the city.', 'IMG_5561.jpg'),
(3, 'Welcome To Kingsfield Express Inn', 'Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms. Enjoy an intimate and peaceful nights rest in the city.', 'IMG_5563.jpg'),
(4, 'Welcome To Kingsfield Express Inn', 'Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms. Enjoy an intimate and peaceful nights rest in the city.', 'IMG_5564.jpg'),
(5, 'Welcome To Kingsfield Express Inn', 'Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms. Enjoy an intimate and peaceful nights rest in the city.', 'IMG_5565.jpg'),
(6, 'Welcome To Kingsfield Express Inn', 'Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms. Enjoy an intimate and peaceful nights rest in the city.', 'IMG_5566.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
  `status_id` int(15) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(40) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `status_name`) VALUES
(1, 'pending'),
(2, 'confirm'),
(3, 'cancel');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
