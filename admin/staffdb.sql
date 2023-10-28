-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 10:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staffdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'enilorundamoses24@gmail.com', '$2y$10$IfjlWVbcWXfs/8jveLTQdews0YUZecb3fOUZLhVkL1X5QUHe4YKJS');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Finance and Accounts'),
(2, 'Admin & HR'),
(3, 'Town Planning Services'),
(4, 'Engineering Services'),
(5, 'ICT'),
(6, 'Procurement'),
(7, 'Audit'),
(8, 'Legal'),
(9, 'Survey'),
(10, 'Estate');

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE `grade_level` (
  `grad_id` int(11) NOT NULL,
  `grad_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`grad_id`, `grad_level`) VALUES
(1, 'G.L, 01'),
(2, 'G.L, 02'),
(3, 'G.L, 03'),
(4, 'G.L, 04'),
(5, 'G.L, 05'),
(6, 'G.L, 06'),
(7, 'G.L, 07'),
(8, 'G.L, 08'),
(9, 'G.L, 09'),
(10, 'G.L, 10'),
(11, 'G.L, 12'),
(12, 'G.L, 13'),
(13, 'G.L, 14'),
(14, 'G.L, 15'),
(15, 'G.L, 16'),
(16, 'G.L, 17');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sal_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `amount`, `date`) VALUES
(1, 36000, '2023-10-12 21:53:03'),
(2, 36500, '2023-10-12 20:58:21'),
(3, 37000, '2023-10-12 22:32:22'),
(4, 37500, '2023-10-12 20:58:38'),
(5, 39000, '2023-10-12 20:58:46'),
(6, 44000, '2023-10-12 21:06:24'),
(7, 63000, '2023-10-12 21:06:30'),
(8, 79000, '2023-10-12 21:06:35'),
(9, 92000, '2023-10-12 21:06:40'),
(10, 95000, '2023-10-13 10:45:43'),
(11, 122000, '2023-10-12 21:06:52'),
(12, 136000, '2023-10-12 22:35:10'),
(13, 150000, '2023-10-12 21:07:10'),
(14, 202000, '2023-10-12 21:07:38'),
(15, 250000, '2023-10-12 21:07:47'),
(16, 476000, '2023-10-12 21:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `staff_benefit`
--

CREATE TABLE `staff_benefit` (
  `ben_id` int(11) NOT NULL,
  `ben_leavebonus` tinyint(1) NOT NULL,
  `ben_carloan` tinyint(1) NOT NULL,
  `ben_staffquarter` tinyint(1) NOT NULL,
  `ben_workshoptraining` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_benefit`
--

INSERT INTO `staff_benefit` (`ben_id`, `ben_leavebonus`, `ben_carloan`, `ben_staffquarter`, `ben_workshoptraining`) VALUES
(1, 1, 0, 0, 0),
(2, 1, 0, 1, 1),
(3, 1, 1, 0, 1),
(4, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `staff_id` int(11) NOT NULL,
  `staff_fullname` varchar(255) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_phone` varchar(50) NOT NULL,
  `staff_gender` varchar(50) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `grad_id` int(11) NOT NULL,
  `sal_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `ben_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_profile`
--

INSERT INTO `staff_profile` (`staff_id`, `staff_fullname`, `staff_dob`, `staff_phone`, `staff_gender`, `staff_email`, `grad_id`, `sal_id`, `state_id`, `dept_id`, `ben_id`) VALUES
(1, 'Olowolafe Abey', '1993-06-18', '0815347395', 'Male', 'olowolafe@gmail.com', 9, 11, 1, 6, 3),
(6, 'Ajenifuja Olanrewaju Isiaka', '2023-10-26', '09035363833', 'Male', 'omoaje24@gmail.com', 12, 12, 14, 7, 1),
(7, 'Oluwatobi Adeshina ', '1993-04-10', '08088822663', 'Male', 'olowolafestyle454@gmail.com', 10, 10, 8, 3, 2),
(8, 'Abdullahi Abdulsalam', '1989-06-07', '08033558695', 'Male', 'abduljeli67l@gmail.com', 9, 9, 1, 4, 2),
(9, 'Noibi Titilayo A.', '2023-10-08', '08026269223', 'Female', 'noibititilayo34@gmail.com', 15, 15, 1, 2, 3),
(10, 'Doshima Itunu', '2023-10-08', '09087648986', 'Female', 'Ojimakudo@gmail.com', 13, 13, 11, 9, 4),
(11, 'Ibidapo Mofunoluwa Olamide', '2023-10-09', '08081810726', 'Male', 'ibidaposnr34@@gmail.com', 9, 9, 2, 2, 2),
(13, 'Vin Diesel', '2023-10-12', '09087564846', 'Male', 'fastandfurious45@gmail.com', 12, 12, 15, 1, 2),
(15, 'Victoria Umoh', '1989-10-08', '08053432577', 'Female', 'vickyumoh@gmail.com', 9, 9, 11, 5, 1),
(16, 'Eniolorunda Moses ', '2023-10-15', '08087179844', 'Male', 'eniolorundaamoses@gmail.com', 10, 10, 1, 6, 2),
(17, 'Victoria Kimani', '2023-10-16', '08087179861', 'Female', 'vickykiman23@gmail.com', 8, 7, 12, 5, 2),
(18, 'Blessing Ijeoma', '2023-10-16', '08022222663', 'Female', 'blessingbliv9837777@gmail.com', 9, 9, 1, 7, 4),
(96, 'Babatunde Imam', '1976-09-12', '09074543646', 'Male', 'babstunde34@gmail.com', 12, 12, 1, 2, 2),
(98, 'Oyebola Ilupeju', '2023-10-17', '07012546874', 'Male', 'oyebolamoatacad45@gmail.com', 10, 1, 1, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff_promotion`
--

CREATE TABLE `staff_promotion` (
  `prom_id` int(11) NOT NULL,
  `previous_post` varchar(255) NOT NULL,
  `present_post` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_promotion`
--

INSERT INTO `staff_promotion` (`prom_id`, `previous_post`, `present_post`, `date`) VALUES
(3, 'GL, 13', 'GL 14', '0000-00-00 00:00:00'),
(4, 'GL, 13', 'GL 14', '0000-00-00 00:00:00'),
(5, 'GL, 13', 'GL 14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Lagos'),
(2, 'Osun'),
(3, 'Kwara'),
(4, 'Enugu'),
(5, 'Anambra'),
(6, 'Delta'),
(7, 'Kaduna'),
(8, 'Ondo'),
(9, 'Oyo'),
(10, 'Plateau'),
(11, 'Rivers'),
(12, 'Abia'),
(13, 'Lafia'),
(14, 'Imo'),
(15, 'Kigawa'),
(16, 'Adamawa'),
(17, 'Bauchi'),
(18, 'Katsina'),
(19, 'Zamfara'),
(20, 'Gobe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD PRIMARY KEY (`grad_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `staff_benefit`
--
ALTER TABLE `staff_benefit`
  ADD PRIMARY KEY (`ben_id`);

--
-- Indexes for table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `department_id` (`dept_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `sal_id` (`sal_id`),
  ADD KEY `grad_id` (`grad_id`),
  ADD KEY `ben_id` (`ben_id`);

--
-- Indexes for table `staff_promotion`
--
ALTER TABLE `staff_promotion`
  ADD PRIMARY KEY (`prom_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade_level`
--
ALTER TABLE `grade_level`
  MODIFY `grad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff_profile`
--
ALTER TABLE `staff_profile`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
