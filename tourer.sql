-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2014 at 04:17 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(64) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'rasel', 'r@r.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `category_id`, `user_id`, `article_title`, `description`, `publication_status`) VALUES
(1, 1, 1, 'Hatir Jhill', 'A nice place', 1),
(2, 1, 1, 'Ahsan Monjil', 'A nice place', 1),
(3, 1, 1, 'The Zoo', 'A nice place', 1),
(4, 2, 2, 'Sopnopuri', 'A good place', 1),
(5, 2, 2, 'Ram Sagor', 'A nice place', 1),
(6, 2, 2, 'Paharpur', 'A nice place', 1),
(7, 3, 3, 'Sea Port', 'A nice place', 1),
(8, 5, 3, 'Jaflong', 'A nice place', 1),
(9, 6, 4, 'Sea Beach', 'A nice place', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Dhaka'),
(2, 'North Bengal'),
(3, 'Chittagong'),
(4, 'Comilla'),
(5, 'Sylhet'),
(6, 'Coxbazar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `sex` char(6) NOT NULL,
  `activity` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`, `dob`, `sex`, `activity`) VALUES
(1, 'Zahid', 'Khan', 'a@a.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '18:6:1987', 'Male', 1),
(2, 'Afzal', 'Hossain', 'b@b.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '12:4:1970', 'Male', 1),
(3, 'Kader', 'Ali', 'c@c.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '14:11:1980', 'Male', 1),
(4, 'Michael', 'Keaton', 'm@m.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '8:5:1986', 'Male', 1);
