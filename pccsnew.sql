-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 03:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP pccsnew;
CREATE pccssnew;
USE pccsnew;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pccsnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(5) NOT NULL,
  `branch_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'Kollupitiya'),
(2, 'Bambalapitiya'),
(3, 'Gampaha'),
(4, 'Yakkala'),
(5, 'Cinnamon Gardens'),
(6, 'Kadawatha'),
(7, 'Kandy'),
(8, 'Galle'),
(9, 'Matara'),
(10, 'Hambanthota'),
(11, 'Nuwara Eliya'),
(12, 'Anuradhapura'),
(13, 'Polonnaruwa'),
(14, 'Negombo'),
(15, 'Jaffna');

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
-- Table structure for table `dig`
--

CREATE TABLE `dig` (
  `id_no` varchar(15) NOT NULL,
  `police_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` int(5) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dig`
--

INSERT INTO `dig` (`id_no`, `police_id`, `name`, `branch`, `email`) VALUES
('611006050V', '34839', 'Shane Bond', 0, '34839@police.lk');

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
  `officer_id` varchar(15) DEFAULT NULL,
  `due_date` date GENERATED ALWAYS AS (`fine_date` + interval 7 day) STORED,
  `status` tinyint(1) DEFAULT 0,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finesheet`
--

INSERT INTO `finesheet` (`sheet_no`, `vehicle_no`, `full_name`, `address`, `fine_date`, `fine_time`, `place`, `offence`, `licence_no`, `id_no`, `fine`, `officer_id`, `status`, `id`) VALUES
('1234', '5464N', 'Deeptha Kumara', '22/B, Hogwarts', '2020-12-04', '15:45:00', 'Horana', 'Road sdf', 'B3863578', '11212', '3500.00', '1', 0, NULL),
('8985', 'sdf333', 'john doe', '123 Main St.', '2020-05-14', '06:06:00', 'jhghg', '2', 'B3863578', '1111', '250.00', '19396', 0, 0),
('8987', 'sdf333', 'john doe', '221/2, Hendala Road, Wattala', '2020-05-28', '00:01:00', 'borella', 'sss', 'B3863578', '1111', '250.00', '32882', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `licence_no` varchar(15) NOT NULL,
  `id_no` varchar(15) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` enum('A+','O+','B+','AB+','A-','O-','B-','AB-') NOT NULL,
  `competent_to_drive` set('A1','A','B1','B','C1','C','CE','D1','D','DE','G1','G','J') NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`licence_no`, `id_no`, `full_name`, `address`, `dob`, `blood_group`, `competent_to_drive`, `issue_date`, `expiry_date`) VALUES
('B3863578', '1111', 'john doe', '123 Main St.', '2019-04-02', 'A+', 'A,B1', '2019-11-18', '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `offence_id` int(2) NOT NULL,
  `offence_name` varchar(500) NOT NULL,
  `fine` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`offence_id`, `offence_name`, `fine`) VALUES
(1, 'Identification Plates', '1000.00'),
(2, 'Not carrying Revenue Licence', '1000.00'),
(3, 'Contravening Revenue Licence provisions', '1000.00'),
(4, 'Driving Emergency Service Vehicles & Public Service Vehicles without D.L', '1000.00'),
(5, 'Driving Special Purpose Vehicles without a licence', '1000.00'),
(6, 'Driving a vehicle loaded with chemicals/hazardous waste without a licence', '1000.00'),
(7, 'Not having a licence to drive a specific class of vehicles', '1000.00'),
(8, 'Not carrying D.L', '1000.00'),
(9, 'Not having instructor\'s licence', '2000.00'),
(10, 'Contravening Speed Limits', '3000.00'),
(11, 'Disobeying Road Rules', '2000.00'),
(12, 'Activities obstructing control of the motor vehicle', '1000.00'),
(13, 'Signals by Driver', '1000.00'),
(14, 'Reversing for a long Distance', '1000.00'),
(15, 'Sound or Light warnings', '1000.00'),
(16, 'Excessive emission of smoke, etc.', '1000.00'),
(17, 'Riding on running boards', '500.00'),
(18, 'No. of persons in front seats', '1000.00'),
(19, 'Non-use of seat belts', '1000.00'),
(20, 'Not wearing protective helmets', '1000.00'),
(21, 'Distribution of Advertisements ', '1000.00'),
(22, 'Excessive use of Noise', '1000.00'),
(23, 'Disobeying Directions & Signals of Police Officers/ Traffic Wardens', '2000.00'),
(24, 'Non-Compliance with Traffic Signals', '1000.00'),
(25, 'Failure to take precautions when discharging fuel into tank', '1000.00'),
(26, 'Halting or Parking', '1000.00'),
(27, 'Non-use of precautions when parking', '2000.00'),
(28, 'Excessive carriage of persons in motor car or private coach', '500.00'),
(29, 'Carriage of passengers in excess in omnibuses ', '500.00'),
(30, 'Carriage on lorry or Motor Tricycle van of goods in excess ', '500.00'),
(31, 'No. of persons carried in a lorry', '500.00'),
(32, 'Violation of Regulations on motor vehicles', '1000.00'),
(33, 'Failure to carry the Emission certificate or the Fitness Certificate ', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `offender`
--

CREATE TABLE `offender` (
  `offender_id` varchar(15) NOT NULL,
  `licence_no` varchar(15) NOT NULL,
  `offender_name` varchar(100) NOT NULL,
  `tp_no` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `nearest_police_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offender`
--

INSERT INTO `offender` (`offender_id`, `licence_no`, `offender_name`, `tp_no`, `address`, `nearest_police_branch`) VALUES
('1111', 'B3863578', 'John Doe', '077452187', 'No.45/A,Godagama', 'Godagama'),
('11212', 'B3863578', 'Deeptha Karunasena', '077452457', 'No.45/A,Maharagama', 'Maharagama');

-- --------------------------------------------------------

--
-- Table structure for table `oic`
--

CREATE TABLE `oic` (
  `id_no` varchar(15) NOT NULL,
  `police_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` int(5) NOT NULL,
  `oic_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oic`
--

INSERT INTO `oic` (`id_no`, `police_id`, `name`, `branch`, `oic_email`) VALUES
('808790221V', '10589', 'Dale Steyn', 1, '10589@police.lk'),
('777204956V', '14434', 'Shaun Pollock', 5, '14434@police.lk'),
('755571797V', '38854', 'Kagiso Rabada', 4, '38854@police.lk'),
('683038823V', '65488', 'Lungi Ngidi', 6, '65488@police.lk'),
('866741174V', '92909', 'Makhaya Ntini', 11, '92909@police.lk');

-- --------------------------------------------------------

--
-- Table structure for table `payment_officer`
--

CREATE TABLE `payment_officer` (
  `id_no` varchar(15) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_officer`
--

INSERT INTO `payment_officer` (`id_no`, `company`) VALUES
('827724085V', 'Cargills Food City - Gampaha'),
('880666303V', 'Cargills Food City - Moratuwa'),
('763083088V', 'Keells Super - Wattala '),
('912539947V', 'Sathosa - Kadawatha'),
('814992406V', 'LAUGHS Super - Borella');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_officer`
--

CREATE TABLE `traffic_officer` (
  `id_no` varchar(15) NOT NULL,
  `police_id` varchar(10) NOT NULL,
  `officer_name` varchar(100) NOT NULL,
  `branch` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traffic_officer`
--

INSERT INTO `traffic_officer` (`id_no`, `police_id`, `officer_name`, `branch`) VALUES
('810747419V', '19396', 'Stuart Clarke', 1),
('671664307V', '32882', 'Brett Lee', 5),
('660708409V', '57762', 'Shaun Tait', 6),
('719210659V', '70495', 'Nathan Bracken', 11),
('894822932V', '98248', 'Mitchell Johnson', 4);

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
(1, 'parhamcurtis', 'parhamcurtis@sharklasers.com', '$2y$10$/UuSP9l2Dy9WNBZHPVXu/OcUlRm28z5CmCesTvnS3UZWoi9Cu3TLW', 'Curtis', 'Parham', '[\"TrafficOfficer\"]', 0),
(4, 'parhamtoni', 'parhamtoni@sharklasers.com', '$2y$10$bU.E5M5OXkGyu56EHz63wuyShHbSkR7duSdJqICWBUQMa5fTimRSa', 'Toni', 'Parham', '[\"Offender\"]', 0),
(5, 'parhamjules', 'parhamjules@sharklasers.com', '$2y$10$97FwI9PQRNH1Rd4ORlPdcunpq7efsivBuQ3YJ1Y6zbVd4F6cli9mG', 'Jules', 'Parham', '', 0),
(1111, 'johndoe', 'johndoe@gmail.com', '$2y$10$TIJOsZk4vcD4cYDYnsVt0e60HIhOeXqdWe9YmyApaEgyHjw2ke3Vm', 'John', 'Doe', '[\"Offender\"]', 0);

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
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `dig`
--
ALTER TABLE `dig`
  ADD PRIMARY KEY (`police_id`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `finesheet`
--
ALTER TABLE `finesheet`
  ADD PRIMARY KEY (`sheet_no`),
  ADD KEY `id_no` (`id_no`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`licence_no`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `offence`
--
ALTER TABLE `offence`
  ADD PRIMARY KEY (`offence_id`);

--
-- Indexes for table `offender`
--
ALTER TABLE `offender`
  ADD PRIMARY KEY (`offender_id`),
  ADD KEY `offencer_id` (`offender_id`),
  ADD KEY `licence_no` (`licence_no`);

--
-- Indexes for table `oic`
--
ALTER TABLE `oic`
  ADD PRIMARY KEY (`police_id`),
  ADD KEY `id_no` (`id_no`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `payment_officer`
--
ALTER TABLE `payment_officer`
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `traffic_officer`
--
ALTER TABLE `traffic_officer`
  ADD PRIMARY KEY (`police_id`),
  ADD UNIQUE KEY `id_no_2` (`id_no`),
  ADD KEY `id_no` (`id_no`),
  ADD KEY `branch` (`branch`);

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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `offence_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dig`
--
ALTER TABLE `dig`
  ADD CONSTRAINT `dig_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `login` (`id`);

--
-- Constraints for table `finesheet`
--
ALTER TABLE `finesheet`
  ADD CONSTRAINT `finesheet_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `offender` (`offender_id`);

--
-- Constraints for table `licence`
--
ALTER TABLE `licence`
  ADD CONSTRAINT `licence_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `offender` (`offender_id`);

--
-- Constraints for table `offender`
--
ALTER TABLE `offender`
  ADD CONSTRAINT `offender_ibfk_2` FOREIGN KEY (`licence_no`) REFERENCES `licence` (`licence_no`);

--
-- Constraints for table `oic`
--
ALTER TABLE `oic`
  ADD CONSTRAINT `oic_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `oic_ibfk_2` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `payment_officer`
--
ALTER TABLE `payment_officer`
  ADD CONSTRAINT `payment_officer_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `login` (`id`);

--
-- Constraints for table `traffic_officer`
--
ALTER TABLE `traffic_officer`
  ADD CONSTRAINT `traffic_officer_ibfk_2` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
