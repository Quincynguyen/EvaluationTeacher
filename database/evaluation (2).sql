-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 03:23 PM
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
-- Database: `evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` date DEFAULT current_timestamp(),
  `point_answer` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `total_point` int(11) DEFAULT 0,
  `note` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_result`
--

CREATE TABLE `evaluation_result` (
  `evaluation_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `option_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option_set`
--

INSERT INTO `option_set` (`id`, `option_type`, `option_code`, `option_value`, `status`) VALUES
(1, 'SEMESTER_CODE', 'HK1', '9,2', 1),
(2, 'SEMESTER_CODE', 'HK2', '3,8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_name` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(16, 'Phản hồi kịp thời kết quả kiểm tra, đánh giá giúp người học điều chỉnh', 1, '2020-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`) VALUES
(1, 'COM411', 'Công nghệ phần mềm'),
(2, 'COM711', 'Nguyên Lý Hệ Điều hành');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_code`, `teacher_name`, `faculty_id`) VALUES
('GV001', 'Nguyễn Thị Hạnh', 1),
('GV002', 'Đặng Thành Trung', 1),
('GV003', 'Nguyễn Hữu Chính', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quỳnh Nguyễn', '665105052', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL),
(2, 'Nga Nguyen', '665105044', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL),
(4, '14020105', '14020105', '$2y$10$N90SiA6ew/oITLZgfxbt9eGdjMdV.ndwGGm8jtQLHJtxqM5lnE5mi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_faculty`
--

CREATE TABLE `users_faculty` (
  `users_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_faculty`
--

INSERT INTO `users_faculty` (`users_id`, `faculty_id`, `created`) VALUES
(1, 1, '2015-09-05'),
(1, 2, '2018-09-10'),
(2, 1, '2016-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `users_subject`
--

CREATE TABLE `users_subject` (
  `users_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `semester` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_subject`
--

INSERT INTO `users_subject` (`users_id`, `subject_id`, `teacher_code`, `start_date`, `semester`) VALUES
(1, 1, 'GV001', '2019-08-16', '2019HK1'),
(1, 2, 'GV002', '2019-02-16', '2019HK1'),
(2, 1, 'GV001', '2019-02-16', '2019HK1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `evaluation_result`
--
ALTER TABLE `evaluation_result`
  ADD PRIMARY KEY (`evaluation_id`,`question_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

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
  ADD PRIMARY KEY (`teacher_code`),
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
  ADD PRIMARY KEY (`users_id`,`faculty_id`);

--
-- Indexes for table `users_subject`
--
ALTER TABLE `users_subject`
  ADD PRIMARY KEY (`users_id`,`subject_id`),
  ADD KEY `teacher_code` (`teacher_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `evaluation_result`
--
ALTER TABLE `evaluation_result`
  ADD CONSTRAINT `evaluation_result_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`evaluation_id`),
  ADD CONSTRAINT `evaluation_result_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `evaluation_result_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `users_subject`
--
ALTER TABLE `users_subject`
  ADD CONSTRAINT `users_subject_ibfk_1` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`teacher_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
