-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2019 at 10:23 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `inspiration_hunter`
--

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
(26, 2, 16, 1, '2019-05-05'),
(27, 4, 16, 1, '2019-05-05'),
(40, 17, 16, 1, '2019-05-05'),
(41, 17, 18, 1, '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `img_description`, `date_created`, `file_path`) VALUES
(5, 1, 'vacay', '2019-04-27 15:12:48', '_DSC4743.jpeg'),
(9, 2, 'fruit', '2019-04-27 18:25:42', '09f7e88ccfe2e64f4baa408399765d9b.jpg'),
(10, 16, 'what a view!', '2019-04-27 19:09:00', '_04A7147.jpg'),
(11, 4, 'test', '2019-05-03 13:22:39', 'large (10).jpg'),
(12, 0, 'blabla', '2019-05-03 13:22:48', '_DSC4743.jpeg'),
(13, 17, 'testtest', '2019-05-03 13:41:54', 'DSC01936.jpg');

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
(5, 5, 1, '2019-05-03 15:44:02');

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
(2, 'Yara', 'Nolf', 'yaranolf', 'yaranolf@telenet.be', '$2y$14$MwUThUr5Rk40WRFTTKbHZu3DEHQ9ZfJggDM3kals3p7I8EZp1.A1m'),
(4, 'Liese', 'Vanhecke', 'liesevanhecke', 'liesevanhecke@hotmail.com', '$2y$14$pewnkOZ6hkTk45qQi.VIduP3QtCJ6XeSTSlWq.41sbvUlsHTZoSlW'),
(8, 'Annelies', 'Driessen', 'Annelies', 'Driessen@gmail.com', '$2y$14$aHgtdWDRLQ2v/Xq7hICJsem1K6VzFOzQZEDpOdAYMwleGLVkD.bUi'),
(15, 'Lisse', 'Thys', 'Lisse', 'lisse.thys@hotmail.com', '$2y$10$zwR0hPfZxBTH8Xl.2GStVOfOvg90hhzTE4RlwrYZCFkDRhxCI6Tvu'),
(16, 'Mathias', 'Geerts', 'Mathias', 'geertsmathias@gmail.com', '$2y$10$c0SG8zSq6vJdmsDagumVh.9BBAIFI8Fp4uxufksAOvk73v1nvTru2'),
(17, 'Raf', 'Snijders', 'Rafke', 'raf@gmail.com', '$2y$10$01CPBngCaycBsgX8QZ1qI..cbJzNPRFbWgoI3xcIKzEzxfUydn9zC'),
(18, 'Emiel', 'Geerts', 'Emiel', 'emiel@gmail.com', '$2y$10$k3J9N0z0b5UF2dFDywbeE.2DZlyuRJpJbz7bRn9oeKhG7ts4ug6rC');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
