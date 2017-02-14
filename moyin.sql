-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 07:28 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moyin`
--

-- --------------------------------------------------------

--
-- Table structure for table `gh`
--

CREATE TABLE `gh` (
  `Username` varchar(30) NOT NULL,
  `Amount to Receive` int(10) NOT NULL DEFAULT '0',
  `Payment` varchar(10) DEFAULT 'Incomplete',
  `Amount Received` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gh`
--

INSERT INTO `gh` (`Username`, `Amount to Receive`, `Payment`, `Amount Received`) VALUES
('test6', 75220, 'Incomplete', 0),
('test9', 90021, 'Incomplete', 0),
('test10', 30000, 'Incomplete', 0),
('test11', 11223, 'Incomplete', 0),
('test12', 14780, 'Incomplete', 0),
('test13', 15400, 'Incomplete', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ph`
--

CREATE TABLE `ph` (
  `Username` varchar(30) NOT NULL,
  `Amount Pledged` int(10) NOT NULL DEFAULT '0',
  `Payment` varchar(6) DEFAULT 'unpaid',
  `Amount Used` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ph`
--

INSERT INTO `ph` (`Username`, `Amount Pledged`, `Payment`, `Amount Used`) VALUES
('test2', 20000, 'paid', 0),
('test1', 10000, 'paid', 0),
('test3', 15000, 'unpaid', 0),
('test4', 24500, 'unpaid', 0),
('test5', 85000, 'paid', 0),
('test6', 75220, 'paid', 0),
('test7', 15000, 'paid', 0),
('test8', 18020, 'paid', 0),
('test9', 90021, 'paid', 0),
('test10', 30000, 'paid', 0),
('test11', 11223, 'paid', 0),
('test12', 14780, 'paid', 0);

--
-- Triggers `ph`
--
DELIMITER $$
CREATE TRIGGER `after_ph_update` AFTER UPDATE ON `ph` FOR EACH ROW IF NEW.`Payment` = 'paid' THEN
	INSERT INTO `gh` (`Username`, `Amount to Receive`) VALUES (OLD.`Username`, OLD.`Amount Pledged`);
    END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gh`
--
ALTER TABLE `gh`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `ph`
--
ALTER TABLE `ph`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
