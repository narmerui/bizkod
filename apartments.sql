-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 08:16 AM
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
-- Database: `apartments`
--

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `id_flat` int(11) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `id_preferences` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture_paths` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`id_flat`, `id_owner`, `id_preferences`, `name`, `description`, `price`, `size`, `city`, `address`, `picture_paths`) VALUES
(9, 14, NULL, 'Sunny Apartment', 'A spacious and sunny apartment in the heart of the city.', 1200, 850, 'Beograd', 'Matije Gupca 16', ''),
(10, 14, NULL, 'Beach House', 'A stunning house with sea views and direct beach access.', 2500, 1200, 'Split', '101 Ocean Dr', ''),
(11, 14, NULL, 'Modern Studio', 'A modern studio apartment with high-end finishes.', 1500, 500, 'Nis', 'Moravska 3', ''),
(12, 15, NULL, 'Luxurious Loft', 'An open-concept loft with modern amenities, high ceilings, and an urban view.', 800, 500, 'Novi Sad', 'Vuka Karadzica 2', ''),
(13, 14, NULL, 'Rustic Cabin', 'A cozy cabin in the woods with a fireplace and natural wood interiors.', 600, 700, 'Subotica', 'Matije Gupca 16', '');

-- --------------------------------------------------------

--
-- Table structure for table `flatowner`
--

CREATE TABLE `flatowner` (
  `id_owner` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flatowner`
--

INSERT INTO `flatowner` (`id_owner`, `name`, `surname`, `birth_date`, `gender`, `email`, `password`, `phone`, `university`) VALUES
(9, 'Luka', 'Sudarević', '2024-03-15', 'Male', 'lukasudarevic03@gmail.com', '$2y$10$p9C.eRRazUSX3RhQ6ICIa.h7BNCGO5okdPxHJC7H/5wDITrRP0sUm', '0643020940', 'visoka tehnicka skola'),
(10, 'lo', 'lolo', '2024-02-07', 'male', 'lol@mail.com', '$2y$10$i26zGOL8drjYAPBAL8eH3uUtS984WxLkeM2Wah.0YqsdRRdjAqXt.', '123456', 'vts'),
(13, 'Luak', 'Sudarevic03', '2024-03-19', 'female', 'brunet.dunja@gmail.com', '$2y$10$TlqZE2zqpbVaY.ZOSyzonuPLthiIBL5/Y5yHFYTq5wduKsZjT.5rG', '3453456363', 'vts'),
(14, 'matej', 'kujun', '2024-03-19', 'male', 'kujundzicmatej64@gmail.com', '$2y$10$BmQ2KG61ObOYOccEvtmfT.phgytklerpbmo7USrYqcIqRtyes0oFa', '66666', 'vts'),
(15, 'Marko', 'Marin', '2024-03-20', 'male', 'maki@gmail.com', '$2y$10$WQqB1Eox0.WtsihODGPeBuflsN7vRE6BlR/lORMhfTXnvsEueclc.', '5555555', 'vts');

-- --------------------------------------------------------

--
-- Table structure for table `flatseekers`
--

CREATE TABLE `flatseekers` (
  `id_seeker` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flatseekers`
--

INSERT INTO `flatseekers` (`id_seeker`, `name`, `surname`, `birth_date`, `gender`, `email`, `password`, `phone`, `university`) VALUES
(18, 'lll', 'lll', '2023-12-20', 'male', 'lll@mail.com', '$2y$10$7g8pcGH/wKw2D9VL8f0Nh.syhrbFw29gUkh11KHZFnVMZr12hi7US', '564678543', 'vts'),
(19, 'Luak', 'dwadwadaw', '2024-04-05', 'female', 'adwadwadwa@gnma.com', '$2y$10$0xD1IURkNMpPV5rnIE7jv.sm7gvvcliYixF4Zeg61CB661d/oRKIS', '31451225', 'vtas'),
(20, 'zzz', 'zzzz', '2024-02-06', 'female', 'zz@gmail.com', '$2y$10$kcFT957BLMYcJmsXWB3WdOeUhhtDqWiJ82JKG51whNFxp.xUt6.sy', '767676767', 'vts');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_images` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id_images`, `name`, `image`) VALUES
(6, 'Stan 1', '[\"65f5d70ce295e.png\",\"65f5d70ce2c45.png\",\"65f5d70ce2eee.png\",\"65f5d70ce3133.png\"]'),
(7, 'Stan 1', '[\"65f5de43ec90a.png\",\"65f5de43ecadb.png\",\"65f5de43ecc4f.png\",\"65f5de43ecdb0.png\"]'),
(8, 'afa', '[\"65f620d6d03b6.jpg\"]'),
(9, 'ttt', '[\"65f622a56aee7.jpg\"]'),
(10, 'FSEF', '[\"65f663a7033af.jpg\"]'),
(11, 'POPO', '[\"65f6649e482ed.jpg\"]'),
(12, 'POPO', '[\"65f6649e56db2.jpg\"]'),
(13, 'Sunny Apartment', '[\"65f6684442852.jpg\"]'),
(14, 'Beach House', '[\"65f66cbd46826.jpg\"]'),
(15, 'Modern Studio', '[\"65f66d3a469d5.jpg\"]'),
(16, 'efsef', '[\"65f66e34841c7.jpg\"]'),
(17, 'Luxurious Loft', '[\"65f66f7bbe2d6.jpg\"]'),
(18, 'setset', '[\"65f6704fa9396.jpg\"]'),
(19, 'Rustic Cabin', '[\"65f67126a856b.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id_preferences` int(11) NOT NULL,
  `smoking` tinyint(1) DEFAULT NULL,
  `pets` tinyint(1) DEFAULT NULL,
  `vegan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`id_flat`),
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `id_preferences` (`id_preferences`);

--
-- Indexes for table `flatowner`
--
ALTER TABLE `flatowner`
  ADD PRIMARY KEY (`id_owner`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `flatseekers`
--
ALTER TABLE `flatseekers`
  ADD PRIMARY KEY (`id_seeker`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_images`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id_preferences`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `id_flat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flatowner`
--
ALTER TABLE `flatowner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `flatseekers`
--
ALTER TABLE `flatseekers`
  MODIFY `id_seeker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id_preferences` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `flatowner` (`id_owner`),
  ADD CONSTRAINT `flat_ibfk_2` FOREIGN KEY (`id_preferences`) REFERENCES `preferences` (`id_preferences`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
