-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 11:33 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`ID`, `Regno`, `Type`, `Description`, `Year`) VALUES
(2, '19BIT0137', 'Got Scholarship', 'qd', 2020),
(3, '19BIT0137', 'Got Scholarship', 'sf', 2020),
(3, '19BIT0149', 'Got Scholarship', 'Merit Scholarship', 2020);

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

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`ID`, `Regno`, `Oname`, `IOvit`, `Role`) VALUES
(0, '19BIT0137', 'a', 'Inside VIT', 'a'),
(1, '19BIT0137', 'FIREFOX', 'Inside VIT', 'Member'),
(1, '19BIT0140', 'SIAM VIT', 'Inside VIT', 'Core Member'),
(1, '19BIT0149', 'DSC', 'Inside VIT', 'Web Developer'),
(2, '19BIT0137', 'DSC', 'Outside VIT', 'W'),
(2, '19BIT0149', 'FIREFOX', 'Inside VIT', 'Core Member'),
(4, '19BIT0137', 'SIAMVIT', 'Inside VIT', 'w'),
(5, '19BIT0137', 'dsc', 'Outside VIT', 'qe');

-- --------------------------------------------------------

--
-- Table structure for table `current_courses`
--

CREATE TABLE `current_courses` (
  `Regno` varchar(10) NOT NULL,
  `currCourses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_courses`
--

INSERT INTO `current_courses` (`Regno`, `currCourses`) VALUES
('19BIT0137', 'DBMS'),
('19BIT0137', 'OSP'),
('19BIT0140', 'OS'),
('19BIT0140', 'OSP'),
('19BIT0149', 'DBMS'),
('19BIT0149', 'IIP'),
('19BIT0149', 'OSP');

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
('101', 'fac', 'mail.com', '1234'),
('emp101', 'Jayakumar', 'wuc1607@gmail.com', '$2y$10$./qm25qO0v944j2tUejPj.j007UlXhcQkR4E1/3yLC3/ES1XL1xFe'),
('emp102', 'Sureka', 'wuc1607@gmail.com', '$2y$10$3PfmRUa0njEONn/DXPOhrex6tD0EKu7z2XX1X1.JH4Hz7gay8ir3.');

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

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`ID`, `Regno`, `Cname`, `Role`) VALUES
(1, '19BIT0137', 'Samsung', 'SE'),
(1, '19BIT0149', 'Samsung', 'ML Engineer'),
(2, '19BIT0137', 'Microsoft', 'SDE'),
(2, '19BIT0149', 'Microsoft', 'SDE'),
(3, '19BIT0137', 'Linkedin', 'Software Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `lor`
--

CREATE TABLE `lor` (
  `Regno` varchar(10) NOT NULL,
  `FacultyID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lor`
--

INSERT INTO `lor` (`Regno`, `FacultyID`) VALUES
('19BIT0137', '101'),
('19BIT0149', 'emp101'),
('19BIT0149', 'emp102');

-- --------------------------------------------------------

--
-- Table structure for table `past_courses`
--

CREATE TABLE `past_courses` (
  `Regno` varchar(10) NOT NULL,
  `Course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `past_courses`
--

INSERT INTO `past_courses` (`Regno`, `Course`) VALUES
('19BIT0137', 'AOD'),
('19BIT0137', 'DSA'),
('19BIT0149', 'AOD'),
('19BIT0149', 'CALCULUS'),
('19BIT0149', 'DSA');

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

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `Regno`, `Title`, `Description`, `Technologies`, `Link`) VALUES
(1, '19BIT0080', 'STUDENT TEACHER INTERACTIVE PORTAL', 'Increse Interactivity', 'PhP,Javascript,Bootstrap', 'www.github.com'),
(1, '19BIT0111', 'STUDENT TEACHER INTERACTIVE PORTAL', 'scasc', 'PhP,Javascript,Bootstrap', 'www.github.com'),
(1, '19BIT0123', 'ECOMMERCE APP', 'Webapp', 'Django,Python', 'www.github.com'),
(1, '19BIT0124', 'ECOMMERCE APP', 'Web app', 'Nodejs,Figma,HTML,CSS', 'www.github.com'),
(1, '19BIT0137', 'STUDENT TEACHER INTERACTIVE PORTAL', 'Increasing Interaction', 'php,nodejs,python,javascript', 'www.github.com'),
(1, '19BIT0138', 'VITSPOT', 'for descasvds', 'Android,Kotlin', 'www.github.com'),
(1, '19BIT0140', 'STUDENT TEACHER INTERACTIVE PORTAL', '13', 'php,nodejs,python,javascript', 'www.github.com'),
(1, '19BIT0149', 'STUDENT TEACHER INTERACTIVE PORTAL', 'Helps faculty to know more about student and give opportunities', 'PhP,Javascript,Bootstrap', 'www.github.com'),
(2, '19BIT0080', 'HOSPITAL MANAGEMENT', 'DBMS', 'SQL,FLASK', 'www.git.com'),
(2, '19BIT0111', 'ArogyaSetu', 'For heslth', 'Android', 'www.git.com'),
(2, '19BIT0137', 'HOSPITAL MANAGEMENT', 'DBMS PROJECT', 'SQL,FLASK', 'www.git.com');

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
('19BIT0080', 'default.png', 'Nimesh', 'Johari', '2001-06-12', 'IT', 'wuc1607@gmail.com', '$2y$10$EQ1bUjB6cY3fF88VsH1SPe8B8U6s4IK3et5BSLskb1QKZ.uCs4bu.', '', 0, '30/10/2020', ''),
('19BIT0111', 'default.png', 'Priyanshi', 'singh', '2001-01-23', 'CSE', 'wuc1607@gmail.com', '$2y$10$YRy1JaQImZMWd1emMD3wDucPKZEcSdTnZP2FHSN/N/4YjnYBNUOgy', '', 0, '30/10/2020', ''),
('19BIT0123', 'WhatsApp Image 2020-01-30 at 6.43.00 PM.jpeg', 'Meet', 'patel', '2020-09-29', 'ME', 'auc1607@gmail.com', '$2y$10$oTZq7jBzztrrewLa3Z9ggei81ORE8Gniw7/3CCNe3l0vYOcBHlA6S', '', 0, '30/10/2020', ''),
('19BIT0124', 'default.png', 'Deep', 'patel', '2020-10-07', 'CSE', 'cuc13275@gmail.com', '$2y$10$9WhODqcLaxTzq6Yqvtu9aOwgrU58WEhPyUQkqjtqKnxGb.K3AFPz2', '', 0, '30/10/2020', ''),
('19BIT0138', '126076-Assassins_Creed-748x421.jpg', 'aayush', 'chodvadiya', '2020-10-15', 'IT', 'aayush.chodvadiya2019@vitstudent.ac.in', '$2y$10$tMhAs.Ke6EM.fXLZJ9nkJu0qA8YIVYL8Y0kAT5JLq9KM/o1AB62tS', '', 0, '30/10/2020', ''),
('19BIT0149', '51tvxl9PlcL._SX380_BO1,204,203,200_.jpg', 'Promit', 'Revar', '2001-07-30', 'IT', 'wuc1607@gmail.com', '$2y$10$2YPzloNQ6zu.0.15FB8Slu7nCDDmC6IkjdmVnUXrSuTp9IBz/2YG.', '9.44', 3, '30/10/2020', '');

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
-- Indexes for table `lor`
--
ALTER TABLE `lor`
  ADD PRIMARY KEY (`Regno`,`FacultyID`);

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
