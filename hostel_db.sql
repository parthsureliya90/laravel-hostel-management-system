-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 09:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sid` int(11) DEFAULT NULL COMMENT 'Studetn Table ID',
  `type` enum('A','P','H') NOT NULL DEFAULT 'A',
  `attendance_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `sid`, `type`, `attendance_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(2, 2, 'P', '2023-10-10', '2023-10-09 01:59:09', '2023-10-09 14:08:13'),
(3, 3, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(4, 4, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(5, 5, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(6, 6, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(7, 7, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(8, 8, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(9, 9, 'A', '2023-10-10', '2023-10-09 01:59:09', '2023-10-08 18:30:00'),
(10, 1, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(11, 2, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(12, 3, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(13, 4, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(14, 5, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(15, 6, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(16, 7, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(17, 8, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00'),
(18, 9, 'P', '2023-10-09', '2023-10-09 02:08:24', '2023-10-08 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_name` varchar(100) NOT NULL DEFAULT '2023',
  `current_batch` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_name`, `current_batch`, `created_at`, `updated_at`) VALUES
(1, '2023-2024', '1', '2023-09-30 02:56:14', '2023-09-30 02:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `buildings_master`
--

CREATE TABLE `buildings_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(150) NOT NULL,
  `status` enum('VISIBLE','HIDDEN') NOT NULL DEFAULT 'HIDDEN',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings_master`
--

INSERT INTO `buildings_master` (`id`, `building_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Building One', 'VISIBLE', '2023-09-30 03:06:32', '2023-09-30 03:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `collage_master`
--

CREATE TABLE `collage_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `college_name` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `status` enum('VISIBLE','HIDDEN') NOT NULL DEFAULT 'HIDDEN',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collage_master`
--

INSERT INTO `collage_master` (`id`, `college_name`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DKV Arts & Science College', 'Jamnagar, Gujarat', 'VISIBLE', '2023-09-30 02:56:20', '2023-09-30 02:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sid` int(11) NOT NULL COMMENT 'Student ID',
  `batch_id` int(11) NOT NULL COMMENT 'Student Batch Table ID',
  `remaining_amount` double(8,2) NOT NULL COMMENT 'Remaining AMOUNT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `sid`, `batch_id`, `remaining_amount`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 4000.00, '2023-09-30 03:59:26', '2023-10-09 12:13:03'),
(2, 9, 1, 16500.00, '2023-09-30 06:51:09', '2023-10-09 12:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `fees_register`
--

CREATE TABLE `fees_register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipet_no` int(11) NOT NULL,
  `sid` int(11) NOT NULL COMMENT 'Student ID',
  `batch_id` int(11) NOT NULL COMMENT 'Student Batch Table ID',
  `amount` double(8,2) NOT NULL COMMENT 'paid Amount',
  `paid_date` date NOT NULL COMMENT 'Fees paid Date',
  `verified_with_bank` enum('YES','NO') NOT NULL DEFAULT 'NO' COMMENT 'Amount is Verified with bank or not',
  `fees_type` enum('JOINING','INSTALLMENT') NOT NULL DEFAULT 'INSTALLMENT' COMMENT 'Joining fees or Installment fees',
  `added_by` varchar(255) NOT NULL COMMENT 'fees installment or joining recoreded by',
  `firm` enum('ARADHANA','GANDHIDHAM') NOT NULL DEFAULT 'ARADHANA',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_register`
--

INSERT INTO `fees_register` (`id`, `recipet_no`, `sid`, `batch_id`, `amount`, `paid_date`, `verified_with_bank`, `fees_type`, `added_by`, `firm`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 2, 9, 1, 3000.00, '2023-09-30', 'NO', 'INSTALLMENT', 'admin', 'ARADHANA', NULL, '2023-09-30 07:22:07', '2023-10-09 12:01:34'),
(3, 3, 9, 1, 3000.00, '2023-09-30', 'YES', 'INSTALLMENT', 'admin', 'ARADHANA', NULL, '2023-09-30 07:23:44', '2023-10-09 11:53:46'),
(4, 4, 9, 1, 3000.00, '2023-09-30', 'NO', 'INSTALLMENT', 'admin', 'ARADHANA', NULL, '2023-09-30 07:23:53', '2023-09-30 07:23:53'),
(5, 5, 9, 1, 3000.00, '2023-09-30', 'NO', 'JOINING', 'admin', 'GANDHIDHAM', NULL, '2023-09-30 07:24:14', '2023-09-30 07:24:14'),
(6, 6, 9, 1, 9500.00, '2023-09-30', 'YES', 'INSTALLMENT', 'admin', 'ARADHANA', NULL, '2023-09-30 10:23:51', '2023-10-09 11:53:51'),
(7, 7, 8, 1, 6000.00, '2023-10-09', 'YES', 'INSTALLMENT', 'admin', 'ARADHANA', NULL, '2023-10-09 12:02:53', '2023-10-09 12:14:06'),
(9, 8, 8, 1, 2000.00, '2023-10-02', 'YES', 'INSTALLMENT', 'admin', 'GANDHIDHAM', NULL, '2023-10-09 12:13:03', '2023-10-09 14:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(63, '2014_10_12_000000_create_users_table', 1),
(64, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(65, '2014_10_12_100000_create_password_resets_table', 1),
(66, '2019_08_19_000000_create_failed_jobs_table', 1),
(67, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(68, '2023_06_22_042842_students', 1),
(69, '2023_06_27_062751_create_collage_master_table', 1),
(70, '2023_07_01_061506_create_buildings_table', 1),
(71, '2023_07_01_075928_create_rooms_master', 1),
(72, '2023_07_20_043253_updated', 1),
(73, '2023_07_20_051525_create_batch_table', 1),
(74, '2023_08_23_060201_create_attendance_table', 1),
(75, '2023_09_30_063247_create_fees_register_table', 1),
(76, '2023_09_30_064711_create_fees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms_master`
--

CREATE TABLE `rooms_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` int(11) NOT NULL COMMENT 'HOSTEL BUILDING ID',
  `room_no` varchar(150) NOT NULL,
  `status` enum('VISIBLE','HIDDEN') NOT NULL DEFAULT 'HIDDEN',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms_master`
--

INSERT INTO `rooms_master` (`id`, `building_id`, `room_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '001', 'VISIBLE', '2023-09-30 03:06:38', '2023-09-30 03:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(100) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `a_no` varchar(50) NOT NULL,
  `fname` varchar(155) NOT NULL,
  `mname` varchar(155) NOT NULL,
  `lname` varchar(155) NOT NULL,
  `father_contacts` varchar(50) NOT NULL,
  `emg_contacts` varchar(50) NOT NULL,
  `student_contacts` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') DEFAULT NULL,
  `college_id` int(11) NOT NULL,
  `payable_fees` double(12,2) NOT NULL DEFAULT 0.00,
  `fees_duration` enum('1','2','3','4','5','6','7','8','9','10','11','12') NOT NULL,
  `is_fees_completed` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `year` enum('1st','2nd','3rd') DEFAULT NULL,
  `cource` enum('BCom','MCom','BCA','MCA','MBA','MSC(IT&CA)','BA','MA','PHd','BE/B.Tech','B.Arch','B.Sc','BPharma','BDS','B.Ed','M.Ed') DEFAULT NULL,
  `status` enum('VISIBLE','HIDDEN') NOT NULL DEFAULT 'HIDDEN',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `batch_id`, `batch_name`, `room_id`, `photo`, `a_no`, `fname`, `mname`, `lname`, `father_contacts`, `emg_contacts`, `student_contacts`, `address`, `blood_group`, `college_id`, `payable_fees`, `fees_duration`, `is_fees_completed`, `year`, `cource`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-2023', 2, '1689837643.jpg', '12345678912', 'Parth', 'Ashwinbhai', 'Sureliya', '1234567899', '8956324578', '7016723537', 'DSF', 'A-', 1, 0.00, '1', 'NO', '1st', 'B.Ed', 'VISIBLE', NULL, '2023-07-19 19:21:17', '2023-07-21 18:23:49'),
(2, 2, '2022-2023', 2, '1689834077.jpg', '9856321457896', 'Parth', 'Ashwinbhai', 'Sureliya', '9428127010', '7016723534', '9033535264', 'DSF', 'A-', 1, 0.00, '1', 'NO', '1st', 'B.Ed', 'VISIBLE', NULL, '2023-07-19 19:21:17', '2023-07-19 19:27:49'),
(3, 2, '2022-2023', 3, '1690002753.jpg', '4523453245', 'Fasdfasd', 'Sadf', 'Sdf', '9875632458', '1235987459', '7545698589', 'sdafds', 'AB+', 1, 0.00, '1', 'NO', '1st', 'BDS', 'VISIBLE', NULL, '2023-07-21 18:12:33', '2023-07-21 18:12:33'),
(4, 2, '2022-2023', 5, '1690002968.jpg', '123456789456', 'New', 'Asdf', 'Asdfsda', '1234567899', '9033535264', '1234567895', 'fsdaf', 'A-', 1, 0.00, '1', 'NO', '2nd', 'B.Sc', 'VISIBLE', NULL, '2023-07-21 18:16:08', '2023-07-21 18:27:43'),
(5, 1, '2023-2024', 1, '1696063041.png', '123456789456', 'Parth', 'Sadf', 'Sureliya', '1234567899', '9033535264', '7016723534', 'dsfsdf', 'A+', 1, 10500.00, '7', 'NO', '1st', 'M.Ed', 'VISIBLE', NULL, '2023-09-30 03:07:21', '2023-09-30 03:07:21'),
(6, 1, '2023-2024', 1, '1696063073.png', '123456789456', 'Parth', 'Sadf', 'Sureliya', '1234567899', '9033535264', '7016723534', 'dsfsdf', 'A+', 1, 10500.00, '7', 'NO', '1st', 'M.Ed', 'VISIBLE', NULL, '2023-09-30 03:07:53', '2023-09-30 03:07:53'),
(7, 1, '2023-2024', 1, '1696063974.png', '123456789456', 'Parth', 'Ashwinbhai', 'Sureliya', '9428127010', '9033535264', '1234597899', 'dsfad', 'A+', 1, 8000.00, '4', 'NO', '1st', 'BPharma', 'VISIBLE', NULL, '2023-09-30 03:22:54', '2023-09-30 03:22:54'),
(8, 1, '2023-2024', 1, '1696066166.png', '123456789456', 'Parth', 'Ashwinbhai', 'Sureliya', '9428127010', '9033535264', '1234597899', 'dsfad', 'A+', 1, 14000.00, '7', 'NO', '1st', 'BPharma', 'VISIBLE', NULL, '2023-09-30 03:59:26', '2023-09-30 03:59:26'),
(9, 1, '2023-2024', 1, '1696076469.png', '123456789456', 'Parth', 'Ashwinbhai', 'Sureliya', '9428127010', '9033535264', '7016723534', 'asdfasd', 'A+', 1, 36000.00, '8', 'NO', '1st', 'BDS', 'VISIBLE', NULL, '2023-09-30 06:51:09', '2023-09-30 06:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$YJ7kyX/KmiGjPHLlSh48We9HKhs9i/KBU0gV7ORUgyCFWK3QEFmm2', '1', NULL, '2023-07-19 17:36:35', '2023-07-19 17:36:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings_master`
--
ALTER TABLE `buildings_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collage_master`
--
ALTER TABLE `collage_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_register`
--
ALTER TABLE `fees_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms_master`
--
ALTER TABLE `rooms_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buildings_master`
--
ALTER TABLE `buildings_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collage_master`
--
ALTER TABLE `collage_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees_register`
--
ALTER TABLE `fees_register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms_master`
--
ALTER TABLE `rooms_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
