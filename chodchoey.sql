-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 01:34 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chodchoey`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Br_id` int(10) NOT NULL,
  `Br_name` varchar(200) NOT NULL,
  `Fa_id` int(10) DEFAULT NULL COMMENT 'รหัสคณะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสาขาของอาจารย์ เดี๋ยวไปผูกกับคณะต่อ';

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Br_id`, `Br_name`, `Fa_id`) VALUES
(1, 'การจัดการ', NULL),
(2, 'เทคโนโลยีสารสนเทศธุรกิจ', NULL),
(3, ' บัญชี', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compen`
--

CREATE TABLE `compen` (
  `Cp_id` int(10) NOT NULL,
  `Cp_date_no` date NOT NULL COMMENT 'วันที่ไม่ได้สอน',
  `Cp_date_start` date NOT NULL COMMENT 'วันที่ทำ',
  `Cp_why` varchar(25) NOT NULL DEFAULT 'หยุดชดเชย' COMMENT 'เหตุผล',
  `Cp_detail` varchar(25) NOT NULL COMMENT 'รายละเอียดเหตุผล',
  `Cp_place` varchar(250) NOT NULL COMMENT 'สถานที่ชดเชย',
  `Cp_status` varchar(250) NOT NULL DEFAULT 'un_check' COMMENT 'สถานะ',
  `Te_id` int(10) NOT NULL,
  `Ti_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compen`
--

INSERT INTO `compen` (`Cp_id`, `Cp_date_no`, `Cp_date_start`, `Cp_why`, `Cp_detail`, `Cp_place`, `Cp_status`, `Te_id`, `Ti_id`) VALUES
(1, '2019-10-16', '2019-10-17', 'ไปราชการ', 'รหัสเลขที่ กก/011', '', 'yes', 6, 1),
(2, '2019-10-16', '2019-10-17', 'ไปราชการ', 'รหัสเลขที่ กก/011', '', 'un_check', 6, 1),
(3, '0000-00-00', '0000-00-00', '', '', '', 'un_check', 6, 1),
(4, '0000-00-00', '0000-00-00', '', '', '', 'un_check', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Co_id` int(20) NOT NULL,
  `Co_name` varchar(20) NOT NULL COMMENT 'ชื่อ',
  `Co_year` int(10) NOT NULL COMMENT 'ปีที่ปรับปรุง',
  `Br_id` int(10) DEFAULT NULL COMMENT 'รหัสสาขา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Co_id`, `Co_name`, `Co_year`, `Br_id`) VALUES
(1, 'หลักสูตรปี 2560', 2558, NULL),
(2, 'หลักสูตรปี 2561', 2559, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `de_compen`
--

CREATE TABLE `de_compen` (
  `De_id` int(20) NOT NULL COMMENT 'รหัสรายละเอียด',
  `De_date` date NOT NULL COMMENT 'วันที่สอนชดเชย',
  `De_period` varchar(10) NOT NULL COMMENT 'คาบที่เริ่ม',
  `De_start` time(6) NOT NULL COMMENT 'เวลาเริ่ม',
  `De_end` time(6) NOT NULL COMMENT 'เวลาสิ้นสุด',
  `De_status` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'สถานะ',
  `De_comment` varchar(100) NOT NULL DEFAULT 'un_check' COMMENT 'คอมเม้น',
  `Ro_id` int(10) DEFAULT NULL COMMENT 'รหัสห้องเรียน',
  `Cp_id` int(10) DEFAULT NULL COMMENT 'รหัสสอนชดเชย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `de_compen`
--

INSERT INTO `de_compen` (`De_id`, `De_date`, `De_period`, `De_start`, `De_end`, `De_status`, `De_comment`, `Ro_id`, `Cp_id`) VALUES
(1, '0000-00-00', '', '10:00:00.000000', '11:00:00.000000', 'yes', 'un_check', 1, 1),
(2, '0000-00-00', '', '06:00:00.000000', '07:00:00.000000', 'no', 'un_check', 1, 1),
(3, '0000-00-00', '', '00:00:00.000000', '00:00:00.000000', 'no', 'un_check', 0, 1),
(4, '0000-00-00', '', '00:00:00.000000', '00:00:00.000000', 'no', 'un_check', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Fa_id` int(20) NOT NULL,
  `Fa_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Fa_id`, `Fa_name`) VALUES
(1, 'บริหารธุรกิจ'),
(2, 'วิศวะ'),
(3, ' สถาปัตยกรรม');

-- --------------------------------------------------------

--
-- Table structure for table `grouplern`
--

CREATE TABLE `grouplern` (
  `Gr_id` int(20) NOT NULL,
  `Gr_name` varchar(10) NOT NULL,
  `Gr_num` int(10) NOT NULL,
  `Co_id` int(10) NOT NULL COMMENT 'รหสัหลักสูตร',
  `Le_id` int(10) NOT NULL COMMENT 'รหัสระดับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grouplern`
--

INSERT INTO `grouplern` (`Gr_id`, `Gr_name`, `Gr_num`, `Co_id`, `Le_id`) VALUES
(1, ' คธ.16221N', 30, 1, 3),
(2, ' IS16141N', 30, 1, 3),
(3, ' BIT15821N', 28, 2, 2),
(4, ' IS16142N', 22, 1, 3),
(5, ' IS16121N', 20, 1, 3),
(6, ' IS1612E', 25, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Le_id` int(20) NOT NULL,
  `Le_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`Le_id`, `Le_name`) VALUES
(1, 'ปวส.'),
(2, 'ป.ตรี '),
(3, ' ป.ตรี ภาคสมทบ');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `Of_id` int(20) NOT NULL,
  `Of_name` varchar(20) NOT NULL,
  `Of_last` varchar(20) NOT NULL,
  `Of_tel` int(10) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเจ้าหน้าที่(แอดมิน)';

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`Of_id`, `Of_name`, `Of_last`, `Of_tel`, `is_admin`, `username`, `password`) VALUES
(3, 'เจ้าหน้าที่', 'ทดสอบ', 11111111, 1, 'officer', '1234'),
(4, 'แอดมิน', 'ทดสอบ', 1222222, 0, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Ro_id` int(20) NOT NULL,
  `Ro_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Ro_id`, `Ro_name`) VALUES
(1, ' NB20066'),
(2, ' NB20063'),
(3, ' NB20052'),
(4, ' NB20072'),
(5, ' NB20055'),
(7, ' NB20053'),
(8, ' NB20107');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Su_id` int(20) NOT NULL,
  `Su_name` varchar(200) NOT NULL,
  `Su_git` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Su_id`, `Su_name`, `Su_git`) VALUES
(1, 'คอมพิวเตอร์และการบำรุงรักษา', 3),
(3, 'Basic Web Design and Development', 3),
(5, 'กิจกรรมเสริมหลักสูตร', 3),
(6, 'การโปรแกรมคอมพิวเตอร์ ', 3),
(8, 'Computer Mathematics', 3),
(9, 'Web Programming and Development', 3),
(11, 'Object-oriented System Analysis and Design', 2),
(13, 'Project Study in Information Technology', 3),
(15, 'Modern Multimedia Presentation Techniques', 3),
(17, 'Everyday Chinese Language', 3),
(18, 'Seminar in Information Management', 3),
(20, 'Principles for Mobile Programming ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Te_id` int(20) NOT NULL,
  `Te_name` varchar(20) NOT NULL,
  `Te_last` varchar(20) NOT NULL,
  `Te_Tel` int(10) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `Br_id` int(10) DEFAULT NULL COMMENT 'รหัสสาขา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Te_id`, `Te_name`, `Te_last`, `Te_Tel`, `is_admin`, `username`, `password`, `Br_id`) VALUES
(1, 'ทดสอบ', 'ทดสอบ', 111111111, 1, 'admin', '1234', NULL),
(6, 'นายไพฑูรย์', 'จันทร์เรือง', 123456789, 1, 'paitoon', '1234', 2),
(7, 'นางกัลยานี', 'นุ้ยฉิม', 123456789, 1, 'kullayanee', '1234', 2),
(8, 'นางจงกลนี', 'ลิ้มประภัสสร', 123456789, 1, 'chongkolnee', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `Ti_id` int(20) NOT NULL,
  `Ti_day` varchar(20) NOT NULL COMMENT 'วันในปฏิทิน สามารถซ้ำในคอลัมได้',
  `Ti_term` varchar(10) NOT NULL COMMENT 'ภาคการศึกษา/เทอม',
  `Ti_year` int(5) NOT NULL COMMENT 'ปีการศึกษา',
  `Ti_start` time(6) NOT NULL COMMENT 'เวลาเริ่มต้น',
  `Ti_end` time(6) NOT NULL COMMENT 'เวลาสิ้นสุด',
  `Ti_hour` int(5) NOT NULL COMMENT 'จำนวนชั่วโมง',
  `Te_id` int(10) DEFAULT NULL COMMENT 'รหัสอาจาร',
  `Su_id` int(10) DEFAULT NULL COMMENT 'รหัสวิชา',
  `Gr_id` int(10) DEFAULT NULL COMMENT 'รหัสกลุ่มเรียน',
  `Ro_id` int(10) DEFAULT NULL COMMENT 'รหัสห้องเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสอน';

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`Ti_id`, `Ti_day`, `Ti_term`, `Ti_year`, `Ti_start`, `Ti_end`, `Ti_hour`, `Te_id`, `Su_id`, `Gr_id`, `Ro_id`) VALUES
(1, 'จันทร์', '1', 2562, '13:00:00.000000', '17:00:00.000000', 4, 6, 1, 1, 1),
(5, 'อังคาร', '1', 2562, '08:00:00.000000', '10:00:00.000000', 2, 6, 3, 2, 2),
(7, 'อังคาร', '1', 2562, '10:00:00.000000', '12:00:00.000000', 2, 6, 3, 2, 2),
(9, 'อังคาร', '1', 2562, '15:00:00.000000', '17:00:00.000000', 2, 6, 5, 1, 1),
(10, 'พฤหัสบดี', '1', 2562, '08:00:00.000000', '12:00:00.000000', 4, 6, 3, 4, 2),
(11, 'พฤหัสบดี', '1', 2562, '13:00:00.000000', '17:00:00.000000', 4, 6, 6, 1, 3),
(12, 'ศุกร์', '1', 2562, '09:00:00.000000', '12:00:00.000000', 3, 6, 8, 3, 4),
(13, 'ศุกร์', '1', 2562, '13:00:00.000000', '17:00:00.000000', 4, 6, 9, 6, 5),
(14, 'ศุกร์', '1', 2562, '17:00:00.000000', '21:00:00.000000', 4, 6, 9, 6, 2),
(15, 'ศุกร์', '1 ', 2562, '00:00:00.000000', '00:00:00.000000', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Br_id`);

--
-- Indexes for table `compen`
--
ALTER TABLE `compen`
  ADD PRIMARY KEY (`Cp_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Co_id`);

--
-- Indexes for table `de_compen`
--
ALTER TABLE `de_compen`
  ADD PRIMARY KEY (`De_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Fa_id`);

--
-- Indexes for table `grouplern`
--
ALTER TABLE `grouplern`
  ADD PRIMARY KEY (`Gr_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`Le_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`Of_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Ro_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Su_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Te_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`Ti_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Br_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `compen`
--
ALTER TABLE `compen`
  MODIFY `Cp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Co_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `de_compen`
--
ALTER TABLE `de_compen`
  MODIFY `De_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียด', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Fa_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grouplern`
--
ALTER TABLE `grouplern`
  MODIFY `Gr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Le_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `Of_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Ro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Su_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Te_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `Ti_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
