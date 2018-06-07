-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2018 at 01:26 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upcPortal`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginBase`
--

CREATE TABLE `loginBase` (
  `loginID` varchar(9) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginBase`
--

INSERT INTO `loginBase` (`loginID`, `password`, `rank`) VALUES
('15BCS0075', '4018030865F33AA0C002574ED534037E', 3),
('TPOID0001', '208631FBBEC519E9073890067E9B7EBA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userBase`
--

CREATE TABLE `userBase` (
  `loginID` varchar(9) NOT NULL,
  `emailID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userBase`
--

INSERT INTO `userBase` (`loginID`, `emailID`) VALUES
('15BCS0075', 'shivanshuchaudhary97@gmail.com'),
('TPOID0001', 'tpo01@jmi.ac.in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginBase`
--
ALTER TABLE `loginBase`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `userBase`
--
ALTER TABLE `userBase`
  ADD PRIMARY KEY (`loginID`),
  ADD UNIQUE KEY `emailID` (`emailID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
