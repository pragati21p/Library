-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 12:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `public_id` int(11) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `zoner` varchar(100) NOT NULL,
  `popular` varchar(1) NOT NULL,
  `copies` varchar(11) NOT NULL,
  `available_since` datetime NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `public_id`, `bookname`, `writer`, `zoner`, `popular`, `copies`, `available_since`, `available`) VALUES
(1, 11111, '', '', '', '', '', '0000-00-00 00:00:00', 0),
(2, 62933, 'fdhgf', 'hfgh', 'comedy', '1', '4', '2017-10-07 18:28:58', 4),
(3, 16352, 'fdhgf', 'hfgh', 'gfj', '0', '4', '2017-10-07 18:29:28', 4),
(4, 74350, 'sdf', 'sdff', 'jkhjk', '1', '3', '2017-10-07 19:00:39', 3),
(5, 16523, 'sf', 'dsgdf', 'Cc', '1', '3', '2017-10-07 19:42:46', 3),
(6, 27891, 'sf', 'dsgdf', 'Cc', '1', '3', '2017-10-07 19:43:19', 3),
(7, 52824, 'new book', 'writer', 'comedy', '1', '2', '2017-10-11 14:51:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `issue_details`
--

CREATE TABLE `issue_details` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issued_to_id` int(11) NOT NULL,
  `issued_at` datetime NOT NULL,
  `returned_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_details`
--

INSERT INTO `issue_details` (`id`, `book_id`, `issued_to_id`, `issued_at`, `returned_at`) VALUES
(15, 74350, 53793, '2017-10-11 08:46:23', '2017-10-11 08:47:04'),
(16, 74350, 53793, '2017-10-11 08:58:02', '2017-10-11 08:59:52'),
(17, 74350, 53793, '2017-10-11 09:01:14', '2017-10-11 09:04:44'),
(18, 74350, 53793, '2017-10-11 09:08:39', '2017-10-11 09:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `username`, `password`) VALUES
(1, 'lock', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `id` int(11) NOT NULL,
  `zoner` varchar(60) NOT NULL,
  `rack_id` int(11) NOT NULL,
  `totalbooks` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`id`, `zoner`, `rack_id`, `totalbooks`) VALUES
(1, 'comedy', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `public_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `privilege` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL,
  `address` text NOT NULL,
  `idtype` varchar(50) NOT NULL,
  `idproof` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `public_id`, `username`, `phone`, `email`, `privilege`, `credit`, `address`, `idtype`, `idproof`, `created_at`, `updated_at`) VALUES
(5, 53793, 'djgh', '6666666661', 'dpriya1@gmail.com', 'gold', 4, 'fgdf', 'fgj', 'fhgf', '2017-06-04 13:04:21', '2017-10-14 09:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_details`
--
ALTER TABLE `issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue_details`
--
ALTER TABLE `issue_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
