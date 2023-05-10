-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 06:49 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saarthi`
--

-- --------------------------------------------------------

--
-- Table structure for table `srthi_user`
--

CREATE TABLE `srthi_user` (
  `s_no` int(50) NOT NULL,
  `sr_name` varchar(255) NOT NULL,
  `sr_email` varchar(255) NOT NULL,
  `sr_empid` varchar(255) NOT NULL,
  `sr_pass` varchar(255) NOT NULL,
  `sr_process` varchar(255) NOT NULL,
  `sr_subprocess` varchar(255) NOT NULL,
  `sr_post` varchar(255) NOT NULL,
  `sr_status` int(50) NOT NULL,
  `sr_location` varchar(255) NOT NULL,
  `sr_dummy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `srthi_user`
--

INSERT INTO `srthi_user` (`s_no`, `sr_name`, `sr_email`, `sr_empid`, `sr_pass`, `sr_process`, `sr_subprocess`, `sr_post`, `sr_status`, `sr_location`, `sr_dummy`) VALUES
(1, 'Dilip Kumar', 'dilip.kumar@silaris.in', 'SIPLIND17501', 'google@123', 'Software', 'Web Developer', 'Trainer', 1, 'New Delhi', ''),
(32, 'Demo', 'demo@email.com', '11111', '11111', 'Software', 'Software', 'PHP Developer', 1, 'New Delhi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `srthi_user`
--
ALTER TABLE `srthi_user`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `srthi_user`
--
ALTER TABLE `srthi_user`
  MODIFY `s_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
