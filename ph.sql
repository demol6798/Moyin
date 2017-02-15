-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 09:48 AM
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
-- Table structure for table `ph`
--

CREATE TABLE `ph` (
  `Username` varchar(30) NOT NULL,
  `Amount Pledged` int(10) NOT NULL DEFAULT '0',
  `Payment` varchar(6) DEFAULT 'unpaid',
  `Amount Used` int(10) DEFAULT '0',
  `gh_Username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `ph`
--
ALTER TABLE `ph`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `gh_Username` (`gh_Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ph`
--
ALTER TABLE `ph`
  ADD CONSTRAINT `ph_ibfk_1` FOREIGN KEY (`gh_Username`) REFERENCES `gh` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
