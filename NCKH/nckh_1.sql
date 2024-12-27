-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 09:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
('21T1', 'Đại học CNTT k21'),
('21T2', 'Đại học CNTT k21'),
('21T3', 'Đại học CNTT k21');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id_project` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_progress` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id_project`, `id_progress`, `content`, `status`, `comment`) VALUES
('DA1', '1', 'a', 0, 'chưa tốt'),
('DA1', '2', '', 1, 'Tốt'),
('DA1', '3', '', 0, ''),
('DA1', '4', '<p>Ho&agrave;ng123</p>\r\n', 0, '<p>abc</p>\r\n'),
('DA1', '5', '', 1, ''),
('DA1', '6', '', 0, ''),
('DA2', '1', '', 0, ''),
('DA2', '2', '', 0, ''),
('DA2', '3', '', 0, ''),
('DA2', '4', '<p>dạ thưa thầy, em muốn</p>\r\n', 0, '<p>s&aacute;ng mai đ&aacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
('DA2', '5', '', 0, ''),
('DA2', '6', '', 0, ''),
('DA3', '1', '', 0, ''),
('DA3', '2', '', 0, ''),
('DA3', '3', '', 0, ''),
('DA3', '4', '', 0, ''),
('DA3', '5', '', 0, ''),
('DA3', '6', 'NASA', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `powerful` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `name`, `powerful`) VALUES
('GV1', 'truong khoa', 'abc', 'Trưởng Khoa', 'tk'),
('GV2', 'giao vien', 'abc', 'Giáo Viên', 'gv'),
('SV2', 'vinh', 'abc', 'Kim Cương', 'hs'),
('SV3', 'hoang', 'phuc', 'Hoàng Phúc', 'hs');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `start` date NOT NULL DEFAULT current_timestamp(),
  `end` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `title`, `start`, `end`) VALUES
('1', 'Tìm hiểu quy trình thực hiện đồ án tốt nghiệp của sinh viên, giảng viên tại Khoa Công nghệ thông tin, Trường Đại học Tài nguyên và Môi trường Hà Nội', '2021-01-01', '2021-01-31'),
('2', 'Phân tích và thiết kế hệ thống', '2021-01-01', '2021-02-28'),
('3', 'Nghiên cứu về ngôn ngữ lập trình cũng như hệ quản trị cơ sở dữ liệu sẽ dùng', '2021-01-01', '2021-03-31'),
('4', 'Xây dựng phần mềm ', '2021-03-01', '2021-05-31'),
('5', 'Viết báo cáo', '2021-06-01', '2021-06-30'),
('6', ' Bảo vệ', '2021-06-01', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_topic` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_student` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_teacher` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` date NOT NULL,
  `endtime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `id_topic`, `id_student`, `id_teacher`, `created_at`, `endtime`) VALUES
('DA1', 'Website bán hàng laptop', 'W', 'SV1', 'GV2', '2021-04-29', '0000-00-00'),
('DA2', 'Phần mềm quản lí KFC', 'A', 'SV2', 'GV2', '2021-04-02', '0000-00-00'),
('DA3', 'Tấn công NASA', 'I', 'SV3', 'GV2', '2021-04-04', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `id_teacher` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `title`, `content`, `time`, `id_teacher`) VALUES
('', '123', '<p>c&aacute;c em b&aacute;o c&aacute;o nh&eacute;</p>\r\n', '2024-05-10', 'GV2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_class` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `sex` tinyint(4) NOT NULL,
  `address` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `id_class`, `birthday`, `sex`, `address`, `phone`, `email`) VALUES
('SV1', 'Trần Văn Lượng', '21T3', '2021-04-24', 1, 'Sài Gòn', '0911111111', 'rado7a1@gmail.com'),
('SV2', 'Trần Duy Vinh', '21T2', '2021-04-12', 0, 'Hà Nội', '0922222222', 'sv2@gmail.com'),
('SV3', 'Trần Quang Tân', '21T1', '2021-04-05', 1, 'Quy Nhơn', '0933333333', 'sv3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `birthday`, `address`, `phone`, `email`) VALUES
('GV1', 'Trưởng Khoa', '2021-04-18', 'Hà Nội', '0987654321', 'gv1@gmail.com'),
('GV2', 'Lê Vũ', '2021-04-08', 'Đà Nẵng', '0912345678', 'gv2@gmail.com'),
('GV3', 'Hà Quyên', '2005-02-09', 'Đà Nẵng', '0377225024', 'gv3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `name`) VALUES
('A', 'APP'),
('I', 'INTERNET'),
('W', 'WEB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD KEY `id_progress` (`id_progress`),
  ADD KEY `id_project` (`id_project`) USING BTREE;

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sv` (`id_student`),
  ADD KEY `id_gv` (`id_teacher`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_topic_2` (`id_topic`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lop` (`id_class`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`id_progress`) REFERENCES `progress` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
