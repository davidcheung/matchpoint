-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2012 at 08:53 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_model`
--

CREATE TABLE IF NOT EXISTS `address_model` (
  `address_id` int(255) NOT NULL AUTO_INCREMENT,
  `line1` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `longitude` float NOT NULL DEFAULT '0',
  `latitude` float NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `address_model`
--

INSERT INTO `address_model` (`address_id`, `line1`, `city`, `province`, `postal`, `country`, `longitude`, `latitude`) VALUES
(1, '443 winona drive', 'Toronto', 'ON', 'm6c 3t4', 'Canada', 43.6896, -79.4356),
(2, 'Riverdale Park East', 'Toronto', 'ON', '', 'Canada', 43.6698, -79.3557),
(3, '443 Arlington Avenue', 'Toronto', 'ON', 'M6C 3A2', 'Canada', 43.6913, -79.4328),
(4, 'Trinity Bellwoods', 'Toronto', 'ON', '', 'Canada', 43.6467, -79.4083),
(5, 'Toronto Island Park', 'Toronto', 'ON', '', 'Canada', 43.6226, -79.3775),
(6, 'Flemingdon Park', 'Toronto', 'ON', '', 'Canada', 43.713, -79.334),
(7, 'Lakeshore Public Tennis Courts', 'Toronto', 'ON', '', 'Canada', 43.6335, -79.438),
(8, 'High Park', 'Toronto', 'ON', '', 'Canada', 43.6447, -79.462),
(9, 'Norwood Park', 'Toronto', 'ON', '', 'Canada', 43.6824, -79.3032),
(10, 'McDairmid Woods Park', 'Toronto', 'ON', 'M1S 4Y2', 'Canada', 43.7796, -79.2673),
(11, '77 FINCH ave EAST', 'toronto', 'ontario', 'm2n6h8', 'Canada', 43.7804, -79.4113),
(12, '100 Queen Street West', 'Toronto', 'ON', '', 'Canada', 43.6535, -79.3841),
(13, '4700 Keele Street', 'toronto', 'ontario', 'M3J 1P3', 'Canada', 43.7742, -79.4984);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_model`
--

CREATE TABLE IF NOT EXISTS `bookings_model` (
  `bookings_id` int(50) NOT NULL AUTO_INCREMENT,
  `booked_by` int(50) NOT NULL COMMENT 'user_id',
  `booked_for` datetime NOT NULL COMMENT 'datetime of booking',
  `booked_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'datetime of booking added',
  `book_duration` int(50) NOT NULL COMMENT 'how long to book for',
  `court_id` int(50) NOT NULL DEFAULT '0',
  `bookings_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`bookings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bookings_model`
--

INSERT INTO `bookings_model` (`bookings_id`, `booked_by`, `booked_for`, `booked_on`, `book_duration`, `court_id`, `bookings_desc`) VALUES
(1, 2, '2012-12-13 22:00:00', '2012-12-06 03:00:47', 30, 1, 'Booking #1'),
(2, 2, '2012-12-14 22:15:00', '2012-12-06 03:03:15', 30, 1, 'Booking #2'),
(4, 2, '2012-12-20 22:15:00', '2012-12-06 03:12:48', 30, 6, 'Foobar'),
(5, 2, '2012-12-13 01:45:00', '2012-12-06 06:36:04', 30, 1, 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `court_model`
--

CREATE TABLE IF NOT EXISTS `court_model` (
  `court_id` int(20) NOT NULL AUTO_INCREMENT,
  `court_status` int(1) NOT NULL,
  `address_id` int(1) NOT NULL DEFAULT '0',
  `venue_type` varchar(255) NOT NULL,
  `number_of_courts` int(20) NOT NULL DEFAULT '1',
  `surface_type` varchar(50) NOT NULL DEFAULT '0',
  `court_name` varchar(255) NOT NULL,
  PRIMARY KEY (`court_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `court_model`
--

INSERT INTO `court_model` (`court_id`, `court_status`, `address_id`, `venue_type`, `number_of_courts`, `surface_type`, `court_name`) VALUES
(1, 1, 2, 'public', 1, 'Asphalt', 'Riverdale Park East'),
(2, 1, 3, 'public', 1, 'Asphalt', 'Cedarvale Park'),
(3, 1, 4, 'public', 1, 'Acrylic', 'Trinity Bellwoods'),
(4, 1, 5, 'public', 1, 'Acrylic', 'Toronto Island Park'),
(5, 1, 6, 'public', 1, 'Acrylic', 'Flemingdon Park'),
(6, 1, 7, 'public', 1, 'Acrylic', 'Lakeshore Public Tennis Courts'),
(7, 1, 8, 'public', 1, 'Acrylic', 'High Park'),
(8, 1, 9, 'public', 1, 'Acrylic', 'Norwood Park'),
(9, 1, 10, 'public', 1, 'Acrylic', 'McDairmid Woods Park');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `matches_model`
--

CREATE TABLE IF NOT EXISTS `matches_model` (
  `match_id` int(255) NOT NULL AUTO_INCREMENT,
  `match_creator` int(50) NOT NULL DEFAULT '0',
  `bookings_id` int(50) NOT NULL DEFAULT '0',
  `match_desc` text NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `matches_model`
--

INSERT INTO `matches_model` (`match_id`, `match_creator`, `bookings_id`, `match_desc`) VALUES
(3, 2, 2, 'Unfriendly match'),
(4, 2, 2, 'Epic Match');

-- --------------------------------------------------------

--
-- Table structure for table `matches_players`
--

CREATE TABLE IF NOT EXISTS `matches_players` (
  `match_id` int(50) NOT NULL DEFAULT '0',
  `user_id` int(50) NOT NULL DEFAULT '0',
  `score` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches_players`
--

INSERT INTO `matches_players` (`match_id`, `user_id`, `score`) VALUES
(3, 2, 0),
(3, 9, 0),
(4, 2, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_model`
--

CREATE TABLE IF NOT EXISTS `profile_model` (
  `profile_id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `user_id` int(255) NOT NULL DEFAULT '0',
  `address_id` int(255) NOT NULL DEFAULT '0',
  `competitiveness` varchar(255) NOT NULL DEFAULT 'casual',
  `handedness` varchar(255) NOT NULL DEFAULT 'right',
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `profile_model`
--

INSERT INTO `profile_model` (`profile_id`, `firstname`, `lastname`, `gender`, `user_id`, `address_id`, `competitiveness`, `handedness`) VALUES
(1, 'David', 'Cheung', 'm', 2, 1, 'competitive', 'right'),
(2, 'Bavid', 'Cheung', 'm', 3, 11, 'competitive', 'left'),
(3, 'Foo', 'Bar', 'm', 9, 13, 'casual', 'right'),
(4, 'Eavid', 'Cheung', 'm', 4, 12, 'casual', 'right');

-- --------------------------------------------------------

--
-- Table structure for table `surface_type`
--

CREATE TABLE IF NOT EXISTS `surface_type` (
  `surface_id` varchar(1) NOT NULL,
  `surface_type` varchar(50) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`surface_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surface_type`
--

INSERT INTO `surface_type` (`surface_id`, `surface_type`, `desc`) VALUES
('a', 'Acrylic', 'Textured, pigmented, resin-bound coating'),
('b', 'Artificial clay', 'Synthetic surface with the appearance of clay'),
('c', 'Artificial grass', 'Synthetic surface with the appearance of natural grass'),
('d', 'Asphalt', 'Bitumen-bound aggregate'),
('e', 'Carpet', 'Textile or polymeric material supplied in rolls or sheets of finished product'),
('f', 'Clay', 'Unbound mineral aggregate'),
('g', 'Concrete', 'Cement-bound aggregate'),
('h', 'Grass', 'Natural grass grown from seed'),
('j', 'Other', 'E.g. modular systems (tiles), wood, canvas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(2, 'david', '$2a$08$mGUBT8hOWt3T/IQXxelURuJyN1ooTiG.NxH1gVp5nP2vZ0CS2WON2', 'davidcheung@live.ca', 1, 0, NULL, NULL, NULL, NULL, '4a928b757b08ee5f061392930a48197f', '127.0.0.1', '2012-12-06 08:43:15', '2012-11-21 02:55:45', '2012-12-06 07:43:15'),
(3, 'bavid', '$2a$08$Tkn16bH3oODXHJiYuvwrZe2H0NbaYfEFEo5ngiCAwEhPPnncr/ZlW', 'yipyip@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-12-06 06:11:00', '2012-11-25 05:59:37', '2012-12-06 05:11:00'),
(4, 'hello', '$2a$08$/tHtwyfFlGAGrut2/1Mc8eZDxqQjYhgIeUS461UKOs.g2QRlYnlQ2', 'david@digitalmenubox.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-12-06 06:12:28', '2012-11-30 04:38:41', '2012-12-06 05:12:28'),
(5, 'asdasd', '$2a$08$x61xLsRGS5c.x4vT/pSsMeTEnPgRtzF/RYi2xn5Qb7qAugqNtuL5q', 'david@dsakjha.ca', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-12-03 09:38:09', '2012-12-03 08:38:09'),
(6, 'wewerew', '$2a$08$7FaeKkYQ8hnu0kpjQ02zXe4SDOLIk2e.T7Bn1YmKdOUVRhBzrLppi', 'david@wewerew.ca', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-12-03 09:43:43', '2012-12-03 08:43:43'),
(7, 'wewerewsdf', '$2a$08$YrmARrzleCsOhuIk6ogJ2u4dJ/nuYX5IEkbv9d//IvMW1qMzUcikS', 'david@wewerew.cam', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-12-03 09:44:37', '2012-12-03 08:44:37'),
(8, 'helloworld', '$2a$08$1SOrdao2SAwu1yB3OPvFgO35NUomikssAvFC9JKGPvrhxseYrp9ie', 'david@helloworld.cas', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-12-03 09:45:07', '2012-12-03 08:45:07'),
(9, 'hello2', '$2a$08$I98H5kUjtRtnMHXk5BrpCep7v80eVwHJf2ZZn63o0CPjfuerBfHgq', 'david@hello2.ca', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-12-06 06:15:31', '2012-12-03 09:45:43', '2012-12-06 05:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 3, NULL, NULL),
(2, 4, NULL, NULL),
(3, 5, NULL, NULL),
(4, 6, NULL, NULL),
(5, 7, NULL, NULL),
(6, 8, NULL, NULL),
(7, 9, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
