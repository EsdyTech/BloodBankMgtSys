-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 09:42 AM
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
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`, `DateCreated`) VALUES
(1, 'admin', 'admin', '2023-06-21 08:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblblooddonated`
--

CREATE TABLE `tblblooddonated` (
  `Id` int(10) NOT NULL,
  `donorId` varchar(10) NOT NULL,
  `bloodVolume` varchar(10) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `DateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblblooddonated`
--

INSERT INTO `tblblooddonated` (`Id`, `donorId`, `bloodVolume`, `bloodGroup`, `DateCreated`) VALUES
(1, '2', '10', 'A+', '2023-06-22 12:06:22'),
(2, '2', '10', 'A+', '2023-06-22 12:06:31'),
(3, '3', '29', 'A-', '2023-06-22 12:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblblooddonors`
--

CREATE TABLE `tblblooddonors` (
  `Id` int(10) NOT NULL,
  `FirstName` varchar(1000) NOT NULL,
  `LastName` varchar(1000) NOT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `EmailId` varchar(1000) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` varchar(100) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `MaritalStatus` varchar(1000) NOT NULL,
  `Address` varchar(10000) NOT NULL,
  `GenoType` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `DateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblblooddonors`
--

INSERT INTO `tblblooddonors` (`Id`, `FirstName`, `LastName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `MaritalStatus`, `Address`, `GenoType`, `Status`, `DateCreated`) VALUES
(2, 'Kemi', 'Ola', '090889988777', 'kemikemi@gmail.com', 'Male', '25', 'A+', 'Single', ' Lagos Mainland', 'AA', '0', '2023-06-21 08:06:58'),
(3, 'Lawal', 'Opeyemi', '0912345709', 'opeyemi23@yahoo.com', 'Male', '42', 'A-', 'Married', ' Lagos Island', 'AS', '1', '2023-06-21 09:06:58'),
(4, 'Dada', 'Seyi', '090889988779', 'Seyivibez@gmail.com', 'Female', '27', 'A+', 'Single', ' Okokomaiko', 'AS', '1', '2023-06-21 09:06:01'),
(6, 'Adewale', 'Oluwasogo', '090889988777', 'Oluwasogo124@yahoo.com', 'Male', '42', 'A+', 'Single', 'Ikeja', 'AA', '1', '2023-06-22 01:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
  `Id` int(10) NOT NULL,
  `BloodGroup` varchar(100) NOT NULL,
  `BloodVolume` varchar(100) NOT NULL,
  `DateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`Id`, `BloodGroup`, `BloodVolume`, `DateCreated`) VALUES
(4, 'A+', '1', '2023-06-22 12:06:46'),
(6, 'O+', '20', '2023-06-22 12:06:02'),
(7, 'O-', '10', '2023-06-22 12:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodrequesters`
--

CREATE TABLE `tblbloodrequesters` (
  `id` int(100) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `blood_group` varchar(100) DEFAULT NULL,
  `genoType` varchar(10) NOT NULL,
  `unit_blood` varchar(100) DEFAULT NULL,
  `hosp_name` varchar(100) DEFAULT NULL,
  `hosp_contact_person` varchar(120) DEFAULT NULL,
  `hosp_address` varchar(200) DEFAULT NULL,
  `hosp_email` varchar(100) DEFAULT NULL,
  `hosp_contact_no` varchar(200) DEFAULT NULL,
  `request_reason` text DEFAULT NULL,
  `is_approved` varchar(10) NOT NULL,
  `date_approved` varchar(100) NOT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbloodrequesters`
--

INSERT INTO `tblbloodrequesters` (`id`, `firstName`, `lastName`, `gender`, `blood_group`, `genoType`, `unit_blood`, `hosp_name`, `hosp_contact_person`, `hosp_address`, `hosp_email`, `hosp_contact_no`, `request_reason`, `is_approved`, `date_approved`, `date_created`) VALUES
(7, 'tela', 'tela', 'Male', 'O+', 'AA', '5', 'GodsWill', 'Adesola', ' Lagos Mainland', 'Godswill@gmail.com', '09088990099', ' Patient is short of blood', '1', '2023-06-23 01:06:00', '2023-06-23 11:06:20'),
(8, 'tela', 'tela', 'Male', 'A+', 'AA', '7', 'GodsWill', 'Adesola', ' Lagos Mainland', 'Godswill@gmail.com', '09088990099', ' Patient is short of blood', '1', '2023-06-23 01:06:09', '2023-06-23 11:06:07'),
(9, 'tela', 'tela', 'Male', 'O+', 'AA', '3', 'GodsWill', 'Adesola', ' Lagos Mainland', 'Godswill@gmail.com', '09088990099', ' Patient is short of blood', '2', '2023-06-23 01:06:48', '2023-06-23 12:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodrequests`
--

CREATE TABLE `tblbloodrequests` (
  `Id` int(10) NOT NULL,
  `requesterId` varchar(10) NOT NULL,
  `bloodVolume` varchar(10) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `DateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbloodrequests`
--

INSERT INTO `tblbloodrequests` (`Id`, `requesterId`, `bloodVolume`, `bloodGroup`, `DateCreated`) VALUES
(4, '7', '5', 'O+', '2023-06-23 01:06:36'),
(7, '7', '5', 'O+', '2023-06-23 01:06:54'),
(9, '7', '5', 'O+', '2023-06-23 01:06:00'),
(10, '8', '7', 'A+', '2023-06-23 01:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `Id` int(10) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `ContactNo` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `DateCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`Id`, `FullName`, `EmailAddress`, `ContactNo`, `Message`, `DateCreated`) VALUES
(1, 'Kemi Olonluyo', 'sawdykdevtest@gmail.com', '09123456709', 'Please what is there availability for bloodgroup A+', '2023-06-22 11:06:35'),
(2, 'Kemi Olonluyo', 'sawdykdevtest@gmail.com', '09123456709', 'Please what is there availability for bloodgroup A+', '2023-06-22 11:06:56'),
(3, 'Kemi Olonluyo', 'sawdykdevtest@gmail.com', '09123456709', 'Please what is there availability for bloodgroup A+', '2023-06-22 11:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `Id` int(10) NOT NULL,
  `EmailId` varchar(1000) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `ContactNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`Id`, `EmailId`, `Address`, `ContactNo`) VALUES
(1, 'Bloodbankdonor@gmail.com', 'Lagos Island, Nigeria', '08045678990, 09123450987');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `Id` int(10) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Detail` text NOT NULL,
  `PageName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`Id`, `Type`, `Detail`, `PageName`) VALUES
(1, 'aboutus', 'Blood is made up of red blood cells, white blood cells and platelets in a liquid called plasma. Your blood group is identified by antibodies and antigens in the blood.\nAntibodies are proteins found in plasma. They\'re part of your body\'s natural defences. They recognise foreign substances, such as germs, and alert your immune system, which destroys them.', 'About Us'),
(2, 'tips', '																																																																						Before your blood donation,\r\nget plenty of sleep the night before you plan to donate. Eat a healthy meal before your donation. Avoid fatty foods, such as hamburgers, french fries or ice cream before donating. Tests for infections done on all donated blood can be affected by fats that appear in your blood for several hours after eating fatty foods. Drink an extra 16 ounces (473 milliliters) of water and other fluids before the donation. If you are a platelet donor, remember that you must not take aspirin for two days prior to donating. Otherwise, you can take your normal medications as prescribed.', 'Blood Donation Tips');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblblooddonated`
--
ALTER TABLE `tblblooddonated`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblblooddonors`
--
ALTER TABLE `tblblooddonors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblbloodrequesters`
--
ALTER TABLE `tblbloodrequesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbloodrequests`
--
ALTER TABLE `tblbloodrequests`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblblooddonated`
--
ALTER TABLE `tblblooddonated`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblblooddonors`
--
ALTER TABLE `tblblooddonors`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblbloodrequesters`
--
ALTER TABLE `tblbloodrequesters`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbloodrequests`
--
ALTER TABLE `tblbloodrequests`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
