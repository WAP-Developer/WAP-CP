-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 11:09 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `wb_admin`
--

CREATE TABLE `wb_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wb_admin`
--

INSERT INTO `wb_admin` (`id`, `name`, `email`, `password`, `role_id`, `created_at`) VALUES
(1, 'Administrator', 'aldiwap@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `wb_role`
--

CREATE TABLE `wb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_role`
--

INSERT INTO `wb_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Personalia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wb_admin`
--
ALTER TABLE `wb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_role`
--
ALTER TABLE `wb_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wb_admin`
--
ALTER TABLE `wb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_role`
--
ALTER TABLE `wb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
