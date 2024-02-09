-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2024 at 07:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$Zz84cxwDUMOHjivk0/Nqr..jqzNwszg1PCoUqLwBDp/QhSauhe7P2', '2024-02-01 06:14:28'),
(7, 'admin1', '$2y$10$yRXcKMMZP3W2SO.46kBbLeys3SdpVFvBgJf.p9GMsy7AnpE8mtN8i', '2024-02-01 06:36:41'),
(9, 'admin2', '$2y$10$yVLvYIZFmp8XX10XnBRPy.lWydVJjJJvitBFjOr1yygoDhLp/PVwu', '2024-02-01 06:38:53'),
(11, 'admin123', '$2y$10$CYXzmE24VkqemlaUV7sV0OcjatIcpBnCd.2/2Ck6.RR7l.C1ERRJ.', '2024-02-06 12:58:39'),
(12, 'robert', '$2y$10$g2pkDTmtrq50q1nRwvvLwux7r0CZRZ2yA2QdssyvKdWFUXH0F0Jfa', '2024-02-06 13:24:09'),
(13, 'josephkatamba92@gmail.com', '$2y$10$.ubSB18wZlHDlbJPWnF18ex0eafwJDZ033n53GxE5o9YPWdxPY41i', '2024-02-09 06:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'ks', '2024-02-08 08:19:26'),
(2, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'ks', '2024-02-08 08:20:29'),
(3, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'testing one two', '2024-02-08 08:23:03'),
(4, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'testing one two', '2024-02-08 08:24:39'),
(5, 'elites admin', 'admin@admin.com', 'admin testing', '2024-02-08 08:26:41'),
(6, 'SSENONO ROBERT ', 'robsseno@gmail.com', 'rhjsfjbkjerns', '2024-02-09 06:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(255) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_description` varchar(255) NOT NULL,
  `found_location` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_name`, `property_description`, `found_location`, `contact_info`, `image_path`) VALUES
(1, 'testing', 'testing', 'testing', 'testing', '/opt/lampp/htdocs/findhub/uploads/Screenshot from 2024-01-16 19-54-44.png'),
(2, 'phone', 'itel pixel ', 'banda', '0789359314', '/opt/lampp/htdocs/findhub/uploads/me.jpeg'),
(3, 'phone', 'phone ', 'phonekna', '07889515', '/opt/lampp/htdocs/findhub/uploads/me.jpeg'),
(4, 'phone', 'phone', 'live', '0789359314', '/opt/lampp/htdocs/findhub/uploads/me.jpeg'),
(5, 'phone', 'live', 'akasbsa', '0789359314', '/opt/lampp/htdocs/findhub/uploads/me.jpeg'),
(6, 'live today', 'image description', 'image description', '078996121', '/opt/lampp/htdocs/findhub/uploads/bobi1-fotor-bg-remover-20231117165849.png'),
(7, 'image description', 'image description', 'image description', 'image description', '/opt/lampp/htdocs/findhub/uploads/Screenshot from 2024-01-19 18-54-02.png'),
(8, 'testing one two', 'testing one two', 'testing one two', 'testing one two', '/opt/lampp/htdocs/findhub/uploads/bobi.jpeg'),
(9, 'testing one two', 'testing one two', 'testing one two', 'testing one two', '/opt/lampp/htdocs/findhub/uploads/esther.jpg'),
(10, 'testing one two', 'testing one two', 'testing one two', 'testing one two', '/opt/lampp/htdocs/findhub/uploads/Screenshot from 2023-11-29 13-45-13.png'),
(11, 'keys', 'keys found in the parking yard', 'kyambogo parking yard', '0789359314', '/opt/lampp/htdocs/findhub/uploads/devotah.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`) VALUES
(11, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(12, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(13, 'ssenono', 'robsseno@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'katambajoseph', 'josephkatamba92@gmail.com', '99d84832afcfffdc15622f7c9b3e23c9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
