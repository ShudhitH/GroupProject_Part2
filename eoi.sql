-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 12:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `jobReferenceNumber` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `streetAddress` varchar(40) NOT NULL,
  `suburbTown` varchar(40) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `status` varchar(50) DEFAULT '',
  `skill1` varchar(30) DEFAULT NULL,
  `skill2` varchar(30) DEFAULT NULL,
  `skill3` varchar(30) DEFAULT NULL,
  `otherSkills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `jobReferenceNumber`, `firstName`, `lastName`, `dob`, `gender`, `streetAddress`, `suburbTown`, `state`, `postcode`, `emailAddress`, `phoneNumber`, `status`, `skill1`, `skill2`, `skill3`, `otherSkills`) VALUES
(1, 'Website Designer', 'gog', 'ajg', '2006-05-15', 'Male', '11 Coz Street', 'Berwick', 'VIC', '3978', 'eeee@gmail.com', '0436457760', '', 'HTML', NULL, NULL, 'qfs'),
(2, 'SD289', 'rf', 'sdf', '2006-05-15', 'Male', '11 Bob Street', 'amer', 'VIC', '3978', 'shudhit@gmail.com', '0436457760', 'Pending', 'HTML', NULL, NULL, ''),
(3, 'SD289', 'A', 'A', '2003-05-15', 'Male', '21 Street street', 'Cluyde', 'VIC', '3978', 'hi@gmail.com', '0426457760', 'Approved', 'HTML', NULL, NULL, ''),
(7, 'SD289', 'rsfghj', 'jkhhjk', '2010-02-10', 'Male', 'drgkjdf', 'gug', 'VIC', '3899', 'srgkjhdfjhk@yahoo.com', '043647760', 'Slay', 'HTML', 'JavaScript', NULL, 'NAH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
