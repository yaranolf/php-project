-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 15, 2019 at 03:39 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `inspiration_hunter`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `official` tinyint(1) DEFAULT NULL,
  `date_made` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_one`, `user_two`, `official`, `date_made`) VALUES
(1, 2, 16, 1, '2019-05-05'),
(2, 4, 16, 1, '2019-05-05'),
(6, 17, 18, 1, '2019-05-09'),
(7, 19, 17, 1, '2019-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `user_name`, `img_description`, `date_created`, `file_path`) VALUES
(5, 17, 'Noorve', 'vacay', '2019-04-27 15:12:48', '11.jpeg'),
(9, 17, 'Noorve', 'Fruit', '2019-04-27 18:25:42', '32.jpg'),
(10, 16, 'Banciu', 'what a view!', '2019-04-27 19:09:00', '_04A7147.jpg'),
(20, 17, 'Banciu', 'Beach', '2019-05-09 06:18:13', 'photo-1469854523086-cc02fe5d8800-min.jpeg'),
(24, 17, 'Noorve', 'Mountains', '2019-05-09 06:54:03', 'photo-1467396555244-ddb071a5841d.jpeg'),
(25, 18, 'Banciu', 'Airplane', '2019-05-09 07:02:17', 'photo-1517479149777-5f3b1511d5ad.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `date_created`) VALUES
(4, 5, 1, '2019-05-03 15:43:58'),
(5, 5, 1, '2019-05-03 15:44:02'),
(6, 5, 1, '2019-05-05 16:13:14'),
(7, 5, 1, '2019-05-05 16:13:16'),
(10, 0, 17, '2019-05-15 13:51:46'),
(11, 5, 17, '2019-05-15 17:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(16, 'test', 'test', 'test', 'test@test.com', '$2y$10$8gSNoiBii3xCUnD6u8Z2IOTAlCDscjXcjwEyTq0yvptZGXlLMqDwa'),
(17, 'Noortje', 'Veenhuizen', 'Noorve', 'noortjeveenhuizen@hotmail.com', '$2y$10$VEzHdhroQjTQ7HnC4OKiJuNPDDstvzkZVxEQCXl1sybhG2E57fgB2'),
(18, 'Sarah', 'Van den Heuvel', 'Sarahvh', 'sarahvandenheuvel@hotmail.com', '$2y$10$bcEt632FKpDDdElcSI4jKO/V/BRozHIsLMfPi2ZRehcE9Il7mmwpa'),
(19, 'Andreas', 'Banciu', 'Banciu', 'andreasbanciu@live.be', '$2y$10$IPqhyftGuKJ/g3ovR8u13un1iLfkv6EjNjs89cKiRBm4MGu3Q66lG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
