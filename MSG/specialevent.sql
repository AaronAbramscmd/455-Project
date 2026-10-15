-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2026 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msg_paintball`
--

-- --------------------------------------------------------

--
-- Table structure for table `specialevent`
--

CREATE TABLE `specialevent` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(100) NOT NULL,
  `Event_Type` varchar(50) NOT NULL,
  `Event_Date` date NOT NULL,
  `Event_Time` time NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialevent`
--

INSERT INTO `specialevent` (`Event_ID`, `Event_Name`, `Event_Type`, `Event_Date`, `Event_Time`, `Location`, `Description`) VALUES
(1, 'Autumn Open', 'Tournament', '2026-10-25', '09:00:00', 'Speedball Arena', 'Team tournament. 8 teams max. $150 entry per team. Winner takes the pot.'),
(2, 'Halloween Havoc', 'Holiday', '2026-10-31', '19:00:00', 'Field A', 'Night game under the lights. Glow in the dark paint. Costumes strongly encouraged.'),
(3, 'Veterans Day Open Play', 'Open Play', '2026-11-11', '11:00:00', 'Field A', 'Free entry for all veterans. Regular paint prices. Thank you for your service.'),
(4, 'Thanksgiving Turkey Shoot', 'Tournament', '2026-11-28', '13:00:00', 'Field C', 'Bring a frozen turkey to donate and get $5 off your entry fee.'),
(5, 'Frostbite Classic', 'Tournament', '2026-12-12', '10:00:00', 'Indoor Arena', 'Winter indoor tournament. 12 team cap. Heated staging area.'),
(6, 'Holiday Toy Drive', 'Charity', '2026-12-19', '12:00:00', 'Field A', 'Bring an unwrapped toy and play free for one hour. All toys go to local families.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `specialevent`
--
ALTER TABLE `specialevent`
  ADD PRIMARY KEY (`Event_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `specialevent`
--
ALTER TABLE `specialevent`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
