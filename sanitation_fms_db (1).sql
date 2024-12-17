-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2024 at 01:01 PM
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
-- Database: `sanitation_fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(1, 'Colombo'),
(2, 'Gampaha'),
(3, 'Kandy'),
(4, 'Galle'),
(5, 'Matara'),
(6, 'Negombo'),
(7, 'Jaffna'),
(8, 'Trincomalee'),
(9, 'Batticaloa'),
(10, 'Kurunegala'),
(11, 'mathara whutto');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Lahiru Induwara', 'lahiru20031', 'e10adc3949ba59abbe56e057f20f883e'),
(32, 'Lahiru', 'lahiru', '2a12f86e0124d7e43e2a16c7a051bb1a'),
(27, 'Ravindu', 'ravi2003', '25d55ad283aa400af464c76d713c07ad'),
(24, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(34, 'Deemath Ishara', 'deemath.ish.55@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(33, 'Induwara', 'induwara', 'a591024321c5e2bdbd23ed35f0574dde');

-- --------------------------------------------------------

--
-- Table structure for table `table_mainlocation`
--

CREATE TABLE `table_mainlocation` (
  `id` int(11) NOT NULL,
  `mainlocation` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_mainlocation`
--

INSERT INTO `table_mainlocation` (`id`, `mainlocation`, `active`) VALUES
(4, 'Arrival', 'Yes'),
(5, 'Depature', 'Yes'),
(6, 'pansala', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_report`
--

CREATE TABLE `table_report` (
  `main_location_id` int(11) NOT NULL,
  `main_location` varchar(100) NOT NULL,
  `sub_location_id` int(11) NOT NULL,
  `sublocation` varchar(256) NOT NULL,
  `washroom_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_report`
--

INSERT INTO `table_report` (`main_location_id`, `main_location`, `sub_location_id`, `sublocation`, `washroom_id`, `timestamp`, `date`, `time`) VALUES
(4, 'arrival', 60, 'anew', 23456, '2024-12-16 11:26:06', '2024-12-10', '16:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `table_sublocation`
--

CREATE TABLE `table_sublocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `sublocation` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL,
  `mainlocID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_sublocation`
--

INSERT INTO `table_sublocation` (`id`, `sublocation`, `active`, `mainlocID`) VALUES
(68, 'Arr - custom', 'yes', 4),
(66, 'Immigration', 'Yes', 5),
(67, 'Immigration', 'yes', 4),
(59, 'Arr - custom', 'Yes', 5),
(60, 'Duty free up (EM)', 'Yes', 5),
(62, 'Duty free down', 'Yes', 4),
(64, 'Duty free down', 'Yes', 4),
(71, 'nice', 'No', 5),
(74, 'asa', 'No', 4),
(75, 'dasd', 'Yes', 4),
(76, 'GAYA', 'Yes', NULL),
(77, 'hjhj', 'Yes', NULL),
(78, 'de', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_washroom`
--

CREATE TABLE `table_washroom` (
  `id` int(10) UNSIGNED NOT NULL,
  `washroomid` varchar(100) NOT NULL,
  `mainlocID` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL,
  `sublocID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_washroom`
--

INSERT INTO `table_washroom` (`id`, `washroomid`, `mainlocID`, `status`, `sublocID`) VALUES
(75, 'AB2312', 5, 'Yes', 68),
(74, 'AB2321', 4, 'No', 60),
(76, 'NB4532', 4, 'Yes', 74),
(77, 'KL3421', 5, 'Yes', 60),
(79, 'BATA234', 4, 'Yes', 66);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_mainlocation`
--
ALTER TABLE `table_mainlocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_sublocation`
--
ALTER TABLE `table_sublocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_washroom`
--
ALTER TABLE `table_washroom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_mainlocation`
--
ALTER TABLE `table_mainlocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_sublocation`
--
ALTER TABLE `table_sublocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `table_washroom`
--
ALTER TABLE `table_washroom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
