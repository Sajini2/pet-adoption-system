-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2025 at 10:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` int(6) UNSIGNED NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `pet_name`, `user_name`, `user_email`, `user_phone`, `created_at`) VALUES
(1, 'Luna', 'sa', 'r@gmail.com', '123456789', '2025-09-05 08:13:36'),
(2, 'Luna', 'sa', 'r@gmail.com', '123456789', '2025-09-05 08:15:00'),
(3, 'Luna', 'sa', 'r@gmail.com', '123456789', '2025-09-05 08:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(6) UNSIGNED NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `messages`) VALUES
('Sachintha Dilshan', 'dhanukaneranjan254@gmail.com', 'as'),
('Sachintha Dilshan', 'dilshansachintha322@gmail.com', 'sasa'),
('Sachintha Dilshan', 'dmsmadushanka82@gmail.com', 'sa'),
('Sachintha Dilshan', 'u@gmail.com', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('6@gmail.com', '$2y$10$Y1dd4qnBrb1N3/p8DxwYBulpOzdAO5tI5UEJ3GQZZytTT1.pjFip.'),
('t@gmail.com', '$2y$10$vK7sKLQ2ckMWLiO8tp9mlO8LL/oLTlxYmc3McEBJGjPVJ4KDlD9e6'),
('w@gmail.com', '$2y$10$bqPwLDcZX9fCaDoVBXVw7ex1kqsUe.PlHjAHFuiXy4LxRcKel4pyW'),
('y@gmail.com', '$2y$10$ZnS/MQmHR9piOnDEpz4EoOytiv1aDjbJF4vpA9UkZmov8iC.uAYmG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `email`, `password`) VALUES
('Shalini', '5@gmail.com', '$2y$10$ZUqyReOZ77lT4oUGKQpZue0xdvJjduPvYh6RCgjF0dppnwPdNaHDK'),
('sajini', '6@gmail.com', '$2y$10$sXTEMmIb.6k1d2FxXtP4AeOiEVtuq44XQ/YOCdqeqo.ukoLcHbO3G'),
('sajini', 'e@gmail.com', '$2y$10$i7EpRNUO5CuH17C.0JKfV.HMMnkDmjLxT7uXPPngXKpAjYrS3aB7y'),
('Sachintha Dilshan', 'w@gmail.com', '$2y$10$mgA.N487crNLgGYAjZDig.oinhy83LRqkEp.NOZ2zTJKbIbB398o.');

-- --------------------------------------------------------

--
-- Table structure for table `vet_services`
--

CREATE TABLE `vet_services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `service_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vet_services`
--

INSERT INTO `vet_services` (`id`, `name`, `email`, `appointment_date`, `appointment_time`, `service_type`) VALUES
(1, 'sachknta', 'w@gmail.com', '2025-09-11', '02:24:00', 'checkup'),
(2, 'sachknta', 'w@gmail.com', '2025-09-11', '02:24:00', 'checkup'),
(3, 'sachknta', 'w@gmail.com', '2025-09-21', '11:38:00', 'checkup'),
(4, 'sachknta', '8@gmail.com', '2025-09-16', '16:49:00', 'vaccination');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vet_services`
--
ALTER TABLE `vet_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vet_services`
--
ALTER TABLE `vet_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
