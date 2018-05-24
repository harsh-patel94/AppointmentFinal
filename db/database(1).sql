-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 01:33 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'database'
--

-- --------------------------------------------------------

--
-- Table structure for table 'members'
--
DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100),
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dogname` varchar(100) NOT NULL,
  `dogbreed` varchar(100) NOT NULL,
  `dogage` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `middlename`, `address`, `email`, `contact_no`, `age`, `gender`, `username`, `password`,`dogname`, `dogbreed`, `dogage`) VALUES
(1, 'tom', 'admin', '', 'Melbourne', 'admin@gmail.com', '0434******', 25, 'Male', 'admin', 'admin','','',''),
(2, 'stephanie', 'villanueva', 'batoonq', 'Saraviaq', 'tephvillanueva.jk@gmail.comq', '0946651154', 18, 'Male', 'teph', 'teph','Spotty','Dalmatian','2'),
(3, 'David','Coles','','Carlton','liuj15@student.unimelb.edu.au','0434123456','20','Male','david','123456','Jill','AKITA','1'),
(4, 'Jack', 'Woolworth', '', 'North Carlton', 'yimingq@student.unimelb.edu.au','0434654321', '21','Male', 'jack', '123456','Q','Basset Hound','3'),
(5, 'Tony', 'Stark','','Melbourne Central', 'apurushotha@student.unimelb.edu.au', '0434000000', '22', 'Male', 'tony', '123456', 'C', 'Bernese Mountain', '4'),
(6, 'James', 'Lannister', '', 'Kingslanding', 'harshp@student.unimelb.edu.au', '0434666666', '23', 'Male', 'james', '123456','mountain','Alaskan Malamute', '5');


DROP TABLE IF EXISTS `doginfo`;
CREATE TABLE IF NOT EXISTS `doginfo` (
  `dog_id` int(11) NOT NULL AUTO_INCREMENT,
  `dog_name` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`dog_id`),
  foreign KEY (`owner_id`) references members (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO `doginfo` (`dog_id`, `dog_name`, `breed`, `date_of_birth`, `owner_id`) VALUES
(1, 'Spotty', 'Dalmatian', '08/04/2017', 2);
-- --------------------------------------------------------

--
-- Table structure for table 'note'
--
DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `date`, `message`) VALUES
(6, '', 'Please handle my Puch with care, he can get aggressive');

-- --------------------------------------------------------

--
-- Table structure for table 'schedule'
--
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  foreign key (`member_id`) references members (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `member_id`, `date`, `service_id`, `Number`, `status`) VALUES
(76, 2, '11/04/2018', 1, 1, 'Done'),
(77, 2, '11/04/2018', 1, 1, 'Pending'),
(78, 3, '10/04/2018', 1, 1, 'Done'),
(79, 2, '25/05/2018', 3, 2, 'Coming');

-- --------------------------------------------------------

--
-- Table structure for table 'service'
--
DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_offer` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_offer`, `price`) VALUES
(1, 'wash only', 100.00),
(2, 'wash & nail clipping', 150.00),
(3, 'deluxe grooming', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table 'users'
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  foreign key (`user_id`) references members (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'teph', 'teph');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
