-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 01:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(155) DEFAULT NULL,
  `lname` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(65) NOT NULL,
  `home_phone` varchar(55) NOT NULL,
  `cell_phone` varchar(55) NOT NULL,
  `work_phone` varchar(55) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `fname`, `lname`, `email`, `address`, `address2`, `city`, `state`, `zip`, `home_phone`, `cell_phone`, `work_phone`, `deleted`) VALUES
(1, 1, 'Curtis', 'Parham', 'curtis@mailinator.com', '123 Main St.', 'Apt. 111', 'Washington ', 'MO', '63090', '555 444 1234', '555 444 3212', '555 444 9876', 0),
(2, 1, 'John', 'Doe', 'johndoe@gmail.com', '123 Elm St.', NULL, 'New York', 'NY', '12345', '555 444 9999', '555 444 9998', '555 444 9997', 0),
(3, 1, 'Magnus', 'Carlsen', 'magnuscarlsen@gmail.com', '123 Main St.', 'Apt 112', 'Washington', 'MO', '630909', '555 666 3213', '555 111 2222', '555 111 2213', 0),
(4, 1, 'Jane', 'Doe', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finesheet`
--

CREATE TABLE `finesheet` (
  `sheet_no` varchar(10) NOT NULL,
  `vehicle_no` varchar(15) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `fine_date` date NOT NULL,
  `fine_time` time NOT NULL,
  `place` varchar(50) NOT NULL,
  `offence` varchar(100) NOT NULL,
  `licence_no` varchar(15) NOT NULL,
  `id_no` varchar(15) NOT NULL,
  `fine` decimal(10,2) NOT NULL,
  `officer_id` varchar(15) NOT NULL,
  `due_date` date GENERATED ALWAYS AS (`fine_date` + interval 7 day) STORED,
  `status` tinyint(1) DEFAULT 0,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finesheet`
--

INSERT INTO `finesheet` (`sheet_no`, `vehicle_no`, `full_name`, `address`, `fine_date`, `fine_time`, `place`, `offence`, `licence_no`, `id_no`, `fine`, `officer_id`, `status`, `id`) VALUES
('8985', 'sdf333', 'john doe', '123 Main St.', '2020-05-14', '06:06:00', 'jhghg', '2', 'dd222', '1111', '250.00', '1', 0, NULL),
('8987', 'sdf333', 'john doe', '221/2, Hendala Road, Wattala', '2020-05-28', '00:01:00', 'borella', 'sss', 'dd222', '1111', '250.00', '1', 0, NULL),
('9098', '7yggg', 'hjh hgf', 'ft jhjhj', '2020-05-13', '00:07:00', 'uyu', 'jyyj', 'ggddd', '11212', '100.00', '1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `acl` text DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `acl`, `deleted`) VALUES
(1, 'parhamcurtis', 'parhamcurtis@sharklasers.com', '$2y$10$/UuSP9l2Dy9WNBZHPVXu/OcUlRm28z5CmCesTvnS3UZWoi9Cu3TLW', 'Curtis', 'Parham', '', 0),
(4, 'parhamtoni', 'parhamtoni@sharklasers.com', '$2y$10$bU.E5M5OXkGyu56EHz63wuyShHbSkR7duSdJqICWBUQMa5fTimRSa', 'Toni', 'Parham', '', 0),
(5, 'parhamjules', 'parhamjules@sharklasers.com', '$2y$10$97FwI9PQRNH1Rd4ORlPdcunpq7efsivBuQ3YJ1Y6zbVd4F6cli9mG', 'Jules', 'Parham', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `finesheet`
--
ALTER TABLE `finesheet`
  ADD PRIMARY KEY (`sheet_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
