-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 01:55 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_director`
--

CREATE TABLE `tbl_director` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hitmovies` int(11) NOT NULL,
  `flopmovies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_director`
--

INSERT INTO `tbl_director` (`id`, `name`, `hitmovies`, `flopmovies`) VALUES
(1, 'Sanjay Lila Bhansali', 20, 10),
(2, 'karan johar', 30, 17),
(3, 'test', 25, 10),
(4, 'newdir', 10, 20),
(5, 'newdir', 10, 20),
(6, 'newdir', 10, 20),
(7, 'test', 12, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_director`
--
ALTER TABLE `tbl_director`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_director`
--
ALTER TABLE `tbl_director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
