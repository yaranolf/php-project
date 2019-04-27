-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 27, 2019 at 01:26 PM
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
  `image` blob NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `image`, `description`, `date_created`) VALUES
(1, 0, 0x75706c6f6164732f31312e6a7067, 'test', '0000-00-00 00:00:00');

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
(9, 'Annelies', 'Annelies', 'jow', 'hoi', '$2y$14$8r6vydzlw4710r6NIQKE/OQhlO0UhREmRiqniFlNaNzUNEz2k6fFu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
