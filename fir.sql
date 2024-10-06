-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 08:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fir`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','in_progress','resolved') DEFAULT 'pending',
  `tracking_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tracking_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`id`, `user_id`, `title`, `description`, `status`, `tracking_id`, `created_at`, `updated_at`) VALUES
(1, 104, 'randome', 'On [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that their [Vehicle Make and Model] with registration number [Registration Number] was stolen from [Location]. The vehicle was last seen parked at [Parking Spot].\r\nOn [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that their [Vehicle Make and Model] with registration number [Registration Number] was stolen from [Location]. The vehicle was last seen parked at [Parking Spot].\r\nOn [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that their [Vehicle Make and Model] with registration number [Registration Number] was stolen from [Location]. The vehicle was last seen parked at [Parking Spot].', 'pending', 'F21192533CE9A6F5', '2024-10-05 08:11:54', '2024-10-05 08:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `firs`
--

CREATE TABLE `firs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','in_progress','resolved') DEFAULT 'pending',
  `tracking_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firs`
--

INSERT INTO `firs` (`id`, `user_id`, `title`, `description`, `status`, `tracking_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Theft of Valuables from Residential Premises', 'On [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that their residence was broken into while they were away. Upon returning, they discovered that the following items were missing:\r\n\r\n[Item 1]\r\n[Item 2]\r\n[Item 3]\r\nThe estimated total value of the stolen items is [Amount]. The complainant suspects that the theft was committed by [Suspect\'s Name], a known acquaintance.\r\n\r\nNote: This is a basic example. Actual FIR cases can be much more detailed and may involve additional information such as witness statements, evidence collected, and the investigation process.', 'pending', 'track_66ffe889c6cff5.65309476', '2024-10-04 13:07:21', '2024-10-04 13:07:21'),
(2, 1, 'Physical Assault Causing Injury', 'On [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.', 'pending', 'track_66ffe91b361bb0.92438719', '2024-10-04 13:09:47', '2024-10-04 13:09:47'),
(3, 103, 'Random', 'On [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.\r\nOn [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.\r\nOn [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.', 'pending', 'track_6700465eab9927.79020459', '2024-10-04 19:47:42', '2024-10-04 19:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `ncs`
--

CREATE TABLE `ncs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','in_progress','resolved') DEFAULT 'pending',
  `tracking_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ncs`
--

INSERT INTO `ncs` (`id`, `user_id`, `title`, `description`, `status`, `tracking_id`, `created_at`, `updated_at`) VALUES
(2, 103, 'Random', 'On [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.\r\nOn [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.\r\nOn [Date], at approximately [Time], a complaint was lodged by [Complainant\'s Name] residing at [Address]. The complainant alleges that they were physically assaulted by [Assailant\'s Name] at [Location]. The assailant used [Weapon/Method of Assault] causing [Injuries]. The complainant was taken to [Hospital Name] for medical treatment.', 'pending', 'b0a39b1359cf3e1e6e022666bea84f32', '2024-10-04 20:07:28', '2024-10-04 20:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police_stations`
--

CREATE TABLE `police_stations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `CNIC_Number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `CNIC_Number`, `email`, `password`, `phone_number`, `gender`, `address`, `role`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'jawad', '0', 'jawad1@gmail.com', '$2y$10$4ETaLUaB1gK57EnEAkl8veRSnAzITIZo4uOQEFXhxNzSO/WwS4eme', '09876543212', '', 'larkana', 'user', NULL, '2024-10-03 13:09:38', '2024-10-03 13:09:38'),
(100, 'Sabir Baloch', '0', 'sabir@gmail.com', '$2y$10$Or7RgjSsoyKD9qjhU.0HXOAU2cfNNn6RdiVnsL0hab/at4b5F4sMK', '09876543212', '', 'Larkana', 'admin', NULL, '2024-10-03 13:24:54', '2024-10-04 17:55:59'),
(103, 'akhtar', '0', 'akhtar@gmail.com', '$2y$10$aSL/Aah.RcnoDT49gaq7NOWbXfgZirBR/I/OjsLjcGSXle1jf4zdG', '03045678416', '', 'hyderabad', 'user', NULL, '2024-10-04 17:55:25', '2024-10-04 17:55:25'),
(104, 'zamin ali', '43101-2020392-2', 'zamin@gmail.com', '$2y$10$kyODq6p5Ozu8yjGec3ZfOuyOGD.F0owwP3mx/SmTgY4vDDNrPJYka', '0908546834', '', 'sukker', 'user', '2024-10-04 10:22:46', '2024-10-05 08:09:32', '2024-10-05 10:23:03'),
(105, 'hyder', '43101-1108733-5', 'hyder@gmail.com', '$2y$10$JPin0r47hosOkhgbmEu6LerqrImFvRrnF4Bx2p3kWSIoNu7jndbbC', '03045678416', 'male', 'Larkana', 'user', NULL, '2024-10-05 14:34:43', '2024-10-05 14:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_id` (`tracking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `firs`
--
ALTER TABLE `firs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_id` (`tracking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ncs`
--
ALTER TABLE `ncs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_id` (`tracking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `police_stations`
--
ALTER TABLE `police_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `firs`
--
ALTER TABLE `firs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ncs`
--
ALTER TABLE `ncs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `police_stations`
--
ALTER TABLE `police_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `firs`
--
ALTER TABLE `firs`
  ADD CONSTRAINT `firs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ncs`
--
ALTER TABLE `ncs`
  ADD CONSTRAINT `ncs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
