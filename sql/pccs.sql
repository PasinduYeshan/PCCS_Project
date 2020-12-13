-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 02:32 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pccs`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `cart_id` int(11) NOT NULL,
  `sheet_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `created_at`, `updated_at`, `cart_id`, `sheet_no`, `deleted`) VALUES
(1, '2020-09-29 00:32:58', '2020-09-29 00:32:58', 2, '100003', 0),
(2, '2020-10-02 15:07:25', '2020-10-02 15:07:25', 3, '100003', 0),
(3, '2020-10-02 15:07:35', '2020-10-02 15:07:35', 3, '100006', 0),
(4, '2020-10-03 19:09:02', '2020-10-03 19:09:02', 4, '100003', 0),
(5, '2020-10-03 19:09:07', '2020-10-03 19:09:07', 4, '100006', 0),
(6, '2020-10-04 09:07:56', '2020-10-04 09:07:56', 5, '100010', 0),
(7, '2020-11-16 01:31:11', '2020-11-16 01:31:11', 6, '100007', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dig`
--

CREATE TABLE `dig` (
  `id_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `police_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dig`
--

INSERT INTO `dig` (`id_no`, `police_id`, `name`, `branch`, `email`) VALUES
('601000000', '60001', 'Shane Bond', 0, 'higher1@police.lk'),
('602000000', '60002', 'Nathan Lyon', 0, 'higher2@police.lk');

-- --------------------------------------------------------

--
-- Table structure for table `finecart`
--

CREATE TABLE `finecart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finecart`
--

INSERT INTO `finecart` (`id`, `user_id`, `created_at`, `updated_at`, `paid`, `deleted`) VALUES
(1, 983000000, '2020-09-29 00:25:16', '2020-09-29 00:25:16', 1, 0),
(2, 983000000, '2020-09-29 00:29:07', '2020-09-29 00:29:07', 0, 0),
(3, 983000000, '2020-10-02 15:07:25', '2020-10-02 15:07:25', 0, 0),
(4, 983000000, '2020-10-03 19:09:02', '2020-10-03 19:09:02', 0, 0),
(5, 981000000, '2020-10-04 09:07:56', '2020-10-04 09:08:17', 1, 0),
(6, 982000000, '2020-11-16 01:31:11', '2020-11-16 01:31:11', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `finesheet`
--

CREATE TABLE `finesheet` (
  `sheet_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vehicletype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fine_date` date NOT NULL,
  `fine_time` time NOT NULL,
  `place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `offence` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `licence_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fine` decimal(10,2) NOT NULL,
  `officer_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_date` date GENERATED ALWAYS AS (`fine_date` + interval 7 day) STORED,
  `status` tinyint(1) DEFAULT 0,
  `notify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finesheet`
--

INSERT INTO `finesheet` (`sheet_no`, `vehicle_no`, `full_name`, `address`, `vehicletype`, `fine_date`, `fine_time`, `place`, `offence`, `licence_no`, `id_no`, `fine`, `officer_id`, `status`, `notify`) VALUES
('100001', 'KA-5056', 'Chamod Gihantha', '123 main str', 'Car', '2020-09-24', '12:45:00', 'kandy', '2,4', 'B0000001', '981000000', '2000.00', '80001', 2, 1),
('100002', 'KA-5045', 'Psindu Yeshan', '123 main str', 'Car', '2020-09-24', '12:45:00', 'kandy', '2,4', 'B0000002', '982000000', '2000.00', '80002', 2, 1),
('100003', 'CAR-5555', 'Chathulanaka Gamage', '22/B, Hogwarts', 'Container', '2020-12-04', '15:45:00', 'Horana', '5', 'B0000003', '983000000', '3500.00', '80003', 0, 0),
('100004', 'CAA-7845', 'Shashini Wimalarathne', '123 main str', 'Car', '2020-07-22', '11:11:00', 'kandy', '4', 'B0000004', '984000000', '150.00', '80004', 1, 0),
('100005', 'KA-5056', 'Chamod Gihantha', '123 main str', 'Car', '2020-09-14', '12:45:00', 'kandy', '2,4', 'B0000001', '981000000', '2000.00', '80001', 1, 0),
('100006', 'CAR-5555', 'Chathulanaka Gamage', '22/B, Hogwarts', 'Container', '2020-09-14', '15:45:00', 'Horana', '1,2', 'B0000003', '983000000', '3500.00', '80002', 0, 0),
('100007', 'KA-5045', 'Psindu Yeshan', '123 main str', 'Car', '2020-09-14', '12:45:00', 'kandy', '2,4', 'B0000002', '982000000', '2000.00', '80003', 0, 0),
('100008', 'CAA-7845', 'Shashini Wimalarathne', '123 main str', 'Car', '2020-09-14', '11:11:00', 'kandy', '2,3', 'B0000004', '984000000', '150.00', '80004', 0, 0),
('100010', 'BA-253', 'Chamod Gihantha', '123 main strt', 'Light Lorry', '2020-10-03', '13:04:00', 'Horana', '6,8', 'B0000001', '981000000', '2000.00', '80001', 1, 0),
('2967', 'abc123', 'abc xyz', '123 main str', 'Car', '2020-07-24', '05:16:00', 'gampaha', '4,6,12,13,30,32', 'B3863578', '1111', '5500.00', '1', 1, 0),
('4089', 'abc123', 'abc xyz', '123 main str', 'Car', '2020-07-22', '23:31:00', 'matara', '2,7,29', 'B3863578', '1111', '2500.00', '1', 1, 0),
('4556', 'RC 125', 'asa', 'gotham cty', 'Car', '2020-05-15', '11:11:00', 'galle', '2', 'asd123', '1111', '160.00', '1', 1, 0),
('5111', '3434', 'john doe', '123 main str', 'Car', '2020-08-12', '16:28:00', 'homagama', '2,4,6', 'B3863578', '1111', '3000.00', '1', 1, 0),
('5671', 'abc123', 'john doe', '123 main str', 'Tractor', '2020-08-15', '18:49:00', 'matara', '2,3', 'B3863578', '1111', '2000.00', '1', 1, 0),
('6921', 'abc123', 'john doe', '123 main str', 'Car', '2020-08-11', '22:21:00', 'homagama', '2,5', 'B3863578', '1111', '2000.00', '1', 0, 0),
('6969', 'abc123', 'john doe', '123 main str', 'Car', '2020-06-24', '11:40:00', 'kandy', '', 'B3863578', '1111', '459.00', '1', 0, 0),
('8985', 'sdf333', 'john doe', '123 Main St.', 'Car', '2020-05-14', '06:06:00', 'jhghg', '2', 'B3863578', '1111', '250.00', '19396', 1, 0),
('8987', 'sdf333', 'john doe', '221/2, Hendala Road, Wattala', 'Car', '2020-05-28', '00:01:00', 'borella', 'sss', 'B3863578', '1111', '250.00', '32882', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `licence_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `blood_group` enum('A+','O+','B+','AB+','A-','O-','B-','AB-') COLLATE utf8_unicode_ci NOT NULL,
  `competent_to_drive` set('A1','A','B1','B','C1','C','CE','D1','D','DE','G1','G','J') COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`licence_no`, `id_no`, `full_name`, `address`, `dob`, `blood_group`, `competent_to_drive`, `issue_date`, `expiry_date`) VALUES
('B0000001', '981000000', 'Chamod Gihantha', '123 Main St.', '2019-04-02', 'B+', 'A', '2019-11-18', '2021-05-21'),
('B0000002', '982000000', 'Psindu Yeshan', '123 Main St.', '2019-04-02', 'O-', 'A1,A,B1', '2019-11-18', '2021-05-21'),
('B0000003', '983000000', 'Chathulanaka Gamage', '123 Main St.', '2019-04-02', 'AB+', 'B1,B', '2019-11-18', '2021-05-21'),
('B0000004', '984000000', 'Shashini Wimalarathne', '123 Main St.', '2019-04-02', 'O+', 'B1,B', '2019-11-18', '2021-05-21'),
('B3863578', '1111', 'john doe', '123 Main St.', '2019-04-02', 'A+', 'A,B1', '2019-11-18', '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `offence_id` int(11) NOT NULL,
  `offence_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fine` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `offender_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `licence_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `offender_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tp_no` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nearest_police_branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offender`
--

INSERT INTO `offender` (`offender_id`, `licence_no`, `offender_name`, `tp_no`, `address`, `nearest_police_branch`) VALUES
('1111', 'B3863578', 'John Doe', '077452187', 'No.45/A,Godagama', '3'),
('11212', 'B3863578', 'Deeptha Karunasena', '077452457', 'No.45/A,Maharagama', '2'),
('981000000', 'B0000001', 'Chamod Gihantha', '0716025176', 'No.45/A,Godagama', '3'),
('982000000', 'B0000002', 'Pasindu Yeshan', '0777453588', 'No.45/A,Maharagama', '4'),
('983000000', 'B0000003', 'Chathulanaka Gamage', '0713310984', 'No.45/A,Gampaha', '6'),
('984000000', 'B0000004', 'Shashini Wimalarathne', '0711879952', 'No.45/A,Nugegoda', '10');

-- --------------------------------------------------------

--
-- Table structure for table `oic`
--

CREATE TABLE `oic` (
  `id_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `police_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` int(11) NOT NULL,
  `oic_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oic`
--

INSERT INTO `oic` (`id_no`, `police_id`, `name`, `branch`, `oic_email`) VALUES
('701000000', '70001', 'Dale Steyn', 1, 'pasinduyeshann@gmail.com'),
('702000000', '70002', 'Lungi Ngidi', 2, 'pasinduyeshann@gmail.com'),
('703000000', '70003', 'Makhaya Ntini', 3, 'pasinduyeshann@gmail.com'),
('704000000', '70004', 'Kagiso Rabada', 4, 'pasinduyeshann@gmail.com'),
('705000000', '70005', 'Shaun Pollock', 5, 'pasinduyeshann@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment_officer`
--

CREATE TABLE `payment_officer` (
  `id_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `id_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `police_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `officer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traffic_officer`
--

INSERT INTO `traffic_officer` (`id_no`, `police_id`, `officer_name`, `branch`) VALUES
('801000000', '80001', 'Stuart Clarke', 1),
('802000000', '80002', 'Brett Lee', 5),
('803000000', '80003', 'Mitchell Johnson', 4),
('804000000', '80004', 'Shaun Tait', 6),
('805000000', '80005', 'Nathan Bracken', 11);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `gateway` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `charge_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `success` tinyint(4) DEFAULT NULL,
  `reason` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last4` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `created_at`, `updated_at`, `cart_id`, `gateway`, `type`, `amount`, `charge_id`, `success`, `reason`, `card_brand`, `last4`, `deleted`) VALUES
(1, NULL, NULL, 1119, 'stripe', 'card', '2000.00', 'ch_1H9X8PIvCNmmqVHegSxleiUW', 1, NULL, 'visa', '4242', 0),
(2, NULL, NULL, 1119, 'stripe', 'card', '2000.00', 'ch_1H9XO2IvCNmmqVHeYYQj9CWN', 1, NULL, 'visa', '4242', 0),
(3, NULL, NULL, 2345, 'stripe', 'card', '150.00', 'ch_1H9XSbIvCNmmqVHewX5n3VA4', 1, NULL, 'visa', '4242', 0),
(4, NULL, NULL, 1119, 'stripe', 'card', '2000.00', 'ch_1H9XVvIvCNmmqVHeuDLmb4Ay', 1, NULL, 'visa', '4242', 0),
(5, NULL, NULL, 2967, 'stripe', 'card', '5500.00', 'ch_1H9XwqIvCNmmqVHe7nHxoiwe', 1, NULL, 'visa', '4242', 0),
(6, NULL, NULL, 2967, 'stripe', 'card', '5500.00', 'ch_1H9XzCIvCNmmqVHesKsVENuB', 1, NULL, 'visa', '4242', 0),
(7, NULL, NULL, 2967, 'stripe', 'card', '5500.00', 'ch_1H9Y0NIvCNmmqVHeScWJF0wV', 1, NULL, 'visa', '4242', 0),
(8, NULL, NULL, 2345, 'stripe', 'card', '150.00', 'ch_1H9c5yIvCNmmqVHew2qMUsnr', 1, NULL, 'visa', '4242', 0),
(9, NULL, NULL, 2345, 'stripe', 'card', '150.00', 'ch_1H9c7bIvCNmmqVHeqrgbijjG', 1, NULL, 'visa', '4242', 0),
(10, NULL, NULL, 2345, 'stripe', 'card', '150.00', 'ch_1H9cEvIvCNmmqVHe1yHf4tNV', 1, NULL, 'visa', '4242', 0),
(11, NULL, NULL, 2345, 'stripe', 'card', '150.00', 'ch_1H9cPFIvCNmmqVHerD72TQUm', 1, NULL, 'visa', '4242', 0),
(12, NULL, NULL, 2345, 'stripe', 'card', '150.00', 'ch_1H9pUiIvCNmmqVHeoh81TA9y', 1, NULL, 'visa', '4242', 0),
(13, NULL, NULL, 8985, 'stripe', 'card', '250.00', 'ch_1HGTPVKNSpTiEuPGOGxMa8hO', 1, NULL, 'visa', '4242', 0),
(14, NULL, NULL, 5671, 'stripe', 'card', '2000.00', 'ch_1HGzYNKNSpTiEuPGFSWJBLT1', 1, NULL, 'visa', '4242', 0),
(15, '2020-10-04 09:08:16', '2020-10-04 09:08:16', 5, 'stripe', 'card', '2000.00', 'ch_1HYTCWKNSpTiEuPGPL2Wqwmh', 1, NULL, 'visa', '4242', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `acl` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `acl`, `deleted`) VALUES
(601000000, 'higher1', 'higher1@gmail.com', '$2y$10$r0DqgFUdRNzYPK80zY9ouOXmJg7xH7tNXmZvdzPZ6hs8DeSwBxru6', 'Shane ', 'Bond', '[\"HigherOfficer\"]', 0),
(602000000, 'higher2', 'higher2@gmail.com', '$2y$10$D1xhRBnXNdSL.GMWICLDAu46q5bbzrCxOfzoZwSNeJWIEpVtsao5u', 'Nathan ', 'Lyon', '[\"HigherOfficer\"]', 0),
(701000000, 'oic1', 'oic1@sharklasers.com', '$2y$10$jx6p0QQy4phGzZLGtP18OOJhxdTAZVfxoSchE/WLAz8Oi/nplRpBG', 'Dale ', 'Steyn', '[\"BranchOIC\"]', 0),
(702000000, 'oic2', 'oic2@sharklasers.com', '$2y$10$97FwI9PQRNH1Rd4ORlPdcunpq7efsivBuQ3YJ1Y6zbVd4F6cli9mG', 'Lungi ', 'Ngidi', '[\"BranchOIC\"]', 0),
(703000000, 'oic3', 'oic3@sharklasers.com', '$2y$10$Mcuz5xBbheQLjhLJz1F2yewJw0UD19jNFKXA.CbxDdVcqM/qEE.ES', 'Makhaya ', 'Ntini', '[\"BranchOIC\"]', 0),
(704000000, 'oic4', 'oic4@sharklasers.com', '$2y$10$4XS1tJVhEtuXKaD9I7zuUOTiP6SIXTVeXN8Z2xB7zkGFqSbn3zaeq', 'Kagiso ', 'Rabada', '[\"BranchOIC\"]', 0),
(705000000, 'oic5', 'oic5@sharklasers.com', '$2y$10$.mzzF5mcCSVn5vSihx8cnOAodoGCPsnu/EEcaYV7QwkGFPqfFQ0/K', 'Shaun ', 'Pollock', '[\"BranchOIC\"]', 0),
(801000000, 'officer1', 'officer1@sharklasers.com', '$2y$10$/UuSP9l2Dy9WNBZHPVXu/OcUlRm28z5CmCesTvnS3UZWoi9Cu3TLW', 'Stuart ', 'Clarke', '[\"TrafficOfficer\"]', 0),
(802000000, 'officer2', 'officer2@sharklasers.com', '$2y$10$NMdIF.djslYbkhAqjddlUeYytHR.T17WIYRfaXQtkl9mnWVO9DRPa', 'Brett ', 'Lee', '[\"TrafficOfficer\"]', 0),
(803000000, 'officer3', 'officer3@sharklasers.com', '$2y$10$ZO5bTD/vtS9XjBJkI7nReOTxfaDBrZAC0DC/2tliZTP786MuFN6v6', 'Mitchell ', 'Johnson', '[\"TrafficOfficer\"]', 0),
(804000000, 'officer4', 'officer4@sharklasers.com', '$2y$10$aQrA89XF6vAVBQyv0nlmxu0z/2zkKkc.VF6BdS1z.5Ig8ypIEie4y', 'Shaun ', 'Tait', '[\"TrafficOfficer\"]', 0),
(805000000, 'officer5', 'officer5@sharklasers.com', '$2y$10$7u7SzoeZbP4muccNmSeDBeLuwZ1rbkXGiI2s3xiM9juoGOM.EHirS', 'Nathan', 'Bracken', '[\"TrafficOfficer\"]', 0),
(901000000, 'payment1', 'payment1@gmail.com', '$2y$10$ScePai/97ZAMVDO7UnIjBe0TnmpVapBJvAb.9EcGNRzVN0J/JjnlW', 'Jane', 'Doe', '[\"PaymentOfficer\"]', 0),
(902000000, 'payment2', 'payment2@gmail.com', '$2y$10$MoSr8Mi3p4GGQx2bw66JsOi1SICOmWnq9L1PYvx/WyIfRzsdVqsby', 'John', 'Doe', '[\"PaymentOfficer\"]', 0),
(981000000, 'offender1', 'offender1@gmail.com', '$2y$10$I0u7/6WgOQfkqkbemq.XIuvlIKMjMGEkp8b9csUNyLk7cMTEoUIa6', 'Chamod', 'Gihantha', '[\"Offender\"]', 0),
(982000000, 'offender2', 'offender2@gmail.com', '$2y$10$D1QvtQgYm/cwwEYgDPHRGeDhAbSrTDTz0mZJd9jwTLrj8wLtH.s7W', 'Pasindu', 'Yeshan', '[\"Offender\"]', 0),
(983000000, 'offender3', 'offender3@gmail.com', '$2y$10$LzIQa9iOfGbfrPPFH1nPiu.ZAxlLqLQuJjV97MihiZoRB28Kw7yiu', 'Chathulanka', 'Gamage', '[\"Offender\"]', 0),
(984000000, 'offender4', 'offender4@gmail.com', '$2y$10$8APTR6grN1/fn1rtDfkO4ejhePLCREcC0UW68ZGIcbQ1W2uLNYhaG', 'Shashini', 'Wimalarathne', '[\"Offender\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session`, `user_agent`) VALUES
(2, 1, '17e62166fc8586dfa4d1bc0e1742c08b', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(3, 1111, 'd09bf41544a3365a46c9077ebb5e35c3', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(4, 801000000, '98f13708210194c475687be6106a3b84', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari'),
(5, 981000000, 'c16a5320fa475530d9583c34fd356ef5', 'Mozilla (Windows NT 10.0; Win64; x64) AppleWebKit (KHTML, like Gecko) Chrome Safari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `sheet_no` (`sheet_no`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `dig`
--
ALTER TABLE `dig`
  ADD PRIMARY KEY (`police_id`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `finecart`
--
ALTER TABLE `finecart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paid` (`paid`),
  ADD KEY `deleted` (`deleted`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charge_id` (`charge_id`),
  ADD KEY `sheet_no` (`cart_id`),
  ADD KEY `success` (`success`),
  ADD KEY `deleted` (`deleted`);

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
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `finecart`
--
ALTER TABLE `finecart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `offence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=984000027;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
