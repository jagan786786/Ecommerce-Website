-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 01:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_delete` tinyint(4) NOT NULL DEFAULT 0,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `code`, `created_at`, `user_delete`, `role`, `active`) VALUES
(146, 'Michele Roy', 'mich@gmail.com', 123456, '', '2023-07-02 17:45:38', 0, 0, 0),
(148, 'N.V.J Rao', 'rao@gmail.com', 123456, '', '2023-07-02 17:52:57', 0, 0, 0),
(149, 'Abhisek Dora', 'abh@gmail.com', 123456, '', '2023-07-02 18:04:29', 1, 0, 0),
(150, 'Abhisek             Dora', 'abhi@gmail.com', 0, '', '2023-07-04 10:13:22', 0, 0, 0),
(153, 'Jagannath patro ', 'jaga@gmail.com', 147852, '', '2023-07-04 11:59:18', 0, 1, 0),
(154, 'siba sahu', 'siba@gmail.com', 123456, '', '2023-07-06 16:13:56', 0, 0, 0),
(155, 'Jagannath patro ', 'wfnerhfergfubr@gmail.com', 123456, '', '2023-07-07 12:24:39', 0, 0, 0),
(156, 'sabita patro', 'sabita@gmail.com', 123456, '', '2023-07-07 12:33:17', 0, 0, 0),
(157, 'chinu', 'chinu@gmail.com', 123456, '', '2023-07-07 13:05:14', 0, 0, 0),
(159, 'Jagannath patro ', 'jagannathpatro234@gmail.com', 123456, '', '2023-07-07 13:24:53', 0, 0, 0),
(160, 'Jagannath patro ', 'jpatro786@gmail.com', 123456, '', '2023-07-07 14:00:33', 0, 0, 0),
(161, 'chinu', 'chin@gmail.com', 123456, '', '2023-07-07 15:05:06', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`user_id`),
  ADD KEY `id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
