-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 02:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_freshmenstudent_credentials`
--

CREATE TABLE `admission_freshmenstudent_credentials` (
  `freshmen_credentials_id` int(11) NOT NULL,
  `sisnum` int(11) NOT NULL,
  `form_137A` tinyint(1) NOT NULL,
  `form_138A` tinyint(1) NOT NULL,
  `GMC` tinyint(1) NOT NULL,
  `TRF` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_freshmenstudent_credentials`
--

INSERT INTO `admission_freshmenstudent_credentials` (`freshmen_credentials_id`, `sisnum`, `form_137A`, `form_138A`, `GMC`, `TRF`) VALUES
(4, 2, 1, 1, 1, 1),
(5, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admission_student_musthave`
--

CREATE TABLE `admission_student_musthave` (
  `admission_student_musthave_id` int(11) NOT NULL,
  `sisnum` int(11) NOT NULL,
  `txt` tinyint(1) NOT NULL,
  `oxo` tinyint(1) NOT NULL,
  `barangay_clearance` tinyint(1) NOT NULL,
  `PBC` tinyint(1) NOT NULL,
  `admission_test` tinyint(1) NOT NULL,
  `PMC` tinyint(1) NOT NULL,
  `LBE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_student_musthave`
--

INSERT INTO `admission_student_musthave` (`admission_student_musthave_id`, `sisnum`, `txt`, `oxo`, `barangay_clearance`, `PBC`, `admission_test`, `PMC`, `LBE`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 0, 0, 0, 0, 0, 0),
(4, 3, 1, 0, 0, 0, 0, 0, 0),
(5, 3, 1, 0, 0, 0, 0, 0, 0),
(6, 3, 1, 0, 0, 0, 0, 0, 0),
(12, 11, 1, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admission_student_score`
--

CREATE TABLE `admission_student_score` (
  `score_id` int(11) NOT NULL,
  `sisnum` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `filipino` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_student_score`
--

INSERT INTO `admission_student_score` (`score_id`, `sisnum`, `english`, `filipino`, `math`, `science`, `total_score`) VALUES
(1, 1, 100, 100, 100, 100, 100),
(2, 2, 100, 100, 100, 100, 100),
(3, 3, 100, 100, 100, 100, 100),
(9, 11, 20, 20, 20, 20, 100);

-- --------------------------------------------------------

--
-- Table structure for table `admission_transfereestudent_credentials`
--

CREATE TABLE `admission_transfereestudent_credentials` (
  `transferee_credentials_id` int(11) NOT NULL,
  `sisnum` int(11) NOT NULL,
  `certificate_of_grades` tinyint(1) NOT NULL,
  `tor` tinyint(1) NOT NULL,
  `hd` tinyint(1) NOT NULL,
  `tgmc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_transfereestudent_credentials`
--

INSERT INTO `admission_transfereestudent_credentials` (`transferee_credentials_id`, `sisnum`, `certificate_of_grades`, `tor`, `hd`, `tgmc`) VALUES
(3, 11, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chosen_schedule`
--

CREATE TABLE `chosen_schedule` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chosen_schedule`
--

INSERT INTO `chosen_schedule` (`id`, `student_number`, `sched_id`, `school_year`, `semester`) VALUES
(8, '2019-06-00001', 16, '2020-2021', 'First Semester'),
(9, '2019-06-00001', 20, '2020-2021', 'First Semester'),
(10, '2019-06-00001', 21, '2020-2021', 'First Semester'),
(11, '2019-06-00001', 28, '2020-2021', 'First Semester'),
(12, '2019-06-00001', 43, '2020-2021', 'First Semester'),
(13, '2019-06-00001', 46, '2020-2021', 'First Semester'),
(14, '2019-06-00001', 42, '2020-2021', 'First Semester'),
(15, '2019-06-00001', 13, '2020-2021', 'First Semester'),
(23, '2016-06-06601', 5, '2020-2021', 'First Semester'),
(24, '2016-06-06601', 6, '2020-2021', 'First Semester'),
(25, '2016-06-06601', 7, '2020-2021', 'First Semester'),
(26, '2016-06-06601', 11, '2020-2021', 'First Semester'),
(27, '2016-06-06601', 12, '2020-2021', 'First Semester'),
(28, '2016-06-06601', 13, '2020-2021', 'First Semester'),
(29, '2016-06-06601', 14, '2020-2021', 'First Semester');

-- --------------------------------------------------------

--
-- Table structure for table `class_record`
--

CREATE TABLE `class_record` (
  `id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `downloaded` int(11) NOT NULL,
  `submitted` int(11) NOT NULL,
  `excel_file` text NOT NULL,
  `submitted_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_record`
--

INSERT INTO `class_record` (`id`, `sched_id`, `downloaded`, `submitted`, `excel_file`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, '', '0000-00-00', '2020-07-15 19:35:06', '2020-07-15 19:35:06'),
(2, 2, 0, 0, '', '0000-00-00', '2020-07-15 19:35:06', '2020-07-15 19:35:06'),
(3, 3, 0, 0, '', '0000-00-00', '2020-07-15 19:35:06', '2020-07-15 19:35:06'),
(4, 8, 0, 0, '', '0000-00-00', '2020-07-15 19:35:06', '2020-07-15 19:35:06'),
(5, 9, 0, 0, '', '0000-00-00', '2020-07-15 19:35:06', '2020-07-15 19:35:06'),
(6, 10, 0, 1, 'ITS 401-LEAD 8.xlsx', '2020-07-15', '2020-07-15 19:35:06', '2020-07-15 21:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_abbreviation` varchar(100) NOT NULL,
  `course_year` varchar(20) NOT NULL,
  `course_major` varchar(100) NOT NULL,
  `use_lab` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_abbreviation`, `course_year`, `course_major`, `use_lab`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science in Information Technology', 'BSIT', '4', 'No Major', 'Yes', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(2, 'Bachelor of Science in Accountancy', 'BSA', '5', 'No Major', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(3, 'Bachelor of Science in Entrepreneurship', 'BSEntrep', '4', 'No Major', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(4, 'Bachelor of Elementary Education', 'BEEd', '4', 'No Major', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(5, 'Bachelor of Science in Business Administration', 'BSBA', '4', 'Marketing Management', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(6, 'Bachelor of Science in Business Administration', 'BSBA', '4', 'Human Resources Management', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(7, 'Bachelor of Secondary Education', 'BSEd', '4', 'English', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(8, 'Bachelor of Secondary Education', 'BSEd', '4', 'Filipino', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(9, 'Bachelor of Secondary Education', 'BSEd', '4', 'Social Studies', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(10, 'Bachelor of Secondary Education', 'BSEd', '4', 'School Physical Education', 'No', 'Active', '2020-05-29 16:00:00', '2020-05-29 16:00:00'),
(11, 'Bachelor of Science In Engineering', 'BSE', '4', 'No Major', 'No', 'Inactive', '2020-06-21 16:00:00', '2020-06-21 16:00:00'),
(12, 'Bachelor of Secondary Education', 'BSEd', '4', 'Math', '', 'Inactive', '2020-06-21 16:00:00', '2020-06-21 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `credited_subject`
--

CREATE TABLE `credited_subject` (
  `cs_id` int(11) NOT NULL,
  `shift_id` varchar(20) NOT NULL,
  `gr_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `curriculum_from` varchar(100) NOT NULL,
  `curriculum_to` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credited_subject`
--

INSERT INTO `credited_subject` (`cs_id`, `shift_id`, `gr_id`, `subj_id`, `curriculum_from`, `curriculum_to`, `status`, `date`) VALUES
(6, '1', 10, 19, 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Credited', '2020-06-22 06:12:44'),
(7, '1', 34, 28, 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Credited', '2020-06-22 06:12:44'),
(8, '1', 142, 34, 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Credited', '2020-06-22 06:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `current_fees`
--

CREATE TABLE `current_fees` (
  `cf_id` int(250) NOT NULL,
  `miscellaneous` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `date_implemented` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_fees`
--

INSERT INTO `current_fees` (`cf_id`, `miscellaneous`, `price`, `date_implemented`) VALUES
(1, 'Community Extension Program', 50, '2020-04-23 14:53:11'),
(2, 'Computer Lab. Fee 1 (All Students)', 800, '2020-04-23 14:53:46'),
(3, 'Energy / Water Fee', 150, '2020-04-23 14:54:03'),
(4, 'Student Information System Fee', 50, '2020-04-23 14:54:35'),
(5, 'Research & Publication', 50, '2020-04-23 14:54:59'),
(6, 'Library Fee', 200, '2020-04-23 14:55:09'),
(7, 'Guidance Councelling Student Affair', 50, '2020-04-23 14:55:35'),
(8, 'Registration', 50, '2020-04-23 14:55:48'),
(9, 'Sports Development', 50, '2020-04-23 14:56:05'),
(10, 'ID', 50, '2020-04-23 14:56:13'),
(11, 'Development', 100, '2020-04-23 14:56:32'),
(12, 'Postal', 50, '2020-04-23 14:56:44'),
(13, 'Medical And Dental', 200, '2020-04-23 14:57:05'),
(14, 'Computer Lab. Fee 2 (Additional for BSIT Student)', 900, '2020-04-23 14:57:50'),
(15, 'Handbook', 50, '2020-06-06 15:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `curriculum_title` varchar(100) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculum_title`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
('K-12 Aligned Curiculum Effective 2018-2019', '10', 'Inactive', '2020-02-23 20:00:54', '2020-05-30 09:18:28'),
('K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', '6', 'Inactive', '2020-02-23 17:58:12', '2020-05-30 09:04:19'),
('K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', '3', 'Inactive', '2020-02-27 17:43:20', '2020-05-30 09:20:01'),
('K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', '7', 'Inactive', '2020-02-27 19:58:19', '2020-05-30 09:20:27'),
('K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', '5', 'Inactive', '2020-02-27 18:31:00', '2020-05-30 09:04:53'),
('K-12 Aligned Curriculum for AY 2018-2019', '1', 'Active', '2020-02-01 12:29:50', '2020-05-30 09:03:30'),
('Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', '1', 'Active', '2020-01-26 12:22:57', '2020-05-30 15:05:15'),
('Revised Curriculum Effective 2014-2015', '10', 'Inactive', '2020-02-23 18:38:26', '2020-05-30 09:18:32'),
('Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', '3', 'Inactive', '2020-02-27 16:10:51', '2020-05-30 09:20:10'),
('Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', '6', 'Inactive', '2020-02-23 16:00:59', '2020-05-30 09:05:29'),
('Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', '5', 'Inactive', '2020-02-27 18:57:56', '2020-05-30 09:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `entrance_exam`
--

CREATE TABLE `entrance_exam` (
  `e_id` int(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `official_receipt` int(250) NOT NULL,
  `school_yr` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entrance_exam_permit`
--

CREATE TABLE `entrance_exam_permit` (
  `ee_id` int(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `date_implemented` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrance_exam_permit`
--

INSERT INTO `entrance_exam_permit` (`ee_id`, `description`, `price`, `date_implemented`) VALUES
(1, 'Test Permit', 200, '2020-02-27 16:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_user`
--

CREATE TABLE `faculty_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_user`
--

INSERT INTO `faculty_user` (`id`, `firstname`, `lastname`, `middlename`, `contact_number`, `email`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'faculty1', 'faculty1', 'faculty1', '+639553216689', '', 'faculty1', '$argon2i$v=19$m=1024,t=2,p=2$VURvQVkyTUkxSFhHbHVqbA$bVCfbXlPH+0Mu2FRh+nn/7C4PkNUN8+dinBN0ug2Xuc', 0, '2020-03-09 06:16:00', '2020-06-22 05:14:15'),
(2, 'Modesta', 'Bechtelar', 'Hand', '+639558506161', '', 'modest02', '$argon2i$v=19$m=1024,t=2,p=2$RnZtSXRnTXdCc004TU9zUg$pJj7CC0Clrgh4NYkuUxUJFfbKykypS53TLKb716Uq68', 1, '2020-05-23 04:02:34', '2020-06-22 05:13:57'),
(3, 'Winfield', 'O\'Hara', 'Pollich', '+639418058691', '', 'winwin60', '$argon2i$v=19$m=1024,t=2,p=2$RVA3bGNzbTJZS0RqR1RwSQ$S8hYsoT/Y7g4C4cOE7b+H+pX7Y7vf+n28N40Qhf04Jw', 1, '2020-05-23 04:03:50', '2020-06-22 05:13:58'),
(4, 'Edmund', 'Stokes', 'Bins', '+639092532659', '', 'bigEd00', '$argon2i$v=19$m=1024,t=2,p=2$OHhxOUxHQUpQRklDZGxiSg$JZQq/WHAz0TysU6hKpgSMzumeHk5NdnqCZYPKvg+znI', 1, '2020-05-23 04:06:56', '2020-06-22 05:14:00'),
(5, 'John Alfred', 'Serraon', 'Santillan', '+639095563366', 'serraon.johnalfred@gmail.com', 'johnalfred02323', '$argon2i$v=19$m=1024,t=2,p=2$S0dvQVBzYzFiNkkuSUp1UQ$YaBON3HFWvZNbhOT4br/GE6UfhQ22uLeJUMGxoRbOPI', 1, '2020-06-10 10:10:23', '2020-07-09 13:58:37'),
(16, 'qwe', 'qwe', 'qwe', '09565656565', 'villainy123123@gmail.com', 'johnalfred1111', '$argon2i$v=19$m=1024,t=2,p=2$Q2twcEZHNFhZVFV0RWNmOA$2JVaCa0leqHvtPd2I2miVxNxXzHu1d7HcyaO2SGJqNM', 0, '2020-07-03 15:11:35', '2020-07-03 15:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `gradereport_config`
--

CREATE TABLE `gradereport_config` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradereport_config`
--

INSERT INTO `gradereport_config` (`id`, `name`, `position`, `role`, `status`) VALUES
(28, 'MR. ISOM S. SATTERFIELD', 'Registrar', 'Receiver/Submitted to', 1),
(29, 'MS. MAUREEN T. RENNER', 'Dean, Academic Affairs', 'Verification', 1),
(30, 'MR. ISOM S. SATTERFIELD', 'Registrar', 'grade slip signee', 3);

-- --------------------------------------------------------

--
-- Table structure for table `grade_report`
--

CREATE TABLE `grade_report` (
  `student_number` varchar(100) NOT NULL,
  `cr_id` int(11) NOT NULL,
  `midterm_grade` varchar(100) NOT NULL,
  `final_grade` varchar(100) NOT NULL,
  `tfg` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_report`
--

INSERT INTO `grade_report` (`student_number`, `cr_id`, `midterm_grade`, `final_grade`, `tfg`, `remarks`, `submitted_at`) VALUES
('2016-06-06601', 6, '83.70', '83.94', '84.17', 'SATISFACTORY', '2020-07-15 21:06:53'),
('2016-05-06382', 6, '83.97', '83.10', '82.23', 'SATISFACTORY', '2020-07-15 21:06:53'),
('2016-05-06199', 6, '89.71', '88.88', '88.05', 'GOOD', '2020-07-15 21:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `grade_viewing_code`
--

CREATE TABLE `grade_viewing_code` (
  `id` int(11) NOT NULL,
  `student_number` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_viewing_code`
--

INSERT INTO `grade_viewing_code` (`id`, `student_number`, `code`, `status`, `expiration_date`) VALUES
(1, '2016-06-06601', '7DVWER', 1, '2020-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `message_for` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `seen` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `title`, `message`, `message_for`, `user_type`, `seen`, `created_at`) VALUES
(1, 325, 'Faculty Password Change', 'Faculty <strong>John Alfred Serraon</strong> changed his/her password via forgot password in faculty webpage. ', 'Super Admin', 'faculty_user', 1, '2020-07-09 10:50:47'),
(2, 5, 'Faculty Password Change', 'Faculty User <strong>John Alfred Serraon</strong> changed his/her password via forgot password in faculty webpage.', 'Super Admin', 'faculty_user', 1, '2020-07-09 13:57:08'),
(3, 5, 'Faculty Password Change', 'Faculty User <strong>John Alfred Serraon</strong> changed his/her password via forgot password in faculty webpage.', 'Super Admin', 'faculty_user', 1, '2020-07-09 13:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `other_fees`
--

CREATE TABLE `other_fees` (
  `ofs_id` int(250) NOT NULL,
  `ItemCode` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `date_implemented` timestamp NOT NULL DEFAULT current_timestamp(),
  `latest_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_fees`
--

INSERT INTO `other_fees` (`ofs_id`, `ItemCode`, `description`, `price`, `date_implemented`, `latest_updated`) VALUES
(1, 'ITC-ID', 'Student ID Lace', 45, '2020-04-23 15:06:27', '2020-05-04 08:39:15'),
(2, 'ITC-S', 'Skirt', 325, '2020-04-23 15:06:51', '2020-04-23 15:06:51'),
(3, 'ITC-P', 'Polo', 400, '2020-04-23 15:07:09', '2020-04-23 15:07:09'),
(4, 'ITC-PA', 'Pants', 450, '2020-04-23 15:07:34', '2020-04-23 15:07:34'),
(5, 'ITC-N', 'Necktie', 65, '2020-04-23 15:07:58', '2020-04-23 15:07:58'),
(6, 'ITC-B', 'Blouse', 325, '2020-04-23 15:08:24', '2020-04-23 15:08:24'),
(7, 'ITC-ID', 'Admin Faculty', 30, '2020-04-23 15:08:47', '2020-04-23 15:08:47'),
(8, 'ITC-COM', 'Certificate of Matriculation', 50, '2020-04-23 15:09:42', '2020-04-23 15:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(250) NOT NULL,
  `student_number` varchar(250) NOT NULL,
  `official_receipt` int(250) NOT NULL,
  `promissory_note` int(10) NOT NULL,
  `cash_rendered` int(250) NOT NULL,
  `balance` int(250) NOT NULL,
  `discount` int(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `discounted` int(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `total_cash` int(250) NOT NULL,
  `cashier` varchar(250) NOT NULL,
  `schoolyr` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `req_down` int(20) NOT NULL,
  `midterm` int(250) NOT NULL,
  `year_level` varchar(11) NOT NULL,
  `enrolled_date` date NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `md` int(11) NOT NULL,
  `fd` int(11) NOT NULL,
  `petition` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `student_number`, `official_receipt`, `promissory_note`, `cash_rendered`, `balance`, `discount`, `amount`, `discounted`, `status`, `total_cash`, `cashier`, `schoolyr`, `semester`, `req_down`, `midterm`, `year_level`, `enrolled_date`, `date_paid`, `md`, `fd`, `petition`) VALUES
(9, '2016-06-06601', 2, 0, 1400, 0, 0, 4000, 0, 'Enrolled', 4000, 'cashier', '2020-2021', 'Second Semester', 1600, 2800, '4th yr', '2020-08-26', '2020-08-27 15:19:14', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_com`
--

CREATE TABLE `payment_com` (
  `paycom` int(250) NOT NULL,
  `student_number` varchar(250) NOT NULL,
  `scholar` varchar(250) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tuition_fees` int(250) NOT NULL,
  `totalunits` int(250) NOT NULL,
  `perunits` int(250) NOT NULL,
  `total_units` int(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `discount` int(250) NOT NULL,
  `total_discount` int(250) NOT NULL,
  `schoolyr` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `date_enrolled` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_com`
--

INSERT INTO `payment_com` (`paycom`, `student_number`, `scholar`, `year_level`, `status`, `tuition_fees`, `totalunits`, `perunits`, `total_units`, `amount`, `discount`, `total_discount`, `schoolyr`, `semester`, `date_enrolled`) VALUES
(0, '2016-06-06601', 'Partial Scholar', '4th yr', 'Regular', 2800, 8, 150, 1200, 4000, 0, 0, '2020-2021', 'Second Semester', '2020-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `petition_price`
--

CREATE TABLE `petition_price` (
  `petid` int(250) NOT NULL,
  `subj_id` int(250) NOT NULL,
  `subject_code` varchar(250) NOT NULL,
  `no_student` int(250) NOT NULL,
  `price` int(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `school_year` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `date_submit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petition_price`
--

INSERT INTO `petition_price` (`petid`, `subj_id`, `subject_code`, `no_student`, `price`, `amount`, `school_year`, `semester`, `date_submit`) VALUES
(2, 67, 'LEAD 1', 2, 1000, 500, '2020-2021', 'First Semester', '2020-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `petition_request`
--

CREATE TABLE `petition_request` (
  `pet_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sched_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petition_request`
--

INSERT INTO `petition_request` (`pet_id`, `subj_id`, `subject_code`, `student_number`, `contact_number`, `school_year`, `semester`, `status`, `sched_id`) VALUES
(5, 17, 'DSTRUCT', '2016-05-06290', '09876543212', '2020-2021', 'First Semester', 'Approved', 83),
(8, 75, 'LEAD 1', '2016-05-06290', '09567456812', '2020-2021', 'First Semester', 'Requested', NULL),
(9, 75, 'LEAD 1', '2016-05-06382', '09004232333', '2020-2021', 'First Semester', 'Requested', NULL),
(22, 19, 'ENG 1', '2016-06-06601', '09093440116', '2020-2021', 'First Semester', 'Requested', NULL),
(24, 18, 'ECO 1', '2016-06-06601', '09093440116', '2020-2021', 'First Semester', 'Approved', 82),
(25, 17, 'DSTRUCT', '2016-06-06601', '09093440116', '2020-2021', 'First Semester', 'Approved', 83),
(36, 0, 'LEAD 1', '2016-06-06601', '', '2020-2021', 'First Semester', 'Requested', NULL),
(37, 0, 'FIL 1', '2016-06-06601', '', '2020-2021', 'First Semester', 'Requested', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `subj_id` varchar(20) NOT NULL,
  `lecture_day` varchar(20) NOT NULL,
  `lecturehr_from` time NOT NULL,
  `lecturehr_to` time NOT NULL,
  `lec_room` varchar(20) NOT NULL,
  `laboratory_day` varchar(20) DEFAULT NULL,
  `laboratoryhr_from` time DEFAULT NULL,
  `laboratoryhr_to` time DEFAULT NULL,
  `lab_room` varchar(20) DEFAULT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `max_student` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `section`, `subj_id`, `lecture_day`, `lecturehr_from`, `lecturehr_to`, `lec_room`, `laboratory_day`, `laboratoryhr_from`, `laboratoryhr_to`, `lab_room`, `faculty_id`, `school_year`, `semester`, `max_student`) VALUES
(1, 'ITS 401', '52', 'Monday', '08:00:00', '10:00:00', '5G', 'Thursday', '10:30:00', '13:30:00', 'Lab 2', '2', '2020-2021', 'First Semester', 30),
(2, 'ITS 401', '62', 'Tuesday', '09:00:00', '12:00:00', '5I', 'Friday', '14:30:00', '17:00:00', 'Lab 2', '2', '2020-2021', 'First Semester', 40),
(3, 'ITS 401', '73', 'Thursday', '16:00:00', '18:00:00', '3B', '', '00:00:00', '00:00:00', '', '2', '2020-2021', 'First Semester', 40),
(5, 'ITS 402', '52', 'Saturday', '08:00:00', '10:00:00', '5j', 'Saturday', '10:30:00', '13:30:00', 'lab 2', '30', '2020-2021', 'First Semester', 30),
(6, 'ITS 402', '62', 'Saturday', '14:00:00', '17:00:00', 'TBA', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(7, 'ITS 402', '73', 'Saturday', '18:00:00', '19:30:00', '3i', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(8, 'ITS 401', '53', 'Friday', '08:00:00', '10:00:00', '5K', 'Friday', '10:30:00', '13:30:00', 'Lab 2', '2', '2020-2021', 'Second Semester', 30),
(9, 'ITS 401', '61', 'Friday', '14:00:00', '17:00:00', '5J', '', '00:00:00', '00:00:00', '', '2', '2020-2021', 'Second Semester', 40),
(10, 'ITS 401', '74', 'Friday', '18:00:00', '19:30:00', '3J', '', '00:00:00', '00:00:00', '', '2', '2020-2021', 'Second Semester', 40),
(11, 'ITS-101', '19', 'Wednesday', '07:30:00', '10:30:00', '5B', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(12, 'ITS-101', '25', 'Monday', '07:30:00', '10:00:00', '5L', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(13, 'ITS-101', '28', 'Tuesday', '07:30:00', '10:30:00', '5J', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 10),
(14, 'ITS-101', '34', 'Monday', '10:30:00', '13:30:00', '5I', 'Tuesday', '13:30:00', '15:00:00', 'Lab 1', '30', '2020-2021', 'First Semester', 30),
(15, 'ITS-101', '35', 'Tuesday', '14:00:00', '16:00:00', '5K', 'Monday', '14:00:00', '16:00:00', 'Lab 2', '30', '2020-2021', 'First Semester', 30),
(16, 'ITS-101', '67', 'Wednesday', '10:30:00', '12:00:00', '5F', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(17, 'ITS-101', '86', 'Wednesday', '13:00:00', '15:00:00', '5L', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(18, 'ITS-101', '94', 'Thursday', '09:00:00', '12:00:00', '5F', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(19, 'ITS-101', '100', 'Thursday', '14:30:00', '16:30:00', 'PE Room', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(20, 'ITS-101', '114', 'Monday', '13:00:00', '15:30:00', '5B', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(21, 'ITS-101', '121', 'Thursday', '16:30:00', '19:30:00', '5J', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(22, 'ITS-102', '19', 'Saturday', '13:00:00', '15:00:00', '5L', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(23, 'ITS-102', '25', 'Thursday', '10:30:00', '13:30:00', '5J', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(24, 'ITS-102', '28', 'Wednesday', '07:30:00', '10:30:00', '5A', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(25, 'ITS-102', '34', 'Monday', '07:30:00', '10:30:00', '5K', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(26, 'ITS-102', '35', 'Tuesday', '13:30:00', '16:30:00', '5L', 'Saturday', '16:30:00', '19:30:00', '5J', '31', '2020-2021', 'First Semester', 30),
(27, 'ITS-102', '67', 'Saturday', '07:30:00', '09:00:00', '5M', 'Tuesday', '16:30:00', '19:30:00', '5I', '30', '2020-2021', 'First Semester', 30),
(28, 'ITS-102', '86', 'Thursday', '07:30:00', '10:30:00', '5L', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(29, 'ITS-102', '94', 'Monday', '10:30:00', '13:30:00', '5K', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(30, 'ITS-102', '100', 'Tuesday', '09:30:00', '11:30:00', '5J', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(31, 'ITS-102', '114', 'Wednesday', '10:30:00', '13:30:00', '5A', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(32, 'ITS-102', '121', 'Thursday', '13:30:00', '16:30:00', '5E', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(33, 'ITS-201', '21', 'Saturday', '07:30:00', '13:30:00', '5G', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(34, 'ITS-201', '39', 'Saturday', '13:30:00', '16:30:00', '5A', 'Saturday', '17:00:00', '19:00:00', 'Lab 3', '31', '2020-2021', 'First Semester', 30),
(35, 'ITS-201', '40', 'Friday', '08:00:00', '10:30:00', '5G', 'Friday', '10:30:00', '13:30:00', 'Lab 3', '31', '2020-2021', 'First Semester', 30),
(36, 'ITS-201', '41', 'Friday', '13:30:00', '16:30:00', '5F', 'Friday', '17:00:00', '19:00:00', 'Lab 3', '31', '2020-2021', 'First Semester', 30),
(37, 'ITS-201', '42', 'Monday', '10:30:00', '13:30:00', '5A', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(38, 'ITS-201', '43', 'Monday', '14:30:00', '17:30:00', '5G', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(39, 'ITS-201', '69', 'Thursday', '15:00:00', '16:30:00', '5E', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(40, 'ITS-201', '88', 'Thursday', '16:30:00', '19:30:00', '5A', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(41, 'ITS-201', '102', 'Tuesday', '07:30:00', '09:30:00', '6th flr', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(42, 'ITS-201', '109', 'Saturday', '10:30:00', '13:30:00', 'Sci. lab', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(43, 'ITS-201', '122', 'Tuesday', '10:30:00', '13:30:00', '5G', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(44, 'ITS-301', '18', 'Monday', '12:00:00', '15:00:00', '5E', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(45, 'ITS-301', '47', 'Tuesday', '08:00:00', '10:00:00', '5C', 'Friday', '08:00:00', '10:00:00', 'Lab 1', '31', '2020-2021', 'First Semester', 30),
(46, 'ITS-301', '48', 'Friday', '14:00:00', '17:00:00', '5K', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'First Semester', 40),
(47, 'ITS-301', '49', 'Wednesday', '08:00:00', '10:00:00', '5B', 'Saturday', '07:30:00', '10:30:00', 'Lab 3', '31', '2020-2021', 'First Semester', 30),
(48, 'ITS-301', '55', 'Saturday', '14:00:00', '16:00:00', '5L', 'Saturday', '16:30:00', '19:30:00', 'Lab 1', '31', '2020-2021', 'First Semester', 30),
(49, 'ITS-301', '56', 'Wednesday', '10:30:00', '13:30:00', '5J', 'Saturday', '10:30:00', '01:30:00', 'Lab 4', '31', '2020-2021', 'First Semester', 30),
(50, 'ITS-301', '57', 'Tuesday', '11:00:00', '13:00:00', '5B', 'Friday', '10:30:00', '13:30:00', 'Lab 3', '31', '2020-2021', 'First Semester', 30),
(51, 'ITS-301', '71', 'Tuesday', '13:30:00', '15:00:00', '5A', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(52, 'ITS-301', '83', 'Monday', '07:30:00', '10:30:00', '5B', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(53, 'ITS-301', '50', 'Saturday', '07:30:00', '10:30:00', '5J', 'Saturday', '11:00:00', '13:00:00', 'Lab 1', '31', '2020-2021', 'Second Semester', 30),
(54, 'ITS-301', '51', 'Friday', '15:00:00', '18:00:00', '5N', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(55, 'ITS-301', '58', 'Wednesday', '13:30:00', '16:30:00', 'Lab 2', 'Wednesday', '17:00:00', '19:00:00', 'Lab 2', '31', '2020-2021', 'Second Semester', 30),
(56, 'ITS-301', '59', 'Saturday', '13:30:00', '16:30:00', '5M', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Second Semester', 40),
(57, 'ITS-301', '60', 'Friday', '11:30:00', '14:00:00', 'Lab 1', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Second Semester', 30),
(58, 'ITS-301', '72', 'Thursday', '13:30:00', '15:00:00', '5L', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(59, 'ITS-301', '84', 'Friday', '07:30:00', '10:00:00', '5L', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(60, 'ITS-301', '117', 'Friday', '15:00:00', '18:00:00', '5L', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(61, 'ITS-201', '3', 'Monday', '17:30:00', '20:30:00', '5C', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(62, 'ITS-201', '22', 'Monday', '13:30:00', '16:30:00', '5B', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(63, 'ITS-201', '44', 'Tuesday', '17:30:00', '19:30:00', 'Lab 3', 'Wednesday', '16:30:00', '19:30:00', 'Lab 3', '31', '2020-2021', 'Second Semester', 30),
(64, 'ITS-201', '45', 'Saturday', '07:30:00', '10:30:00', '5A', 'Saturday', '11:00:00', '13:00:00', 'Lab 2', '31', '2020-2021', 'Second Semester', 30),
(65, 'ITS-201', '46', 'Saturday', '13:30:00', '16:30:00', '5B', 'Saturday', '17:00:00', '19:00:00', 'Lab 3', '31', '2020-2021', 'Second Semester', 30),
(66, 'ITS-201', '54', 'Tuesday', '14:00:00', '17:00:00', 'TESDA', 'Wednesday', '14:00:00', '16:00:00', 'TESDA', '31', '2020-2021', 'Second Semester', 40),
(67, 'ITS-201', '70', 'Wednesday', '07:30:00', '09:00:00', '5K', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(68, 'ITS-201', '90', 'Thursday', '16:30:00', '19:00:00', '5D', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(69, 'ITS-201', '103', 'Thursday', '13:30:00', '15:30:00', '6th flr', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Second Semester', 40),
(70, 'ITS-201', '110', 'Tuesday', '19:30:00', '21:00:00', '5A', 'Thursday', '19:30:00', '21:00:00', '5A', '30', '2020-2021', 'Second Semester', 40),
(71, 'ITS-101', '20', 'Monday', '10:30:00', '12:00:00', '5J', 'Thursday', '10:30:00', '12:00:00', '5J', '30', '2020-2021', 'Second Semester', 40),
(72, 'ITS-101', '26', 'Monday', '09:00:00', '10:30:00', '5J', 'Thursday', '09:00:00', '10:30:00', '5J', '30', '2020-2021', 'Second Semester', 40),
(73, 'ITS-101', '36', 'Thursday', '14:00:00', '16:00:00', '5K', 'Thursday', '16:30:00', '19:30:00', 'Lab 2', '31', '2020-2021', 'Second Semester', 30),
(74, 'ITS-101', '37', 'Monday', '13:30:00', '16:30:00', '5L', 'Monday', '17:00:00', '19:00:00', 'Lab 2', '31', '2020-2021', 'Second Semester', 30),
(75, 'ITS-101', '38', 'Tuesday', '13:30:00', '16:30:00', '5A', 'Tuesday', '17:00:00', '19:00:00', 'Lab 2', '31', '2020-2021', 'Second Semester', 30),
(76, 'ITS-101', '68', 'Tuesday', '07:30:00', '09:00:00', '5F', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(77, 'ITS-101', '85', 'Saturday', '10:30:00', '13:30:00', '5B', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(78, 'ITS-101', '87', 'Saturday', '07:30:00', '10:30:00', '5B', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Second Semester', 40),
(79, 'ITS-101', '91', 'Saturday', '16:30:00', '19:30:00', 'Sci. Lab', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Second Semester', 40),
(80, 'ITS-101', '95', 'Tuesday', '09:00:00', '12:00:00', '5F', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(81, 'ITS-101', '101', 'Saturday', '14:30:00', '16:30:00', 'PE Room', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(82, 'Petition', '18', 'Monday', '07:30:00', '09:00:00', '3G', 'Tuesday', '09:00:00', '10:30:00', '5j', '30', '2020-2021', 'First Semester', 40),
(83, 'Petition', '17', 'Monday', '07:30:00', '10:30:00', '5j', 'Monday', '11:00:00', '13:30:00', 'Lab 3', '31', '2020-2021', 'First Semester', NULL),
(84, 'IT Petition', '67', 'Monday', '07:30:00', '09:00:00', '3E', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Summer', 40),
(85, 'IT Petition', '17', 'Monday', '07:30:00', '10:30:00', 'Lab 2', 'Tuesday', '11:00:00', '13:00:00', '5J', '30', '2020-2021', 'Summer', 30),
(86, 'IT 105', '34', 'Monday', '13:00:00', '15:00:00', '5J', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(87, 'IT 105', '35', 'Tuesday', '08:00:00', '10:00:00', '5E', 'Tuesday', '10:30:00', '13:30:00', 'LAB 3', '30', '2020-2021', 'First Semester', 30),
(88, 'ITS-403', '52', 'Friday', '07:30:00', '10:30:00', '5J', 'Friday', '11:00:00', '13:00:00', 'LAB 2', '30', '2020-2021', 'First Semester', 30),
(89, 'ITS-403', '62', 'Friday', '13:00:00', '15:00:00', '5I', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(90, 'ITS-403', '73', 'Friday', '16:30:00', '18:00:00', '3H', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'First Semester', 40),
(91, 'BAHR-401', '198', 'Monday', '13:30:00', '15:00:00', '3A', 'Wednesday', '13:30:00', '15:00:00', '3A', '30', '2020-2021', 'Second Semester', 40),
(92, 'BAHR-401', '199', 'Tuesday', '10:30:00', '13:30:00', '3I', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(93, 'BAHR-401', '200', 'Wednesday', '07:30:00', '10:30:00', '3B', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(94, 'BAMM-401', '655', 'Monday', '07:30:00', '10:30:00', '4J', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(95, 'BAMM-401', '656', 'Tuesday', '10:30:00', '13:30:00', '4A', '', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Second Semester', 40),
(96, 'BAMM-401', '657', 'Monday', '08:00:00', '11:00:00', '4E', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Second Semester', 40),
(97, 'IT 101', '655', 'Monday', '00:00:00', '00:00:00', '', 'Tuesday', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Summer', 40),
(98, 'IT 101', '656', 'Monday', '00:00:00', '00:00:00', '', 'Monday', '00:00:00', '00:00:00', '', '31', '2020-2021', 'Summer', 40),
(99, 'IT 101', '657', 'Tuesday', '00:00:00', '00:00:00', '', '', '00:00:00', '00:00:00', '', '30', '2020-2021', 'Summer', 40);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessions_id` int(11) NOT NULL,
  `sessions_userid` varchar(100) NOT NULL,
  `sessions_token` varchar(255) NOT NULL,
  `sessions_serial` varchar(255) NOT NULL,
  `sessions_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessions_id`, `sessions_userid`, `sessions_token`, `sessions_serial`, `sessions_date`) VALUES
(10, '7', 'DNo3OkgRV!E6_7AwsyzYCrtIhZj29-Qfl4Jn=HP8umBUTpv.SWb1cGLaKdq5eixMFX', 'pfBDb2i.Gv3y=xoOa9zKVJAkclH861w_Tm5FEPNjCtYQn-Mquh7sSIe4ZrgRUWXL!d', '2020-08-26 06:11:53'),
(16, '34', '1=AwW5O3hxvotNzI6bZMY-9ERcqTmlGaH28Kk!jyDB_peUsVgC4XLdJrufQ.PFniS7', 'AV6Hd21CUgY=ObqyfMZIxWhG_!Tu.jitcL3m9-EFrSP84pKwRkQlBNzov5eDnJsa7X', '2020-08-26 06:43:24'),
(17, '43', 'ipGO72BVsP_vhLboNjACU61zelS3dFZyEc-u8xnMkraRDYfTQg!XqHmW=594wtK.JI', 'vYDIuSo-mwMi4cZk!=VGy5L1QOgeAhnjFXRtbPT_CKr8qzBJ3p6lU2HNWx.sadE97f', '2020-08-26 11:38:49'),
(21, '1', 'LYXZqsxdnSKcErHo.2iuk6C39vJ8DtFbQ_y=apNG5-RPh!1fWeUAIm7BzTlO4jwMVg', 'czoAvP9hQfGX4NlkxK!gVnDSB5pURit81F_-s36EwHaWdjeMrCLTOJY.7b=Im2quyZ', '2020-08-27 03:55:37'),
(27, '2', '4leWP1OGiTvM!dIohgf=nB8DXuz-wYZQxcmNaysp.KEUVbJ3HkjR7FLSAt526rC9_q', 'N8f=SxTgDG6zPsuIAEo3irC4qBLOc9aJWHZVw!_5pKMeX2Rh1.lYvtFnU-dykj7Qmb', '2020-08-27 05:18:59'),
(29, 'FAUSER-2', 'IJRBG-tvsUd2W1wQZ6gxHYnbqpKhOLyVkX9M8NCPi3alFS.4mcA_ej5frzED!=oTu7', 'K.!QEao8mSw-qWrBCPR2duvl=N7YAHIbcUypnTtMf9JFiDx6sk5ez4_XOGj3VZhg1L', '2020-08-27 05:33:01'),
(33, 'STUSER-3', 'zLH83lBebONgSdQVnXjxUIrPyuZMfmk!1WvRY4oi7DA6hT29JFa.qs_GC-=cpt5KwE', 'o_.Xg9jweNuC=xF34POUVQS-l!zpdbWTmiG6qvHn2BcyYa7kDtILMs5JAZr1ERfh8K', '2020-08-27 05:55:30'),
(36, 'MNUSER-34', 'iefDW46!H.CJjRFQpXUvTtVxZOoG-BPbq75YKu2Ezksl83anhNId_1cyrMw=LgmS9A', '.CkGrUtgZ!lYQ=2L-Pihm8TFzIWoV3E_1M6SXRdD5qvyfbuwJOj47ps9xKNaAecBHn', '2020-08-27 06:11:17'),
(37, 'MNUSER-1', '=!T.B-WPAgkEIKFbqswNzjovmuV7ZMQrUxdcliJY3216aX5_LO849pnRefChGDyHtS', '51ql_K3LZ2TX!O6hE8zkPjBIWUbmMFyarScCiGJ.vefswo7-pQnD=gu4dY9AVHtNRx', '2020-08-27 06:35:05'),
(40, 'MNUSER-43', 'gYGj_Q3cbJ1HCvE9-2!lSwNL7UArTdPf.ostWumeDzK84IR5XaxihpFnBO=kMyq6ZV', '-SrRCecsk6jWvtxUJd7LuQ3XTYF4p9GmhANb.82MwK!iBln=f5HZza1EDP_gIoOVyq', '2020-08-28 07:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `shifting_student`
--

CREATE TABLE `shifting_student` (
  `shift_id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `course_from` int(11) NOT NULL,
  `curriculum_title_from` varchar(150) NOT NULL,
  `course_to` int(11) NOT NULL,
  `curriculum_title_to` varchar(150) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shifting_student`
--

INSERT INTO `shifting_student` (`shift_id`, `student_number`, `course_from`, `curriculum_title_from`, `course_to`, `curriculum_title_to`, `reason`, `status`, `school_year`, `semester`, `date`) VALUES
(1, '2019-06-00004', 10, 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 1, '', 'It is my first choice, that\'s why i wanted to shift.', 'Credited', '2020-2021', 'First Semester', '2020-05-25 18:50:24'),
(2, '2019-06-00024', 6, 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 1, '', 'My parents said so.', 'Requested', '2020-2021', 'First Semester', '2020-05-25 18:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `statement_of_account`
--

CREATE TABLE `statement_of_account` (
  `sao_id` int(250) NOT NULL,
  `student_number` varchar(250) NOT NULL,
  `tuition` int(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `schoolyear` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statement_of_account`
--

INSERT INTO `statement_of_account` (`sao_id`, `student_number`, `tuition`, `semester`, `schoolyear`, `date_created`) VALUES
(0, '2016-06-06601', 150, 'Second Semester', '2020-2021', '2020-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollment_record`
--

CREATE TABLE `student_enrollment_record` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_enrollment_record`
--

INSERT INTO `student_enrollment_record` (`id`, `student_number`, `sched_id`, `status`, `date`) VALUES
(23, '2016-06-06601', 5, 'Enlisted', '2020-05-23 05:46:24'),
(24, '2016-06-06601', 6, 'Enlisted', '2020-05-23 05:46:24'),
(25, '2016-06-06601', 7, 'Enlisted', '2020-05-23 05:46:24'),
(26, '2016-06-06601', 8, 'Enlisted', '2020-05-23 05:46:24'),
(27, '2016-06-06601', 9, 'Enlisted', '2020-05-23 05:46:24'),
(28, '2016-06-06601', 10, 'Enlisted', '2020-05-23 05:46:24'),
(29, '2016-06-06601', 11, 'Enlisted', '2020-05-23 05:46:24'),
(30, '2016-06-06601', 12, 'Enlisted', '2020-05-23 05:46:24'),
(31, '2016-06-06601', 13, 'Enlisted', '2020-05-23 05:46:24'),
(32, '2016-06-06601', 14, 'Enlisted', '2020-05-23 05:46:24'),
(33, '2016-06-06601', 15, 'Enlisted', '2020-05-23 05:46:24'),
(34, '2019-06-00004', 5, 'Enrolled', '2020-05-23 05:46:24'),
(35, '2019-06-00004', 6, 'Enrolled', '2020-05-23 05:46:24'),
(36, '2019-06-00004', 7, 'Enrolled', '2020-05-23 05:46:25'),
(37, '2019-06-00004', 8, 'Enrolled', '2020-05-23 05:46:25'),
(38, '2019-06-00004', 9, 'Enrolled', '2020-05-23 05:46:25'),
(39, '2019-06-00004', 10, 'Enrolled', '2020-05-23 05:46:25'),
(40, '2019-06-00004', 11, 'Enrolled', '2020-05-23 05:46:25'),
(41, '2019-06-00004', 12, 'Enrolled', '2020-05-23 05:46:25'),
(42, '2019-06-00004', 13, 'Enrolled', '2020-05-23 05:46:25'),
(43, '2019-06-00004', 14, 'Enrolled', '2020-05-23 05:46:25'),
(44, '2019-06-00004', 15, 'Enrolled', '2020-05-23 05:46:25'),
(45, '2019-06-00005', 5, 'Enrolled', '2020-05-23 05:46:25'),
(46, '2019-06-00005', 6, 'Enrolled', '2020-05-23 05:46:25'),
(47, '2019-06-00005', 7, 'Enrolled', '2020-05-23 05:46:25'),
(48, '2019-06-00005', 8, 'Enrolled', '2020-05-23 05:46:25'),
(49, '2019-06-00005', 9, 'Enrolled', '2020-05-23 05:46:25'),
(50, '2019-06-00005', 10, 'Enrolled', '2020-05-23 05:46:25'),
(51, '2019-06-00005', 11, 'Enrolled', '2020-05-23 05:46:25'),
(52, '2019-06-00005', 12, 'Enrolled', '2020-05-23 05:46:25'),
(53, '2019-06-00005', 13, 'Enrolled', '2020-05-23 05:46:25'),
(54, '2019-06-00005', 14, 'Enrolled', '2020-05-23 05:46:25'),
(55, '2019-06-00005', 15, 'Enrolled', '2020-05-23 05:46:25'),
(56, '2019-06-00006', 5, 'Enrolled', '2020-05-23 05:46:25'),
(57, '2019-06-00006', 6, 'Enrolled', '2020-05-23 05:46:25'),
(58, '2019-06-00006', 7, 'Enrolled', '2020-05-23 05:46:25'),
(59, '2019-06-00006', 8, 'Enrolled', '2020-05-23 05:46:25'),
(60, '2019-06-00006', 9, 'Enrolled', '2020-05-23 05:46:25'),
(61, '2019-06-00006', 10, 'Enrolled', '2020-05-23 05:46:25'),
(62, '2019-06-00006', 11, 'Enrolled', '2020-05-23 05:46:25'),
(63, '2019-06-00006', 12, 'Enrolled', '2020-05-23 05:46:25'),
(64, '2019-06-00006', 13, 'Enrolled', '2020-05-23 05:46:25'),
(65, '2019-06-00006', 14, 'Enrolled', '2020-05-23 05:46:25'),
(66, '2019-06-00006', 15, 'Enrolled', '2020-05-23 05:46:25'),
(67, '2019-06-00007', 5, 'Enrolled', '2020-05-23 05:46:25'),
(68, '2019-06-00007', 6, 'Enrolled', '2020-05-23 05:46:25'),
(69, '2019-06-00007', 7, 'Enrolled', '2020-05-23 05:46:25'),
(70, '2019-06-00007', 8, 'Enrolled', '2020-05-23 05:46:25'),
(71, '2019-06-00007', 9, 'Enrolled', '2020-05-23 05:46:25'),
(72, '2019-06-00007', 10, 'Enrolled', '2020-05-23 05:46:25'),
(73, '2019-06-00007', 11, 'Enrolled', '2020-05-23 05:46:26'),
(74, '2019-06-00007', 12, 'Enrolled', '2020-05-23 05:46:26'),
(75, '2019-06-00007', 13, 'Enrolled', '2020-05-23 05:46:26'),
(76, '2019-06-00007', 14, 'Enrolled', '2020-05-23 05:46:26'),
(77, '2019-06-00007', 15, 'Enrolled', '2020-05-23 05:46:26'),
(78, '2019-06-00008', 5, 'Enrolled', '2020-05-23 05:46:26'),
(79, '2019-06-00008', 6, 'Enrolled', '2020-05-23 05:46:26'),
(80, '2019-06-00008', 7, 'Enrolled', '2020-05-23 05:46:26'),
(81, '2019-06-00008', 8, 'Enrolled', '2020-05-23 05:46:26'),
(82, '2019-06-00008', 9, 'Enrolled', '2020-05-23 05:46:26'),
(83, '2019-06-00008', 10, 'Enrolled', '2020-05-23 05:46:26'),
(84, '2019-06-00008', 11, 'Enrolled', '2020-05-23 05:46:26'),
(85, '2019-06-00008', 12, 'Enrolled', '2020-05-23 05:46:26'),
(86, '2019-06-00008', 13, 'Enrolled', '2020-05-23 05:46:26'),
(87, '2019-06-00008', 14, 'Enrolled', '2020-05-23 05:46:26'),
(88, '2019-06-00008', 15, 'Enrolled', '2020-05-23 05:46:26'),
(89, '2019-06-00009', 5, 'Enrolled', '2020-05-23 05:46:26'),
(90, '2019-06-00009', 6, 'Enrolled', '2020-05-23 05:46:26'),
(91, '2019-06-00009', 7, 'Enrolled', '2020-05-23 05:46:26'),
(92, '2019-06-00009', 8, 'Enrolled', '2020-05-23 05:46:26'),
(93, '2019-06-00009', 9, 'Enrolled', '2020-05-23 05:46:26'),
(94, '2019-06-00009', 10, 'Enrolled', '2020-05-23 05:46:26'),
(95, '2019-06-00009', 11, 'Enrolled', '2020-05-23 05:46:26'),
(96, '2019-06-00009', 12, 'Enrolled', '2020-05-23 05:46:26'),
(97, '2019-06-00009', 13, 'Enrolled', '2020-05-23 05:46:26'),
(98, '2019-06-00009', 14, 'Enrolled', '2020-05-23 05:46:26'),
(99, '2019-06-00009', 15, 'Enrolled', '2020-05-23 05:46:26'),
(103, '2019-06-00010', 8, 'Enrolled', '2020-05-23 05:46:26'),
(104, '2019-06-00010', 9, 'Enrolled', '2020-05-23 05:46:26'),
(105, '2019-06-00010', 10, 'Enrolled', '2020-05-23 05:46:26'),
(106, '2019-06-00010', 11, 'Enrolled', '2020-05-23 05:46:26'),
(107, '2019-06-00010', 12, 'Enrolled', '2020-05-23 05:46:26'),
(108, '2019-06-00010', 13, 'Enrolled', '2020-05-23 05:46:26'),
(109, '2019-06-00010', 14, 'Enrolled', '2020-05-23 05:46:26'),
(110, '2019-06-00010', 15, 'Enrolled', '2020-05-23 05:46:26'),
(111, '2016-05-06382', 5, 'Enrolled', '2020-05-23 05:46:26'),
(112, '2016-05-06382', 6, 'Enrolled', '2020-05-23 05:46:26'),
(113, '2016-05-06382', 7, 'Enrolled', '2020-05-23 05:46:27'),
(114, '2016-05-06382', 8, 'Enrolled', '2020-05-23 05:46:27'),
(115, '2016-05-06382', 9, 'Enrolled', '2020-05-23 05:46:27'),
(116, '2016-05-06382', 10, 'Enrolled', '2020-05-23 05:46:27'),
(117, '2016-05-06382', 11, 'Enrolled', '2020-05-23 05:46:27'),
(118, '2016-05-06382', 12, 'Enrolled', '2020-05-23 05:46:27'),
(119, '2016-05-06382', 13, 'Enrolled', '2020-05-23 05:46:27'),
(120, '2016-05-06382', 14, 'Enrolled', '2020-05-23 05:46:27'),
(121, '2016-05-06382', 15, 'Enrolled', '2020-05-23 05:46:27'),
(122, '2016-05-06199', 5, 'Enrolled', '2020-05-24 05:46:27'),
(123, '2016-05-06199', 6, 'Enrolled', '2020-05-24 05:46:27'),
(124, '2016-05-06199', 7, 'Enrolled', '2020-05-24 05:46:27'),
(125, '2016-05-06199', 8, 'Enrolled', '2020-05-24 05:46:27'),
(126, '2016-05-06199', 9, 'Enrolled', '2020-05-24 05:46:27'),
(127, '2016-05-06199', 10, 'Enrolled', '2020-05-24 05:46:27'),
(128, '2016-05-06199', 11, 'Enrolled', '2020-05-24 05:46:27'),
(129, '2016-05-06199', 12, 'Enrolled', '2020-05-24 05:46:27'),
(130, '2016-05-06199', 13, 'Enrolled', '2020-05-24 05:46:27'),
(131, '2016-05-06199', 14, 'Enrolled', '2020-05-24 05:46:27'),
(143, '2', 11, 'Enlisted', '2020-07-15 19:51:49'),
(144, '2', 12, 'Enlisted', '2020-07-15 19:51:49'),
(145, '2', 13, 'Enlisted', '2020-07-15 19:51:49'),
(146, '2', 14, 'Enlisted', '2020-07-15 19:51:49'),
(147, '2', 15, 'Enlisted', '2020-07-15 19:51:49'),
(148, '2', 16, 'Enlisted', '2020-07-15 19:51:49'),
(149, '2', 17, 'Enlisted', '2020-07-15 19:51:50'),
(150, '2', 18, 'Enlisted', '2020-07-15 19:51:50'),
(151, '2', 19, 'Enlisted', '2020-07-15 19:51:50'),
(152, '2', 20, 'Enlisted', '2020-07-15 19:51:50'),
(153, '2', 21, 'Enlisted', '2020-07-15 19:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `sisnum` int(11) NOT NULL,
  `student_number` varchar(15) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `stu_type` varchar(10) NOT NULL,
  `stu_orientation` varchar(10) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `curriculum_title` varchar(200) NOT NULL,
  `con_num` varchar(13) NOT NULL,
  `houseAddress` varchar(70) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `bday` varchar(20) NOT NULL,
  `bplace` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nat` varchar(20) NOT NULL,
  `fat_name` varchar(50) NOT NULL,
  `fat_occ` varchar(50) NOT NULL,
  `fat_con_num` varchar(13) NOT NULL,
  `mat_name` varchar(50) NOT NULL,
  `mat_occ` varchar(50) NOT NULL,
  `mat_con_num` varchar(13) NOT NULL,
  `p_school_name` varchar(50) NOT NULL,
  `p_school_grad` int(11) NOT NULL,
  `s_school_name` varchar(50) NOT NULL,
  `s_school_grad` int(11) NOT NULL,
  `s_school_strand` varchar(20) NOT NULL,
  `t_school_name` varchar(50) NOT NULL,
  `t_school_grad` int(11) NOT NULL,
  `t_school_course` varchar(40) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `school_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`sisnum`, `student_number`, `firstname`, `middlename`, `lastname`, `suffix`, `stu_type`, `stu_orientation`, `course_id`, `curriculum_title`, `con_num`, `houseAddress`, `city`, `province`, `email`, `bday`, `bplace`, `gender`, `nat`, `fat_name`, `fat_occ`, `fat_con_num`, `mat_name`, `mat_occ`, `mat_con_num`, `p_school_name`, `p_school_grad`, `s_school_name`, `s_school_grad`, `s_school_strand`, `t_school_name`, `t_school_grad`, `t_school_course`, `semester`, `school_year`) VALUES
(1, '2016-06-06601', 'Joey', 'Parcero', 'Magcalas', '', 'Full', 'Freshman', 1, 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', '096450067421', NULL, NULL, NULL, 'joeymagcalas@gmail.com', '1994-09-01', ' Manila', 'Male', 'Filipino', 'Jose L. Magcalas', 'Taho Vendor', '09445930021', 'Marites P. Magcalas ', 'House wife', '09665043007', 'san Antonio Elementary School', 2001, 'Ramon Magsaysay (Cubao) High School', 2007, 'IT', '', 0, '', 'First Semester', '2020-2021'),
(2, NULL, 'Zach Jaiden', 'Garcia', 'Magcalas', '', '40', 'Transferee', 1, 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', '09665943977', NULL, NULL, NULL, 'magcalas@gmail.com', '06-21-1994', 'Manila', 'Male', 'Filipino', 'Joey P. Magcalas', 'Sample', '09760054392', 'Jenny N. Garcia', 'House Wife', '09776955043', 'Sample School', 2005, 'Sample High School', 2019, 'Information and Comm', '', 0, '', 'First Semester', '2020-2021'),
(3, '2016-05-06199', 'John Alfred', 'Serraon', 'Santillan', '', 'Partial', 'Freshman', 1, 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', '09884739212', 'Ugong', 'Valenzuela City', 'NCR', 'serraon@gmail.com', '1997-09-07', 'Valenzuela City', 'Male', 'Filipino', 'sample', 'sample', '09550677077', 'sample', 'sample', '09669593302', 'sample', 2009, 'sample', 2015, 'Information and Comm', '', 0, '', 'First Semester', '2020-2021'),
(10, '2016-05-06382', 'Myra Christine', 'Padilla', 'San Miguel', '', 'Full', 'Freshman', 1, 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', '09652491357', 'Obando', 'Bulacan', 'NCR', 'sanmiguel@gmail.com', '11-14-1998', 'Bulacan', 'Female', 'Filipino', 'sample father', 'father work', '09339201101', 'sample mother', 'house wife', '09220020011', 'sample elementary school', 2009, 'sample high school', 2015, '', '', 0, '', 'First Semester', '2020-2021'),
(11, NULL, 'Jerome', 'Sarmiento', 'Avengoza', '', 'Partial', 'Freshman', 1, '', '09660504403', 'Sample', 'Valenzuela City', 'NCR', 'avengoza@gmail.com', '1993-06-22', 'Valenzuela City', 'Male', 'Filipino', 'Sample Father', 'sample occupation', '09558387657', 'Sample Mother', 'sample occupation', '09487589254', 'sample elementary', 2006, 'sample high school', 2010, 'DAT', '', 0, '', 'First Semester', '2020-2021'),
(15, NULL, 'Jumpe', '', 'Gagui', '', 'Partial', 'Freshman', NULL, '', '09214563124', 'Manila', 'Manila', 'NCR', 'jumpe@gmail.com', '1997-03-01', 'Manila', 'Male', 'Filipino', '', '', '', 'Mary Gagui', '', '', 'Lakandula Elementary School', 2010, 'Lakandula High School', 2014, '', '', 0, '', '', ''),
(16, NULL, 'Elmer', 'Tubay', 'Boco', '', 'Partial', 'Freshman', NULL, '', '09321524612', 'Caloocan', 'Caloocan', 'NCR', 'bocoelmer@gmail.com', '1997-07-08', 'Caloocan', 'Male', 'Filipino', '', '', '', 'Magdalena Boco', '', '', 'Kasarinlan Elementary School', 2010, 'Kasarinlan High School', 2014, '', '', 0, '', '', ''),
(17, NULL, 'Alexandra', '', 'Hughes', '', 'Full', 'Freshman', NULL, '', '09422121341', 'Caloocan', 'Caloocan', 'NCR', 'alexandra@gmail.com', '1997-01-05', 'Manila', 'Female', 'Filipino', '', '', '', 'Myrna Hughes', '', '', 'Caloocan Elementary School', 2010, 'Caloocan High School', 2014, '', '', 0, '', '', ''),
(18, NULL, 'Reynalyn', '', 'De Jesus', '', '20', 'Transferee', NULL, '', '09231489567', 'Navotas', 'Navotas', 'NCR', 'reynalyn@gmail.com', '1997-10-03', 'Manila', 'Female', 'Filipino', '', '', '', 'Lilian De Jesus', 'Sewer', '', 'Paco Elementary School', 2009, 'Lux Mundi Academy', 2013, '', 'La Consolacion College', 2016, 'Business Administration ', '', ''),
(19, NULL, 'Crystal ', 'Salao', 'Lazaro', '', 'Partial', 'Cross-Enro', NULL, '', '09555648974', 'Obando, Bulacan', 'Bulacan', 'Bualcan', 'crystal@gmail.com', '2000-08-09', 'Bulacan', 'Female', 'Filipino', 'Ronan Lazaro', 'Security Guard', '09425986874', '', '', '', 'Paco Elementary School', 2013, 'Obando National High School', 2017, 'ABM', 'Colegio De San Pascual Baylon', 2019, 'Accountancy', '', ''),
(20, NULL, 'Rhavee ', 'Go', 'Valencia', '', 'Partial', 'Freshman', NULL, '', '09554123231', 'Manila', 'Manila', 'NCR', 'valencia@gmail.com', '1995-08-27', 'Manila', 'Male', 'Filipino', '', '', '', 'Danielyn Valencia', '', '', 'Lakandula Elementary School', 2008, 'Lakandula High School', 2012, '', '', 0, '', '', ''),
(21, NULL, 'Rowil', '', 'Tuazon', '', '20', 'Freshman', NULL, '', '09195868697', 'Dalandanan, Valenzuela', 'Valenzuela', 'NCR', 'rowil@gmail.com', '1995-08-27', 'Manila', 'Male', 'Filipino', 'Ronnie Tuazon', '', '', '', '', '', 'Dalandanan Elementary School', 2007, 'Dalandanan National High School', 2011, '', '', 0, '', '', ''),
(22, NULL, 'Sunshine', '', 'Guleng', '', '40', 'Transferee', NULL, '', '09654565456', 'Bagong Barrio, Caloocan City', 'Caloocan', 'NCR', 'sunshine@gmail.com', '1997-02-14', 'Manila', 'Female', 'Filipino', '', '', '', '', '', '', 'Caloocan Elementary School', 2010, 'Caloocan High School', 2014, '', 'STI College', 2016, 'BSIT', '', ''),
(23, NULL, 'Mhel Jay', '', 'Buenaflor', '', 'Partial', 'Freshman', NULL, '', '09558978978', 'Bagong Barrio, Caloocan City', 'Caloocan', 'NCR', 'mheljay@gmail.com', '1998-02-14', 'Manila', 'Male', 'Filipino', '', '', '', 'Myrna Buenaflor', '', '', 'Kasarinlan Elementary School', 2012, 'Kasarinlan High School', 2016, '', '', 0, '', '', ''),
(24, NULL, 'Christian ', 'Lazaro', 'Dela Cruz', '', '20', 'Cross-Enro', NULL, '', '09427898965', 'Malinta, Valenzuela City', 'Valenzuela', 'NCR', 'christian@gmail.com', '1996-04-19', 'Valenzuela', 'Male', 'Filipino', '', '', '', 'Raquel Dela Cruz', 'Teacher', '09546321230', 'Wawangpulo Elementary School', 2009, 'Polo National High School', 2013, '', 'Meycuayan College', 2019, 'BSBA', '', ''),
(25, NULL, 'Luiza', '', 'Austria', '', '40', 'Transferee', NULL, '', '09275641201', 'Hulong Duhat, Malabon City', 'Malabon', 'NCR', 'luiza@gmail.com', '1997-03-21', 'Malabon', 'Female', 'Filipino', 'Gabriel Austria', 'Teacher', '09561201232', '', '', '', 'Malabon Elementary School', 2010, 'Arellano High School', 2014, '', 'STI College', 2016, 'BSBA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `id` int(11) NOT NULL,
  `student_number` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`id`, `student_number`, `password`, `created_at`, `updated_at`) VALUES
(3, '2016-06-06601', '$argon2i$v=19$m=1024,t=2,p=2$dFFkc2hDUXFGRlVpS2tkNQ$PeWCmZKRvl1/OssvvRDEUwapPrJ2Sm5SyPIAo3gg01A', '2020-04-11 14:25:19', '2020-05-24 10:18:02'),
(5, '2019-06-00001', '$argon2i$v=19$m=1024,t=2,p=2$dFFkc2hDUXFGRlVpS2tkNQ$PeWCmZKRvl1/OssvvRDEUwapPrJ2Sm5SyPIAo3gg01A', '2020-05-22 16:32:35', '2020-06-08 16:18:19'),
(6, '2018-06-00001', '$argon2i$v=19$m=1024,t=2,p=2$ZFI0RWxMVW8zaFhpUldFOQ$WqLyXxOieCG/FuyCMwrf5bs3b8EA8RlZ9/ne99Ra1Uo', '2020-05-23 02:31:53', '2020-06-21 16:10:53'),
(7, '2020-06-00007', '$argon2i$v=19$m=1024,t=2,p=2$ZGhOaU1Pak8zSXNUQW1UeA$LNzGHluDL0ydApnXnCacdDiSTzq+o7G+2cn9ql+rn6g', '2020-05-23 07:20:39', '2020-05-23 07:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_code` varchar(20) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `yrsem_id` varchar(20) NOT NULL,
  `lecture` varchar(5) NOT NULL,
  `laboratory` varchar(5) NOT NULL,
  `units` varchar(5) NOT NULL,
  `pre_requisite` varchar(20) NOT NULL,
  `curriculum_title` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `subject_title`, `yrsem_id`, `lecture`, `laboratory`, `units`, `pre_requisite`, `curriculum_title`, `Status`, `created_at`, `updated_at`, `subj_id`) VALUES
('ACC 1', 'Principle of Accounting', '2ndyr2ndsem', '3', '0', '3', 'MATH 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:45:52', '2020-01-26 14:45:52', 3),
('ADVMDB', 'Advanced Mobile Computing', '3rdyr2ndsem', '2', '1', '3', 'BASCMDB', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:11:41', '2020-02-01 13:11:41', 4),
('ANIVID', 'Animation and Video Editing', '2ndyr1stsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:48:19', '2020-02-01 12:48:19', 5),
('APPDEV', 'Application Development and Emerging Technologies', '2ndyr2ndsem', '2', '1', '3', 'PROG2', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:59:15', '2020-02-01 12:59:15', 6),
('ARCHORG', 'Computer Architecture and Organization', '3rdyr2ndsem', '2', '1', '3', 'DMATH', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:10:53', '2020-02-01 13:10:53', 7),
('ARIAPP', 'Art Appreciation', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:00:51', '2020-02-01 13:00:51', 8),
('BASCMDB', 'Basic Mobile Computing', '3rdyr1stsem', '2', '1', '3', 'OOP', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:02:11', '2020-02-01 13:02:11', 9),
('BUSANA', 'Business Analysis', '4thyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:20:23', '2020-02-01 13:20:23', 10),
('CAPSTONE1', 'Capstone Project and Research 1', '3rdyr2ndsem', '2', '1', '3', 'SYSARCHI2', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:13:12', '2020-02-01 13:13:12', 11),
('CAPSTONE2', 'Capstone Project and Research 2', '4thyr1stsem', '2', '1', '3', 'CAPSTONE1', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:23:05', '2020-02-01 13:23:05', 12),
('CONWRLD', 'The Contemporary World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:39:05', '2020-02-01 12:39:05', 13),
('DBMS', 'Database Management System', '2ndyr2ndsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:57:45', '2020-02-01 12:57:45', 14),
('DMATH', 'Discrete Mathematics', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:03:09', '2020-02-01 13:03:09', 16),
('DSTRUCT', 'Data Structure and Algorithms', '2ndyr2ndsem', '2', '1', '3', 'PROG2', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:56:32', '2020-02-01 12:56:32', 17),
('ECO 1', 'Economics and Taxation with Agrarian Reform', '3rdyr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:00:42', '2020-01-26 15:00:42', 18),
('ENG 1', 'Communication Skills 1', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-25 12:53:03', '2020-01-25 12:53:03', 19),
('ENG 2', 'Communication Skills 2', '1styr2ndsem', '3', '0', '3', 'ENG 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:44:03', '2020-01-26 13:44:03', 20),
('ENG 3', 'Speech Oral Communication', '2ndyr1stsem', '3', '0', '3', 'ENG 2', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:06:09', '2020-01-26 14:06:09', 21),
('ENG 4', 'Business Correspondence and Technical Writing', '2ndyr2ndsem', '3', '0', '3', 'ENG 3', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:41:18', '2020-01-26 14:41:18', 22),
('ENVISCI', 'Environmental Science', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:45:18', '2020-02-01 12:45:18', 23),
('ETHICS', 'Ethics', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:38:27', '2020-02-01 12:38:27', 24),
('FIL 1', 'Komunikasyon sa Akademikong Filipino', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:17:27', '2020-01-26 13:17:27', 25),
('FIL 2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '1styr2ndsem', '3', '0', '3', 'FIL 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:44:49', '2020-01-26 13:44:49', 26),
('HCII', 'Introduction to Human Computer Interaction', '1styr2ndsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:40:45', '2020-02-01 12:40:45', 27),
('HUMN 1', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:19:23', '2020-01-26 13:19:23', 28),
('INFOMGT', 'Information Management', '3rdyr1stsem', '2', '1', '3', 'DSTRUCT', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:03:50', '2020-02-01 13:03:50', 29),
('INFOSEC1', 'Information Assurance and Security 1', '3rdyr2ndsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:09:22', '2020-02-01 13:09:22', 30),
('INFOSEC2', 'Information Assurance and Security 2', '4thyr1stsem', '2', '1', '3', 'INFOSEC1', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:19:26', '2020-02-01 13:19:26', 31),
('IPTECH1', 'Integrative Programming Technologies 1', '2ndyr1stsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:47:20', '2020-02-01 12:47:20', 32),
('IPTECH2', 'Integrative Programming and Technologies 2', '3rdyr1stsem', '2', '1', '3', 'IPTECH1', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:04:27', '2020-02-01 13:04:27', 33),
('IT 111', 'Fundamentals of IT with Computer Application', '1styr1stsem', '2', '3', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:08:04', '2020-01-26 13:08:04', 34),
('IT 112', 'Programming Concept I', '1styr1stsem', '2', '3', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:15:37', '2020-01-26 13:15:37', 35),
('IT 121', 'Programming Concepts II', '1styr2ndsem', '2', '3', '3', 'IT 112', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:35:05', '2020-01-26 13:35:05', 36),
('IT 122', 'Web Development I', '1styr2ndsem', '2', '3', '3', 'IT 111', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:35:35', '2020-01-26 13:35:35', 37),
('IT 123', 'Database Management System I', '1styr2ndsem', '2', '3', '3', 'IT 111', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:37:09', '2020-01-26 13:37:09', 38),
('IT 211', 'Object Oriented Programming', '2ndyr1stsem', '2', '3', '3', 'IT 121', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:54:49', '2020-01-26 13:54:49', 39),
('IT 212', 'Web Development II', '2ndyr1stsem', '2', '3', '3', 'IT 122', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:55:44', '2020-01-26 13:55:44', 40),
('IT 213', 'Database Management System II', '2ndyr1stsem', '2', '3', '3', 'IT 123', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:57:35', '2020-01-26 13:57:35', 41),
('IT 214', 'Operating System', '2ndyr1stsem', '3', '0', '3', 'IT 111', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:03:56', '2020-01-26 14:03:56', 42),
('IT 215', 'Discrete Structure', '2ndyr1stsem', '3', '0', '3', 'LOGIC', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:05:18', '2020-01-26 14:05:18', 43),
('IT 221', 'Data Structure and Algorithm', '2ndyr2ndsem', '2', '3', '3', 'IT 211', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:26:34', '2020-01-26 14:26:34', 44),
('IT 222', 'Multimedia System and Development', '2ndyr2ndsem', '2', '3', '3', 'IT 111', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:27:29', '2020-01-26 14:27:29', 45),
('IT 223', 'Data Communication and Networks', '2ndyr2ndsem', '2', '3', '3', 'IT 111', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:38:10', '2020-01-26 14:38:10', 46),
('IT 311', 'Computer Organization with Assembly Language', '3rdyr1stsem', '2', '3', '3', 'IT 214', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:53:54', '2020-01-26 14:53:54', 47),
('IT 312', 'System Analysis and Design', '3rdyr1stsem', '3', '0', '3', 'Third Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:55:03', '2020-01-26 14:55:03', 48),
('IT 313', 'Avance OOP with Mobile Computing', '3rdyr1stsem', '2', '3', '3', 'IT 211', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:56:07', '2020-01-26 14:56:07', 49),
('IT 321', 'Software Engineering', '3rdyr2ndsem', '2', '3', '3', 'Third Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:01:50', '2020-01-26 15:01:50', 50),
('IT 322', 'Professional Ethics for IT', '3rdyr2ndsem', '3', '0', '3', 'Third Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:02:37', '2020-01-26 15:02:37', 51),
('IT 412', 'Capstone Project - Documentation', '4thyr1stsem', '2', '3', '3', 'Fourth Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:11:36', '2020-01-26 15:11:36', 52),
('IT 421', 'Capstone Project 2 - Implementation', '4thyr2ndsem', '2', '3', '3', 'Fourth Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:15:13', '2020-01-26 15:15:13', 53),
('IT ELEC1', 'Computer Hardware Maintenance and Servicing', '2ndyr2ndsem', '2', '3', '3', 'IT 111', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:40:37', '2020-01-26 14:40:37', 54),
('IT ELEC2', 'Network Administration and Maintenance', '3rdyr1stsem', '2', '3', '3', 'IT 223', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:57:38', '2020-01-26 14:57:38', 55),
('IT ELEC3', 'E-Business with Content Management System', '3rdyr1stsem', '2', '3', '3', 'IT 212', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:58:26', '2020-01-26 14:58:26', 56),
('IT ELEC4', 'Advance Multimedia Design and Management System', '3rdyr1stsem', '2', '3', '3', 'IT 222', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:59:28', '2020-01-26 14:59:28', 57),
('IT ELEC5', 'Human Computer Interaction', '3rdyr2ndsem', '2', '3', '3', 'Third Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:04:06', '2020-01-26 15:04:06', 58),
('IT ELEC6', 'Information Assurance and Security', '3rdyr2ndsem', '3', '0', '3', 'Third Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:05:03', '2020-01-26 15:05:03', 59),
('IT FEL1', 'Business Analytics', '3rdyr2ndsem', '3', '0', '3', 'IT 213', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:05:58', '2020-01-26 15:05:58', 60),
('IT FEL2', 'Seminar on I.T. Current and Future Trends', '4thyr2ndsem', '2', '3', '3', 'Fourth Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:16:33', '2020-01-26 15:16:33', 61),
('IT INTERN', 'Practicum (600 Hours)', '4thyr1stsem', '9', '0', '9', 'Fourth Year', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:12:29', '2020-01-26 15:12:29', 62),
('ITFUND', 'Introduction to Computing', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:34:36', '2020-02-01 12:34:36', 63),
('KOMFIL', 'Kontekswalisadong Komunikasyon sa Filipino', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:36:03', '2020-02-01 12:36:03', 66),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:33:52', '2020-01-26 13:33:52', 67),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:53:05', '2020-01-26 13:53:05', 68),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:23:09', '2020-01-26 14:23:09', 69),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:50:28', '2020-01-26 14:50:28', 70),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:01:15', '2020-01-26 15:01:15', 71),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:08:59', '2020-01-26 15:08:59', 72),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:14:30', '2020-01-26 15:14:30', 73),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:17:10', '2020-01-26 15:17:10', 74),
('LEAD 1', 'Values Formation 1', '1styr1stsem', '1.5', '0', '1.5', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:37:56', '2020-02-01 12:37:56', 75),
('LEAD 2', 'Values Formation 2', '1styr2ndsem', '1.5', '0', '1.5', 'First Year', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:43:51', '2020-02-01 12:43:51', 76),
('LEAD 3', 'Values Formation 3', '2ndyr1stsem', '1.5', '0', '1.5', 'LEAD2', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:50:54', '2020-02-01 12:50:54', 77),
('LEAD 4', 'Values Formation 4', '2ndyr2ndsem', '1.5', '0', '1.5', 'LEAD3', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:00:14', '2020-02-01 13:00:14', 78),
('LEAD 5', 'Values Formation 5', '3rdyr1stsem', '1.5', '0', '1.5', 'LEAD4', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:04:49', '2020-02-01 13:04:49', 79),
('LEAD 6', 'Values Formation 6', '3rdyr2ndsem', '1.5', '0', '1.5', 'LEAD5', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:14:42', '2020-02-01 13:14:42', 80),
('LEAD 7', 'Values Formation 7', '4thyr1stsem', '1.5', '0', '1.5', 'LEAD6', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:24:26', '2020-02-01 13:24:26', 81),
('LEAD 8', 'Values Formation8', '4thyr2ndsem', '1.5', '0', '1.5', 'LEAD7', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:28:03', '2020-02-01 13:28:03', 82),
('LIT 1', 'Philippine Literature', '3rdyr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:59:57', '2020-01-26 14:59:57', 83),
('LIT 2', 'World Literature', '3rdyr2ndsem', '3', '0', '3', 'LIT 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:08:19', '2020-01-26 15:08:19', 84),
('LOGIC', 'Symbolic Logic', '1styr2ndsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:47:44', '2020-01-26 13:47:44', 85),
('MATH 1', 'College Algebra', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-25 16:03:15', '2020-01-25 16:03:15', 86),
('MATH 2', 'Trigonometry', '1styr2ndsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:38:50', '2020-01-26 13:38:50', 87),
('MATH 3', 'Probability and Statistics', '2ndyr1stsem', '3', '0', '3', 'MATH 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:17:24', '2020-01-26 14:17:24', 88),
('MATWRLD', 'Mathematics in the Modern World', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:31:45', '2020-02-01 12:31:45', 89),
('MGT 1', 'Introduction to Business Organization and Management', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:47:03', '2020-01-26 14:47:03', 90),
('NATSCI 2', 'Environmental Science', '1styr2ndsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:46:05', '2020-01-26 13:46:05', 91),
('NET1', 'Networking 1', '2ndyr1stsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:45:47', '2020-02-01 12:45:47', 92),
('NET2', 'Networking 2', '3rdyr1stsem', '2', '1', '3', 'NET1', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:02:37', '2020-02-01 13:02:37', 93),
('NSTP 1', 'National Service Training Program I', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:24:17', '2020-01-26 13:24:17', 94),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:52:24', '2020-01-26 13:52:24', 95),
('NSTP1', 'National Service Training Program 1', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:37:17', '2020-02-01 12:37:17', 96),
('NSTP2', 'National Service Training Program 2', '1styr2ndsem', '3', '0', '3', 'First Year', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:43:11', '2020-02-01 12:43:11', 97),
('OJT', 'On the-Job Training(600hrs)', '4thyr2ndsem', '6', '0', '6', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:26:43', '2020-02-01 13:26:43', 98),
('OOP', 'Object Oriented Programming', '2ndyr2ndsem', '2', '1', '3', 'PROG2', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:57:12', '2020-02-01 12:57:12', 99),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:23:21', '2020-01-26 13:23:21', 100),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:50:39', '2020-01-26 13:50:39', 101),
('PE 3', 'Individual/Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:22:39', '2020-01-26 14:22:39', 102),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:50:04', '2020-01-26 14:50:04', 103),
('PE1', 'Physical Education 1', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:36:48', '2020-02-01 12:36:48', 104),
('PE2', 'Physical Education 2', '1styr2ndsem', '2', '0', '2', 'First Year', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:42:32', '2020-02-01 12:42:32', 105),
('PE3', 'Physical Education 3', '2ndyr1stsem', '2', '0', '2', 'PE1', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:49:29', '2020-02-01 12:49:29', 106),
('PE4', 'Physical Education 4', '2ndyr2ndsem', '2', '0', '2', 'PE1', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:59:45', '2020-02-01 12:59:45', 107),
('PHILHIS', 'Readings in Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:33:30', '2020-02-01 12:33:30', 108),
('PHYSICS 1', 'Introduction to Physics with Electronics', '2ndyr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:22:06', '2020-01-26 14:22:06', 109),
('PHYSICS 2', 'Electromagnetism and Electricity', '2ndyr2ndsem', '3', '0', '3', 'PHYSICS 1', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:49:15', '2020-01-26 14:49:15', 110),
('PLATECH', 'Platform Technologies', '2ndyr1stsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:46:22', '2020-02-01 12:46:22', 111),
('PROG2', 'Computer Programming 2', '2ndyr1stsem', '2', '1', '3', 'PROGI', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:48:58', '2020-02-01 12:48:58', 112),
('PROGI', 'Computer Programming 1', '1styr2ndsem', '2', '1', '3', 'First Year', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:41:25', '2020-02-01 12:41:25', 113),
('PSYCH 1', 'General Psychology', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:19:55', '2020-01-26 13:19:55', 114),
('PURPCOMM', 'Purposive Communication', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:34:06', '2020-02-01 12:34:06', 115),
('QMTHODS', 'Quantitive Methods(incl.modeling and simulation)', '3rdyr2ndsem', '3', '0', '3', 'DMATH', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:14:12', '2020-02-01 13:14:12', 116),
('RIZAL', 'Life and Works of Rizal', '3rdyr2ndsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 15:07:35', '2020-01-26 15:07:35', 117),
('SCITECH', 'Science Technology and Society', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:39:39', '2020-02-01 12:39:39', 119),
('SICT', 'Social and Professional Issues', '4thyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:19:52', '2020-02-01 13:19:52', 120),
('SOCSCI 1', 'Philippine History and Culture', '1styr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 13:18:24', '2020-01-26 13:18:24', 121),
('SOCSCI 3', 'Society and Culture with Family Planning/HIV', '2ndyr1stsem', '3', '0', '3', 'None', 'Revise Curriculum Effective 2014-2015 Based on CMO 53, series 2006', 'Active', '2020-01-26 14:19:45', '2020-01-26 14:19:45', 122),
('SOSLIT', 'Sosyedad at Literatura/Panitikang Panlipunan', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:52:21', '2020-02-01 12:52:21', 123),
('SPEAK', 'Public Speaking', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:41:57', '2020-02-01 12:41:57', 124),
('SYSARCHI', 'System Integration and Architecturel', '2ndyr2ndsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:58:32', '2020-02-01 12:58:32', 125),
('SYSARCHI2', 'System Integration and Architecture 2', '3rdyr1stsem', '3', '0', '3', 'SYSARCHI', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:01:30', '2020-02-01 13:01:30', 126),
('SYSMAIN', 'System Admin and Maintenance', '4thyr2ndsem', '2', '1', '3', 'CAPSTONE2', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:27:16', '2020-02-01 13:27:16', 127),
('UNDSELF', 'Understanding the Self', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 12:32:53', '2020-02-01 12:32:53', 128),
('WEBSYS', 'Web System and Technologies', '3rdyr2ndsem', '2', '1', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-01 13:09:53', '2020-02-01 13:09:53', 129),
('RIZAL', 'Rizal\'s Life and Works ', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum for AY 2018-2019', 'Inactive', '2020-02-02 10:12:59', '2020-02-02 10:12:59', 130),
('LEAD 1', 'Values Formation 1', '1styr1stsem', '1.5', '0', '1.5', 'None', 'sample', 'Active', '2020-02-19 15:25:11', '2020-02-19 15:25:11', 132),
('ENG 1', 'Communications Arts 1', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:03:31', '2020-02-23 16:03:31', 133),
('MATH 1', 'College Algebra ', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:05:20', '2020-02-23 16:05:20', 134),
('FIL 1', 'Komunikasyon sa Akademikong Filipino', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:06:12', '2020-02-23 16:06:12', 135),
('NATSCI 1', 'Biological Science', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:06:53', '2020-02-23 16:06:53', 136),
('COMP 1', 'Computer Fundamentals (Business Applications)', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:07:33', '2020-02-23 16:07:33', 137),
('SOCSCI 2', 'Phil. History, Politics and Governance with New Constitution', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:08:38', '2020-02-23 16:08:38', 138),
('HUMN 1', 'Arts Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:09:12', '2020-02-23 16:09:12', 139),
('LIT 1', 'Philippine Literature ', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:09:57', '2020-02-23 16:09:57', 140),
('NSTP 1', 'National Service Training Program 1 (CWTS)', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:10:49', '2020-02-23 16:10:49', 141),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:11:40', '2020-02-23 16:11:40', 142),
('LEAD 1', 'Leadership', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:12:06', '2020-02-23 16:12:06', 143),
('ENG 2', 'Communication Arts 2', '1styr2ndsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:14:04', '2020-02-23 16:14:04', 144),
('MATH 2A', 'Math of Investment', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:15:08', '2020-02-23 16:15:08', 145),
('FIL 2', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', '1styr2ndsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:15:55', '2020-02-23 16:15:55', 146),
('NATSCI 2', 'Environmental Science', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:18:16', '2020-02-23 16:18:16', 147),
('COMP 2', 'Data-Based Mgt. (Fundamentals of Programming)', '1styr2ndsem', '3', '0', '3', 'COMP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:19:34', '2020-02-23 16:19:34', 148),
('SOCSCI 3', 'Introduction to Sociology with Family Planning', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:20:14', '2020-02-23 16:20:14', 149),
('PHILO 1', 'Intro to Philosophy with Logic and Critical Thinking', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:21:29', '2020-02-23 16:21:29', 150),
('PSYCH 1A ', 'Business Psychology', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:22:20', '2020-02-23 16:22:20', 151),
('NSTP 2 ', 'National Service Training Program 2 (CWTS)', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:23:03', '2020-02-23 16:23:03', 152),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:23:46', '2020-02-23 16:23:46', 153),
('LEAD 2', 'Leadership', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:24:09', '2020-02-23 16:24:09', 154),
('ENG 3', 'Speech and Oral Communication', '2ndyr1stsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:26:32', '2020-02-23 16:26:32', 155),
('FIL 3', 'Masining na Pagpapahayag', '2ndyr1stsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:27:07', '2020-02-23 16:27:07', 156),
('MATH 3', 'Business Statistics', '2ndyr1stsem', '3', '0', '3', 'MATH 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:27:34', '2020-02-23 16:27:34', 157),
('PHILO 2 ', 'Ethics', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:28:13', '2020-02-23 16:28:13', 158),
('FORLAN', 'Foreign Language', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:28:39', '2020-02-23 16:28:39', 159),
('ACC 1', 'Fundamentals of Accounting', '2ndyr1stsem', '6', '0', '6', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:29:01', '2020-02-23 16:29:01', 160),
('MGT 1', 'Principles of Management', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:29:29', '2020-02-23 16:29:29', 161),
('PE 3', 'Individual-Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:29:57', '2020-02-23 16:29:57', 162),
('LEAD 3', 'Leadership ', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:30:23', '2020-02-23 16:30:23', 163),
('ENG 4', 'Technical Writing & Effective Business', '2ndyr2ndsem', '3', '0', '3', 'ENG 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:31:44', '2020-02-23 16:31:44', 164),
('SOCSCI 4 ', 'Introduction to Economics with LRT', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:32:12', '2020-02-23 16:32:12', 165),
('SOCSCI 5', 'Life and Works of Rizal', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:32:37', '2020-02-23 16:32:37', 166),
('LAW', 'Law on Obligations, Contracts and Business Organization', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:33:14', '2020-02-23 16:33:14', 167),
('FIN 1', 'Principles of Finance', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:34:02', '2020-02-23 16:34:02', 168),
('ACC 2 ', 'Partnership and Corporation', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:34:48', '2020-02-23 16:34:48', 169),
('MGT 2', 'Human Behavior in Organization', '2ndyr2ndsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:35:24', '2020-02-23 16:35:24', 170),
('MKTG 1', 'Principles of Marketing ', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:36:02', '2020-02-23 16:36:02', 171),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:36:25', '2020-02-23 16:36:25', 172),
('LEAD 4', 'Leadership', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Inactive', '2020-02-23 16:36:51', '2020-02-23 16:36:51', 173),
('TAX ', 'Taxation', '3rdyr1stsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:38:19', '2020-02-23 16:38:19', 174),
('MGT 3', 'Human Resource Management', '3rdyr1stsem', '3', '0', '3', 'MGT 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:39:03', '2020-02-23 16:39:03', 175),
('MGT 4', 'Good Governance and Social Responsibility ', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:40:22', '2020-02-23 16:40:22', 176),
('MGT 5', 'Managerial Accounting', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:41:41', '2020-02-23 16:41:41', 177),
('MGT 6', 'Production and Operations Management', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:42:26', '2020-02-23 16:42:26', 178),
('HRDM 1', 'Administrative and Office Management', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:43:08', '2020-02-23 16:43:08', 179),
('HRDM 2', 'Recruitment and Selection', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:43:46', '2020-02-23 16:43:46', 180),
('HRDM 3', 'Training and Development ', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:44:29', '2020-02-23 16:44:29', 181),
('LEAD 5', 'Leadership', '3rdyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:45:02', '2020-02-23 16:45:02', 182),
('MGT 7', 'Strategic Management (Business Policy & Strategy - Mgt)', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:52:16', '2020-02-23 16:52:16', 183),
('MGT 8', 'Business Research', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:53:43', '2020-02-23 16:53:43', 184),
('MGT 9', 'Total Quality Management', '3rdyr2ndsem', '3', '0', '3', 'MGT 6', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:54:39', '2020-02-23 16:54:39', 185),
('MGT 9', 'Total Quality Management', '3rdyr2ndsem', '3', '0', '3', 'MGT 6', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:54:41', '2020-02-23 16:54:41', 186),
('MKTG 8', 'Marketing Management', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:55:27', '2020-02-23 16:55:27', 187),
('HRDM 4', 'Compensation Administration', '3rdyr2ndsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:56:10', '2020-02-23 16:56:10', 188),
('HRDM 5', 'Labor Relations and Negotiations', '3rdyr2ndsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:56:46', '2020-02-23 16:56:46', 189),
('Feasib 1', 'Feasibility Study I (Entrepreneunal Mgt.)', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:57:53', '2020-02-23 16:57:53', 190),
('PRCT 1', 'Practicum (Internship) - 150 Hrs.', '3rdyr2ndsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:58:47', '2020-02-23 16:58:47', 191),
('LEAD 6', 'Leadership', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 16:59:26', '2020-02-23 16:59:26', 192),
('HRDM 6', 'Organizational Development', '4thyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:00:39', '2020-02-23 17:00:39', 193),
('HRDM 7', 'Logistics Management ', '4thyr1stsem', '3', '0', '3', 'MGT 6', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:07:38', '2020-02-23 17:07:38', 194),
('HRDM 8', 'Project Management', '4thyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:08:02', '2020-02-23 17:08:02', 195),
('FEASIB 2', 'Feasibility Study II', '4thyr1stsem', '3', '0', '3', 'Feasib 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:08:35', '2020-02-23 17:08:35', 196),
('LEAD 7', 'Leadership', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:08:59', '2020-02-23 17:08:59', 197),
('MGT 10', 'Special Topics in Business Management (Seminars - Mgt.)', '4thyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:12:33', '2020-02-23 17:12:33', 198),
('PRCT 2', 'Practicum (On-the-Job-Training) - 350 Hrs.', '4thyr2ndsem', '6', '0', '6', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:13:46', '2020-02-23 17:13:46', 199),
('LEAD 8', 'Leadership', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39, series 2006', 'Active', '2020-02-23 17:14:05', '2020-02-23 17:14:05', 200),
('UNDSELF', 'Understanding the Self', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:00:03', '2020-02-23 18:00:03', 201),
('PHILHIS', 'Readings in Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:00:28', '2020-02-23 18:00:28', 202),
('MATHINV', 'Math of Investment', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:01:06', '2020-02-23 18:01:06', 203),
('PURPCOM', 'Purposive Communication', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:01:28', '2020-02-23 18:01:28', 204),
('KOMFIL', 'Kontekstwalisadong Komunikasyon', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:02:02', '2020-02-23 18:02:02', 205),
('ETHICS', 'Ethics', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:02:22', '2020-02-23 18:02:22', 206),
('ARTAPP', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:02:49', '2020-02-23 18:02:49', 207),
('NSTP 1', 'National Service Training Prog.', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:03:32', '2020-02-23 18:03:32', 208),
('PE 1', 'Physical Education 1', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:04:04', '2020-02-23 18:04:04', 209),
('LEAD 1', 'Leadership', '1styr1stsem', '1.5', '0', '1.5', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:04:23', '2020-02-23 18:04:23', 210),
('MATHWRLD', 'Mathematics in the Modern World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:05:17', '2020-02-23 18:05:17', 211),
('CONWRLD', 'The Contemporary World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:05:49', '2020-02-23 18:05:49', 212),
('RIZAL', 'RIzal\'s Life & Works', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:06:27', '2020-02-23 18:06:27', 213),
('PSPEAK', 'Public Speaking', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:07:00', '2020-02-23 18:07:00', 214),
('FILDIS', 'Filipino sa Iba\'t-ibang Disiplina', '1styr2ndsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:07:32', '2020-02-23 18:07:32', 215),
('FILDIS', 'Filipino sa Iba\'t-ibang Disiplina', '1styr2ndsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:07:32', '2020-02-23 18:07:32', 216),
('ENMIND', 'The Entreprenuerial Mind', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:08:00', '2020-02-23 18:08:00', 217),
('SCITECH', 'Science, Technology, and Society', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:08:29', '2020-02-23 18:08:29', 218),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:09:00', '2020-02-23 18:09:00', 219),
('PE 2', 'Physical Education 2', '1styr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:09:21', '2020-02-23 18:09:21', 220),
('LEAD 2', 'Leadership ', '1styr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:10:07', '2020-02-23 18:10:07', 221),
('MANACC', 'Managerial Accounting', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:12:48', '2020-02-23 18:12:48', 222),
('MARMAN', 'Marketing Management', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:13:13', '2020-02-23 18:13:13', 223),
('MICECO', 'Basic Microeconomics', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:13:38', '2020-02-23 18:13:38', 224),
('HRMAN', 'Human Resource Management', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:13:55', '2020-02-23 18:13:55', 225),
('TAX', 'Taxation', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:14:15', '2020-02-23 18:14:15', 226),
('SOSLIT', 'Sosyedad at Literatura', '2ndyr1stsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:14:50', '2020-02-23 18:14:50', 227),
('PE 3', 'Physical Education 3', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:15:23', '2020-02-23 18:15:23', 228),
('LEAD 3', 'Leadership', '2ndyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:15:47', '2020-02-23 18:15:47', 229),
('ADVCOM', 'Advanced Computer Applicatios for Business', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:16:43', '2020-02-23 18:16:43', 230),
('STATRES', 'Statistics for Research ', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:17:06', '2020-02-23 18:17:06', 231),
('BUSLAW', 'Business Law(Obli-Con)', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:17:42', '2020-02-23 18:17:42', 232),
('PROJMAN', 'Project Management', '2ndyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:18:11', '2020-02-23 18:18:11', 233),
('ADMAN', 'Administrative and Office Management', '2ndyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:18:47', '2020-02-23 18:18:47', 234),
('GGSR', 'Good Governance & Social Responsibility', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:19:13', '2020-02-23 18:19:13', 235),
('PE 4', 'Physical Education 4', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:19:34', '2020-02-23 18:19:34', 236),
('LEAD 4', 'Leadership', '2ndyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Active', '2020-02-23 18:19:56', '2020-02-23 18:19:56', 237),
('ORGPSY', 'Industrial/Organizational Psychology', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:21:55', '2020-02-23 18:21:55', 238),
('INTEBUS', 'International Business and Trade', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:22:13', '2020-02-23 18:22:13', 239),
('LABLAW', 'Labor Law and Legislation', '3rdyr1stsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:23:53', '2020-02-23 18:23:53', 240),
('RECSEL', 'Recruitment and Selection', '3rdyr1stsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:24:24', '2020-02-23 18:24:24', 241),
('TRADEV', 'Training and Development', '3rdyr1stsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:24:52', '2020-02-23 18:24:52', 242),
('OPMAN', 'Operation Management (TQM)', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:25:32', '2020-02-23 18:25:32', 243),
('OPMAN', 'Operation Management (TQM)', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:25:32', '2020-02-23 18:25:32', 244),
('LEAD 5', 'Leadership', '3rdyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:26:24', '2020-02-23 18:26:24', 245),
('COMPAD', 'Compensation Administration', '3rdyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:27:33', '2020-02-23 18:27:33', 246),
('LOGMAN', 'Logistics Management', '3rdyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:28:13', '2020-02-23 18:28:13', 247),
('ORGDEV', 'Organizational Development', '3rdyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:28:44', '2020-02-23 18:28:44', 248),
('BUSRES', 'Business Research', '3rdyr2ndsem', '3', '0', '3', 'STATRES', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:29:25', '2020-02-23 18:29:25', 249);
INSERT INTO `subject` (`subject_code`, `subject_title`, `yrsem_id`, `lecture`, `laboratory`, `units`, `pre_requisite`, `curriculum_title`, `Status`, `created_at`, `updated_at`, `subj_id`) VALUES
('STRAMAN', 'Strategic Management', '3rdyr2ndsem', '3', '0', '3', 'OPMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:30:01', '2020-02-23 18:30:01', 250),
('LEAD 6', 'Leadership', '3rdyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:30:30', '2020-02-23 18:30:30', 251),
('THESIS', 'Thesis', '4thyr1stsem', '3', '0', '3', 'BUSRES', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:32:21', '2020-02-23 18:32:21', 252),
('LABREL', 'Labor Relations and Negotiations', '4thyr1stsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:33:07', '2020-02-23 18:33:07', 253),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:33:30', '2020-02-23 18:33:30', 254),
('PRACT', 'Work Integrated Learning (600 Hours)', '4thyr2ndsem', '3', '0', '3', 'Fourth Year', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:34:08', '2020-02-23 18:34:08', 255),
('SPT-HR', 'Special Topics in Human Resource Management', '4thyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:34:49', '2020-02-23 18:34:49', 256),
('LEAD 8', 'Leadership', '4thyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 17, series 2017', 'Inactive', '2020-02-23 18:35:20', '2020-02-23 18:35:20', 257),
('ENG 1', 'Study and Thinking skills', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:39:27', '2020-02-23 18:39:27', 258),
('MATH 1A', 'Fundamentals of Math', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:39:58', '2020-02-23 18:39:58', 259),
('FIL 1', 'Komunikasyon sa Akademikong Filipino', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:40:31', '2020-02-23 18:40:31', 260),
('NATSCI 1', 'Biological Science', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:41:00', '2020-02-23 18:41:00', 261),
('PSYCH 1', 'General Psychology', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:42:23', '2020-02-23 18:42:23', 262),
('SOCSCI 2 ', 'Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:43:14', '2020-02-23 18:43:14', 263),
('COMP 1', 'Basic Computer Program with Keyboarding', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:43:42', '2020-02-23 18:43:42', 264),
('NSTP 1', 'National Services Training Program 1 (CWTS)', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:44:36', '2020-02-23 18:44:36', 265),
('PE 1', 'Physical Fitness & Wellness', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:45:13', '2020-02-23 18:45:13', 266),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:46:11', '2020-02-23 18:46:11', 267),
('ENG 2', 'Writing in the Discipline', '1styr2ndsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:47:05', '2020-02-23 18:47:05', 268),
('MATH 1B', 'Contemporary Mathematics', '1styr2ndsem', '3', '0', '3', 'MATH 1A', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:48:59', '2020-02-23 18:48:59', 269),
('FIL 2', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', '1styr2ndsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:49:58', '2020-02-23 18:49:58', 270),
('NATSCI 2', 'Earth and Environmental Science', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:50:26', '2020-02-23 18:50:26', 271),
('SOCSCI 3', 'Sociology w/ Family Planning', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 18:50:59', '2020-02-23 18:50:59', 272),
('EDUC 1', 'Child and Adolescent Development', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 19:06:02', '2020-02-23 19:06:02', 273),
('EDUC 2', 'The Teaching Profession', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 19:06:26', '2020-02-23 19:06:26', 274),
('COMP 2', 'Information Communication Technology', '1styr2ndsem', '3', '0', '3', 'COMP 1', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 19:07:05', '2020-02-23 19:07:05', 275),
('NSTP 2', 'National Service Training Program 2 (CWTS)', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 19:08:25', '2020-02-23 19:08:25', 276),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 19:09:15', '2020-02-23 19:09:15', 277),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Inactive', '2020-02-23 19:10:54', '2020-02-23 19:10:54', 278),
('ENG 3', 'Speech and Oral Communication', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:11:40', '2020-02-23 19:11:40', 279),
('PHILO 1', 'Logic', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:11:58', '2020-02-23 19:11:58', 280),
('FIL 3', 'Masining na Pagpapahayag', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:14:58', '2020-02-23 19:14:58', 281),
('EDUC 3', 'Principles of Teaching 1', '2ndyr1stsem', '3', '0', '3', 'EDUC 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:15:34', '2020-02-23 19:15:34', 282),
('EDUC 4', 'Educational Technology 1', '2ndyr1stsem', '3', '0', '3', 'COMP 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:16:16', '2020-02-23 19:16:16', 283),
('FS 1', 'Field Study 1', '2ndyr1stsem', '0', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:16:38', '2020-02-23 19:16:38', 284),
('SPE 1', 'Foundation of Physical Education, Sports and Wellness', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:17:14', '2020-02-23 19:17:14', 285),
('SPE 2', 'Human Anatomy and Physiology', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:17:49', '2020-02-23 19:17:49', 286),
('PE 3', 'Individual / Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:18:19', '2020-02-23 19:18:19', 287),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:19:03', '2020-02-23 19:19:03', 288),
('HUMAN 1', 'Art Appreciation', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:20:01', '2020-02-23 19:20:01', 289),
('PHILO 3', 'Philosophy of Man', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:21:00', '2020-02-23 19:21:00', 290),
('EDUC 5  ', 'Principles of Teaching2', '2ndyr2ndsem', '3', '0', '3', 'EDUC 3', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:21:40', '2020-02-23 19:21:40', 291),
('EDUC 6', 'Educational Technology 2', '2ndyr2ndsem', '3', '0', '3', 'EDUC 4', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:22:18', '2020-02-23 19:22:18', 292),
('EDUC 7', 'Facilitating Learning', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:22:44', '2020-02-23 19:22:44', 293),
('FS 2', 'Field Study 2', '2ndyr2ndsem', '1', '0', '1', 'FS 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:23:45', '2020-02-23 19:23:45', 294),
('SPE 3', 'Introduction to Biometrics and Movement Education', '2ndyr2ndsem', '3', '0', '3', 'SPE 2', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:24:27', '2020-02-23 19:24:27', 295),
('SPE 4', 'Philippine Folk Dance', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:25:20', '2020-02-23 19:25:20', 296),
('SPE 5', 'Consumer Health, Drug and Safety Education', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:27:25', '2020-02-23 19:27:25', 297),
('PE 4', 'Team Sports and Games', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:27:54', '2020-02-23 19:27:54', 298),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:29:48', '2020-02-23 19:29:48', 299),
('LIT 1', 'Philippine Literature', '3rdyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:30:26', '2020-02-23 19:30:26', 300),
('EDUC 8', 'Assessment of Student Learning 1', '3rdyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:31:00', '2020-02-23 19:31:00', 301),
('EDUC 9', 'Curriculum Development', '3rdyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:31:38', '2020-02-23 19:31:38', 302),
('EDUC 10', 'Development Reading 1', '3rdyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:32:00', '2020-02-23 19:32:00', 303),
('FS 3', 'Field Study 3', '3rdyr1stsem', '3', '0', '3', 'FS 2', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:32:48', '2020-02-23 19:32:48', 304),
('FS 4', 'Field Study 4', '3rdyr1stsem', '1', '0', '1', 'FS 3', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:33:25', '2020-02-23 19:33:25', 305),
('ST 1', 'Special Topic in Education 1', '3rdyr1stsem', '1', '0', '1', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:33:57', '2020-02-23 19:33:57', 306),
('SPE 6', 'Individual-Dual Sports and Philippine Games', '3rdyr1stsem', '3', '0', '3', 'PE 3', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:36:10', '2020-02-23 19:36:10', 307),
('SPE 7', 'Gymnastics and Combative Sports', '3rdyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:37:13', '2020-02-23 19:37:13', 308),
('SPE 8', 'Aquatics', '3rdyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:37:30', '2020-02-23 19:37:30', 309),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:38:16', '2020-02-23 19:38:16', 310),
('LIT 2', 'World Literature', '3rdyr2ndsem', '3', '0', '3', 'LIT 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:38:56', '2020-02-23 19:38:56', 311),
('SOCSCI 2A', 'Philippine Goverment, Constitution with Human Rights', '3rdyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:40:20', '2020-02-23 19:40:20', 312),
('EDU 11', 'Assessment of Student Learning 2', '3rdyr2ndsem', '3', '0', '3', 'EDUC 8', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:40:57', '2020-02-23 19:40:57', 313),
('FS 5', 'Field Study 5', '3rdyr2ndsem', '1', '0', '1', 'FS 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:42:11', '2020-02-23 19:42:11', 314),
('FS 6', 'Field Study 6', '3rdyr2ndsem', '1', '0', '1', 'FS 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:42:35', '2020-02-23 19:42:35', 315),
('ST2', 'Special Topics in Education 2', '3rdyr2ndsem', '1', '0', '1', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:43:34', '2020-02-23 19:43:34', 316),
('SPE 9', 'Team Sports', '3rdyr2ndsem', '6', '0', '6', 'SPE 4', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:44:12', '2020-02-23 19:44:12', 317),
('SPE 10', 'Organization and Management of Physical Education, Sports, and Wellness Program', '3rdyr2ndsem', '6', '0', '6', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:44:56', '2020-02-23 19:44:56', 318),
('SPE 11', 'Research 1 in Physical Education', '3rdyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:45:23', '2020-02-23 19:45:23', 319),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:45:48', '2020-02-23 19:45:48', 320),
('SOCSCI 4', 'Economics w/ Taxation & Land', '4thyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:46:29', '2020-02-23 19:46:29', 321),
('EDUC 12', 'Practice Teaching 1', '4thyr1stsem', '3', '0', '3', 'FS 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:47:08', '2020-02-23 19:47:08', 322),
('ST 3', 'Special Topic in Education 3', '4thyr1stsem', '1', '0', '1', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:47:34', '2020-02-23 19:47:34', 323),
('SPE 12', 'International Folk Dance', '4thyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:47:56', '2020-02-23 19:47:56', 324),
('SPE 13', 'Methods and Techniques in Teaching Physical Education Sports and Wellness', '4thyr1stsem', '6', '0', '6', 'SPE 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:48:57', '2020-02-23 19:48:57', 325),
('SPE 14', 'Research II in Physical Education, Sports and Wellness', '4thyr1stsem', '3', '0', '3', 'SPE 11', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:49:39', '2020-02-23 19:49:39', 326),
('SPE 15', 'Measurement and Evaluation in Physical Education, Sports and Wellness', '4thyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:53:37', '2020-02-23 19:53:37', 327),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:53:55', '2020-02-23 19:53:55', 328),
('SOCSCI 5', 'RIzal, Life and Works', '4thyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:54:16', '2020-02-23 19:54:16', 329),
('EDUC 13', 'Practice Teaching 2', '4thyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:54:43', '2020-02-23 19:54:43', 330),
('EDUC 14', 'Social Dimensions of Education', '4thyr2ndsem', '3', '0', '3', 'EDUC 2', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:55:20', '2020-02-23 19:55:20', 331),
('SPE 16', 'Comprehensive School Health Education', '4thyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:56:07', '2020-02-23 19:56:07', 332),
('SPE 17', 'Special Physical Education, Sports and Wellness', '4thyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:56:55', '2020-02-23 19:56:55', 333),
('SPE 18', 'Emergency Preparedness and Response Management', '4thyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:57:24', '2020-02-23 19:57:24', 334),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2014-2015', 'Active', '2020-02-23 19:57:54', '2020-02-23 19:57:54', 335),
('UNDSELF', 'Understanding the Self/Pagunawa sa Sarili', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:01:49', '2020-02-23 20:01:49', 336),
('PHILHIS', 'Reading in Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:02:15', '2020-02-23 20:02:15', 337),
('MATHINV', 'Mathematics of Investment', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:02:57', '2020-02-23 20:02:57', 338),
('PURPCOMM', 'Purposive Communication', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:03:24', '2020-02-23 20:03:24', 339),
('ENVISCI', 'Environmental Science', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:03:47', '2020-02-23 20:03:47', 340),
('KOMFIL', 'Kontekswalisadong Komunikasyon sa Filipino', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:04:49', '2020-02-23 20:04:49', 341),
('ARTAPP', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:05:11', '2020-02-23 20:05:11', 342),
('ETHICS ', 'Ethics', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:05:27', '2020-02-23 20:05:27', 343),
('NSTP 1', 'National Servics Trainng Program 1', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:05:56', '2020-02-23 20:05:56', 344),
('PE 1', 'Physical Education 1', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:06:12', '2020-02-23 20:06:12', 345),
('LEAD 1', 'Leadership 1', '1styr1stsem', '1.5', '0', '1.5', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:06:57', '2020-02-23 20:06:57', 346),
('MATHWRLD', 'Mathematics in the Modern World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:07:49', '2020-02-23 20:07:49', 347),
('CONWRLD', 'The Contemporary World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:08:09', '2020-02-23 20:08:09', 348),
('CALLP', 'The Child and Adolescent learner and learning Principles', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:08:41', '2020-02-23 20:08:41', 349),
('PSPEAK', 'Public Speaking', '1styr2ndsem', '3', '0', '3', 'PURPCOMM', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:09:18', '2020-02-23 20:09:18', 350),
('SCITECH', 'Science, Technology and Security', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:10:04', '2020-02-23 20:10:04', 351),
('VISART', 'Reading Visual Art', '1styr2ndsem', '3', '0', '3', 'ARTAPP', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:10:27', '2020-02-23 20:10:27', 352),
('FILDIS', 'Filipino sa Iba\'t-ibang disiplina', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:10:58', '2020-02-23 20:10:58', 353),
('ANAPHY', 'Anatomy and Physiology of Human Movement', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:11:29', '2020-02-23 20:11:29', 354),
('NSTP 2', 'National Service Traiing Program 2', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:11:51', '2020-02-23 20:11:51', 355),
('PE 2', 'Physical Education 2', '1styr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:12:18', '2020-02-23 20:12:18', 356),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:12:49', '2020-02-23 20:12:49', 357),
('EDTECH 1', 'Technology for Teaching and Learning 1', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:18:23', '2020-02-23 20:18:23', 358),
('ENMIND', 'The Entreprenuarial Mind', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:18:55', '2020-02-23 20:18:55', 359),
('TPROF', 'The Teaching Profession', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:19:28', '2020-02-23 20:19:28', 360),
('FALECT', 'Facilitating Learner-Centered Teaching', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:20:27', '2020-02-23 20:20:27', 361),
('FOSPED', 'Foundation of Special and Inclusive Education', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:21:47', '2020-02-23 20:21:47', 362),
('PHYSIO', 'Physiology of Exercise and Physical Activity', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:22:20', '2020-02-23 20:22:20', 363),
('PMCLESD', 'Principles Motor Control and Learning Exercise Sports and Dance', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:23:09', '2020-02-23 20:23:09', 364),
('AMOCON', 'Applied Motor Control and Learning Exercise Sports and Dance', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:23:40', '2020-02-23 20:23:40', 365),
('SOSLIT', 'Sosyedad at Literature/Panitikang Panlipunan', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:24:44', '2020-02-23 20:24:44', 366),
('PE 3', 'Physical Education 3', '2ndyr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:25:11', '2020-02-23 20:25:11', 367),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:25:32', '2020-02-23 20:25:32', 368),
('EDTECH 2', 'Technology for Teaching and Learning 2', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:26:08', '2020-02-23 20:26:08', 369),
('TEAORG', 'The Teacher and Community School Culture and Oraganizational Leadership', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:27:02', '2020-02-23 20:27:02', 370),
('BENLAG', 'Building and Enchancing New Literacies Across the Curriculum', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:27:58', '2020-02-23 20:27:58', 371),
('TEASCURR', 'The Teacher and the School Curriculum', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:28:29', '2020-02-23 20:28:29', 372),
('INDIGAMES', 'Individual and Dual Games', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:29:11', '2020-02-23 20:29:11', 373),
('MOVEDUG', 'Movement Education', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:29:58', '2020-02-23 20:29:58', 374),
('AQUATICS', 'Swimming and Aquatics', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:31:12', '2020-02-23 20:31:12', 375),
('TDANCE', 'Philippine Traditional Dance', '2ndyr2ndsem', '3', '0', '3', 'PE 2', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:31:57', '2020-02-23 20:31:57', 376),
('SPORTSPSY', 'Sports and Exercise Psychology', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:32:40', '2020-02-23 20:32:40', 377),
('PE 4', 'Physical Education 4', '2ndyr2ndsem', '2', '0', '2', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:33:10', '2020-02-23 20:33:10', 378),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:33:41', '2020-02-23 20:33:41', 379),
('ASSMNT 1', 'Assessment in Learning 1', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:34:22', '2020-02-23 20:34:22', 380),
('INDANCE', 'International Dance and other Forms', '3rdyr1stsem', '3', '0', '3', 'PE 2', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:35:06', '2020-02-23 20:35:06', 381),
('PHILSOC ', 'Philosophical and Socio-anthropological', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:36:09', '2020-02-23 20:36:09', 382),
('PTGS', 'Philippine Traditional Games and Sports', '3rdyr1stsem', '3', '0', '3', 'PE 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:36:43', '2020-02-23 20:36:43', 383),
('SHPROG', 'Coordinated School Health Program', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:37:25', '2020-02-23 20:37:25', 384),
('PERCOM', 'Personal Community Environmental Health', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:38:01', '2020-02-23 20:38:01', 385),
('AMPHED', 'Administration and Management of Physical Education andn Health Education Program', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:39:06', '2020-02-23 20:39:06', 386),
('AMPHED', 'Administration and Management of Physical Education andn Health Education Program', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:39:07', '2020-02-23 20:39:07', 387),
('DCHED', 'Drug Education, Consumer Health Education and Healthy Eating', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:40:29', '2020-02-23 20:40:29', 388),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:41:15', '2020-02-23 20:41:15', 389),
('ASSMNT 2', 'Assessment in Learning 2', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:44:25', '2020-02-23 20:44:25', 390),
('TMSPORTS', 'Team Sports(Soccer/Football, Basketball, Baseball, Softball, Sepak Takraw', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:45:24', '2020-02-23 20:45:24', 391),
('RES 1', 'Research Physical Education', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:45:59', '2020-02-23 20:45:59', 392),
('NTGS', 'Non-Traditional Games', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:46:33', '2020-02-23 20:46:33', 393),
('PROTEACH', 'Process of Teaching PE and Health Education', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:47:09', '2020-02-23 20:47:09', 394),
('CAPHEAD', 'Curriculum and Assessment for Physical Education and Health Education', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:47:52', '2020-02-23 20:47:52', 395),
('RIZAL', 'Life and Workds of Dr. Jose Rizal', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:48:30', '2020-02-23 20:48:30', 396),
('EPSM', 'Emergency Preparedness and Salery Mgt', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:50:00', '2020-02-23 20:50:00', 397),
('EPSM', 'Emergency Preparedness and Salery Mgt', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:50:01', '2020-02-23 20:50:01', 398),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:50:34', '2020-02-23 20:50:34', 399),
('RES 2', 'Research in Physical Education 2', '4thyr1stsem', '3', '0', '3', 'RES 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:51:43', '2020-02-23 20:51:43', 400),
('FS 1', 'Field Study 1', '4thyr1stsem', '3', '0', '3', 'Fourth Year', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:52:17', '2020-02-23 20:52:17', 401),
('FS 2', 'Field Study 2', '4thyr1stsem', '3', '0', '3', 'Fourth Year', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:52:41', '2020-02-23 20:52:41', 402),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:53:13', '2020-02-23 20:53:13', 403),
('PRACTICUM', 'Teaching Internship', '4thyr2ndsem', '6', '0', '6', 'FS 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:54:11', '2020-02-23 20:54:11', 404),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curiculum Effective 2018-2019', 'Active', '2020-02-23 20:55:04', '2020-02-23 20:55:04', 405),
('ENG 1', 'Communications Arts 1', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:13:40', '2020-02-27 16:13:40', 407),
('MATH 1', 'College Algebra', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:14:21', '2020-02-27 16:14:21', 408),
('FIL 1', 'Komunikasyon sa Akademikong Filipino', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:14:46', '2020-02-27 16:14:46', 409),
('NATSCI 1', 'Biological Science', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:15:00', '2020-02-27 16:15:00', 410),
('COMP 1', 'Computer Fundamentals (Business Applications)', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:15:18', '2020-02-27 16:15:18', 411),
('SOCSCI 2', 'Phil. History, Politics and Governance with New Constitution', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:15:36', '2020-02-27 16:15:36', 412),
('HUMN 1', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:15:47', '2020-02-27 16:15:47', 413),
('LIT 1', 'Philippine Literature', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:16:00', '2020-02-27 16:16:00', 414),
('NSTP 1', 'National Service Training Program I', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:16:18', '2020-02-27 16:16:18', 415),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:16:32', '2020-02-27 16:16:32', 416),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:16:49', '2020-02-27 16:16:49', 417),
('ENG 2', 'Communication Skills 2', '1styr2ndsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:17:13', '2020-02-27 16:17:13', 418),
('MATH 2A', 'Math of Investment', '1styr2ndsem', '3', '0', '3', 'MATH 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:18:19', '2020-02-27 16:18:19', 419),
('FIL 2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '1styr2ndsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:55:12', '2020-02-27 16:55:12', 421),
('NATSCI 2', 'Environmental Science', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:55:54', '2020-02-27 16:55:54', 422),
('COMP 2', 'Data-Based Mgt. (Fundamentals of Programming)', '1styr2ndsem', '3', '0', '3', 'COMP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:56:28', '2020-02-27 16:56:28', 423),
('SOCSCI 3', 'Society and Culture with Family Planning/HIV', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:56:55', '2020-02-27 16:56:55', 424),
('PHILO 1', 'Intro to Philosophy with Logic and Critical Thinking', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:57:21', '2020-02-27 16:57:21', 425),
('PSYCH 1A ', 'Business Psychology', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:57:44', '2020-02-27 16:57:44', 426),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:57:58', '2020-02-27 16:57:58', 427),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:58:24', '2020-02-27 16:58:24', 428),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 16:58:40', '2020-02-27 16:58:40', 429),
('ENG 3', 'Speech Oral Communication', '2ndyr1stsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:00:11', '2020-02-27 17:00:11', 430),
('FIL 3', 'Masining na Pagpapahayag', '2ndyr1stsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:00:54', '2020-02-27 17:00:54', 431),
('MATH 3', 'Probability and Statistics', '2ndyr1stsem', '3', '0', '3', 'MATH 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:01:42', '2020-02-27 17:01:42', 432),
('PHILO 2 ', 'Ethics', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:01:59', '2020-02-27 17:01:59', 433),
('FORLAN', 'Foreign Language', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:02:09', '2020-02-27 17:02:09', 434),
('ACC 1', 'Principle of Accounting', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:02:34', '2020-02-27 17:02:34', 435),
('MGT 1', 'Introduction to Business Organization and Management', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:03:05', '2020-02-27 17:03:05', 436),
('PE 3', 'Individual/Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:03:21', '2020-02-27 17:03:21', 437),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:03:33', '2020-02-27 17:03:33', 438),
('ENG 4', 'Business Correspondence and Technical Writing', '2ndyr2ndsem', '3', '0', '3', 'ENG 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:04:00', '2020-02-27 17:04:00', 439),
('SOCSCI 4 ', 'Introduction to Economics with LRT', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:04:15', '2020-02-27 17:04:15', 440),
('SOCSCI 5', 'Life and Works of Rizal', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:04:26', '2020-02-27 17:04:26', 441),
('LAW', 'Law on Obligations, Contracts and Business Organization', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:04:50', '2020-02-27 17:04:50', 442),
('FIN 1', 'Principles of Finance', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:04:59', '2020-02-27 17:04:59', 443),
('ACC 2 ', 'Partnership and Corporation', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:05:21', '2020-02-27 17:05:21', 444),
('MGT 2', 'Human Behavior in Organization', '2ndyr2ndsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:05:41', '2020-02-27 17:05:41', 445),
('MKTG 1', 'Principles of Marketing ', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:05:58', '2020-02-27 17:05:58', 446),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:06:13', '2020-02-27 17:06:13', 447),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:06:31', '2020-02-27 17:06:31', 448),
('TAX ', 'Taxation', '3rdyr1stsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:07:27', '2020-02-27 17:07:27', 449),
('TAX ', 'Taxation', '3rdyr1stsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:07:27', '2020-02-27 17:07:27', 450),
('ECO 2', 'Microeconomics Theory and Practice ', '3rdyr1stsem', '3', '0', '3', 'SOCSCI 4 ', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:15:13', '2020-02-27 17:15:13', 454),
('APPDEV', 'Application Development and Emerging Technologies', '1styr2ndsem', '2', '1', '3', 'PROG2', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:16:01', '2020-02-27 17:16:01', 455),
('FIN 2', 'Financial Management', '3rdyr1stsem', '3', '0', '3', 'FIN 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:16:38', '2020-02-27 17:16:38', 456),
('ENTREP 1', 'Entrepreneurship Behavior', '3rdyr1stsem', '3', '0', '0', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:18:43', '2020-02-27 17:18:43', 457),
('ENTREP 1', 'Entrepreneurship Behavior', '3rdyr1stsem', '3', '0', '0', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:18:43', '2020-02-27 17:18:43', 458),
('ENTREP 2', 'Quantitative Techniques in Business (Optns Research)', '3rdyr1stsem', '3', '0', '3', 'MATH 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:23:40', '2020-02-27 17:23:40', 460),
('BUSOP', 'Business Opportunities ', '3rdyr1stsem', '6', '0', '6', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:26:02', '2020-02-27 17:26:02', 461),
('BPLN 1', 'Business Plan 1', '3rdyr1stsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:26:52', '2020-02-27 17:26:52', 462),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:27:38', '2020-02-27 17:27:38', 463),
('MGT 8', 'Business Research', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:28:09', '2020-02-27 17:28:09', 464),
('MKTG 9', 'International Marketing ', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:29:19', '2020-02-27 17:29:19', 465),
('ENTREP 3', 'Venture Capital', '3rdyr2ndsem', '3', '0', '3', 'ENTREP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:30:52', '2020-02-27 17:30:52', 466),
('ENTREP 4', 'Small Business Consulting', '3rdyr2ndsem', '3', '0', '3', 'ENTREP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:31:36', '2020-02-27 17:31:36', 467),
('ENTREP 5', 'Managing the Family Firm ', '3rdyr2ndsem', '3', '0', '3', 'ENTREP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:32:26', '2020-02-27 17:32:26', 468),
('ENTREP 6', 'Managing a Service Enterprise ', '3rdyr2ndsem', '3', '0', '3', 'ENTREP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:33:19', '2020-02-27 17:33:19', 469),
('BPLN 2', 'Business Plan 2', '3rdyr2ndsem', '3', '0', '3', 'BPLN 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:34:06', '2020-02-27 17:34:06', 470),
('PRCT 1', 'Practicum (Internship) - 150 Hrs.', '3rdyr2ndsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:34:37', '2020-02-27 17:34:37', 471),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:34:47', '2020-02-27 17:34:47', 472),
('MKTG 11', 'Franchising ', '4thyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:35:45', '2020-02-27 17:35:45', 473),
('ENTREP 8', 'Wholesale and Retail Sales ', '4thyr1stsem', '3', '0', '3', 'ENTREP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:36:38', '2020-02-27 17:36:38', 474),
('BPI 1', 'Business Plan Implementation 1', '4thyr1stsem', '5', '0', '5', 'BPLN 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:37:27', '2020-02-27 17:37:27', 475),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:37:55', '2020-02-27 17:37:55', 476),
('ENTREP 9', 'Capital and Securities Markets ', '4thyr2ndsem', '3', '0', '3', 'ENTREP 3', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:39:09', '2020-02-27 17:39:09', 477),
('BPI 2', 'Business Plan Implementation 2', '4thyr2ndsem', '5', '0', '5', 'BPI 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:39:59', '2020-02-27 17:39:59', 478),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 17, series 2006', 'Inactive', '2020-02-27 17:40:10', '2020-02-27 17:40:10', 479),
('UNDSELF', 'Understanding the Self', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:43:49', '2020-02-27 17:43:49', 480),
('PHILHIS', 'Readings in Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:43:58', '2020-02-27 17:43:58', 481),
('PURPCOM', 'Purposive Communication', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:44:12', '2020-02-27 17:44:12', 482),
('KOMFIL', 'Kontekswalisadong Komunikasyon sa Filipino', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:44:20', '2020-02-27 17:44:20', 483),
('ARTAPP', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:44:34', '2020-02-27 17:44:34', 484),
('ETHICS', 'Ethics', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:44:42', '2020-02-27 17:44:42', 485),
('NSTP 1', 'National Service Training Program I', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:44:56', '2020-02-27 17:44:56', 486),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:45:05', '2020-02-27 17:45:05', 487),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:45:14', '2020-02-27 17:45:14', 488),
('MATWRLD', 'Mathematics in the Modern World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:45:29', '2020-02-27 17:45:29', 489),
('CONWRLD', 'The Contemporary World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:45:39', '2020-02-27 17:45:39', 490),
('RIZAL', 'Rizal\'s Life and Works ', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:46:07', '2020-02-27 17:46:07', 491),
('FILDIS', 'Filipino sa Iba\'t-ibang disiplina', '1styr2ndsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:46:36', '2020-02-27 17:46:36', 492),
('SCITECH', 'Science Technology and Society', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:47:04', '2020-02-27 17:47:04', 493),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:47:20', '2020-02-27 17:47:20', 494),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:47:32', '2020-02-27 17:47:32', 495),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:47:50', '2020-02-27 17:47:50', 496),
('MANACC', 'Managerial Accounting', '2ndyr1stsem', '3', '0', '3', 'ACCTG', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:48:35', '2020-02-27 17:48:35', 497),
('MARMAN', 'Marketing Management', '2ndyr1stsem', '3', '0', '3', 'MKTG 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:49:05', '2020-02-27 17:49:05', 498),
('MICECO', 'Basic Microeconomics', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:49:26', '2020-02-27 17:49:26', 499),
('HRMAN', 'Human Resource Management', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:49:40', '2020-02-27 17:49:40', 500),
('BUSTAX', 'Business Law & Taxation', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:50:40', '2020-02-27 17:50:40', 501),
('INTEBUS', 'International Business and Trade', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:50:58', '2020-02-27 17:50:58', 502),
('SOSLIT', 'Sosyedad at Literatura', '2ndyr1stsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:51:15', '2020-02-27 17:51:15', 503),
('PE 3', 'Individual/Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:51:30', '2020-02-27 17:51:30', 504),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:51:40', '2020-02-27 17:51:40', 505),
('ADVCOM', 'Advanced Computer Applicatios for Business', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:52:06', '2020-02-27 17:52:06', 506);
INSERT INTO `subject` (`subject_code`, `subject_title`, `yrsem_id`, `lecture`, `laboratory`, `units`, `pre_requisite`, `curriculum_title`, `Status`, `created_at`, `updated_at`, `subj_id`) VALUES
('ENTREBE', 'Entrepreneurship Behavior', '2ndyr2ndsem', '3', '0', '0', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:53:00', '2020-02-27 17:53:00', 507),
('OPPOSE', 'Opportunity Seeking', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:53:44', '2020-02-27 17:53:44', 508),
('MARCOB', 'Market Research & Consumer Behavior', '2ndyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:55:49', '2020-02-27 17:55:49', 509),
('PRICOS', 'Pricing & Costing', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:56:42', '2020-02-27 17:56:42', 510),
('ENLEORG', 'Entrepeneurship Leadership in an Organization', '2ndyr2ndsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:58:09', '2020-02-27 17:58:09', 511),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:58:33', '2020-02-27 17:58:33', 512),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:58:51', '2020-02-27 17:58:51', 513),
('TRACK1', 'Agribusiness', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 17:59:51', '2020-02-27 17:59:51', 514),
('SOCENT', 'Social Entrepreneurship', '3rdyr1stsem', '3', '0', '3', 'OPPOSE', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:00:56', '2020-02-27 18:00:56', 515),
('INOVMAN', 'Innovation Management ', '3rdyr1stsem', '3', '0', '3', 'PRODMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:01:52', '2020-02-27 18:01:52', 516),
('ENTREMAR', 'Entrepreneurial Marketing Strategies ', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:09:20', '2020-02-27 18:09:20', 517),
('PPED', 'Programs & Policies on Enterprise Dev\'t ', '3rdyr1stsem', '3', '0', '3', 'HRMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:13:29', '2020-02-27 18:13:29', 518),
('OPMAN', 'Operation Management (TQM)', '3rdyr1stsem', '3', '0', '3', 'BA Core', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:14:09', '2020-02-27 18:14:09', 519),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:14:30', '2020-02-27 18:14:30', 520),
('TRACK2', 'Tourism Business', '3rdyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:15:24', '2020-02-27 18:15:24', 521),
('BP-PRE', 'Business Plan Preparation', '3rdyr2ndsem', '3', '0', '3', 'OPPOSE', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:16:09', '2020-02-27 18:16:09', 522),
('FINMAN', 'Financial Management', '3rdyr2ndsem', '3', '0', '3', 'MANACC', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:16:50', '2020-02-27 18:16:50', 523),
('E-COMM', 'E-Commerce & Internet Mktg', '3rdyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:17:40', '2020-02-27 18:17:40', 524),
('MICROFIN', 'Microfinancing', '3rdyr2ndsem', '3', '0', '3', 'MANACC', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:18:20', '2020-02-27 18:18:20', 525),
('STRAMAN', 'Strategic Management', '3rdyr2ndsem', '3', '0', '3', 'BA Core', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:18:44', '2020-02-27 18:18:44', 526),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:18:58', '2020-02-27 18:18:58', 527),
('TRACK 3', 'Service Business ', '4thyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:19:33', '2020-02-27 18:19:33', 528),
('BP-IMPLE1', 'Business Plan Implementation 1', '4thyr1stsem', '5', '0', '5', 'BP-PRE', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:20:13', '2020-02-27 18:20:13', 529),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:20:26', '2020-02-27 18:20:26', 530),
('TRACK 4', 'Export Business', '4thyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:21:08', '2020-02-27 18:21:08', 531),
('BP-IMPLE2', 'Business Plan Implementation 2', '4thyr2ndsem', '5', '0', '5', 'BP-IMPLE1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:22:04', '2020-02-27 18:22:04', 532),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO 18, series 2017', 'Active', '2020-02-27 18:22:21', '2020-02-27 18:22:21', 533),
('UNDSELF', 'Understanding the Self', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:31:16', '2020-02-27 18:31:16', 534),
('PHILHIS', 'Readings in Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:31:26', '2020-02-27 18:31:26', 535),
('MATHINV', 'Math of Investment', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:31:48', '2020-02-27 18:31:48', 536),
('PURPCOM', 'Purposive Communication', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:32:03', '2020-02-27 18:32:03', 537),
('KOMFIL', 'Kontekswalisadong Komunikasyon sa Filipino', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:32:25', '2020-02-27 18:32:25', 538),
('ETHICS', 'Ethics', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:32:43', '2020-02-27 18:32:43', 539),
('ARTAPP', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:32:57', '2020-02-27 18:32:57', 540),
('NSTP 1', 'National Service Training Program I', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:33:05', '2020-02-27 18:33:05', 541),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:33:19', '2020-02-27 18:33:19', 542),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:33:27', '2020-02-27 18:33:27', 543),
('MATHWRLD', 'Mathematics in the Modern World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:33:42', '2020-02-27 18:33:42', 544),
('CONWRLD', 'The Contemporary World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:33:54', '2020-02-27 18:33:54', 545),
('RIZAL', 'Rizal\'s Life and Works ', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:34:08', '2020-02-27 18:34:08', 546),
('PSPEAK', 'Public Speaking', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:34:22', '2020-02-27 18:34:22', 547),
('FILDIS', 'Filipino sa Iba\'t-ibang Disiplina', '1styr2ndsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:34:40', '2020-02-27 18:34:40', 548),
('ENMIND', 'The Entreprenuerial Mind', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:34:57', '2020-02-27 18:34:57', 549),
('SCITECH', 'Science Technology and Society', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:35:11', '2020-02-27 18:35:11', 550),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:35:24', '2020-02-27 18:35:24', 551),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:35:35', '2020-02-27 18:35:35', 552),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:35:52', '2020-02-27 18:35:52', 553),
('MANACC', 'Managerial Accounting', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:36:47', '2020-02-27 18:36:47', 554),
('MARMAN', 'Marketing Management', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:37:01', '2020-02-27 18:37:01', 555),
('MICECO', 'Basic Microeconomics', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:37:16', '2020-02-27 18:37:16', 556),
('HRMAN', 'Human Resource Management', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:37:30', '2020-02-27 18:37:30', 557),
('TAX ', 'Taxation', '2ndyr1stsem', '3', '0', '3', 'Third Year', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:37:47', '2020-02-27 18:37:47', 558),
('INTEBUS', 'International Business and Trade', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:38:06', '2020-02-27 18:38:06', 559),
('SOSLIT', 'Sosyedad at Literatura', '2ndyr1stsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:38:26', '2020-02-27 18:38:26', 560),
('PE 3', 'Individual/Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:38:36', '2020-02-27 18:38:36', 561),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:38:56', '2020-02-27 18:38:56', 562),
('ADVCOM', 'Advanced Computer Applicatios for Business', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:39:21', '2020-02-27 18:39:21', 563),
('STATRES', 'Statistics for Research ', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:39:35', '2020-02-27 18:39:35', 564),
('MARKRES', 'Marketing Research', '2ndyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:40:54', '2020-02-27 18:40:54', 565),
('BUSLAW', 'Business Law(Obli-Con)', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:41:11', '2020-02-27 18:41:11', 566),
('GGSR', 'Good Governance & Social Responsibility', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:41:24', '2020-02-27 18:41:24', 567),
('PRODMAN', 'Product Management', '2ndyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:42:05', '2020-02-27 18:42:05', 568),
('PRISTRAT', 'Pricing Strategy', '2ndyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:42:56', '2020-02-27 18:42:56', 569),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:43:16', '2020-02-27 18:43:16', 570),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:43:33', '2020-02-27 18:43:33', 571),
('OPMAN', 'Operation Management (TQM)', '3rdyr1stsem', '3', '0', '3', 'PRODMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:44:21', '2020-02-27 18:44:21', 572),
('DISMAN', 'Distribution Management', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:45:27', '2020-02-27 18:45:27', 573),
('ADVER', 'Advertising', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:46:09', '2020-02-27 18:46:09', 574),
('INTEMAR', 'International Marketing', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:46:51', '2020-02-27 18:46:51', 575),
('SERVMAR', 'Services Marketing ', '3rdyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:47:32', '2020-02-27 18:47:32', 576),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:48:03', '2020-02-27 18:48:03', 577),
('STRAMAN', 'Strategic Management', '3rdyr2ndsem', '3', '0', '3', 'OPMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:49:01', '2020-02-27 18:49:01', 578),
('RETMAN', 'Retail Management', '3rdyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:49:52', '2020-02-27 18:49:52', 579),
('PROSAL', 'Professional Salesmanship', '3rdyr2ndsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:50:41', '2020-02-27 18:50:41', 580),
('BUSRES', 'Business Research', '3rdyr2ndsem', '3', '0', '3', 'STATRES', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:51:00', '2020-02-27 18:51:00', 581),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:51:19', '2020-02-27 18:51:19', 582),
('THESIS', 'Thesis', '4thyr1stsem', '3', '0', '3', 'BUSRES', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:51:43', '2020-02-27 18:51:43', 583),
('MARKDEV', 'New Market Development', '4thyr1stsem', '3', '0', '3', 'MARMAN', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:52:22', '2020-02-27 18:52:22', 584),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:52:53', '2020-02-27 18:52:53', 585),
('PRACT', 'Work Integrated Learning (600 Hours)', '4thyr2ndsem', '6', '0', '6', 'Fourth Year', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:53:29', '2020-02-27 18:53:29', 586),
('SPT-MM', 'Special Topics in Marketing Mgt', '4thyr2ndsem', '3', '0', '3', 'Fourth Year', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:54:38', '2020-02-27 18:54:38', 587),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '1.5', '0', '1.5', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-2019 Based on CMO 17, series 2017', 'Inactive', '2020-02-27 18:54:58', '2020-02-27 18:54:58', 588),
('ENG 1', 'Communication Skills 1', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 18:58:37', '2020-02-27 18:58:37', 589),
('MATH 1', 'College Algebra', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 18:58:53', '2020-02-27 18:58:53', 590),
('FIL 1', 'Komunikasyon sa Akademikong Filipino', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 18:59:04', '2020-02-27 18:59:04', 591),
('NATSCI 1', 'Biological Science', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 18:59:18', '2020-02-27 18:59:18', 592),
('COMP 1', 'Computer Fundamentals (Business Applications)', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 18:59:45', '2020-02-27 18:59:45', 593),
('SOCSCI 2', 'Phil. History, Politics and Governance with New Constitution', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:00:07', '2020-02-27 19:00:07', 594),
('HUMN 1', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:00:22', '2020-02-27 19:00:22', 595),
('LIT 1', 'Philippine Literature', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:00:40', '2020-02-27 19:00:40', 596),
('NSTP 1', 'National Service Training Program I', '1styr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:01:20', '2020-02-27 19:01:20', 597),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:01:35', '2020-02-27 19:01:35', 598),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:01:51', '2020-02-27 19:01:51', 599),
('ENG 2', 'Communication Skills 2', '1styr2ndsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:02:05', '2020-02-27 19:02:05', 600),
('MATH 2A', 'Math of Investment', '1styr2ndsem', '3', '0', '3', 'MATH 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:04:15', '2020-02-27 19:04:15', 601),
('FIL 2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '1styr2ndsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:05:05', '2020-02-27 19:05:05', 602),
('NATSCI 2', 'Environmental Science', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:05:33', '2020-02-27 19:05:33', 603),
('COMP 2', 'Data-Based Mgt. (Fundamentals of Programming)', '1styr2ndsem', '3', '0', '3', 'COMP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:05:48', '2020-02-27 19:05:48', 604),
('SOCSCI 3', 'Society and Culture with Family Planning/HIV', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:06:11', '2020-02-27 19:06:11', 605),
('PHILO 1', 'Intro to Philosophy with Logic and Critical Thinking', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:06:35', '2020-02-27 19:06:35', 606),
('PSYCH 1A ', 'Business Psychology', '1styr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:06:55', '2020-02-27 19:06:55', 607),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:07:08', '2020-02-27 19:07:08', 608),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:07:34', '2020-02-27 19:07:34', 609),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:07:55', '2020-02-27 19:07:55', 610),
('ENG 3', 'Speech Oral Communication', '2ndyr1stsem', '3', '0', '3', 'ENG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:08:44', '2020-02-27 19:08:44', 611),
('FIL 3', 'Masining na Pagpapahayag', '2ndyr1stsem', '3', '0', '3', 'FIL 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:09:11', '2020-02-27 19:09:11', 612),
('MATH 3', 'Probability and Statistics', '2ndyr1stsem', '3', '0', '3', 'MATH 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:09:53', '2020-02-27 19:09:53', 613),
('PHILO 2 ', 'Ethics', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:10:14', '2020-02-27 19:10:14', 614),
('FORLAN', 'Foreign Language', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:10:57', '2020-02-27 19:10:57', 615),
('ACC 1', 'Principle of Accounting', '2ndyr1stsem', '3', '0', '3', 'MATH 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:11:26', '2020-02-27 19:11:26', 616),
('MGT 1', 'Introduction to Business Organization and Management', '2ndyr1stsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:11:43', '2020-02-27 19:11:43', 617),
('PE 3', 'Individual/Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:11:55', '2020-02-27 19:11:55', 618),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:12:17', '2020-02-27 19:12:17', 619),
('ENG 4', 'Business Correspondence and Technical Writing', '2ndyr2ndsem', '3', '0', '3', 'ENG 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:12:41', '2020-02-27 19:12:41', 620),
('SOCSCI 4 ', 'Introduction to Economics with LRT', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:12:58', '2020-02-27 19:12:58', 621),
('SOCSCI 5', 'Life and Works of Rizal', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:13:42', '2020-02-27 19:13:42', 622),
('LAW', 'Law on Obligations, Contracts and Business Organization', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:14:00', '2020-02-27 19:14:00', 623),
('FIN 1', 'Principles of Finance', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:14:22', '2020-02-27 19:14:22', 624),
('ACC 2 ', 'Partnership and Corporation', '2ndyr2ndsem', '3', '0', '3', 'ACC 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:14:38', '2020-02-27 19:14:38', 625),
('MGT 2', 'Human Behavior in Organization', '2ndyr2ndsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:14:57', '2020-02-27 19:14:57', 626),
('MKTG 1', 'Principles of Marketing ', '2ndyr2ndsem', '3', '0', '3', 'None', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:16:33', '2020-02-27 19:16:33', 627),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:16:54', '2020-02-27 19:16:54', 628),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:17:14', '2020-02-27 19:17:14', 629),
('TAX ', 'Taxation', '3rdyr1stsem', '3', '0', '3', 'Third Year', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:17:54', '2020-02-27 19:17:54', 630),
('MGT 3', 'Human Resource Management', '3rdyr1stsem', '3', '0', '3', 'MGT 2', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:18:23', '2020-02-27 19:18:23', 631),
('MGT 4', 'Good Governance and Social Responsibility ', '3rdyr1stsem', '3', '0', '3', 'MGT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:18:37', '2020-02-27 19:18:37', 632),
('MKTG 2 ', 'Professional Salesmanship', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:20:03', '2020-02-27 19:20:03', 633),
('MKTG 3 ', 'Product Management ', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:21:05', '2020-02-27 19:21:05', 634),
('MKTG 4', 'Distribution Management', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:24:35', '2020-02-27 19:24:35', 635),
('MKTG 4', 'Distribution Management', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:24:35', '2020-02-27 19:24:35', 636),
('MKTG 5', 'Retail Management', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:26:11', '2020-02-27 19:26:11', 637),
('PRCT 1', 'Practicum (Internship) - 150 Hrs.', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:27:18', '2020-02-27 19:27:18', 638),
('PRCT 1', 'Practicum (Internship) - 150 Hrs.', '3rdyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:27:18', '2020-02-27 19:27:18', 639),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:28:14', '2020-02-27 19:28:14', 640),
('MGT 7', 'Strategic Management (Business Policy & Strategy - Mgt)', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:33:36', '2020-02-27 19:33:36', 641),
('MGT 8', 'Business Research', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:34:32', '2020-02-27 19:34:32', 642),
('MGT 9', 'Total Quality Management', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:35:34', '2020-02-27 19:35:34', 643),
('MKTG 6', 'Consumer Behavior ', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:36:28', '2020-02-27 19:36:28', 644),
('MKTG 7', 'Advertising', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:37:18', '2020-02-27 19:37:18', 645),
('MKTG 8', 'Marketing Management', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:37:57', '2020-02-27 19:37:57', 646),
('MKTG 9', 'International Marketing ', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:38:18', '2020-02-27 19:38:18', 647),
('Feasib 1', 'Feasibility Study I (Entrepreneunal Mgt.)', '3rdyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:38:35', '2020-02-27 19:38:35', 648),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:38:52', '2020-02-27 19:38:52', 649),
('MKTG 10', 'Services Marketing', '4thyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:40:01', '2020-02-27 19:40:01', 650),
('MKTG 11', 'Franchising ', '4thyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:40:37', '2020-02-27 19:40:37', 651),
('MKTG 12', 'E-Commerce and Internet Marketing', '4thyr1stsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:41:25', '2020-02-27 19:41:25', 652),
('FEASIB 2', 'Feasibility Study II', '4thyr1stsem', '3', '0', '3', 'Feasib 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:41:45', '2020-02-27 19:41:45', 653),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:41:56', '2020-02-27 19:41:56', 654),
('MGT 10', 'Special Topics in Business Management (Seminars - Mgt.)', '4thyr2ndsem', '3', '0', '3', 'MKTG 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:42:42', '2020-02-27 19:42:42', 655),
('PRCT 2', 'Practicum (On-the-Job-Training) - 350 Hrs.', '4thyr2ndsem', '6', '0', '6', 'PRCT 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:43:09', '2020-02-27 19:43:09', 656),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'Revised Curriculum Effective 2015-2016 Based on CMO 39.series 2006', 'Active', '2020-02-27 19:43:25', '2020-02-27 19:43:25', 657),
('UNDSELF', 'Understanding the Self', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:00:39', '2020-02-27 20:00:39', 658),
('PHILHIS', 'Readings in Philippine History', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:01:02', '2020-02-27 20:01:02', 659),
('MATHINV', 'Mathematics of Investment', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:01:33', '2020-02-27 20:01:33', 660),
('PURPCOMM', 'Purposive Communication', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:01:49', '2020-02-27 20:01:49', 661),
('ENVISCI', 'Environmental Science', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:02:00', '2020-02-27 20:02:00', 662),
('KOMFIL', 'Kontekswalisadong Komunikasyon sa Filipino', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:02:11', '2020-02-27 20:02:11', 663),
('ARTAPP', 'Art Appreciation', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:02:26', '2020-02-27 20:02:26', 664),
('ETHICS', 'Ethics', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:02:39', '2020-02-27 20:02:39', 665),
('NSTP 1', 'National Service Training Program I', '1styr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:02:56', '2020-02-27 20:02:56', 666),
('PE 1', 'Physical Fitness', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:03:10', '2020-02-27 20:03:10', 667),
('LEAD 1', 'Leadership 1', '1styr1stsem', '2', '0', '2', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:03:22', '2020-02-27 20:03:22', 668),
('MATHWRLD', 'Mathematics in the Modern World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:03:54', '2020-02-27 20:03:54', 669),
('CONWRLD', 'The Contemporary World', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:04:07', '2020-02-27 20:04:07', 670),
('CALLP', 'The Child and Adolescent learner and learning Principles', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:04:20', '2020-02-27 20:04:20', 671),
('PSPEAK', 'Public Speaking', '1styr2ndsem', '3', '0', '3', 'PURPCOMM', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:04:37', '2020-02-27 20:04:37', 672),
('SCITECH', 'Science Technology and Society', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:04:51', '2020-02-27 20:04:51', 673),
('VISART', 'Reading Visual Art', '1styr2ndsem', '3', '0', '3', 'ARTAPP', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:05:05', '2020-02-27 20:05:05', 674),
('FILDIS', 'Filipino sa Iba\'t-ibang Disiplina', '1styr2ndsem', '3', '0', '3', 'KOMFIL', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:05:17', '2020-02-27 20:05:17', 675),
('LINGUISTICS', 'Introduction to Linguistics', '1styr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:06:27', '2020-02-27 20:06:27', 676),
('NSTP 2', 'National Service Training Program II', '1styr2ndsem', '3', '0', '3', 'NSTP 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:06:53', '2020-02-27 20:06:53', 677),
('PE 2', 'Rhythmic Activities', '1styr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:07:03', '2020-02-27 20:07:03', 678),
('LEAD 2', 'Leadership 2', '1styr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:07:15', '2020-02-27 20:07:15', 679),
('EDTECH 1', 'Technology for Teaching and Learning 1', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:08:01', '2020-02-27 20:08:01', 680),
('ENMIND', 'The Entreprenuerial Mind', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:08:49', '2020-02-27 20:08:49', 681),
('ENMIND', 'The Entreprenuerial Mind', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:08:53', '2020-02-27 20:08:53', 682),
('TPROF', 'The Teaching Profession', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:10:02', '2020-02-27 20:10:02', 683),
('FALECT', 'Facilitating Learner-Centered Teaching', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:10:38', '2020-02-27 20:10:38', 684),
('FALECT', 'Facilitating Learner-Centered Teaching', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:10:39', '2020-02-27 20:10:39', 685),
('FOSPED', 'Foundation of Special and Inclusive Education', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:11:53', '2020-02-27 20:11:53', 686),
('LCS', 'Language, Culture Society', '2ndyr1stsem', '3', '0', '3', 'LINGUISTICS', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:13:43', '2020-02-27 20:13:43', 687),
('ESTRUCT', 'Structure of English', '2ndyr1stsem', '3', '0', '3', 'LINGUISTICS', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:16:33', '2020-02-27 20:16:33', 688),
('SOSLIT', 'Sosyedad at Literatura/Panitikang Panlipunan', '2ndyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:17:34', '2020-02-27 20:17:34', 689),
('PE 3', 'Individual/Dual Sports', '2ndyr1stsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:18:15', '2020-02-27 20:18:15', 690),
('LEAD 3', 'Leadership 3', '2ndyr1stsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:19:33', '2020-02-27 20:19:33', 691),
('EDTECH 2', 'Technology for Teaching and Learning 2', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:19:55', '2020-02-27 20:19:55', 692),
('TEAORG', 'The Teacher and Community School Culture and Oraganizational Leadership', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:20:09', '2020-02-27 20:20:09', 693),
('BENLAG', 'Building and Enchancing New Literacies Across the Curriculum', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:20:43', '2020-02-27 20:20:43', 694),
('TEASCURR', 'The Teacher and the School Curriculum', '2ndyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:20:58', '2020-02-27 20:20:58', 695),
('LAN ACQ', 'Principle and Theories of Language Acquisition and Learning', '2ndyr2ndsem', '3', '0', '3', 'LCS', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:22:26', '2020-02-27 20:22:26', 696),
('TECHWRIT', 'Technical Writing ', '2ndyr2ndsem', '3', '0', '3', 'ESTRUCT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:23:22', '2020-02-27 20:23:22', 697),
('STARTS', 'Speech and Theater Arts ', '2ndyr2ndsem', '3', '0', '3', 'ESTRUCT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:24:41', '2020-02-27 20:24:41', 698),
('MYTH', 'Mythology and folklore ', '2ndyr2ndsem', '3', '0', '3', 'LCS', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:25:23', '2020-02-27 20:25:23', 699),
('PE 4', 'Team Sports', '2ndyr2ndsem', '2', '0', '2', 'PE 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:25:37', '2020-02-27 20:25:37', 700),
('LEAD 4', 'Leadership 4', '2ndyr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:25:49', '2020-02-27 20:25:49', 701),
('ASSMNT 1', 'Assessment in Learning 1', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:26:21', '2020-02-27 20:26:21', 702),
('CHILDLIT', 'Children and Adolescent Literature ', '3rdyr1stsem', '3', '0', '3', 'LAN ACQ', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:27:13', '2020-02-27 20:27:13', 703),
('PROGPOL', 'Language Program and Policies in Multilingual Societies', '3rdyr1stsem', '3', '0', '3', 'LAN ACQ', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:28:34', '2020-02-27 20:28:34', 704),
('MATDEV', 'Preparation of Language Learning Materials ', '3rdyr1stsem', '3', '0', '3', 'LAN ACQ', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:29:44', '2020-02-27 20:29:44', 705),
('TASLIT', 'Teaching and Assessment of Literature ', '3rdyr1stsem', '3', '0', '3', 'LAN ACQ', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:30:42', '2020-02-27 20:30:42', 706),
('CAMJOURN', 'Campus Journalism', '3rdyr1stsem', '3', '0', '3', 'TECHWRIT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:31:34', '2020-02-27 20:31:34', 707),
('CREWWRIT', 'Creative Writing ', '3rdyr1stsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:32:19', '2020-02-27 20:32:19', 708),
('TASGRAM', 'Teaching and Assessment of Grammar ', '3rdyr1stsem', '3', '0', '3', 'ESTRUCT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:33:09', '2020-02-27 20:33:09', 709),
('TASMAC', 'Teaching and Assessment of the Macroskills', '3rdyr1stsem', '3', '0', '3', 'LCS', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:34:02', '2020-02-27 20:34:02', 710),
('LEAD 5', 'Leadership 5', '3rdyr1stsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:34:19', '2020-02-27 20:34:19', 711),
('ASSMNT 2', 'Assessment in Learning 2', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:34:37', '2020-02-27 20:34:37', 712),
('AFROLIT', 'Survey of Afro-Asian Literature ', '3rdyr2ndsem', '3', '0', '3', 'CHILDLIT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:35:30', '2020-02-27 20:35:30', 713),
('ENAMLIT', 'Survey of English and American Literature ', '3rdyr2ndsem', '3', '0', '3', 'CHILDLIT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:36:46', '2020-02-27 20:36:46', 714),
('POPLIT', 'Contemporary and Popular Literature ', '3rdyr2ndsem', '3', '0', '3', 'CHILDLIT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:37:32', '2020-02-27 20:37:32', 715),
('PHILIT', 'Survey of Philippine Literature in English', '3rdyr2ndsem', '3', '0', '3', 'CHILDLIT', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:38:33', '2020-02-27 20:38:33', 716),
('RES 1', 'Research Physical Education', '3rdyr2ndsem', '3', '0', '3', 'LAN ACQ', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:38:58', '2020-02-27 20:38:58', 717),
('REMINST', 'Remedial Instruction', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:39:49', '2020-02-27 20:39:49', 718),
('RIZAL', 'Life and Workds of Dr. Jose Rizal', '3rdyr2ndsem', '3', '0', '3', 'None', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:40:22', '2020-02-27 20:40:22', 719),
('LEAD 6', 'Leadership 6', '3rdyr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:40:35', '2020-02-27 20:40:35', 720),
('LITCRIT', 'Literary Criticism', '4thyr1stsem', '3', '0', '3', 'all lit subj', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:41:50', '2020-02-27 20:41:50', 721),
('RES 2', 'Research in Physical Education 2', '4thyr1stsem', '3', '0', '3', 'RES 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:42:07', '2020-02-27 20:42:07', 722),
('FS 1', 'Field Study 1', '4thyr1stsem', '3', '0', '3', 'Fourth Year', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:42:41', '2020-02-27 20:42:41', 723),
('FS 2', 'Field Study 2', '4thyr1stsem', '3', '0', '3', 'Fourth Year', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:43:27', '2020-02-27 20:43:27', 724),
('LEAD 7', 'Leadership 7', '4thyr1stsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:43:42', '2020-02-27 20:43:42', 725),
('PRACTICUM', 'Teaching Internship', '4thyr2ndsem', '6', '0', '6', 'FS 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:43:59', '2020-02-27 20:43:59', 726),
('LEAD 8', 'Leadership 8', '4thyr2ndsem', '2', '0', '2', 'LEAD 1', 'K-12 Aligned Curriculum Effective 2018-19 Based on CMO No.75 Series of 2017', 'Active', '2020-02-27 20:44:10', '2020-02-27 20:44:10', 727);

-- --------------------------------------------------------

--
-- Table structure for table `timeframe`
--

CREATE TABLE `timeframe` (
  `id` int(11) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeframe`
--

INSERT INTO `timeframe` (`id`, `school_year`, `semester`, `date_from`, `date_to`, `type`, `status`) VALUES
(1, '2019-2020', 'Second Semester', '2020-02-18', '2020-02-21', 'enrollment', 'Inactive'),
(2, '2019-2020', 'Second Semester', '2020-02-17', '2020-02-21', 'submission', 'Inactive'),
(3, '2020-2021', 'First Semester', '2023-01-01', '2020-02-01', 'enrollment', 'Inactive'),
(4, '2020-2021', 'First Semester', '2020-02-14', '2020-02-12', 'enrollment', 'Inactive'),
(5, '2020-2021', 'First Semester', '2020-05-05', '2020-06-06', 'enrollment', 'Inactive'),
(6, '2020-2021', 'First Semester', '2020-05-12', '2020-05-19', 'enrollment', 'Inactive'),
(7, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(8, '2020-2021', 'First Semester', '2020-05-10', '2020-05-29', 'enrollment', 'Inactive'),
(9, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(10, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(11, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(12, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(13, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(14, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(15, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(16, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(17, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(18, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(19, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(20, '2020-2021', 'First Semester', '2020-05-03', '2020-05-29', 'enrollment', 'Inactive'),
(21, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(22, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(23, '2020-2021', 'First Semester', '2020-05-18', '2020-05-29', 'enrollment', 'Inactive'),
(24, '2020-2021', 'First Semester', '2020-05-25', '2020-05-29', 'enrollment', 'Inactive'),
(25, '2020-2021', 'Second Semester', '2020-06-14', '2020-06-26', 'enrollment', 'Inactive'),
(26, '2020-2021', 'First Semester', '2020-06-14', '2020-06-19', 'enrollment', 'Inactive'),
(27, '2020-2021', 'Second Semester', '2020-06-08', '2020-06-19', 'enrollment', 'Inactive'),
(28, '2020-2021', 'First Semester', '2020-06-08', '2020-06-20', 'enrollment', 'Inactive'),
(29, '2020-2021', 'Second Semester', '2020-06-08', '2020-06-19', 'enrollment', 'Inactive'),
(30, '2020-2021', 'First Semester', '2020-06-08', '2020-06-19', 'enrollment', 'Inactive'),
(31, '2020-2021', 'First Semester', '2020-06-08', '2020-06-19', 'enrollment', 'Inactive'),
(32, '2020-2021', 'First Semester', '2020-06-08', '2020-06-19', 'enrollment', 'Inactive'),
(33, '2020-2021', 'First Semester', '2020-06-08', '2020-06-19', 'enrollment', 'Inactive'),
(34, '2020-2021', 'First Semester', '2020-06-22', '2020-07-03', 'enrollment', 'Inactive'),
(35, '2020-2021', 'First Semester', '2020-06-20', '2020-06-26', 'enrollment', 'Inactive'),
(36, '2020-2021', 'First Semester', '2020-06-29', '2020-07-10', 'enrollment', 'Inactive'),
(37, '2020-2021', 'Second Semester', '2020-07-07', '2020-07-17', 'enrollment', 'Inactive'),
(38, '2020-2021', 'First Semester', '2020-07-07', '2020-07-24', 'enrollment', 'Inactive'),
(39, '2020-2021', 'Second Semester', '2020-08-31', '2020-09-04', 'enrollment', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(250) NOT NULL,
  `studentnumber` varchar(250) NOT NULL,
  `official_receipt` varchar(250) NOT NULL,
  `otherfees_id` int(250) NOT NULL,
  `total_amount` int(250) NOT NULL,
  `cash_rendered` int(250) NOT NULL,
  `amount_change` int(250) NOT NULL,
  `cashier` varchar(250) NOT NULL,
  `schoolyear` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `date_paid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_all`
--

CREATE TABLE `transaction_all` (
  `transaction_id` int(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `official_receipt` varchar(250) NOT NULL,
  `cash_rendered` int(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `schoolyr` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `cashier` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_paid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_all`
--

INSERT INTO `transaction_all` (`transaction_id`, `lastname`, `firstname`, `middlename`, `official_receipt`, `cash_rendered`, `amount`, `schoolyr`, `semester`, `cashier`, `description`, `date_paid`) VALUES
(0, 'Magcalas', 'Joey', 'Parcero', '2', 1400, 4000, '2020-2021', 'Second Semester', 'cashier', 'Tuition Fees', '2020-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_fees`
--

CREATE TABLE `transaction_fees` (
  `fees_id` int(250) NOT NULL,
  `student_number` varchar(250) NOT NULL,
  `scholar` varchar(50) NOT NULL,
  `promissory_note` int(250) NOT NULL,
  `official_receipt` int(250) NOT NULL,
  `cash_rendered` int(250) NOT NULL,
  `balance` int(250) NOT NULL,
  `discount` int(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `discounted` int(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `cashier` varchar(250) NOT NULL,
  `schoolyr` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_fees`
--

INSERT INTO `transaction_fees` (`fees_id`, `student_number`, `scholar`, `promissory_note`, `official_receipt`, `cash_rendered`, `balance`, `discount`, `amount`, `discounted`, `status`, `cashier`, `schoolyr`, `semester`, `date`) VALUES
(1, '2016-06-06601', 'Partial Scholar', 1, 2, 1400, 2600, 0, 4000, 0, 'Enrolled', 'cashier', '2020-2021', 'Second Semester', '2020-08-26'),
(2, '2016-06-06601', 'Partial Scholar', 0, 3, 2600, 0, 0, 4000, 0, 'Enrolled', 'cashier', '2020-2021', 'Second Semester', '2020-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `transferee_student`
--

CREATE TABLE `transferee_student` (
  `ts_id` int(11) NOT NULL,
  `sisnum` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `course` int(20) NOT NULL,
  `major` int(20) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `school_last_attended` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transferee_student`
--

INSERT INTO `transferee_student` (`ts_id`, `sisnum`, `firstname`, `lastname`, `course`, `major`, `middlename`, `school_last_attended`) VALUES
(1, '1', 'Zach Jaiden', 'Magcalas', 0, 0, 'Garcia', 'Ateneo De La Salle University');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_fees`
--

CREATE TABLE `tuition_fees` (
  `tf_id` int(250) NOT NULL,
  `tuition_fees` int(250) NOT NULL,
  `date_implemented` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition_fees`
--

INSERT INTO `tuition_fees` (`tf_id`, `tuition_fees`, `date_implemented`, `remarks`) VALUES
(1, 150, '2020-02-27 15:22:41', 'Old Curriculum'),
(2, 200, '2020-02-27 15:23:08', 'K-12 Aligned Curriculum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(20) NOT NULL,
  `major` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `middlename`, `username`, `password`, `usertype`, `department`, `course`, `major`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$QXRGYkR2OVdTQ2VUdDVLTA$1XDEQlF6uAH+0ldpcTwBUSoIA4oBufaCyMhp5F7wo9s', 'Super Admin', 'Registrar', 'All', 'ALL', '2020-01-06 05:40:16', '2020-08-27 03:49:52'),
(2, 'dwadwad', 'dwadwadwaaw', 'Balce', 'admin2', '$argon2i$v=19$m=1024,t=2,p=2$dWw5Qi9HbkhIajRxQnlxUw$UGNL42qgt7JjEF88aYEEsJ5EFwjuL6T2Eix2HXk3CYo', 'Admin', 'Admin', 'All', 'ALL', '2020-01-06 05:40:16', '2020-05-26 06:59:45'),
(6, 'mj', 'mj', 'mj', 'mj', '$argon2i$v=19$m=65536,t=4,p=1$MVUzZ1kucVFvOEFVQ1M5Ug$+AXHCLXDako3zlR/Wd1i+ePeq4lZRcLuWvO3CkvRSvo', 'Admin', 'Accounting', 'All', 'ALL', '2020-01-12 10:57:34', '2020-05-26 06:59:45'),
(7, 'Staff', 'Staff', 'Staff', 'staff', '$argon2i$v=19$m=65536,t=4,p=1$SW5EOWtSZVRKRVh1WVZ6Qg$6drnjUhbjGl35+pZIykV5FCFs02scxc/mkgNj8HnS+Q', 'Staff', 'Registrar', 'All', 'ALL', '2020-01-13 06:16:14', '2020-08-26 06:08:48'),
(8, 'Joey', 'Magcalas', 'Parcero', 'registrar', '$argon2i$v=19$m=65536,t=4,p=1$aFdHYXRXemJxMzl0dktWNQ$DZV3CPOlUYkesZpWOJbYNbVTsedRRLmZ6Vx5swHeblQ', 'Admin', 'Registrar', 'All', 'ALL', '2020-01-19 02:12:09', '2020-05-26 06:59:45'),
(15, 'a', 'a', 'a', 'a', '$argon2i$v=19$m=1024,t=2,p=2$dEkwakFINGt6czVKL0FDZg$D0oqbVoLivarGXyiVLzrseaB5fIJFejEeJOtCZcM8Xg', 'Cashier', 'Accounting', 'All', 'ALL', '2020-01-19 11:14:04', '2020-05-26 06:59:45'),
(16, 'b', 'b', 'b', 'b', '$argon2i$v=19$m=1024,t=2,p=2$NjI3dUhXUDl5Mmt3b0FMTg$4foeDknWqAZD248mZWwo7gy6B8J5Yo/KQqG75h4kLNg', 'Cashier', 'Accounting', 'All', 'ALL', '2020-01-19 11:16:54', '2020-05-26 06:59:45'),
(24, 'c', 'c', 'c', 'c', '$argon2i$v=19$m=1024,t=2,p=2$Y1U2cXpFWnlpZGRsRTZzUw$V/hrQu5xDYtWsADOk9yvBJSJD1/Ti6kuN8YqbOgs5Fo', 'Admin', 'Registrar', 'All', 'ALL', '2020-01-19 11:49:26', '2020-05-26 06:59:45'),
(29, 'acc', 'acc', 'acc', 'acc', '$argon2i$v=19$m=65536,t=4,p=1$aXhuelE5TFhtSWRUYzMveg$B5UlyK3kglZU/TUj27vzq7EhoS9DWlEMWa7M14EQQkc', 'Admin', 'Accounting', 'All', 'ALL', '2020-01-23 11:23:59', '2020-05-26 06:59:45'),
(30, 'Jasper', 'De Jesus', 'Ato', 'faculty1', '$argon2i$v=19$m=1024,t=2,p=2$T0tlbDM3VFNGUDN1L0wuRw$lhsi/idpZl6OssC/vgW2dI33H9r5LW+AVagTfUTa3Ho', 'Faculty', 'Faculty', 'All', 'ALL', '2020-01-29 14:21:54', '2020-06-23 13:05:35'),
(31, 'Jane', 'Santos', 'Sanchez', 'faculty2', '$argon2i$v=19$m=65536,t=4,p=1$RXhzYnEuVlljazVCcjc4bg$PhNsvzLxnFNvOqynEHtwulQgf6D2NiR0p+sAygqF4GA', 'Faculty', 'Faculty', 'All', 'ALL', '2020-02-02 09:09:22', '2020-06-23 13:05:59'),
(32, 'Zach Jaiden', 'Garcia', 'Magcalas', 'zach', '$argon2i$v=19$m=65536,t=4,p=1$MEdZZjlQNDl6YzhPNHcyeg$NGF4hzvTtTG2fdmNKTdb4xAA8J7IPVnlTZIeHZ78Fr0', 'Enlistment', 'Registrar', 'BSBA', 'Human Resources Management', '2020-02-17 11:02:17', '2020-06-01 04:02:55'),
(33, 'accounting', 'accounting', 'accounting', 'accounting', '$argon2i$v=19$m=65536,t=4,p=1$dmRIM0ovV0dhVUx5LzlORg$dS88/ji52dYOkK8cejmnBtnZv+0eFQBfIUunX64f/7s', 'Admin', 'Accounting', 'Choose Course', 'No Major', '2020-02-18 16:19:37', '2020-05-30 17:09:14'),
(34, 'cashier', 'cashier', 'cashier', 'cashier', '$argon2i$v=19$m=65536,t=4,p=1$bkMzeFU4cllxQzF6NWhqQg$uOuJd9OPI0ceG+Q9KktwobxlQDExoFfVGKOKXCFzjn8', 'Cashier', 'Accounting', 'Choose Course', 'ALL', '2020-02-18 16:19:59', '2020-05-26 06:59:45'),
(35, 'admission', 'admission', 'admission', 'admission', '$argon2i$v=19$m=65536,t=4,p=1$cVZjL1BNYnV4cHBFUzNoVQ$n8m6zW5/Sv7ing8BIZ6Mdu+p/2IPPt/z6ghKVicschU', 'Admin', 'Admission', 'Choose Course', 'No Major', '2020-02-23 18:39:27', '2020-05-30 17:09:10'),
(36, 'advising', 'advising', 'advising', 'advising', '$argon2i$v=19$m=65536,t=4,p=1$YTlkbEg4WEZ1UXZZOENCYw$aJeIZF/M2CH6BU5kOxG7p4QhqosIBtiiQEikNqb+q5s', 'Enlistment', 'Registrar', 'BSIT', 'No Major', '2020-03-09 06:57:36', '2020-05-30 17:09:07'),
(41, 'Myra Christine', 'San Miguel', 'Padilla', 'myra', '$argon2i$v=19$m=65536,t=4,p=1$L0NQaUVJZU5TZHY0YmtBUw$tzAhIxmzc3jVnRnBQdnSlUiudqmSKGMzCzyKJFlMZ48', 'Faculty-Head', 'Registrar', 'BSIT', 'No Major', '2020-06-04 08:58:02', '2020-06-04 08:58:02'),
(42, 'Jerome', 'Avengoza', 'Sarmiento', 'jerome', '$argon2i$v=19$m=65536,t=4,p=1$VDRyZmRBRW1CY2tDSXlhTg$9Xw1NXPfFbQ7+bLjH/NvguOXnOG5NTF7yl22vJ3s6pY', 'Faculty-Head', 'Registrar', 'BSBA', 'Marketing Management', '2020-06-13 13:32:05', '2020-06-13 13:32:05'),
(43, 'Accounting', 'Admin', 'Admin', 'accadmin', '$argon2i$v=19$m=65536,t=4,p=1$UkxXNlE5b3d6WElqQXcyQg$Vrf+Acby/EeY/TONjzth32wzHKnBY9XlbC3l2F6byVo', 'Admin', 'Accounting', 'All', 'All', '2020-08-26 04:37:42', '2020-08-26 04:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `webpages_flag`
--

CREATE TABLE `webpages_flag` (
  `id` int(11) NOT NULL,
  `webpage` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webpages_flag`
--

INSERT INTO `webpages_flag` (`id`, `webpage`, `status`) VALUES
(1, 'faculty', 1),
(2, 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `year_and_semester`
--

CREATE TABLE `year_and_semester` (
  `yrsem_id` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year_and_semester`
--

INSERT INTO `year_and_semester` (`yrsem_id`, `year`, `sem`) VALUES
('1styr1stsem', 'First Year', 'First Semester'),
('1styr2ndsem', 'First Year', 'Second Semester'),
('1styrsummer', 'First Year', 'Summer'),
('2ndyr1stsem', 'Second Year', 'First Semester'),
('2ndyr2ndsem', 'Second Year', 'Second Semester'),
('2ndyrsummer', 'Second Year', 'Summer'),
('3rdyr1stsem', 'Third Year', 'First Semester'),
('3rdyr2ndsem', 'Third Year', 'Second Semester'),
('3rdyrsummer', 'Third Year', 'Summer'),
('4thyr1stsem', 'Fourth Year', 'First Semester'),
('4thyr2ndsem', 'Fourth Year', 'Second Semester'),
('4thyrsummer', 'Fourth Year', 'Summer'),
('5thyr1stsem', 'Fifth Year', 'First Semester'),
('5thyr2ndsem', 'Fifth Year', 'Second Semester'),
('5thyrsummer', 'Fifth Year', 'Summer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_freshmenstudent_credentials`
--
ALTER TABLE `admission_freshmenstudent_credentials`
  ADD PRIMARY KEY (`freshmen_credentials_id`);

--
-- Indexes for table `admission_student_musthave`
--
ALTER TABLE `admission_student_musthave`
  ADD PRIMARY KEY (`admission_student_musthave_id`);

--
-- Indexes for table `admission_student_score`
--
ALTER TABLE `admission_student_score`
  ADD PRIMARY KEY (`score_id`),
  ADD UNIQUE KEY `sisnum` (`sisnum`);

--
-- Indexes for table `admission_transfereestudent_credentials`
--
ALTER TABLE `admission_transfereestudent_credentials`
  ADD PRIMARY KEY (`transferee_credentials_id`);

--
-- Indexes for table `chosen_schedule`
--
ALTER TABLE `chosen_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_record`
--
ALTER TABLE `class_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `credited_subject`
--
ALTER TABLE `credited_subject`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `current_fees`
--
ALTER TABLE `current_fees`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`curriculum_title`);

--
-- Indexes for table `entrance_exam`
--
ALTER TABLE `entrance_exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `entrance_exam_permit`
--
ALTER TABLE `entrance_exam_permit`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `faculty_user`
--
ALTER TABLE `faculty_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradereport_config`
--
ALTER TABLE `gradereport_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_viewing_code`
--
ALTER TABLE `grade_viewing_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_fees`
--
ALTER TABLE `other_fees`
  ADD PRIMARY KEY (`ofs_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `payment_com`
--
ALTER TABLE `payment_com`
  ADD PRIMARY KEY (`paycom`);

--
-- Indexes for table `petition_price`
--
ALTER TABLE `petition_price`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `petition_request`
--
ALTER TABLE `petition_request`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessions_id`);

--
-- Indexes for table `shifting_student`
--
ALTER TABLE `shifting_student`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `statement_of_account`
--
ALTER TABLE `statement_of_account`
  ADD PRIMARY KEY (`sao_id`);

--
-- Indexes for table `student_enrollment_record`
--
ALTER TABLE `student_enrollment_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`sisnum`),
  ADD UNIQUE KEY `student_number` (`student_number`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`),
  ADD UNIQUE KEY `subj_id` (`subj_id`);

--
-- Indexes for table `timeframe`
--
ALTER TABLE `timeframe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `transaction_all`
--
ALTER TABLE `transaction_all`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_fees`
--
ALTER TABLE `transaction_fees`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `transferee_student`
--
ALTER TABLE `transferee_student`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_and_semester`
--
ALTER TABLE `year_and_semester`
  ADD PRIMARY KEY (`yrsem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_freshmenstudent_credentials`
--
ALTER TABLE `admission_freshmenstudent_credentials`
  MODIFY `freshmen_credentials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admission_student_musthave`
--
ALTER TABLE `admission_student_musthave`
  MODIFY `admission_student_musthave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admission_student_score`
--
ALTER TABLE `admission_student_score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admission_transfereestudent_credentials`
--
ALTER TABLE `admission_transfereestudent_credentials`
  MODIFY `transferee_credentials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chosen_schedule`
--
ALTER TABLE `chosen_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `class_record`
--
ALTER TABLE `class_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `credited_subject`
--
ALTER TABLE `credited_subject`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `current_fees`
--
ALTER TABLE `current_fees`
  MODIFY `cf_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `entrance_exam`
--
ALTER TABLE `entrance_exam`
  MODIFY `e_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrance_exam_permit`
--
ALTER TABLE `entrance_exam_permit`
  MODIFY `ee_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty_user`
--
ALTER TABLE `faculty_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gradereport_config`
--
ALTER TABLE `gradereport_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `grade_viewing_code`
--
ALTER TABLE `grade_viewing_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `other_fees`
--
ALTER TABLE `other_fees`
  MODIFY `ofs_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petition_request`
--
ALTER TABLE `petition_request`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `shifting_student`
--
ALTER TABLE `shifting_student`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_enrollment_record`
--
ALTER TABLE `student_enrollment_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `sisnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_user`
--
ALTER TABLE `student_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=728;

--
-- AUTO_INCREMENT for table `timeframe`
--
ALTER TABLE `timeframe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transaction_fees`
--
ALTER TABLE `transaction_fees`
  MODIFY `fees_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transferee_student`
--
ALTER TABLE `transferee_student`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
