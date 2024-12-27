-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 16, 2021 lúc 03:19 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nckh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
('IT1', 'Công nghệ thông tin 1'),
('IT2', 'Công nghệ thông tin 2'),
('IT3', 'Công nghệ thông tin 3'),
('IT4', 'Công nghệ thông tin 4'),
('IT5', 'Công nghệ thông tin 5'),
('IT6', 'Công nghệ thông tin 6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id_project` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_progress` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `details`
--

INSERT INTO `details` (`id_project`, `id_progress`, `content`, `status`, `comment`) VALUES
('DA1', '1', 'a', 0, 'chưa tốt'),
('DA1', '2', '', 1, 'Tốt'),
('DA1', '3', '', 0, ''),
('DA1', '4', '<p>Ho&agrave;ng</p>\r\n', 1, 'tốt'),
('DA1', '5', '', 1, ''),
('DA1', '6', '', 0, ''),
('DA2', '1', '', 0, ''),
('DA2', '2', '', 0, ''),
('DA2', '3', '', 0, ''),
('DA2', '4', '', 0, ''),
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
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `powerful` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `name`, `powerful`) VALUES
('GV0', 'truongkhoa', '19700418', 'Trưởng Khoa', 'tk'),
('GV1', 'trinhly', '19780408', 'Trịnh Thị Lý', 'gv'),
('GV10', 'giaovien', '19770408', 'Giáo Viên', 'gv'),
('SV1', 'nguyenhung', '20030115', 'nguyenhung', 'hs'),
('SV2', 'tranlan', '20020225', 'tranlan', 'hs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `progress`
--

CREATE TABLE `progress` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `start` date NOT NULL DEFAULT current_timestamp(),
  `end` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `progress`
--

INSERT INTO `progress` (`id`, `title`, `start`, `end`) VALUES
('1', 'Tìm hiểu quy trình thực hiện đồ án tốt nghiệp của sinh viên, giảng viên tại Khoa Công nghệ thông tin, Trường Đại học Giao Thông Vận tải', '2024-01-01', '2024-01-31'),
('2', 'Phân tích và thiết kế hệ thống', '2024-01-01', '2024-02-28'),
('3', 'Nghiên cứu về ngôn ngữ lập trình cũng như hệ quản trị cơ sở dữ liệu sẽ dùng', '2024-01-01', '2024-03-31'),
('4', 'Xây dựng phần mềm ', '2024-03-01', '2024-05-31'),
('5', 'Viết báo cáo', '2024-06-01', '2024-06-30'),
('6', ' Bảo vệ', '2024-06-01', '2024-06-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
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
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `name`, `id_topic`, `id_student`, `id_teacher`, `created_at`, `endtime`) VALUES
('DA1', 'Website bán hàng laptop', 'TP_6', 'SV1', 'GV2', '2024-04-29', '2024-09-29'),
('DA2', 'Phần mềm quản lí KFC', 'TP_1', 'SV2', 'GV1', '2024-04-02', '2024-09-02'),
('DA3', 'Hệ thống quản lý nhân sự', 'TP_1', 'SV3', 'GV1', '2024-04-02', '2024-09-02'),
('DA4', 'Ứng dụng game 3D', 'TP_2', 'SV4', 'GV3', '2024-04-04', '2024-09-04'),
('DA5', 'Phân tích dữ liệu thị trường', 'TP_3', 'SV5', 'GV4', '2024-04-04', '2024-09-04'),
('DA6', 'Hệ thống AI dự báo thời tiết', 'TP_4', 'SV6', 'GV5', '2024-04-04', '2024-09-04'),
('DA7', 'Mạng an ninh', 'TP_5', 'SV7', 'GV6', '2024-04-04', '2024-09-04'),
('DA8', 'Website bán sách', 'TP_6', 'SV8', 'GV2', '2024-04-04', '2024-09-04'),
('DA9', 'Ứng dụng mobile theo dõi sức khỏe', 'TP_7', 'SV9', 'GV7', '2024-04-04', '2024-09-04'),
('DA10', 'Giao diện người-máy', 'TP_8', 'SV10', 'GV8', '2024-04-04', '2024-09-04'),

('DA11', 'Hệ thống IoT nhà thông minh', 'TP_9', 'SV11', 'GV9', '2024-04-04', '2024-09-04');

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
--
-- Cấu trúc bảng cho bảng `students`
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
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `name`, `id_class`, `birthday`, `sex`, `address`, `phone`, `email`) VALUES
('SV1', 'Nguyễn Văn Hùng', 'IT1', '2003-01-15', 1, 'Đà Nẵng', '0914444444', 'nguyenvanhung@gmail.com'),
('SV2', 'Trần Thị Lan', 'IT2', '2002-02-25', 0, 'Hải Phòng', '0925555555', 'tranthilan@gmail.com'),
('SV3', 'Phạm Quang Khánh', 'IT1', '2003-03-10', 1, 'Huế', '0936666666', 'phamquangkhanh@gmail.com'),
('SV4', 'Lê Hoài An', 'IT4', '2002-04-18', 0, 'Đà Lạt', '0947777777', 'lehoaian@gmail.com'),
('SV5', 'Hoàng Đức Minh', 'IT5', '2003-05-22', 1, 'Hà Nội', '0958888888', 'hoangducminh@gmail.com'),
('SV6', 'Ngô Thị Hồng', 'IT6', '2002-06-30', 0, 'Sài Gòn', '0969999999', 'ngothihong@gmail.com'),
('SV7', 'Võ Hoàng Anh', 'IT2', '2003-07-15', 1, 'Cần Thơ', '0970000000', 'vohoanganh@gmail.com'),
('SV8', 'Đỗ Minh Hiếu', 'IT3', '2002-08-20', 1, 'Quảng Nam', '0981111111', 'dominhhieu@gmail.com'),
('SV9', 'Trương Ngọc Yến', 'IT5', '2003-09-05', 0, 'Hà Tĩnh', '0992222222', 'truongngocyen@gmail.com'),
('SV10', 'Lý Văn Sơn', 'IT1', '2002-10-12', 1, 'Bình Định', '0913333333', 'lyvanson@gmail.com'),
('SV11', 'Bùi Thị Mai', 'IT6', '2003-11-08', 0, 'Ninh Bình', '0924444444', 'buithimai@gmail.com');
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
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
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `birthday`, `address`, `phone`, `email`) VALUES
('GV0', 'Trưởng Khoa', '1970-04-18', 'Hà Nội', '0987654321', 'truongkhoa@gmail.com'),
('GV1', 'Trịnh Thị Lý', '1978-04-08', 'Sài Gòn', '0912345678', 'trinhthily@gmail.com'),
('GV2', 'Trịnh Khắc Tùng', '1980-04-29', 'Quy Nhơn', '0912348765', 'trinhkhachung@gmail.com'),
('GV3', 'Nguyễn Văn Hải', '1985-03-12', 'Hà Nội', '0911111111', 'nguyenvanhai@gmail.com'),
('GV4', 'Phạm Thị Hương', '1983-07-25', 'Hải Phòng', '0922222222', 'phamthihuong@gmail.com'),
('GV5', 'Trần Quang Minh', '1982-10-15', 'Quảng Ninh', '0933333333', 'tranquangminh@gmail.com'),
('GV6', 'Lê Văn Dũng', '1980-09-09', 'Thái Nguyên', '0944444444', 'levandung@gmail.com'),
('GV7', 'Hoàng Thị Lan', '1979-12-20', 'Hà Nội', '0955555555', 'hoangthilan@gmail.com'),
('GV8', 'Đỗ Văn Hùng', '1984-04-05', 'Bắc Ninh', '0966666666', 'dovanhung@gmail.com'),
('GV9', 'Ngô Thị Hà', '1981-01-30', 'Bắc Giang', '0977777777', 'ngothiha@gmail.com'),
('GV10', 'Giáo Viên', '1977-04-08', 'Hà Nội', '0912346785', 'giaovien@gmail.com');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`) VALUES
('TP_1','Phát triển phần mềm'),
('TP_2',' triển ứng dụng game'),
('TP_3','Khoa học dữ liệu'),
('TP_4','Trí tuệ nhân tạo'),
('TP_5','An ninh mạng'),
('TP_6','Phát triển web'),
('TP_7','Phát triển ứng dụng di động'),
('TP_8','Tương tác người-máy'),
('TP_9','IoT và hệ thống nhúng'),
('TP_10','Blockchain và công nghệ chuỗi khối');


--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD KEY `id_progress` (`id_progress`), 
  ADD KEY `id_project` (`id_project`) USING BTREE;

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);--Khóa chính

--
-- Chỉ mục cho bảng `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sv` (`id_student`),
  ADD KEY `id_gv` (`id_teacher`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_topic_2` (`id_topic`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lop` (`id_class`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE, 
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`id_progress`) REFERENCES `progress` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
