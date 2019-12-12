-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 08:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventmanager_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `attendance` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `venue`, `date`, `time`, `status`, `attendance`, `user_id`, `description`) VALUES
(17, 'Christmas Party', 'Nagtabon Beach', 'Dec 18, 2019', '10:00 am - 5:00 pm', 'not_finished', 'optional', 9, 'Christmast party with friends.'),
(18, 'Christmas With Family', 'House', 'December 24, 2019', '9:00 PM - 3:00 AM', 'not_finished', 'mandatory', 9, 'Christmas With Family'),
(19, 'Rizal Day', 'None', 'December 30, 2019', '8:00 AM - 5:00 PM', 'not_finished', 'optional', 9, 'Holiday'),
(20, 'New Years Eve Celebration', 'House', 'December 31,2019', '9:00 PM - 3:00 AM', 'not_finished', 'mandatory', 9, 'New Years Eve Celebration'),
(21, 'Chinese Lunar New Year', 'Work place', 'January 25, 2020', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 9, 'Chinese Lunar New Year'),
(22, 'People Power Anniversary', 'None', 'February 25, 2020', '8:00 AM - 5:00 PM', 'not_finished', 'optional', 9, 'People Power Anniversary'),
(23, 'Labor Day', 'None', 'May 1, 2020', '8:00 AM - 5:00 PM', 'not_finished', 'optional', 9, 'No work day can laze all day'),
(24, 'Independence day', 'None', 'June 12, 2020', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 9, 'No work day'),
(25, 'Cousin\'s Birthday', 'Auntie\'s House', 'December 20, 2019', '1:00 pm - 5:00 pm', 'not_finished', 'optional', 10, 'Cousin\'s Birthday Celebration'),
(26, 'Christmas With Family', 'Parent\'s House', 'December 24,2019', '9:00 PM - 3:00 AM', 'not_finished', 'mandatory', 10, 'Christmas With Family'),
(27, 'New Years Eve', 'Parent\'s House', 'December 31,2019', '9:00 PM - 3:00 AM', 'not_finished', 'mandatory', 10, 'Celebrating new year with family'),
(28, 'Nephew\'s First Birthday', 'Brother\'s House', 'January 4, 2020', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 10, 'Nephew\'s first birthday celebration'),
(29, 'Office Christmas Party ', 'Work place', 'December 20, 2019', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 11, 'Office Christmas Party '),
(30, 'Office Year End Party', 'Office', 'December 30, 2019', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 11, 'Office Year End Party'),
(31, 'New Years Eve Celebration', 'House', 'December 31,2019', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 11, 'New Years Eve Celebration with family'),
(32, 'Chinese Lunar New Year', 'Work place', 'January 25, 2020', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 11, 'Chinese Lunar New Year'),
(33, 'Rizal Day', 'None', 'December 30, 2019', '8:00 AM - 5:00 PM', 'not_finished', 'mandatory', 11, 'None work day, house clean up');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `lastname`, `firstname`, `usertype`) VALUES
(9, 'user', '$2y$10$YVObtH8rt9JDIVhm0erIeeAZyVAMr5ZSK9MKYXhlvS7XIvIj.7Yra', 'User', 'First', 'user'),
(10, 'user2', '$2y$10$CalnTHfkzdTzNU6C2xXx1OqNTK3qwS17a6ZT9rEmaw2C/5Zc7fC9e', 'User', 'Second', 'user'),
(11, 'user3', '$2y$10$8CywHQVWL8NSSLqWhxZumOusjiFO7QiPaLxnqWLJPb3hxKfV0fotS', 'User', 'Third', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
