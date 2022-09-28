-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 12:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'mainadmin@gmail.com', 'admin1234'),
(5, 'hiteshodii', 'hiteshodedara1010@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` int(10) NOT NULL,
  `user_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_name`, `user_email`, `user_mobile`, `user_message`) VALUES
(1, 'odedara hitesh', 'hiteshodedara1010@gmail.com', 91, 'hello?'),
(2, 'hiteshodii', 'mahergamerz.official10@gmail.com', 91, 'i ammkwifw'),
(3, 'jkreghw', 'hitodiigamerz09@gmail.com', 6347289, 'efwuygdihsj'),
(4, 'ef', 'hiteshodedara1010@gmail.com', 1234, 'sfdgdfg'),
(6, 'janni', 'admin@gmail.com', 2147483647, 'this is good...\r\n'),
(7, 'uthygrtf', 'hiteshodedara1010@gmail.com', 2147483647, '8koji7uh6y5gt4frdew'),
(8, 'p9okiujyhgt', 'hiteshodedara1010@gmail.com', 2147483647, 'olikmujynhbtgvrfcedxs'),
(9, 'ikmujnhbgvf', 'hiteshodedara1010@gmail.com', 2147483647, 'kmujnyhtgfcdxsujyhbtgvfc'),
(10, 'ikujyhtgf', 'admin@gmail.com', 2147483647, 'kmjnhbgvfcdxsf nhjhgbfvdcx'),
(11, 'uyjnhtbgvf', 'hiteshodedara1010@gmail.com', 1234567890, 'ikmujnyhbgvfcdx'),
(12, 'Hitesh', 'admin@gmail.com', 2147483647, 'hello'),
(13, 'janni', 'superstars0986@gmail.com', 2147483647, '9lokiujyhgtr');

-- --------------------------------------------------------

--
-- Table structure for table `java8`
--

CREATE TABLE `java8` (
  `id` int(11) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `a` varchar(50) DEFAULT NULL,
  `b` varchar(50) DEFAULT NULL,
  `c` varchar(50) DEFAULT NULL,
  `d` varchar(50) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `java8`
--

INSERT INTO `java8` (`id`, `question`, `a`, `b`, `c`, `d`, `ans`) VALUES
(1, 'jyuhtygrtfd', 'ad', 'bd', 'c', 'ada', 'c'),
(2, 'python is progarming language or not?', 'tbd', 'dvf', 'bdb', 'vdv', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `java8_result`
--

CREATE TABLE `java8_result` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `marks` int(50) DEFAULT NULL,
  `total_marks` int(50) DEFAULT NULL,
  `pa_fa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `java8_result`
--

INSERT INTO `java8_result` (`id`, `student_name`, `marks`, `total_marks`, `pa_fa`) VALUES
(1, 'hitesh', 1, 2, 'PASS'),
(2, 'hitesh', 1, 2, 'PASS'),
(3, 'hitesh', 1, 2, 'PASS'),
(4, 'hitesh', 0, 2, 'FALL');

-- --------------------------------------------------------

--
-- Table structure for table `java71`
--

CREATE TABLE `java71` (
  `id` int(11) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `a` varchar(50) DEFAULT NULL,
  `b` varchar(50) DEFAULT NULL,
  `c` varchar(50) DEFAULT NULL,
  `d` varchar(50) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `java71`
--

INSERT INTO `java71` (`id`, `question`, `a`, `b`, `c`, `d`, `ans`) VALUES
(1, 'python is progarming language or not?', 'yes', 'no', 'not above', 'else', 'a'),
(2, 'hello', 'yes', 'hi', 'not above', 'hello', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `java71_result`
--

CREATE TABLE `java71_result` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `marks` int(50) DEFAULT NULL,
  `total_marks` int(50) DEFAULT NULL,
  `pa_fa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `java71_result`
--

INSERT INTO `java71_result` (`id`, `student_name`, `marks`, `total_marks`, `pa_fa`) VALUES
(1, 'hitesh', 2, 2, 'PASS'),
(2, 'hitesh', 0, 2, 'FALL');

-- --------------------------------------------------------

--
-- Table structure for table `pepar_data`
--

CREATE TABLE `pepar_data` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `pepar_title` varchar(50) NOT NULL,
  `pepar_table` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pepar_data`
--

INSERT INTO `pepar_data` (`id`, `teacher_name`, `pepar_title`, `pepar_table`) VALUES
(1, 'hitesh odedara', 'java', 'java8'),
(3, 'janni', 'java', 'java71');

-- --------------------------------------------------------

--
-- Table structure for table `result_data`
--

CREATE TABLE `result_data` (
  `id` int(100) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `result_name` varchar(50) NOT NULL,
  `result_table` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_data`
--

INSERT INTO `result_data` (`id`, `teacher_name`, `result_name`, `result_table`) VALUES
(1, 'hitesh odedara', 'java', 'java8_result'),
(3, 'janni', 'java', 'java71_result');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(100) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `student_name`, `student_email`, `student_password`) VALUES
(1, 'hitesh', 'hiteshodedara1010@gmail.com', 'hitesh123');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `id` int(100) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`id`, `teacher_name`, `teacher_email`, `teacher_password`) VALUES
(1, 'teacher', 'mainteacher@gmail.com', 'teacher123'),
(4, 'kaushal', 'kaushaljani123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`) USING HASH,
  ADD UNIQUE KEY `admin_email_2` (`admin_email`) USING HASH;

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `java8`
--
ALTER TABLE `java8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `java8_result`
--
ALTER TABLE `java8_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `java71`
--
ALTER TABLE `java71`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `java71_result`
--
ALTER TABLE `java71_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pepar_data`
--
ALTER TABLE `pepar_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_data`
--
ALTER TABLE `result_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_email` (`teacher_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `java8`
--
ALTER TABLE `java8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `java8_result`
--
ALTER TABLE `java8_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `java71`
--
ALTER TABLE `java71`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `java71_result`
--
ALTER TABLE `java71_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pepar_data`
--
ALTER TABLE `pepar_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result_data`
--
ALTER TABLE `result_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
