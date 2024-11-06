-- Corrected SQL Dump
-- Host: 127.0.0.1
-- Generation Time: Current Date
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `demo1`

-- --------------------------------------------------------

-- Table structure for table `admin`

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `apassword` varchar(200) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `notes`

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sem` int(11) NOT NULL,
  `scode` varchar(100) NOT NULL,
  `filename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scode` (`scode`),
  FOREIGN KEY (`scode`) REFERENCES `subjects`(`scode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `pdf_data`

CREATE TABLE `pdf_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `filename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `qp`

CREATE TABLE `qp` (
  `scode` varchar(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  PRIMARY KEY (`scode`),
  FOREIGN KEY (`scode`) REFERENCES `subjects`(`scode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `subjects`

CREATE TABLE `subjects` (
  `scode` varchar(12) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`scode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `syllabus`

CREATE TABLE `syllabus` (
  `scode` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `filename` varchar(200) NOT NULL,
  PRIMARY KEY (`scode`),
  FOREIGN KEY (`scode`) REFERENCES `subjects`(`scode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `user_form`

CREATE TABLE `user_form` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `admin`
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- AUTO_INCREMENT for table `notes`
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

-- AUTO_INCREMENT for table `pdf_data`
ALTER TABLE `pdf_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT for table `user_form`
ALTER TABLE `user_form`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- Commit the transaction
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
