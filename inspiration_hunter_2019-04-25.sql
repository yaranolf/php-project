-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2019 at 02:19 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `inspiration_hunter`
--

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
(5, 0, 'vacay', '2019-04-27 15:12:48', '_DSC4743.jpeg'),
(9, 0, 'fruit', '2019-04-27 18:25:42', '09f7e88ccfe2e64f4baa408399765d9b.jpg'),
(10, 0, 'what a view!', '2019-04-27 19:09:00', '_04A7147.jpg'),
(11, 0, 'test', '2019-05-03 13:22:39', 'large (10).jpg'),
(12, 0, 'blabla', '2019-05-03 13:22:48', '_DSC4743.jpeg'),
(13, 0, 'dfsqS', '2019-05-03 13:41:54', 'DSC01936.jpg');

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
(3, 'Yara', 'Nolf', 'yaranolf', 'nolf.yara@telenet.be', '$2y$14$sWNeq6w8ddSUTHIIsv3qEuxxCZwzP.ZwZjBIc7wlK37VmkqPYRWhS'),
(4, 'Liese', 'Vanhecke', 'liesevanhecke', 'liesevanhecke@hotmail.com', '$2y$14$pewnkOZ6hkTk45qQi.VIduP3QtCJ6XeSTSlWq.41sbvUlsHTZoSlW'),
(5, '', '', '', '', '$2y$14$dU9ftNCPBpetLAhZ7iVUPu2k8sP0hsDxS5TOLscTU6XmZaaxpKmGi'),
(6, '', '', '', '', '$2y$14$Av3naoToJCp0u3sPqUQwS.1SjUITp8asoPj0bNeoQ42GQMNVoo.yG'),
(7, 'Hoi', 'Hoi', 'Hoi', 'Hoi', '$2y$14$Ugwf93rvdhvgXrz8M63wBeJ.N3wEtsGtiaxxFyxS5mF9DmOawCBq.'),
(8, 'Annelies', 'Annelies', 'jow', 'hoi', '$2y$14$aHgtdWDRLQ2v/Xq7hICJsem1K6VzFOzQZEDpOdAYMwleGLVkD.bUi'),
(9, 'Annelies', 'Annelies', 'jow', 'hoi', '$2y$14$8r6vydzlw4710r6NIQKE/OQhlO0UhREmRiqniFlNaNzUNEz2k6fFu'),
(10, 't', 'a', 'a', 'a', '$2y$14$kPfRvt4QXOkn5TLn767XUeP9UWPkyQtfkgLc60TPz7ehMdmkRTt4O'),
(11, 't', 'a', 'a', 'a', '$2y$14$lKukM/NZvWlb6/TrMEBC5O7UMIfqhQoHaZkHu9821aXRC12.NscLS'),
(12, 'a', 'a', 'a', 'a', '$2y$14$deJk9MWiFGkm/4WUQpKdQOriwWHzm33WUdhiTW.2wJ7rNC4kTSThq'),
(13, 'lisse', 'thys', 'lissethys', 'lisse.thys@hotmail.com', '$2y$14$a.gxJMVG25ZatHqLlqD7OOjMMRcoxj8/aK9j9VXgcs8cqPBVXUJbC'),
(14, 'lisse', 'thys', 'lissethys', 'lisse.thys@hotmail.com', '$2y$14$GB40R09UtICboi2F42Vhhe39ZshVSiSo7A6BtIQe6CLDz.UjrLMj6'),
(15, 'Lisse', 'Thys', '', 'lisse.thys@hotmail.com', '$2y$10$zwR0hPfZxBTH8Xl.2GStVOfOvg90hhzTE4RlwrYZCFkDRhxCI6Tvu');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
