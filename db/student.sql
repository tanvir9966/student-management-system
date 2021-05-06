-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 03:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `semester` int(11) NOT NULL,
  `c1` varchar(20) NOT NULL,
  `cr1` int(11) NOT NULL,
  `c2` varchar(20) NOT NULL,
  `cr2` int(11) NOT NULL,
  `c3` varchar(20) NOT NULL,
  `cr3` int(11) NOT NULL,
  `c4` varchar(20) NOT NULL,
  `cr4` int(11) NOT NULL,
  `c5` varchar(20) NOT NULL,
  `cr5` int(11) NOT NULL,
  `c6` varchar(20) NOT NULL,
  `cr6` int(11) NOT NULL,
  `c7` varchar(20) NOT NULL,
  `cr7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`semester`, `c1`, `cr1`, `c2`, `cr2`, `c3`, `cr3`, `c4`, `cr4`, `c5`, `cr5`, `c6`, `cr6`, `c7`, `cr7`) VALUES
(1, 'CSE112', 3, 'MAT111', 3, 'ENG113', 3, 'PHY113', 3, '', 0, '', 0, '', 0),
(2, 'MAT121', 3, 'CSE122', 3, 'CSE123', 1, 'PHY124', 1, 'PHY123', 3, 'ENG123', 3, '', 0),
(3, 'CSE131', 3, 'CSE132', 3, 'CSE133', 1, 'CSE134', 3, 'CSE135', 1, 'MAT131', 3, '', 0),
(4, 'MAT211', 3, 'CSE212', 3, 'CSE213', 1, 'CSE214', 3, 'CSE215', 1, 'GED201', 3, '', 0),
(5, 'CSE221', 3, 'CSE222', 1, 'STA133', 3, 'CSE224', 3, 'CSE225', 1, '', 0, '', 0),
(6, 'CSE231', 3, 'CSE232', 1, 'CSE233', 3, 'CSE234', 3, 'CSE235', 3, '', 0, '', 0),
(7, 'CSE311', 3, 'CSE312', 1, 'CSE313', 3, 'CSE314', 1, 'ECO314', 3, '', 0, '', 0),
(8, 'CSE321', 3, 'CSE322', 3, 'CSE323', 3, 'CSE324', 1, 'GED321', 3, '', 0, '', 0),
(9, 'CSE331', 3, 'CSE332', 1, 'CSE333', 3, 'CSE334', 3, 'ACT301', 2, '', 0, '', 0),
(10, 'CSE412', 3, 'CSE413', 1, 'CSE414', 3, 'CSE415', 1, 'CSE417', 3, 'CSE418', 1, '', 0),
(11, 'CSE421', 3, 'CSE422', 1, 'CSE423', 3, 'CSEXXX', 3, 'CSE499', 3, '', 0, '', 0),
(12, 'CSE498', 3, 'CSEXXX', 3, 'CSE499', 3, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `srl` int(11) NOT NULL,
  `id` varchar(15) NOT NULL,
  `semester` int(3) NOT NULL,
  `p1` float DEFAULT NULL,
  `p2` float DEFAULT NULL,
  `p3` float DEFAULT NULL,
  `p4` float DEFAULT NULL,
  `p5` float DEFAULT NULL,
  `p6` float DEFAULT NULL,
  `p7` float DEFAULT NULL,
  `cgpa` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`srl`, `id`, `semester`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `cgpa`) VALUES
(1, '161-15-7652', 1, 3, 2, 4, 1, NULL, NULL, NULL, 2.5),
(2, '161-15-7652', 2, 2, 3, 2, 3, 4, 3, NULL, 2.93),
(4, '161-15-7652', 3, 3, 3.75, 3.5, 3, 3, 3.5, NULL, 3.3),
(9, '161-15-7652', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '161-15-6777', 1, 3, 3.5, 4, 4, NULL, NULL, NULL, 3.63);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(10) NOT NULL,
  `sec` varchar(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `department`, `sec`, `phone`, `address`, `image`) VALUES
('161-15-7622', 'Apel', 'cse', 'E', '45454', 'Dhaka', 'raj--4.jpg'),
('161-15-7633', 'Deep', 'cse', 'E', '5454545', 'shukrabad', 'ei ami.jpg'),
('161-15-7652', 'Tanvir Ahmed', 'cse', 'E', '454545', 'Razabazar', 'Screenshot (5).png'),
('161-15-7669', 'Mukdha', 'bba', 'F', '45454', 'shukrabad', 'Untitled55.jpg'),
('161-15-6777', 'joy', 'cse', 'E', '01622006175', 'SHUKRABADD,8/2 GLORY SHIKDAR VILLA', 'Screenshot (5).png'),
('161-15-7191', 'Habib', 'CSE', 'E', '016310911209', 'md.pur', 'Screenshot (5).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`semester`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`srl`),
  ADD KEY `fk` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `srl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
