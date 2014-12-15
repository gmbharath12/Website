-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 04:34 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musicstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `user_name` varchar(15) NOT NULL,
  `instrument` varchar(15) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` float NOT NULL,
  `order_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_name`, `instrument`, `quantity`, `price`, `order_status`) VALUES
('test', 'spinet_piano', 2, 35.5, 'ordered'),
('test', 'spinet_piano', 2, 35.5, NULL),
('test123', 'electric_guitar', 1, 25.5, 'ordered'),
('test123', 'box_drum', 3, 22.75, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE IF NOT EXISTS `news_letter` (
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`first_name`, `last_name`, `email`, `phone`) VALUES
('praveen', 'sagar', 'praveen@gmail.com', 1234567890),
('', '', 'praveen', 0),
('', '', 'sainath@gmail.com', 0),
('', '', 'praveen1@gmail.com', 0),
('', '', 'rafi@gmail.com', 0),
('', '', 'test@gmail.com', 0),
('', '', 'test1@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `instrument` varchar(20) NOT NULL,
  `available_units` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`instrument`, `available_units`) VALUES
('', 0),
('box_drum', 2),
('bass_drum', 0),
('acoustic_guitar', 4),
('electric_guitar', 1),
('spinet_piano', 0),
('console_piano', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_users`
--

CREATE TABLE IF NOT EXISTS `store_users` (
`ID` bigint(20) unsigned NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_login` varchar(60) CHARACTER SET utf8 NOT NULL,
  `user_pass` varchar(128) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_registered` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `store_users`
--

INSERT INTO `store_users` (`ID`, `user_name`, `user_login`, `user_pass`, `user_email`, `user_registered`) VALUES
(17, 'praveen', 'praveensagar', '2c544499e1f79915508201bd49f05c4f39a293006ba53ffefe7fb88f577b4586f47bd27638fb68dc4219936b18a323512bc96b5ad15f123a4a2955cc89b5c61a', 'praveen@gmail.com', 1417911810),
(18, 'test', 'test', 'd838b8b3e784974abfc28c5d8ff4f0975e4dc84e8a2a1b36dee1c0b13c47f23332dea97c371b0c64729ec0ab2d253d6385e9683ea6526ec65556f7c5613e4213', 'test@gmail.com', 1417996716),
(19, 'test123', 'test123', '9c1c5b5b5956f51117bf2112a4a7b70adb012a47c7fc53fcc3634059dbbbf8b4a6026fc00f7349ad1caefec0a48e14c3478ef3f6dd4912605ad147ee291f4780', 'test123@gmail.com', 1418009515);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_users`
--
ALTER TABLE `store_users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_users`
--
ALTER TABLE `store_users`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
