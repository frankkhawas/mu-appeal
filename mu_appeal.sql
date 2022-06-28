-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 10:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mu_appeal`
--

-- --------------------------------------------------------

--
-- Table structure for table `appeal_reccomendation`
--

CREATE TABLE `appeal_reccomendation` (
  `ar_appeal` int(11) NOT NULL,
  `appeal` int(11) NOT NULL,
  `description` text NOT NULL,
  `approver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblappeal`
--

CREATE TABLE `tblappeal` (
  `appeal_id` int(11) NOT NULL,
  `receipt_number` int(30) NOT NULL,
  `semister` enum('semister 1','semister 2') NOT NULL,
  `appeal_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `student` int(11) NOT NULL,
  `is_current` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblappeal`
--

INSERT INTO `tblappeal` (`appeal_id`, `receipt_number`, `semister`, `appeal_date`, `student`, `is_current`) VALUES
(1, 122334455, 'semister 1', '2022-06-14 06:50:47', 1, 0),
(5, 445544332, 'semister 1', '2022-06-16 01:40:09', 1, 1),
(6, 12345678, 'semister 2', '2022-06-18 02:27:57', 1, 1),
(11, 12323344, 'semister 1', '2022-06-19 04:32:58', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`course_id`, `course_code`, `course_name`) VALUES
(1, 'CSS 221', 'Web Programming'),
(2, 'CSS 128', 'AI'),
(3, 'css 4', 'test course');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepertment`
--

CREATE TABLE `tbldepertment` (
  `depertment_id` int(11) NOT NULL,
  `depertment_name` varchar(50) NOT NULL,
  `depertment_abb` varchar(20) NOT NULL,
  `faculty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepertment`
--

INSERT INTO `tbldepertment` (`depertment_id`, `depertment_name`, `depertment_abb`, `faculty`) VALUES
(1, 'Computing Science Studied', 'CSS', 1),
(2, 'Mathematics Statistic Science', 'MSS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(60) NOT NULL,
  `faculty_abb` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`faculty_id`, `faculty_name`, `faculty_abb`) VALUES
(1, 'Faculty Of Science and Technology', 'FST'),
(2, 'Faculty Of Social Science', 'FSS');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogram`
--

CREATE TABLE `tblprogram` (
  `program_id` int(11) NOT NULL,
  `programe_name` varchar(70) NOT NULL,
  `depertment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprogram`
--

INSERT INTO `tblprogram` (`program_id`, `programe_name`, `depertment`) VALUES
(1, 'Bsc ITS', 1),
(2, 'AS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `student_id` int(11) NOT NULL,
  `reg_numb` varchar(15) NOT NULL,
  `program` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`student_id`, `reg_numb`, `program`, `user`) VALUES
(1, '14322016/T.20', 1, 1),
(2, '14322016/T.21', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` varchar(25) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `fname`, `lname`, `sex`, `phone`, `email`, `type`, `username`, `password`) VALUES
(1, 'Frank', 'Mpili', 'F', 768654567, 'mpili@gmail.com', 'student', 'mpili', '8cb2237d0679ca88db6464eac60da96345513964'),
(5, 'Ronaldo', 'philimon', 'M', 768654567, 'ronaldo@gmail.com', 'student', 'ronaldo', '348162101fc6f7e624681b7400b085eeac6df7bd'),
(12, 'kkkkk', 'mmmm', '', 255765502454, 'kkk@gmail.com', '', 'kkkk', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(13, 'kkkkk', 'mmmm', '', 255765502454, 'kkk@gmail.com', '', 'kkkk', '0df293125f838199107b56e8e01aa773a4022ae3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appeal_course`
--

CREATE TABLE `tbl_appeal_course` (
  `ac_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `appeal` int(11) NOT NULL,
  `fe_marks` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appeal_course`
--

INSERT INTO `tbl_appeal_course` (`ac_id`, `course`, `appeal`, `fe_marks`, `date_added`) VALUES
(6, 1, 5, 13, '2022-06-19 04:07:46'),
(12, 2, 5, 32, '2022-06-19 04:27:49'),
(13, 2, 11, 23, '2022-06-19 04:33:20'),
(15, 1, 11, 24, '2022-06-19 04:33:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appeal_reccomendation`
--
ALTER TABLE `appeal_reccomendation`
  ADD PRIMARY KEY (`ar_appeal`),
  ADD KEY `approver_user_fk` (`approver`);

--
-- Indexes for table `tblappeal`
--
ALTER TABLE `tblappeal`
  ADD PRIMARY KEY (`appeal_id`),
  ADD UNIQUE KEY `receipt_number` (`receipt_number`),
  ADD KEY `student_appeal_fk` (`student`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `tbldepertment`
--
ALTER TABLE `tbldepertment`
  ADD PRIMARY KEY (`depertment_id`),
  ADD KEY `depertment_faculty_fk` (`faculty`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tblprogram`
--
ALTER TABLE `tblprogram`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `programe_depertment` (`depertment`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reg_numb` (`reg_numb`),
  ADD KEY `user_student` (`user`),
  ADD KEY `student_program` (`program`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_appeal_course`
--
ALTER TABLE `tbl_appeal_course`
  ADD PRIMARY KEY (`ac_id`),
  ADD UNIQUE KEY `unique_course_appeal` (`course`,`appeal`),
  ADD KEY `appeal_course_fk` (`appeal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appeal_reccomendation`
--
ALTER TABLE `appeal_reccomendation`
  MODIFY `ar_appeal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblappeal`
--
ALTER TABLE `tblappeal`
  MODIFY `appeal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldepertment`
--
ALTER TABLE `tbldepertment`
  MODIFY `depertment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblprogram`
--
ALTER TABLE `tblprogram`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_appeal_course`
--
ALTER TABLE `tbl_appeal_course`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appeal_reccomendation`
--
ALTER TABLE `appeal_reccomendation`
  ADD CONSTRAINT `approver_user_fk` FOREIGN KEY (`approver`) REFERENCES `tbluser` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblappeal`
--
ALTER TABLE `tblappeal`
  ADD CONSTRAINT `student_appeal_fk` FOREIGN KEY (`student`) REFERENCES `tblstudent` (`student_id`);

--
-- Constraints for table `tbldepertment`
--
ALTER TABLE `tbldepertment`
  ADD CONSTRAINT `depertment_faculty_fk` FOREIGN KEY (`faculty`) REFERENCES `tblfaculty` (`faculty_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprogram`
--
ALTER TABLE `tblprogram`
  ADD CONSTRAINT `programe_depertment` FOREIGN KEY (`depertment`) REFERENCES `tbldepertment` (`depertment_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD CONSTRAINT `student_program` FOREIGN KEY (`program`) REFERENCES `tblprogram` (`program_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_student` FOREIGN KEY (`user`) REFERENCES `tbluser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_appeal_course`
--
ALTER TABLE `tbl_appeal_course`
  ADD CONSTRAINT `appeal_course_fk` FOREIGN KEY (`appeal`) REFERENCES `tblappeal` (`appeal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_appeal_fk` FOREIGN KEY (`course`) REFERENCES `tblcourse` (`course_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
