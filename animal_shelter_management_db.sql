-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal_shelter_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopter`
--

CREATE TABLE `adopter` (
  `adopter_id` int(10) NOT NULL,
  `adoption_history` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopter`
--

INSERT INTO `adopter` (`adopter_id`, `adoption_history`) VALUES
(1, 'First adoption'),
(2, 'First adoption'),
(3, 'First adoption');

-- --------------------------------------------------------

--
-- Table structure for table `adoptercontact`
--

CREATE TABLE `adoptercontact` (
  `adopter_id` int(10) NOT NULL,
  `contact_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adoptername`
--

CREATE TABLE `adoptername` (
  `adopter_id` int(10) NOT NULL,
  `aFname` varchar(20) DEFAULT NULL,
  `aLname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adoptionrequest`
--

CREATE TABLE `adoptionrequest` (
  `request_id` int(10) NOT NULL,
  `status` varchar(40) DEFAULT NULL,
  `application_info` varchar(40) DEFAULT NULL,
  `adopter_id` int(10) NOT NULL,
  `animal_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(10) NOT NULL,
  `vaccination_record` varchar(40) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `species` varchar(40) DEFAULT NULL,
  `breed` varchar(40) DEFAULT NULL,
  `emp_id` int(10) NOT NULL,
  `volunteer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `vaccination_record`, `age`, `name`, `species`, `breed`, `emp_id`, `volunteer_id`) VALUES
(6, 'deworming', 4, 'snickers', 'feline ', 'mixed', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animalmedicalhistory`
--

CREATE TABLE `animalmedicalhistory` (
  `animal_id` int(10) NOT NULL,
  `medical_hist` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(10) NOT NULL,
  `amount` double(50,5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `purpose` varchar(40) DEFAULT NULL,
  `adopter_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donorname`
--

CREATE TABLE `donorname` (
  `donation_id` int(10) NOT NULL,
  `dFname` varchar(40) DEFAULT NULL,
  `dLname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `animal_id` int(10) DEFAULT NULL,
  `designation` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `animal_id`, `designation`) VALUES
(5, NULL, 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `employeecontact`
--

CREATE TABLE `employeecontact` (
  `emp_id` int(10) NOT NULL,
  `contact_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeecontact`
--

INSERT INTO `employeecontact` (`emp_id`, `contact_no`) VALUES
(5, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `employeename`
--

CREATE TABLE `employeename` (
  `emp_id` int(10) NOT NULL,
  `eFname` varchar(40) DEFAULT NULL,
  `eLname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeename`
--

INSERT INTO `employeename` (`emp_id`, `eFname`, `eLname`) VALUES
(5, 'amna', 'naseer');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `volunteer_id` int(10) NOT NULL,
  `availability` varchar(40) DEFAULT NULL,
  `animal_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteercontact`
--

CREATE TABLE `volunteercontact` (
  `volunteer_id` int(10) NOT NULL,
  `contact_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteername`
--

CREATE TABLE `volunteername` (
  `volunteer_id` int(10) NOT NULL,
  `vFname` varchar(40) DEFAULT NULL,
  `vLname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteerskills`
--

CREATE TABLE `volunteerskills` (
  `volunteer_id` int(10) NOT NULL,
  `skill` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`adopter_id`);

--
-- Indexes for table `adoptercontact`
--
ALTER TABLE `adoptercontact`
  ADD PRIMARY KEY (`contact_no`),
  ADD KEY `adopter_id` (`adopter_id`);

--
-- Indexes for table `adoptername`
--
ALTER TABLE `adoptername`
  ADD KEY `adopter_id` (`adopter_id`);

--
-- Indexes for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `adopter_id` (`adopter_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- Indexes for table `animalmedicalhistory`
--
ALTER TABLE `animalmedicalhistory`
  ADD PRIMARY KEY (`medical_hist`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `adopter_id` (`adopter_id`);

--
-- Indexes for table `donorname`
--
ALTER TABLE `donorname`
  ADD KEY `donation_id` (`donation_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `employeecontact`
--
ALTER TABLE `employeecontact`
  ADD PRIMARY KEY (`contact_no`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employeename`
--
ALTER TABLE `employeename`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`volunteer_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `volunteercontact`
--
ALTER TABLE `volunteercontact`
  ADD PRIMARY KEY (`contact_no`),
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- Indexes for table `volunteername`
--
ALTER TABLE `volunteername`
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- Indexes for table `volunteerskills`
--
ALTER TABLE `volunteerskills`
  ADD PRIMARY KEY (`skill`),
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopter`
--
ALTER TABLE `adopter`
  MODIFY `adopter_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `volunteer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptercontact`
--
ALTER TABLE `adoptercontact`
  ADD CONSTRAINT `adoptercontact_ibfk_1` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`adopter_id`);

--
-- Constraints for table `adoptername`
--
ALTER TABLE `adoptername`
  ADD CONSTRAINT `adoptername_ibfk_1` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`adopter_id`);

--
-- Constraints for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  ADD CONSTRAINT `adoptionrequest_ibfk_1` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`adopter_id`),
  ADD CONSTRAINT `adoptionrequest_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`volunteer_id`);

--
-- Constraints for table `animalmedicalhistory`
--
ALTER TABLE `animalmedicalhistory`
  ADD CONSTRAINT `animalmedicalhistory_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`adopter_id`);

--
-- Constraints for table `donorname`
--
ALTER TABLE `donorname`
  ADD CONSTRAINT `donorname_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

--
-- Constraints for table `employeecontact`
--
ALTER TABLE `employeecontact`
  ADD CONSTRAINT `employeecontact_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `employeename`
--
ALTER TABLE `employeename`
  ADD CONSTRAINT `employeename_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

--
-- Constraints for table `volunteercontact`
--
ALTER TABLE `volunteercontact`
  ADD CONSTRAINT `volunteercontact_ibfk_1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`volunteer_id`);

--
-- Constraints for table `volunteername`
--
ALTER TABLE `volunteername`
  ADD CONSTRAINT `volunteername_ibfk_1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`volunteer_id`);

--
-- Constraints for table `volunteerskills`
--
ALTER TABLE `volunteerskills`
  ADD CONSTRAINT `volunteerskills_ibfk_1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`volunteer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
