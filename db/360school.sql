-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2018 at 05:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `360school`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_courses`
--

CREATE TABLE `add_courses` (
  `id` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `course_title` varchar(200) NOT NULL,
  `course_tutor` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `book_author` varchar(50) DEFAULT NULL,
  `duration` varchar(20) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` text,
  `thumbnail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_courses`
--

INSERT INTO `add_courses` (`id`, `cat`, `course_title`, `course_tutor`, `institution`, `book_author`, `duration`, `course_type`, `description`, `keywords`, `thumbnail`) VALUES
(1, 'faculty', 'cname', 'ctutor', 'institution', 'bauthor', 'duration', 'ctype', 'description', 'science computer IT ', 'thumbnail'),
(2, 'Computer Sciences', 'Java Programming', '360academia', '360academia', 'Unknown', '11:58', 'Cirtificate', 'test', 'science computer IT Mathematics', ''),
(3, 'Computer Science', 'Java Programming', '360academi', '360academia ', 'Unknown', '06:19', 'Cirtificate', 'Checking', 'Mathematics Physics Science Art Applied-art', '0(9).png'),
(4, 'Computer Science', 'Java Programmin', '360academia', '360academia ', 'Unknown', '22:57', 'Diploma', 'Again', NULL, '2.JPG'),
(5, 'Computer Science', 'Java Programmin', '360academi', '360academia ', 'Unknown', '22:57', 'Diploma', 'Ok', NULL, 'Solomon Mbak Joshua.pdf'),
(6, 'Computer Science', 'Java Programming', '360academia', '360academia', 'Unknown', '00:55', 'Diploma', 'llllllllllllllllllllll', NULL, '2.JPG'),
(7, 'Computer Science', 'Java Programmin', '360academi', '360academia', 'Unknown', '10:57', 'Diploma', 'mmmmmmmmmmmmmmmmmmmm', NULL, 'img/2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `book_shelf`
--

CREATE TABLE `book_shelf` (
  `id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `user_id` int(100) NOT NULL,
  `course_title` varchar(300) NOT NULL,
  `thumbnail` text NOT NULL,
  `duration` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(250) NOT NULL,
  `cat_title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Computer'),
(2, 'Mathematics'),
(3, 'Physics'),
(4, 'Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` varchar(200) NOT NULL,
  `contact_message` mediumtext NOT NULL,
  `sent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `sent_date`) VALUES
(7, 'Test', 'tester@test.com', 'What are you?', 'Where do I get information about whom exactly you are?', '2018-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(150) NOT NULL,
  `faculty_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_title`) VALUES
(1, 'Practical Science'),
(2, 'Theoretical Science ');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin_info`
--

CREATE TABLE `master_admin_info` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_oname` varchar(255) NOT NULL,
  `admin_gender` varchar(10) NOT NULL,
  `admin_country` varchar(255) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_phone` double NOT NULL,
  `admin_dr` date NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` char(100) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `admin_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin_info`
--

INSERT INTO `master_admin_info` (`admin_id`, `admin_fname`, `admin_oname`, `admin_gender`, `admin_country`, `admin_dob`, `admin_phone`, `admin_dr`, `admin_email`, `admin_password`, `status`, `admin_image`) VALUES
(1, 'Admin', 'First Admin', 'male', 'Nigeria', '2018-10-01', 8000000000, '2018-10-01', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'approved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_tutor_info`
--

CREATE TABLE `master_tutor_info` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_oname` varchar(255) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_phone` double NOT NULL,
  `user_dr` date NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` char(32) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_user_info`
--

CREATE TABLE `master_user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `other_names` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `dor` date NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_user_info`
--

INSERT INTO `master_user_info` (`user_id`, `first_name`, `other_names`, `gender`, `phone`, `email`, `status`, `dob`, `dor`, `password`) VALUES
(1, 'User', 'First User', 'Male', '08011111111', 'user@user.com', 'activate', '1982-07-22', '2018-10-04', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `table_add_category`
--

CREATE TABLE `table_add_category` (
  `add_cat_id` int(11) NOT NULL,
  `add_cat_name` varchar(200) NOT NULL,
  `add_cat_order` int(11) NOT NULL,
  `add_cat_image` varchar(200) NOT NULL,
  `top_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_add_category`
--

INSERT INTO `table_add_category` (`add_cat_id`, `add_cat_name`, `add_cat_order`, `add_cat_image`, `top_cat_id`) VALUES
(29, 'CSS', 2, '2018-09-13_08-06-3328195788.gif', 17),
(30, 'Bootstrap', 4, '2018-09-13_08-07-3529303793.jpg', 17),
(31, 'Devices', 1, '2018-09-13_09-48-3253338684.jpg', 21),
(32, 'Transmissions', 2, '2018-09-13_09-49-0150305042.jpg', 21),
(33, 'Devices', 1, '2018-09-13_09-49-4933199309.jpg', 20),
(34, 'Java', 1, '2018-09-13_09-50-2544046301.jpg', 18),
(35, '.NET', 1, '2018-09-13_09-50-4475033037.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `table_assessment`
--

CREATE TABLE `table_assessment` (
  `assessment_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `assessment_content` longtext NOT NULL,
  `option_a` varchar(2000) NOT NULL,
  `option_b` varchar(2000) NOT NULL,
  `option_c` varchar(2000) NOT NULL,
  `option_d` varchar(2000) NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_assessment`
--

INSERT INTO `table_assessment` (`assessment_id`, `cat_id`, `assessment_content`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(7, 28, 'What is HTML', 'A Dialect', 'A program', 'A Scripting Language', 'A Job', 'c'),
(8, 29, 'What is CSS?', 'A Dialect', 'Easy', 'Not easy', 'A scripting language', 'd'),
(9, 28, 'What do I use HTML for?', 'Cooking', 'Building houses', 'Building websites', 'Design a cloth', 'c'),
(10, 28, 'What is a tag?', 'A something used to identification', 'Used as a header', 'Used for fun', 'doesn\'t exist', 'a'),
(11, 28, 'What is a tag?', 'A something used to identification', 'Used as a header', 'Used for fun', 'doesn\'t exist', 'a'),
(12, 28, 'What is a tag?', 'A something used to identification', 'Used as a header', 'Used for fun', 'doesn\'t exist', 'a'),
(13, 28, 'What does a header tag do?', 'It is a none usable tag', 'There is nothing like that', 'It holds the heading', 'It keeps a topic', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `table_lecture`
--

CREATE TABLE `table_lecture` (
  `lecture_id` int(11) NOT NULL,
  `lecture_content` longtext NOT NULL,
  `lecture_order` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_lecture`
--

INSERT INTO `table_lecture` (`lecture_id`, `lecture_content`, `lecture_order`, `sub_cat_id`) VALUES
(4, '<p>testing</p>\r\n\r\n<p><img alt=\"\" src=\"/360academia/Learn/admin/kcfinder/upload/images/AKSUBLOG.jpg\" style=\"height:200px; width:200px\" /></p>', 1, 5),
(5, '<p>testingg again</p>\r\n\r\n<p>kkkkkkkkkkkkkkkkkkk</p>\r\n\r\n<p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>', 2, 6),
(6, '<p><a id=\"Admin\" name=\"Admin\">testingg again</a></p>\r\n\r\n<p>kkkkkkkkkkkkkkkkkkk</p>\r\n\r\n<p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>\r\n\r\n<p>testingg again</p>\r\n\r\n<p>kkkkkkkkkkkkkkkkkkk</p>\r\n\r\n<p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>\r\n\r\n<p><img alt=\"\" src=\"/360academia/Learn/admin/kcfinder/upload/images/April%20Blue.jpg\" style=\"height:160px; width:200px\" /></p>', 3, 7),
(7, '', 22, 0),
(8, '', 22, 8),
(9, '', 25, 14);

-- --------------------------------------------------------

--
-- Table structure for table `table_scores`
--

CREATE TABLE `table_scores` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_scores`
--

INSERT INTO `table_scores` (`score_id`, `user_id`, `assessment_id`, `score`) VALUES
(1, 0, 0, 83),
(2, 0, 0, 83),
(3, 0, 0, 83),
(4, 10, 0, 83),
(5, 10, 0, 83),
(6, 10, 0, 83),
(7, 10, 0, 83),
(8, 10, 28, 83);

-- --------------------------------------------------------

--
-- Table structure for table `table_study`
--

CREATE TABLE `table_study` (
  `study_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_study`
--

INSERT INTO `table_study` (`study_id`, `user_id`, `add_cat_id`, `sub_cat_id`) VALUES
(1, 10, 28, 5),
(2, 10, 28, 7),
(4, 10, 29, 8),
(5, 10, 28, 6),
(6, 10, 32, 10),
(7, 10, 32, 11),
(8, 10, 32, 12),
(9, 10, 32, 13),
(10, 10, 29, 9);

-- --------------------------------------------------------

--
-- Table structure for table `table_sub_category`
--

CREATE TABLE `table_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(200) NOT NULL,
  `sub_cat_order` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_sub_category`
--

INSERT INTO `table_sub_category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_order`, `cat_id`) VALUES
(5, 'Lecture 1: Introduction to HTML', 1, 28),
(6, 'Lecture 2: HTML Tags', 2, 28),
(7, 'Lecture 3: HTML Paragraphs', 3, 28),
(8, 'Lecture 1: Introduction to CSS', 1, 29),
(9, 'Lecture 2: CSS Colors', 2, 29),
(10, 'Lecture 1: Introduction to Transmissions', 1, 32),
(11, 'Lecture 2: Transmission Devices', 2, 32),
(12, 'Lecture 3: Introduction to IP Addresses', 4, 32),
(13, 'Lecture 1: Introduction to the overall concept of IP addresses', 5, 32),
(14, 'Lecture 1: Introduction to Java', 1, 34),
(15, 'Lecture 1: Strings', 2, 34);

-- --------------------------------------------------------

--
-- Table structure for table `table_top_category`
--

CREATE TABLE `table_top_category` (
  `top_cat_id` int(11) NOT NULL,
  `top_cat_name` varchar(200) NOT NULL,
  `top_cat_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_top_category`
--

INSERT INTO `table_top_category` (`top_cat_id`, `top_cat_name`, `top_cat_order`) VALUES
(17, 'Web Development', 1),
(18, 'Computer Programming', 2),
(19, 'Project Management', 3),
(20, 'Basic Maintenance', 4),
(21, 'Networking', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_courses`
--
ALTER TABLE `add_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_shelf`
--
ALTER TABLE `book_shelf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `master_admin_info`
--
ALTER TABLE `master_admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `user_email` (`admin_email`),
  ADD UNIQUE KEY `user_phone` (`admin_phone`),
  ADD KEY `user_email_2` (`admin_email`),
  ADD KEY `user_country_id` (`admin_country`),
  ADD KEY `user_email_3` (`admin_email`);

--
-- Indexes for table `master_tutor_info`
--
ALTER TABLE `master_tutor_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD KEY `user_email_2` (`user_email`),
  ADD KEY `user_country_id` (`user_country`),
  ADD KEY `user_email_3` (`user_email`);

--
-- Indexes for table `master_user_info`
--
ALTER TABLE `master_user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `table_add_category`
--
ALTER TABLE `table_add_category`
  ADD PRIMARY KEY (`add_cat_id`);

--
-- Indexes for table `table_assessment`
--
ALTER TABLE `table_assessment`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexes for table `table_lecture`
--
ALTER TABLE `table_lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `table_scores`
--
ALTER TABLE `table_scores`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `table_study`
--
ALTER TABLE `table_study`
  ADD PRIMARY KEY (`study_id`);

--
-- Indexes for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `table_top_category`
--
ALTER TABLE `table_top_category`
  ADD PRIMARY KEY (`top_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_courses`
--
ALTER TABLE `add_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_shelf`
--
ALTER TABLE `book_shelf`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_admin_info`
--
ALTER TABLE `master_admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_tutor_info`
--
ALTER TABLE `master_tutor_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_user_info`
--
ALTER TABLE `master_user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_add_category`
--
ALTER TABLE `table_add_category`
  MODIFY `add_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `table_assessment`
--
ALTER TABLE `table_assessment`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_lecture`
--
ALTER TABLE `table_lecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_scores`
--
ALTER TABLE `table_scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_study`
--
ALTER TABLE `table_study`
  MODIFY `study_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_top_category`
--
ALTER TABLE `table_top_category`
  MODIFY `top_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
