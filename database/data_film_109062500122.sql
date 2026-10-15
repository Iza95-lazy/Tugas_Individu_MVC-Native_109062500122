-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2026 at 12:14 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_film_109062500122`
--

-- --------------------------------------------------------

--
-- Table structure for table `film_109062500122_`
--

CREATE TABLE `film_109062500122_` (
  `id` int NOT NULL,
  `judul` varchar(150) NOT NULL,
  `sutradara` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `tahun_rilis` int NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film_109062500122_`
--

INSERT INTO `film_109062500122_` (`id`, `judul`, `sutradara`, `genre`, `tahun_rilis`, `rating`, `created_at`) VALUES
(1, 'Inception', 'Christopher Nolan', 'Sci-Fi', 2010, 8.8, '2026-10-15 12:13:15'),
(2, 'Interstellar', 'Christopher Nolan', 'Sci-Fi', 2014, 8.7, '2026-10-15 12:13:15'),
(3, 'The Godfather', 'Francis Ford Coppola', 'Crime', 1972, 9.2, '2026-10-15 12:13:15'),
(4, 'Parasite', 'Bong Joon-ho', 'Thriller', 2019, 8.5, '2026-10-15 12:13:15'),
(5, 'Spirited Away', 'Hayao Miyazaki', 'Animation', 2001, 8.6, '2026-10-15 12:13:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film_109062500122_`
--
ALTER TABLE `film_109062500122_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film_109062500122_`
--
ALTER TABLE `film_109062500122_`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
