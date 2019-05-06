-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2019 at 08:18 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

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
(5, 1, 'vacay', '2019-04-27 15:12:48', '_DSC4743.jpeg'),
(9, 2, 'fruit', '2019-04-27 18:25:42', '09f7e88ccfe2e64f4baa408399765d9b.jpg'),
(10, 16, 'what a view!', '2019-04-27 19:09:00', '_04A7147.jpg'),
(11, 4, 'test', '2019-05-03 13:22:39', 'large (10).jpg'),
(12, 0, 'blabla', '2019-05-03 13:22:48', '_DSC4743.jpeg'),
(13, 17, 'testtest', '2019-05-03 13:41:54', 'DSC01936.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
