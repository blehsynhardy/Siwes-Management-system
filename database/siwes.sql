-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 07:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

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
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `hod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `hod`) VALUES
(10, 'Computer Science', 'Fadiya Olusegun'),
(11, 'Geology', 'Olumide Onanuga');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `name` varchar(25) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `name`, `supervisor_id`, `department_id`, `student_id`) VALUES
(144, 'uploads/appendix.docx', '2020-10-19 18:58:07', 'cccc', 'Week Three', 25, 10, 227),
(143, 'uploads/app letter2.docx', '2020-10-19 18:15:15', 'cccc', 'Week Two', 25, 10, 227),
(142, 'uploads/Amicable.rtf', '2020-10-17 12:32:16', 'ddd', 'Week One', 25, 10, 227);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(32, 25, 'Hello', '2020-10-20 14:03:38', 227, 'Beatrice Fakorede', 'Joseph Oladiran', ''),
(33, 25, 'I have submitted my assignments', '2020-10-20 14:41:22', 227, 'Beatrice Fakorede', 'Joseph Oladiran', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(1, 42, 'sad', '2013-11-12 22:50:05', 42, 'john kevin lorayna', 'john kevin lorayna'),
(2, 11, 'fasf', '2013-11-13 13:15:47', 42, 'Aladin Cabrera', 'john kevin lorayna'),
(3, 12, 'bjhkcbkjsdnckldvls', '2013-11-25 15:58:55', 71, 'Ruby Mae  Morante', 'Noli Mendoza'),
(4, 71, 'bcjhbcjksdbckldj', '2013-11-25 15:59:13', 71, 'Noli Mendoza', 'Noli Mendoza'),
(5, 12, 'test', '2013-11-30 20:54:05', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna'),
(11, 12, 'tst', '2013-12-01 23:38:40', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna'),
(12, 12, 'fasfasf', '2013-12-01 23:49:13', 93, 'Ruby Mae  Morante', 'John Kevin  Lorayna'),
(13, 136, 'Submit your classcard', '2014-02-13 13:35:21', 12, 'Jorgielyn Serfino', 'Ruby Mae  Morante'),
(14, 12, 'ggggg', '2020-10-05 09:34:45', 219, 'Ruby Mae  Morante', 'Oladele Paul'),
(15, 20, 'Hello', '2020-10-05 22:45:55', 219, 'Olayode Ezekiel', 'Oladele Paul'),
(16, 20, 'zjjzjzjz', '2020-10-07 12:46:41', 219, 'Olayode Ezekiel', 'Oladele Paul');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`, `active_status`) VALUES
(2, '2012-2013', 0),
(3, '2020-2021', 1),
(4, '2021-2022', 0);

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
(227, 'Joseph', 'Oladiran', '', '', 10, '2020-2021', '2020234050907', '2020234050907', 'uploads/IMG_20191204_110852_7.jpg', 'Registered', 1),
(228, 'Kola', 'Odusola', '', '', 10, '2020-2021', '2020234050906', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 1),
(229, 'Mary', 'Oladele', '09038664697', 'GT Bank', 11, '2020-2021', '2020234500906', 'mary', 'uploads/Screenshot_20190812-211654.png', 'Registered', 1),
(230, 'Mariam', 'Abass', '', '', 10, '2021-2022', '2021234050907', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `supervisor_status` varchar(20) NOT NULL,
  `supervisor_stat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id`, `title`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `supervisor_status`, `supervisor_stat`) VALUES
(22, '', 'Albert', 'albert', 'Albert', 'Olalude', 27, 'uploads/IMG_20191225_143624_2.jpg', '', 'Registered', ''),
(21, '', 'Ramoni', 'ramoni', 'Ramoni', 'Idris', 25, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Registered', ''),
(20, '', 'Ezekiel', 'ezekiel', 'Olayode', 'Ezekiel', 24, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Registered', ''),
(23, 'Mr.', '', '', 'Kolawole', 'Odusola', 10, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(24, 'Mrs.', '', '', 'Anita', 'Fakorede', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', ''),
(25, 'Mrs.', 'Beatrice', 'beatrice123', 'Beatrice', 'Fakorede', 10, 'uploads/27953.jpg', '', 'Registered', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_department`
--

CREATE TABLE `supervisor_department` (
  `supervisor_department_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_department`
--

INSERT INTO `supervisor_department` (`supervisor_department_id`, `supervisor_id`, `department_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(186, 20, 24, 42, 'admin/uploads/thumbnails.jpg', '2020-2021'),
(187, 22, 27, 43, 'admin/uploads/thumbnails.jpg', '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_department_student`
--

CREATE TABLE `supervisor_department_student` (
  `supervisor_department_student_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `school_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_department_student`
--

INSERT INTO `supervisor_department_student` (`supervisor_department_student_id`, `department_id`, `student_id`, `supervisor_id`, `school_year`) VALUES
(383, 10, 227, 25, '2020-2021'),
(385, 10, 226, 23, '2020-2021'),
(386, 11, 229, 24, '2020-2021'),
(387, 10, 228, 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_notification`
--

CREATE TABLE `supervisor_notification` (
  `supervisor_notification_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_notification`
--

INSERT INTO `supervisor_notification` (`supervisor_notification_id`, `supervisor_id`, `notification`, `date_of_notification`, `link`, `student_id`) VALUES
(15, 160, 'Submit Assignment file name <b>my_assginment</b>', '2013-11-25 10:39:52', 'view_submit_assignment.php', 93),
(17, 161, 'Submit Assignment file name <b>q</b>', '2013-11-25 15:54:19', 'view_submit_assignment.php', 71),
(18, 0, 'Add Downloadable Materials file name <b>Week One</b>', '2020-10-17 10:19:41', 'downloadable.php', 227),
(19, 0, 'Add Downloadable Materials file name <b>Week One</b>', '2020-10-17 10:22:40', 'downloadable.php', 227),
(20, 0, 'Add Downloadable Materials file name <b>Week One</b>', '2020-10-17 10:23:02', 'downloadable.php', 227),
(21, 0, 'Add Downloadable Materials file name <b>Week One</b>', '2020-10-17 10:23:05', 'downloadable.php', 227);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(15, 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `supervisor_department`
--
ALTER TABLE `supervisor_department`
  ADD PRIMARY KEY (`supervisor_department_id`);

--
-- Indexes for table `supervisor_department_student`
--
ALTER TABLE `supervisor_department_student`
  ADD PRIMARY KEY (`supervisor_department_student_id`);

--
-- Indexes for table `supervisor_notification`
--
ALTER TABLE `supervisor_notification`
  ADD PRIMARY KEY (`supervisor_notification_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `supervisor_department`
--
ALTER TABLE `supervisor_department`
  MODIFY `supervisor_department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `supervisor_department_student`
--
ALTER TABLE `supervisor_department_student`
  MODIFY `supervisor_department_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `supervisor_notification`
--
ALTER TABLE `supervisor_notification`
  MODIFY `supervisor_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
