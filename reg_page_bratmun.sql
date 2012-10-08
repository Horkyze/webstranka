-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2011 at 09:31 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bratmun`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(3) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `content`, `name`) VALUES
(6, 'contact_us', 'contact_us'),
(5, 'our_team', 'our_team'),
(3, 'history_of_bratmun', 'history_of_bratmun'),
(4, 'what_is_bratmun', 'what_is_bratmun'),
(1, 'This is about us', 'about_us'),
(2, 'invitatio_letters', 'invitation_letters');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(3) NOT NULL,
  `s_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `super_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `previous` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisor_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisor_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fnamed1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `snamed1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdayd1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoned1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emaild1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idd1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commiteed1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fnamed2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `snamed2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdayd2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoned2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emaild2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idd2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commiteed2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fnamed3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `snamed3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdayd3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoned3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emaild3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idd3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commiteed3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fnamed4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `snamed4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdayd4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoned4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emaild4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idd4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commiteed4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fnamed5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `snamed5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdayd5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoned5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emaild5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idd5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commiteed5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefered_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_international` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accomodation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_beta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `s_name`, `s_address`, `s_phone`, `country`, `city`, `super_email`, `previous`, `advisor_name`, `advisor_phone`, `advisor_email`, `fnamed1`, `snamed1`, `bdayd1`, `phoned1`, `emaild1`, `idd1`, `commiteed1`, `fnamed2`, `snamed2`, `bdayd2`, `phoned2`, `emaild2`, `idd2`, `commiteed2`, `fnamed3`, `snamed3`, `bdayd3`, `phoned3`, `emaild3`, `idd3`, `commiteed3`, `fnamed4`, `snamed4`, `bdayd4`, `phoned4`, `emaild4`, `idd4`, `commiteed4`, `fnamed5`, `snamed5`, `bdayd5`, `phoned5`, `emaild5`, `idd5`, `commiteed5`, `prefered_country`, `additional`, `s_international`, `gender1`, `gender2`, `gender3`, `gender4`, `gender5`, `accomodation`, `email_beta`, `submit`) VALUES
(1, 'Nohovradska', 'Novohradska 3', '12345', 'Slovakia', 'Bratislava', 'matej.bellus@gmail.com', 'nope', 'yes', '00421910515936', 'matej.bellus@gmail.com', 'test', 'test_secondname', '123', '00421910515936', 'matej.bellus@gmail.com', 'rt', 'United', 'test', 'test_secondname', 'sdf', '00421910515936', 'matej.bellus@gmail.com', 'sdf', 'United', 'test', 'test_secondname', 'sdf', '00421910515936', 'matej.bellus@gmail.com', 'sdf', 'United', 'test', 'test_secondname', 'rtgr', '00421910515936', 'matej.bellus@gmail.com', 'erg', 'United', 'test', 'test_secondname', 'erg', '00421910515936', 'matej.bellus@gmail.com', 'erg', 'United', 'United States', 'erg', 'yes', 'Male', 'Male', 'Female', 'Male', 'Female', 'yes', 'matej.bellus@gmail.com', 'Submit Form'),
(2, 'Nohovradska', 'Novohradska 3', '12345', 'Slovakia', 'Bratislava', 'matej.bellus@gmail.com', 'nope', 'yes', '00421910515936', 'matej.bellus@gmail.com', 'test', 'test_secondname', '123', '00421910515936', 'matej.bellus@gmail.com', 'rt', 'United', 'test', 'test_secondname', 'sdf', '00421910515936', 'matej.bellus@gmail.com', 'sdf', 'United', 'test', 'test_secondname', 'sdf', '00421910515936', 'matej.bellus@gmail.com', 'sdf', 'United', 'test', 'test_secondname', 'rtgr', '00421910515936', 'matej.bellus@gmail.com', 'erg', 'United', 'test', 'test_secondname', 'erg', '00421910515936', 'matej.bellus@gmail.com', 'erg', 'United', 'United States', 'erg', 'yes', 'Male', 'Male', 'Female', 'Male', 'Female', 'yes', 'matej.bellus@gmail.com', 'Submit Form');
