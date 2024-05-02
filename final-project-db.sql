-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 02:14 AM
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
-- Database: `final-project-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Title` varchar(24) DEFAULT NULL,
  `Author` varchar(14) DEFAULT NULL,
  `Genre` varchar(16) DEFAULT NULL,
  `Rating` decimal(2,1) DEFAULT NULL,
  `Length` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `Title`, `Author`, `Genre`, `Rating`, `Length`) VALUES
(1, 'Yours Truly', 'Abby Jiminez', 'Romance', 5.0, 'Medium'),
(2, 'It Ends With Us', 'Colleen Hoover', 'Romance', 3.5, 'Medium'),
(3, 'A Court of Mist and Fury', 'Sarah J. Maas', 'Fantasy', 5.0, 'Long'),
(4, 'Dune', 'Frank Herbert', 'Science Fiction', 4.0, 'Long'),
(5, 'Gone Girl', 'Gillian Flynn', 'Mystery/Thriller', 3.0, 'Medium'),
(6, '1984', 'George Orwell', 'Fiction', 3.0, 'Short'),
(7, 'Harry Potter 2', 'J. K. Rowling', 'Fantasy', 5.0, 'short'),
(11, 'Magnolia Parks', 'Jessa Hastings', 'Fiction', 5.0, 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `Email` varchar(17) DEFAULT NULL,
  `Password` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`Email`, `Password`) VALUES
('someone@gmail.com', 1234),
('123@123.com', 123),
('hello@hello.com', 1111),
('hi@hi.com', 1111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
