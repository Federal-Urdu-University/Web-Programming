-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2016 at 10:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`std_id` int(4) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `std_add` varchar(50) NOT NULL,
  `std_contact` int(13) NOT NULL,
  `std_dob` date NOT NULL,
  `std_email` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_add`, `std_contact`, `std_dob`, `std_email`) VALUES
(46, 'sajid', 'fb area', 2222222, '2016-09-13', 'sajid@ymail.com'),
(47, 'farooq', 'fb area block c', 22222222, '2016-09-13', 'farooq123@gmail.com'),
(48, 'hira', 'defence', 333333, '2016-09-13', 'hira123@ymail.com'),
(49, 'alice', 'gulshan', 6666666, '2016-09-07', 'alice@gmil.com'),
(50, 'saqib', 'link area', 2342434, '2016-10-20', 'saqib@live.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `std_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
