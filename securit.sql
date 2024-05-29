-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 01:02 AM
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
-- Database: `securit`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `class`, `class_id`, `date`) VALUES
(1, 'first class', 'rbepYJscJY4upWdiQXFLmzHUKSFXJNZW9JVnNCbKmILz0k78KNDf2keiMU4C', '2018-08-18 17:14:19'),
(3, 'second class', 'xrP2mcCVRukT3OsZaSQBddZB0D3xstpAoN0EznlTbJgTcLGBoLRRxjM7usEo', '2021-08-21 17:48:40'),
(4, 'General knowledge class', 'TwgTVOe0x9xC7hX9K2M8EVa8dwFR5O9mvC6gOhSvcVz3C9gJ3CKndyKQXmmh', '2021-10-25 10:51:39'),
(6, 'biology class', 'wOkGTBbzBDEnswCI7jpzoWf7alU2bNPHmVXRSXCZwcjBTDHa1QnAMIFxjxjV', '2021-11-22 11:22:32'),
(7, 'zaeazea', 'H9TgnD1533MG7mPIEYyOSxaDBMrngoGxdZeQGdLSKiRtWUxT8c2B0Tc9ZnNB', '2024-04-19 01:35:45'),
(8, 'dddzdd', 'X3rB7ajYl3GpR5W9bIBujZ5HAgR8YJ51QBsMUlBcDrDSAOB19VHA5VnL48T5', '2024-04-19 01:35:49'),
(9, 'math', 'q71wJkJxXiKnD6CmfTa1QuPVLUosSRzaFxGmfcpR1rWmJgogRkaa0RbcXKjh', '2024-04-19 01:35:52'),
(10, 'info', 'zE2RUNlND5lXeaFNsvPKltJpmvMpcoSKq73C988LYI17LRZEQPgJjg4B4vFS', '2024-04-19 01:35:55'),
(11, 'science', 'cWg1N5LJo9ZSVGvFrlXS02ykfJ0YfEojeX9Zmg9xWm6YqbOzjSjiCcuCUdv8', '2024-04-19 01:35:59'),
(12, 'physics', 'XJFBqm7CGxXvwTukp5Hj12faYrOAPrYjYkkTPzSIUyRTNqSoDKESJjpvPEbE', '2024-04-19 01:36:09'),
(13, 'arab', 'gsGcEbQziEodf7evom20mgFlmSTFEDrkylEPP0q1howsPvlzhqiqT5o6ffcg', '2024-04-19 01:36:26'),
(14, 'fr', 'grPEE4ePRsdjSpHn85ZisNYrF6mddao2WiejrIl3AZyxHMFZmS3milgltDTa', '2024-04-19 01:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `disabled`) VALUES
(1, 'user', 0),
(2, 'instructor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `date` date DEFAULT NULL,
  `image` varchar(1024) NOT NULL,
  `about` varchar(2048) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(1024) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `twitter_link` varchar(1024) DEFAULT NULL,
  `facebook_link` varchar(1024) DEFAULT NULL,
  `instagram_link` varchar(1024) DEFAULT NULL,
  `linkedin_link` varchar(1024) DEFAULT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `role`, `date`, `image`, `about`, `university`, `country`, `address`, `phone`, `twitter_link`, `facebook_link`, `instagram_link`, `linkedin_link`, `salt`) VALUES
(21, 'rayenhammami1@esen.tn', 'RAYEN', 'HAMMAMI', '$2y$10$.Tish9qakIEfLWtX/phUeOAjWSr0uEei25EoK7gOTFVJjg8pzIptm', 1, '2024-04-17', 'uploads/images/17133656301-intro-photo-final.jpg', '', '', '', '', '', '', '', '', '', ''),
(22, 'rayenhammami@gmail.com', 'raynnnnnnnnnnnn', 'hammami', '$2y$10$d5Saa5ji43bbdSNAWgOsDeLb83OfwOSni2d1DpQ8qOdc7At.ol4aa', 1, '2024-04-19', 'uploads/images/1713551158images (3).png', '', '', '', '', '', '', '', '', '', ''),
(23, 'latifachebbi@gmail.com', 'latifa', 'chebbi', '$2y$12$a9Dxg7x85i3xoOPh*0', 1, '2024-04-20', 'uploads/images/17143185331-intro-photo-final (1).jpg', '', '', '', '', '', '', '', '', '', 'a9Dxg7x85i3xoOPh'),
(24, 'latifa.chebbi2013@yahoo.tn', 'latifa', 'chebbi', '$2y$12$EyadzQ240uZRRZpr*0', 2, '2024-04-20', 'uploads/images/17136550041-intro-photo-final.jpg', '', '', '', '', '', '', '', '', '', 'EyadzQ240uZRRZpr'),
(26, 'latifachebbi2013@gmail.com', 'Latifa   ', 'Chebbi', '$2y$12$Hvkv8J1DDgsGYWyz*0', 1, '2024-04-21', 'uploads/images/1713659779images (3).png', '', 'Fdspt', 'Tunisia', ' Bab Souika  Tunis', '+21697198638   ', '', '', '', '', 'Hvkv8J1DDgsGYWyz'),
(28, 'hamzafallahi77@gmail.com', 'hamza', 'fallahi', '$2y$12$QzXSC6Gdf51PP7jG*0', 2, '2024-05-28', 'uploads/images/1716931887253515594_323109609153672_1540449841626720866_n__5_-removebg-preview.png', '', '', '', '', '', '', '', '', '', 'QzXSC6Gdf51PP7jG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`),
  ADD KEY `date` (`date`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
