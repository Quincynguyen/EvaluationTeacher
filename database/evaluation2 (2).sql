-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 05:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluation2`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `point_answer` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer_name`, `status`, `created_at`, `point_answer`) VALUES
(1, 'Cần cải thiện', 1, NULL, 1),
(2, 'Đạt', 1, NULL, 2),
(3, 'Khá', 1, NULL, 3),
(4, 'Tốt', 1, NULL, 4),
(5, 'Xuất sắc', 1, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `semester` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_code`, `subject_id`, `teacher_id`, `semester`) VALUES
(1, 'INT20191', 1, 1, '2019HK1'),
(2, 'INT20192', 1, 2, '2019HK1'),
(3, 'INT20193', 2, 1, '2019HK1'),
(4, 'INT20194', 3, 3, '2019HK1'),
(5, 'INT20195', 3, 2, '2019HK1'),
(6, 'INT20196', 4, 3, '2019HK1'),
(7, 'INT777', 5, 4, '2019HK1');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `evaluation_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `status_feedback` int(1) DEFAULT 0 COMMENT '0',
  `note` varchar(5000) CHARACTER SET utf8 DEFAULT NULL,
  `total_point` int(11) DEFAULT 0 COMMENT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`evaluation_id`, `users_id`, `class_id`, `status_feedback`, `note`, `total_point`) VALUES
(1, 1, 2, 0, NULL, 0),
(2, 1, 3, 0, NULL, 0),
(3, 1, 5, 0, NULL, 0),
(4, 2, 1, 0, NULL, 0),
(5, 3, 1, 0, NULL, 0),
(6, 3, 6, 0, NULL, 0),
(7, 5, 4, 0, NULL, 0),
(8, 5, 6, 0, NULL, 0),
(9, 5, 3, 0, NULL, 0),
(10, 5, 1, 0, NULL, 0),
(11, 7, 7, 0, NULL, 0),
(12, 7, 1, 0, 'dsrwrwer', 48),
(13, 7, 4, 0, NULL, 0),
(14, 9, 4, 0, NULL, 0),
(15, 9, 4, 0, NULL, 0),
(16, 9, 5, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations_detail`
--

CREATE TABLE `evaluations_detail` (
  `evaluations_detail_id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluations_detail`
--

INSERT INTO `evaluations_detail` (`evaluations_detail_id`, `evaluation_id`, `question_id`, `answer_id`) VALUES
(1, 4, 1, 1),
(2, 4, 2, 2),
(3, 4, 3, 2),
(4, 4, 4, 3),
(5, 4, 5, 1),
(6, 4, 6, 3),
(7, 4, 7, 4),
(8, 4, 8, 5),
(9, 4, 9, 1),
(10, 4, 10, 3),
(11, 4, 11, 1),
(12, 4, 12, 2),
(13, 4, 13, 4),
(14, 4, 14, 2),
(15, 4, 15, 1),
(16, 4, 16, 4),
(17, 5, 1, 2),
(18, 5, 2, 3),
(19, 5, 3, 1),
(20, 5, 4, 3),
(21, 5, 5, 4),
(22, 5, 6, 5),
(23, 5, 7, 1),
(24, 5, 8, 3),
(25, 5, 9, 1),
(26, 5, 10, 2),
(27, 5, 11, 4),
(28, 5, 12, 2),
(29, 5, 13, 1),
(30, 5, 14, 4),
(31, 5, 15, 5),
(32, 5, 16, 1),
(33, 6, 1, 1),
(34, 6, 2, 4),
(35, 6, 3, 2),
(36, 6, 4, 3),
(37, 6, 5, 1),
(38, 6, 6, 3),
(39, 6, 7, 4),
(40, 6, 8, 5),
(41, 6, 9, 1),
(42, 6, 10, 3),
(43, 6, 11, 1),
(44, 6, 12, 2),
(45, 6, 13, 4),
(46, 6, 14, 2),
(47, 6, 15, 1),
(48, 6, 16, 4),
(49, 1, 1, 3),
(50, 1, 2, 1),
(51, 1, 3, 2),
(52, 1, 4, 4),
(53, 1, 5, 2),
(54, 1, 6, 1),
(55, 1, 7, 4),
(56, 1, 8, 5),
(57, 1, 9, 1),
(58, 1, 10, 1),
(59, 1, 11, 4),
(60, 1, 12, 2),
(61, 1, 13, 3),
(62, 1, 14, 1),
(63, 1, 15, 3),
(64, 1, 16, 4),
(65, 3, 1, 1),
(66, 3, 2, 2),
(67, 3, 3, 3),
(68, 3, 4, 4),
(69, 3, 5, 1),
(70, 3, 6, 2),
(71, 3, 7, 3),
(72, 3, 8, 4),
(73, 3, 9, 1),
(74, 3, 10, 2),
(75, 3, 11, 3),
(76, 3, 12, 4),
(77, 3, 13, 1),
(78, 3, 14, 2),
(79, 3, 15, 3),
(80, 3, 16, 4),
(81, 2, 1, 1),
(82, 2, 2, 1),
(83, 2, 3, 1),
(84, 2, 4, 1),
(85, 2, 5, 1),
(86, 2, 6, 1),
(87, 2, 7, 1),
(88, 2, 8, 1),
(89, 2, 9, 1),
(90, 2, 10, 1),
(91, 2, 11, 1),
(92, 2, 12, 1),
(93, 2, 13, 1),
(94, 2, 14, 1),
(95, 2, 15, 1),
(96, 2, 16, 1),
(97, 9, 1, 1),
(98, 9, 2, 1),
(99, 9, 3, 1),
(100, 9, 4, 1),
(101, 9, 5, 1),
(102, 9, 6, 1),
(103, 9, 7, 1),
(104, 9, 8, 2),
(105, 9, 9, 2),
(106, 9, 10, 2),
(107, 9, 11, 4),
(108, 9, 12, 5),
(109, 9, 13, 5),
(110, 9, 14, 5),
(111, 9, 15, 5),
(112, 9, 16, 5),
(113, 10, 1, 2),
(114, 10, 2, 2),
(115, 10, 3, 1),
(116, 10, 4, 2),
(117, 10, 5, 4),
(118, 10, 6, 5),
(119, 10, 7, 5),
(120, 10, 8, 4),
(121, 10, 9, 3),
(122, 10, 10, 2),
(123, 10, 11, 5),
(124, 10, 12, 5),
(125, 10, 13, 4),
(126, 10, 14, 3),
(127, 10, 15, 5),
(128, 10, 16, 2),
(129, 7, 1, 1),
(130, 7, 2, 2),
(131, 7, 3, 4),
(132, 7, 4, 5),
(133, 7, 5, 5),
(134, 7, 6, 5),
(135, 7, 7, 4),
(136, 7, 8, 4),
(137, 7, 9, 4),
(138, 7, 10, 3),
(139, 7, 11, 3),
(140, 7, 12, 3),
(141, 7, 13, 3),
(142, 7, 14, 2),
(143, 7, 15, 2),
(144, 7, 16, 2),
(145, 8, 1, 1),
(146, 8, 2, 2),
(147, 8, 3, 3),
(148, 8, 4, 5),
(149, 8, 5, 4),
(150, 8, 6, 4),
(151, 8, 7, 4),
(152, 8, 8, 4),
(153, 8, 9, 4),
(154, 8, 10, 5),
(155, 8, 11, 5),
(156, 8, 12, 4),
(157, 8, 13, 4),
(158, 8, 14, 4),
(159, 8, 15, 3),
(160, 8, 16, 2),
(161, 11, 1, 2),
(162, 11, 2, 2),
(163, 11, 3, 3),
(164, 11, 4, 3),
(165, 11, 5, 2),
(166, 11, 6, 1),
(167, 11, 7, 1),
(168, 11, 8, 2),
(169, 11, 9, 2),
(170, 11, 10, 2),
(171, 11, 11, 2),
(172, 11, 12, 1),
(173, 11, 13, 2),
(174, 11, 14, 2),
(175, 11, 15, 1),
(176, 11, 16, 2),
(177, 12, 1, 1),
(178, 12, 2, 2),
(179, 12, 3, 3),
(180, 12, 4, 4),
(181, 12, 5, 5),
(182, 12, 6, 5),
(183, 12, 7, 4),
(184, 12, 8, 4),
(185, 12, 9, 4),
(186, 12, 10, 4),
(187, 12, 11, 3),
(188, 12, 12, 2),
(189, 12, 13, 1),
(190, 12, 14, 1),
(191, 12, 15, 2),
(192, 12, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_code` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faculty_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_code`, `faculty_name`) VALUES
(1, 'CNTT', ' Công nghệ thông tin'),
(2, 'TT', 'Toán tin');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `option_set`
--

CREATE TABLE `option_set` (
  `id` int(11) NOT NULL,
  `option_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option_value` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_set`
--

INSERT INTO `option_set` (`id`, `option_type`, `option_code`, `option_value`, `status`) VALUES
(1, 'SEMESTER_CODE', 'HK1', '9,2', 1),
(2, 'SEMESTER_CODE', 'HK2', '3,8', 1),
(3, 'POINT', 'Đạt', '40', 1),
(4, 'POINT', 'KHA', '60', 1),
(5, 'POINT', 'XUATSAC', '90', 1),
(6, 'POINT', 'KEM', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_name` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_name`, `status`, `created_at`) VALUES
(1, 'Giới thiệu chương trình chi tiết của học phần trước khi học', 1, '2020-02-16'),
(2, 'Đến lớp và kết thúc đúng giờ', 1, '2020-02-16'),
(3, 'Sử dụng hiệu quả thời gian tiết học cho việc dạy học', 1, '2020-02-16'),
(4, 'Dạy đủ số tiết theo quy định', 1, '2020-02-16'),
(5, 'Đòi hỏi sự nghiêm túc, tập trung trong học tập của sinh viên', 1, '2020-02-16'),
(6, 'Duy trì bầu không khí học tập tích cực', 1, '2020-02-16'),
(7, 'Ngôn ngữ, tác phong chuẩn mực', 1, '2020-02-16'),
(8, 'Khuyến khích việc trao đổi, phản biện', 1, '2020-02-16'),
(9, 'Sẵn sang tư vấn, hỗ trợ sinh viên', 1, '2020-02-16'),
(10, 'Nội dung giảng dạy bám sát với chương trình và có phân tích cho sinh viên', 1, '2020-02-16'),
(11, 'Nội dung giảng dạy được liên hệ với thực tiễn', 1, '2020-02-16'),
(12, 'Phương pháp giảng dạy phù hợp với sinh viên', 1, '2020-02-16'),
(13, 'Sử dụng hiệu quả các phương tiện, công cụ, dạy học (tài liệu dạy học, phần mềm, máy chiếu,...)', 1, '2020-02-16'),
(14, 'Gợi mở cho người học tiếp tục tự học, tự nghiên cứu', 1, '2020-02-16'),
(15, 'Kiểm tra, đánh giá kết quả học tập công bằng, khách quan', 1, '2020-02-16'),
(16, 'Phản hồi kịp thời kết quả kiểm tra, đánh giá giúp người học điều chỉnh', 1, '2020-02-16'),
(17, 'Giới thiệu chương trình chi tiết của học phần trước khi học.....', 1, NULL),
(18, 'Giới thiệu chương trình chi tiết của học phần trước khi học.....', 1, NULL),
(19, 'Giới thiệu chương trình chi tiết của học phần trước khi học.....', 1, NULL),
(20, 'Giới thiệu chương trình chi tiết của học phần trước khi học.....', 1, NULL),
(21, 'Giới thiệu chương trình chi tiết của học phần trước khi học.....rrrrrr', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`) VALUES
(1, 'COM411', 'Công nghệ phần mềm'),
(2, 'COM711', 'Nguyên Lý Hệ Điều hành'),
(3, 'D0M811', 'Cơ sở phân tán'),
(4, 'INT10101', 'Cấu trúc dữ liệu và giải thuật'),
(5, 'COM777', 'Giải tích số 2');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `faculty_id`) VALUES
(1, 'Nguyễn văn A', 1),
(2, 'Trần thị B', 1),
(3, 'Lê Anh C', 2),
(4, 'Nguyễn Hữu Chímh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Quỳnh Nguyễn', '665105052', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL, 'STUDENT'),
(2, 'Nga Nguyen', '665105044', '$2y$10$LCde2eX4x3Xz5xqLBdiY4uD3NNLB/vjx.p0wavT/Y3FB95dwMb4zG', NULL, NULL, '2020-02-20 08:12:45', 'STUDENT'),
(3, 'Lão Hặc', '14020105', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL, 'STUDENT'),
(4, 'Nguyễn thi nở', '14020282', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL, 'STUDENT'),
(5, 'Trần chí phèo', '14020085', '$2y$10$71zyAxrcb2m6QgV6ZItoA.uRFZ8x/gDwhAOQ/8L5JpPDPhKzOzPbK', NULL, NULL, '2020-02-20 08:14:12', 'STUDENT'),
(6, 'Ngô Bá Kiến', '140200214', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL, 'STUDENT'),
(7, 'Đỗ Nghèo Khỉ', '665105032', '$2y$10$8LimXtmXRaqfshirJfyaO.Lx5HZnuLCyDDHzVqCSuH2iIisLd8eZG', NULL, NULL, '2020-02-20 08:06:02', 'STUDENT'),
(8, 'Admin', 'admin', '$2y$10$SqgFeuFMmQiRj9FPMR0GBerJmbl0YUB9BMajHWB0Z0WO0.Uds.jbe', NULL, NULL, '2020-02-20 08:04:21', 'ADMIN'),
(9, 'Quynh Trụi', '665105053', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL, 'STUDENT'),
(10, 'Quynh Quản trị', 'Quynh', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `users_faculty`
--

CREATE TABLE `users_faculty` (
  `user_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_faculty`
--

INSERT INTO `users_faculty` (`user_id`, `faculty_id`, `status`) VALUES
(7, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `evaluations_detail`
--
ALTER TABLE `evaluations_detail`
  ADD PRIMARY KEY (`evaluations_detail_id`),
  ADD KEY `evaluation_id` (`evaluation_id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_set`
--
ALTER TABLE `option_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `users_faculty`
--
ALTER TABLE `users_faculty`
  ADD PRIMARY KEY (`user_id`,`faculty_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `evaluations_detail`
--
ALTER TABLE `evaluations_detail`
  MODIFY `evaluations_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `option_set`
--
ALTER TABLE `option_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evaluations_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `evaluations_detail`
--
ALTER TABLE `evaluations_detail`
  ADD CONSTRAINT `evaluations_detail_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`evaluation_id`),
  ADD CONSTRAINT `evaluations_detail_ibfk_2` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`),
  ADD CONSTRAINT `evaluations_detail_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `users_faculty`
--
ALTER TABLE `users_faculty`
  ADD CONSTRAINT `users_faculty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_faculty_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
