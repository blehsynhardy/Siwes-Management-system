-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 10:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwes`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `placement` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `school_year` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `assign_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `phone`, `placement`, `department_id`, `school_year`, `username`, `password`, `location`, `status`, `assign_status`) VALUES
(227, 'Joseph', 'Oladiran', '123422322', 'Lagos', 10, '2020-2021', '2020234050907', '1111', 'uploads/IMG_20191204_110852_7.jpg', 'Registered', 1),
(228, 'Kolan', 'Odusola', '', '', 10, '2020-2021', '2020234050906', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 0),
(229, 'Mary', 'Oladele', '09038664697', 'GT Bank', 11, '2020-2021', '2020234500906', '1111', 'uploads/whitePng.png', 'Registered', 1),
(230, 'Mariam', 'Abass', '', '', 10, '2021-2022', '2021234050907', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 1),
(231, 'james', 'brown', '', '', 11, '2020-2021', '2006172011', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
