-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 20, 2019 at 10:45 AM
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
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `post_id`, `comment`) VALUES
(1, 19, 'Mathias', 35, 'Mooie foto! '),
(2, 25, 'Kalsy', 40, 'Mooi zeg!'),
(3, 22, 'Banciu', 35, 'Prachtig'),
(8, 20, 'Rafke', 35, 'Mooi'),
(10, 20, 'Rafke', 38, 'Cool'),
(35, 17, 'Noorve', 35, 'Heel mooi!'),
(36, 17, 'Noorve', 36, 'Mooi!'),
(37, 25, 'Kalsy', 38, 'Leuk!');

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
(7, 17, 19, 0, '2019-05-09'),
(8, 18, 19, 0, '2019-05-09'),
(9, 16, 19, 0, '2019-05-09'),
(11, 19, 20, 1, '2019-05-15'),
(12, 21, 19, 1, '2019-05-15'),
(13, 23, 20, 1, '2019-05-18'),
(14, 23, 22, 1, '2019-05-17'),
(15, 23, 19, 1, '2019-05-14');

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
  `file_path` varchar(255) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `latitude` decimal(10,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `user_name`, `img_description`, `date_created`, `file_path`, `longitude`, `latitude`) VALUES
(35, 20, 'Rafke', 'Vietnam - Ninh Binh #goodlife', '2019-05-09 09:51:57', '59740504_314219309251336_5163639116109185024_n.jpg', '0.00000000', '0.00000000'),
(36, 20, 'Rafke', 'Ninh binh - rower', '2019-05-09 09:52:59', '59438771_374318446503692_8438972148017528832_n.jpg', '0.00000000', '0.00000000'),
(38, 20, 'Rafke', 'test', '2019-05-09 10:35:41', '59436123_389627524960329_5983074350260027392_n (1).jpg', '0.00000000', '0.00000000'),
(39, 20, 'Rafke', 'test', '2019-05-09 10:35:41', '59436123_389627524960329_5983074350260027392_n (1).jpg', '0.00000000', '0.00000000'),
(40, 19, 'Mathias', 'vietnam - abandoned waterpark', '2019-05-14 15:05:22', '59419220_1106452802878012_8560270824844558336_n.jpg', '0.00000000', '0.00000000'),
(41, 19, 'Mathias', 'test', '2019-05-15 09:04:55', '59740504_314219309251336_5163639116109185024_n.jpg', '4.48483890', '51.02471810'),
(42, 21, 'Caroline', 'geel buske', '2019-05-15 17:36:45', '59418928_2244928338932388_6499858176958005248_n.jpg', '4.76078700', '51.41757050'),
(43, 19, 'Mathias', 'testing', '2019-05-16 07:09:04', '59740504_314219309251336_5163639116109185024_n.jpg', '4.48787700', '51.02256940'),
(44, 19, 'Mathias', 'test_', '2019-05-16 07:26:31', '59436123_389627524960329_5983074350260027392_n.jpg', '4.48779410', '51.02258560');

-- --------------------------------------------------------

--
-- Table structure for table `inappropriate`
--

CREATE TABLE `inappropriate` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inappropriate`
--

INSERT INTO `inappropriate` (`id`, `post_id`, `user_id`) VALUES
(1, 35, 19),
(2, 36, 19),
(3, 44, 17),
(4, 35, 17),
(5, 38, 17),
(6, 40, 17),
(7, 41, 17);

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
(20, 36, 19, '2019-05-16 09:33:16'),
(24, 35, 19, '2019-05-16 11:01:35'),
(32, 36, 17, '2019-05-19 21:22:05'),
(33, 39, 17, '2019-05-19 21:22:08'),
(36, 38, 17, '2019-05-19 22:01:03'),
(37, 40, 17, '2019-05-19 22:03:46'),
(39, 35, 17, '2019-05-19 23:10:47');

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
(19, 'Mathias', 'Geerts', 'Mathias', 'geertsmathias@gmail.com', '$2y$10$mUr76mHgvwj5fs.19r2CheFBXfQhXU5hRftICziGy7DAWDcxCjqiK'),
(20, 'Raf', 'Snijders', 'Rafke', 'raf@gmail.com', '$2y$10$oD0F/EXqAJSGnuNlAq5Z6.kM6e9sq1i85IeRBSS/9cQPGVzBs3P92'),
(21, 'Caroline', 'Sterkens', 'Caroline', 'sterkens@gmail.com', '$2y$10$WSc5ZoP3Fp5ooETZEAgwvuNUK7oxyAZbwcjUr9tKzYzYnYPaHuE1.'),
(22, 'Andreas', 'Banciu', 'Banciu', 'andreasbanciu@live.be', '$2y$10$348RIoMLKJI6oEbwcYBn2uP9oztifE4t77Ox95yYy7ZRlXI6IiRvK'),
(25, 'Sylvia', 'Kalshoven', 'Kalsy', 'sylviakalshoven@live.be', '$2y$10$qy06/1f5PzaMsUJWsRZBaedhoDu3w/XXtS8aebvGP2LnMBNONbHxa');

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
-- Indexes for table `inappropriate`
--
ALTER TABLE `inappropriate`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `inappropriate`
--
ALTER TABLE `inappropriate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
