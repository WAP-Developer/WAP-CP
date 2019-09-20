-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 11:55 AM
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
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wb_admin`
--

INSERT INTO `wb_admin` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `update_at`) VALUES
(1, 'Administrator', 'aldiwap@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-09-10', '2019-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `wb_album`
--

CREATE TABLE `wb_album` (
  `id` int(11) NOT NULL,
  `album` varchar(128) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `wb_seo`
--

CREATE TABLE `wb_seo` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `meta` text NOT NULL,
  `crawl_landing` int(2) NOT NULL,
  `follow_landing` int(2) NOT NULL,
  `crawl_admin` int(2) NOT NULL,
  `follow_admin` int(2) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_seo`
--

INSERT INTO `wb_seo` (`id`, `title`, `description`, `meta`, `crawl_landing`, `follow_landing`, `crawl_admin`, `follow_admin`, `created_at`) VALUES
(1, 'Official Website PT. Jidosha Buhin Indonesia', 'Jibuhin', '', 1, 1, 2, 2, '2019-09-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wb_admin`
--
ALTER TABLE `wb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_album`
--
ALTER TABLE `wb_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_role`
--
ALTER TABLE `wb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_seo`
--
ALTER TABLE `wb_seo`
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
-- AUTO_INCREMENT for table `wb_album`
--
ALTER TABLE `wb_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wb_role`
--
ALTER TABLE `wb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wb_seo`
--
ALTER TABLE `wb_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
