-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2012 at 09:20 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `address_model`
--

INSERT INTO `address_model` (`address_id`, `line1`, `city`, `province`, `postal`, `country`, `longitude`, `latitude`) VALUES
(1, '443 winona drive', 'Toronto', 'ON', 'm6c 3t4', 'Canada', 43.6896, -79.4356);

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
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profile_model`
--

INSERT INTO `profile_model` (`profile_id`, `firstname`, `lastname`, `gender`, `user_id`, `address_id`, `competitiveness`, `handedness`) VALUES
(1, 'David', 'Cheung', 'm', 2, 1, 'competitive', 'right'),
(2, '', '', '', 3, 0, 'casual', 'right');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(2, 'david', '$2a$08$mGUBT8hOWt3T/IQXxelURuJyN1ooTiG.NxH1gVp5nP2vZ0CS2WON2', 'davidcheung@live.ca', 1, 0, NULL, NULL, NULL, NULL, '4a928b757b08ee5f061392930a48197f', '127.0.0.1', '2012-12-03 03:01:46', '2012-11-21 02:55:45', '2012-12-03 02:01:46'),
(3, 'bavid', '$2a$08$Tkn16bH3oODXHJiYuvwrZe2H0NbaYfEFEo5ngiCAwEhPPnncr/ZlW', 'yipyip@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-12-03 09:10:51', '2012-11-25 05:59:37', '2012-12-03 08:10:51'),
(4, 'hello', '$2a$08$/tHtwyfFlGAGrut2/1Mc8eZDxqQjYhgIeUS461UKOs.g2QRlYnlQ2', 'david@digitalmenubox.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-11-30 04:38:41', '2012-11-30 03:38:41');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 3, NULL, NULL),
(2, 4, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
