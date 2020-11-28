-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 08, 2020 lúc 12:19 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projecttest1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `fullname`, `Email`, `Address`, `Description`, `Dob`) VALUES
(2, 'staff', '202cb962ac59075b964b07152d234b70', 'Staff', 'Staff', 'abc@gmail.com', '', NULL, NULL),
(3, 'tutor1', '202cb962ac59075b964b07152d234b70', 'Tutor', 'tutor1', 'tutor1@gmail.com', 'Ha Noi', 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', NULL),
(4, 'tutor2', '202cb962ac59075b964b07152d234b70', 'Tutor', 'tutor2', 'tutor2@gmail.com', 'Ha Noi', 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', NULL),
(6, 'mon123', '202cb962ac59075b964b07152d234b70', 'Student', 'thanhduy', 'abc@gmail.com', NULL, 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', NULL),
(10, 'teacher1', '202cb962ac59075b964b07152d234b70', 'Tutor', 'teacher1', 'tutor1@gmail.com', 'Ha Noi', 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', '1999-10-08'),
(11, 'teacher2', '202cb962ac59075b964b07152d234b70', 'Tutor', 'teacher2', 'tutor1@gmail.com', 'Staff', 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', '1999-04-22'),
(12, 'teacher3', '202cb962ac59075b964b07152d234b70', 'Tutor', 'teacher3', 'tutor1@gmail.com', 'Ha Noi', 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', NULL),
(13, 'teacher4', '202cb962ac59075b964b07152d234b70', 'Tutor', 'teacher4', 'tutor1@gmail.com', 'Ha Noi', 'Enthusiastic, burnt out, his teaching style is very flexible, personality, extremely cool but very close to bring a lively learning atmosphere, comfortable but effective. With the reverse approach, he goes from practical issues, gradually directing students to the course knowledge to help students absorb, absorb knowledge naturally, without pressure.', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `Class_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`Class_id`, `title`, `content`, `Teacher_id`, `time`) VALUES
(17, 'Class Day 1', '', 1, '2020-09-08 08:41:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classcomment`
--

CREATE TABLE `classcomment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `classcomment`
--

INSERT INTO `classcomment` (`comment_id`, `comment`, `user_id`, `date`, `Class_id`) VALUES
(1, 'dadsadsa', 3, '2020-09-08 08:44:54', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_id` int(200) NOT NULL,
  `UserID` int(200) NOT NULL,
  `rate` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  `cata` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`Teacher_id`, `UserID`, `rate`, `price`, `cata`) VALUES
(1, 3, 5, 100, 'Primary'),
(2, 4, 5, 100, 'Junior'),
(3, 10, 3, 100, 'High'),
(4, 11, 2, 100, 'Primary'),
(5, 12, 4, 100, 'Primary'),
(6, 13, 3, 100, 'Junior');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `upload_file`
--

CREATE TABLE `upload_file` (
  `upload_id` int(11) NOT NULL,
  `fileName` varchar(150) NOT NULL,
  `fileUrl` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `Class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video_upload`
--

CREATE TABLE `video_upload` (
  `video_id` int(11) NOT NULL,
  `VideoName` varchar(150) NOT NULL,
  `videoUrl` varchar(200) NOT NULL,
  `Class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_id`),
  ADD KEY `ibfk` (`Teacher_id`);

--
-- Chỉ mục cho bảng `classcomment`
--
ALTER TABLE `classcomment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `ibfk11` (`user_id`),
  ADD KEY `ibfk12` (`Class_id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_id`),
  ADD KEY `ibfk_1` (`UserID`);

--
-- Chỉ mục cho bảng `upload_file`
--
ALTER TABLE `upload_file`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `post_ibfk_1` (`Class_id`);

--
-- Chỉ mục cho bảng `video_upload`
--
ALTER TABLE `video_upload`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `post_ibfk_11` (`Class_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `classcomment`
--
ALTER TABLE `classcomment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `upload_file`
--
ALTER TABLE `upload_file`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `video_upload`
--
ALTER TABLE `video_upload`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `ibfk` FOREIGN KEY (`Teacher_id`) REFERENCES `teacher` (`Teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `classcomment`
--
ALTER TABLE `classcomment`
  ADD CONSTRAINT `ibfk11` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk12` FOREIGN KEY (`Class_id`) REFERENCES `class` (`Class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `upload_file`
--
ALTER TABLE `upload_file`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Class_id`) REFERENCES `class` (`Class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `video_upload`
--
ALTER TABLE `video_upload`
  ADD CONSTRAINT `post_ibfk_11` FOREIGN KEY (`Class_id`) REFERENCES `class` (`Class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
