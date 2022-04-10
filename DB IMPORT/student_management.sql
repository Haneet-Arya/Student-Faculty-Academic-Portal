-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 06:13 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `ID` int(10) NOT NULL,
  `Regno` varchar(10) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `ID` int(100) NOT NULL,
  `Regno` varchar(10) NOT NULL,
  `Oname` varchar(100) NOT NULL,
  `IOvit` varchar(11) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `current_courses`
--

CREATE TABLE `current_courses` (
  `Regno` varchar(10) NOT NULL,
  `currCourses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_data`
--

CREATE TABLE `faculty_data` (
  `FacultyID` varchar(50) NOT NULL,
  `FacultyName` varchar(50) NOT NULL,
  `FacultyEmail` varchar(100) NOT NULL,
  `FacultyPassword` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_data`
--

INSERT INTO `faculty_data` (`FacultyID`, `FacultyName`, `FacultyEmail`, `FacultyPassword`) VALUES
('1234', 'Suman', 's@gmail.com', '$2y$10$U.8JnflJ20isINaA/at9bO/qbYqig8cVW.YN0tVGHLyGhx9/vnQRC');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `ID` int(100) NOT NULL,
  `Regno` varchar(10) NOT NULL,
  `Cname` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `past_courses`
--

CREATE TABLE `past_courses` (
  `Regno` varchar(10) NOT NULL,
  `Course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ID` int(100) NOT NULL,
  `Regno` varchar(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Technologies` text NOT NULL,
  `Link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `Regno` varchar(10) NOT NULL,
  `Img` varchar(200) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `LName` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(400) NOT NULL,
  `CGPA` varchar(10) NOT NULL,
  `Sem` int(10) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `LOR` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`Regno`, `Img`, `FName`, `LName`, `DOB`, `Branch`, `Email`, `Password`, `CGPA`, `Sem`, `Date`, `LOR`) VALUES
('20BIT0410', 'IMG_20210725_100155.jpg', 'Riya', 'Khatwani', '1995-08-23', 'IT', 'riya.khatwani2020@vitstudent.ac.in', '$2y$10$msSFXAijKlY3UPj5wWAsE.cIaD9KWcichxNzc.fQCagnYs873.1DG', '', 0, '08/04/2022', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`ID`,`Regno`),
  ADD KEY `ID` (`ID`,`Regno`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`ID`,`Regno`),
  ADD KEY `ID` (`ID`,`Regno`);

--
-- Indexes for table `current_courses`
--
ALTER TABLE `current_courses`
  ADD PRIMARY KEY (`Regno`,`currCourses`),
  ADD KEY `Regno` (`Regno`,`currCourses`);

--
-- Indexes for table `faculty_data`
--
ALTER TABLE `faculty_data`
  ADD PRIMARY KEY (`FacultyID`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`ID`,`Regno`),
  ADD KEY `ID` (`ID`,`Regno`);

--
-- Indexes for table `past_courses`
--
ALTER TABLE `past_courses`
  ADD PRIMARY KEY (`Regno`,`Course`),
  ADD KEY `Regno` (`Regno`,`Course`) USING BTREE;

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`,`Regno`),
  ADD KEY `ID` (`ID`,`Regno`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`Regno`),
  ADD UNIQUE KEY `Regno` (`Regno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
