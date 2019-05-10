-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 11:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bb_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mob` int(11) NOT NULL,
  `passw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bb_name`, `email`, `mob`, `passw`) VALUES
(2, 'rs', 'rs@rs.com', 85858, '5555'),
(3, 'rs', 'rs@rs.com', 85858, '5555');

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `bid` int(11) NOT NULL,
  `name` varchar(5) NOT NULL,
  `unit` int(11) NOT NULL,
  `bbid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`bid`, `name`, `unit`, `bbid`) VALUES
(1, 'a', 2, 2),
(2, 'v', 4, 2),
(3, 'a', 2, 0),
(4, 'v', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `bloodg` varchar(3) NOT NULL,
  `pin` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `blok` varchar(255) NOT NULL,
  `subd` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` enum('none','need','available','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `dob`, `pass`, `mobile`, `bloodg`, `pin`, `post`, `blok`, `subd`, `district`, `states`, `country`, `status`) VALUES
(7, 'rs', 'chauhhan', '', '1996-08-31', 'rschauhan', '', 'A-', 0, '', '', '', '', '', '', 'none'),
(8, 'Ramcharan', 'Chauhan', 'rsrsq@rs.com', '1999-02-22', '123', '8737822006', 'A-', 2761233, 'tandadih', 'tarawa', 'mehnagar', 'azamagrh', 'uttar pradesh', 'india', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bbid` (`bbid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
