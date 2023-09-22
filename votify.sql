

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

DROP TABLE IF EXISTS `chatbot`;
CREATE TABLE IF NOT EXISTS `chatbot` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Message` text COLLATE utf8mb4_general_ci,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
CREATE TABLE IF NOT EXISTS `dashboard` (
  `UserID` int NOT NULL,
  `Notifications` text COLLATE utf8mb4_general_ci,
  `VoterID` int DEFAULT NULL,
  `doc_type` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  KEY `VoterID` (`VoterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Data` longtext COLLATE utf8mb4_general_ci,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ElectionDate` date DEFAULT NULL,
  `ElectionInformationID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ElectionInformationID` (`ElectionInformationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electioninformation`
--

DROP TABLE IF EXISTS `electioninformation`;
CREATE TABLE IF NOT EXISTS `electioninformation` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `UpcomingElections` text COLLATE utf8mb4_general_ci,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Message` text COLLATE utf8mb4_general_ci,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_recovery`
--

DROP TABLE IF EXISTS `otp_recovery`;
CREATE TABLE IF NOT EXISTS `otp_recovery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otp` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `is_expired` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

DROP TABLE IF EXISTS `socialmedia`;
CREATE TABLE IF NOT EXISTS `socialmedia` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `AuthenticationToken` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `RegistrationStatus` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `City` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `State` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Country` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `PhoneNumber` (`PhoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `DateOfBirth`, `Address`, `Email`, `Password`, `PhoneNumber`, `RegistrationStatus`, `City`, `State`, `Country`, `Gender`) VALUES
(6, 'Prarthana Behere ', '1983-01-05', 'Vadodara', 'prarthana@sample.xom', '', '7704593295', 'Pending', 'Vadodara', 'Gujarat', 'India', 'Female'),
(7, 'SHREYA JADHAV', '2003-06-03', 'C3-201 SHIVARANJAN TOWERS\\r\\nSOMESHWARWADI PASHAN', 'shreyajune03pune@gmail.com', '', '09970153063', 'Pending', 'PUNE', 'Maharshtra', 'India', 'Female'),
(9, 'Shsahnk ketkgg', '2001-12-12', 'thne', 'sdcvbn@gmail', '', '1002003000', 'Pending', 'pune', 'Jharkhand', 'india', 'Male'),
(10, 'VIJAY MARUTI JADHAV', '2009-12-14', 'C3-201 SHIVARANJAN TOWERS\\r\\nSOMESHWARWADI PASHAN', 'shreyajune03pune@gmail.com', '', '1004005218', 'Pending', 'PUNE', 'Tamil Nadu', 'India', 'Other'),
(11, 'asdfghj', '2006-03-20', 'rfghbn', 'yhn@ghnm', '', '4700580096', 'Pending', 'drtfgyvbhjn', 'Andhra Pradesh', 'india', 'Male'),
(12, 'dxcfgvbhjnmk,', '1986-05-02', 'excfgvbhn', 'shashank@gmail.com', '', '7418529630', 'Pending', 'xdcfgvbn ', 'Bihar', 'awesrdcfgn', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `voterinformation`
--

DROP TABLE IF EXISTS `voterinformation`;
CREATE TABLE IF NOT EXISTS `voterinformation` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `registrationDate` date NOT NULL,
  `UserID` int DEFAULT NULL,
  `citizenship_status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country_of_citizenship` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD CONSTRAINT `FK_User_Dashboard` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `voterinformation`
--
ALTER TABLE `voterinformation`
  ADD CONSTRAINT `FK_User_VoterInfo` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
