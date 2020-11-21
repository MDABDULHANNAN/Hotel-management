-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 10:38 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `F_name` varchar(255) NOT NULL,
  `L_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `troom` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `bed` varchar(50) NOT NULL,
  `nroom` varchar(10) NOT NULL,
  `mplan` varchar(50) NOT NULL,
  `t_price` int(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `cout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `title`, `F_name`, `L_name`, `email`, `nation`, `country`, `phone`, `troom`, `room`, `bed`, `nroom`, `mplan`, `t_price`, `cin`, `cout`) VALUES
(1, 'Dr.', 'fuzail', 'polin', 'fuzail@gmail.com', 'Bangladesh', 'Bangladesh', '9876', 'Superior Room', 'AC ROOM', 'Single', '4', 'Room only', 0, '12-12-2008', '15-12-2008'),
(2, 'Miss.', 'mone', 'hasna', 'mone@gmail.com', ' Non Bangladesh', 'Afghanistan', '01924356789', 'Superior Room', ' Non AC ROOM', 'Double', '3', 'Breakfast', 0, '09-02-2018', '12-02-2018'),
(3, 'Dr.', 'fuzail', 'polin', 'fuzail@gmail.com', ' Non Bangladesh', 'Armenia', '0987765', 'Superior Room', 'AC ROOM', 'Single', '2', 'Room only', 240, '2019-12-03', '2019-12-09'),
(4, 'Mr.', 'fuzail', 'polin', 'fuzail@gmail.com', 'Bangladesh', 'Bangladesh', '34543', 'Superior Room', 'AC ROOM', 'Double', '2', 'Quad', 600, '2018-01-01', '2019-01-01'),
(5, 'Dr.', 'HANNAN', 'ABDUL', 'abdulhannan828@gmail.com', 'Bangladesh', 'Bangladesh', '01771918711', 'Superior Room', 'AC ROOM', 'Double', '5', 'Room only', 600, '01-5-18', '28-8-19'),
(6, 'Mr.', 'HANNAN', 'ABDUL', 'abdulhannan828@gmail.com', ' Non Bangladesh', 'Armenia', '01771918711', 'Deluxe Room', 'AC ROOM', 'Single', '2', 'Breakfast', 500, '2010-05-02', '2011-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(6, 'shafiul', 'tutul', 'tutul@gmail.com', '$2y$10$ScjvgnVtnhhfelL0yayuD.VpMjIZLgQ6DoFZmOhso/o'),
(7, 'mon', 'das', 'mondas@gmail.com', '$2y$10$8uVh1vZ7aEmnkqgfpZYRjOC4kyjoU06yS42gTS0lRh.'),
(8, 'fuzail', 'polin', 'fuzail@gmail.com', '9988'),
(9, 'asif', 'khan', 'asif@gmail.com', '5566'),
(10, 'jami', 'al', 'al@gmail.com', '$2y$10$MPpVhSrDTiOgp7QglEMfJuU5PiBvLJaF3hg9UnZfyC4'),
(11, 'shafiul', 'tutul', 'shafiultutul@gmail.com', '1122'),
(12, 'mone', 'hasna', 'mone@gmail.com', '5678'),
(13, 'HANNAN', 'ABDUL', 'abdulhannan828@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
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
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
