-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 07:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(6) UNSIGNED NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `number_of_guests` int(10) NOT NULL,
  `arrivals` varchar(20) DEFAULT NULL,
  `leaving` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(6) UNSIGNED NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_mobile_no` varchar(20) DEFAULT NULL,
  `c_subject` varchar(200) DEFAULT NULL,
  `c_message` varchar(20) DEFAULT NULL,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(6) UNSIGNED NOT NULL,
  `image_path` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `descriptions` varchar(500) NOT NULL,
  `price` varchar(30) NOT NULL,
  `offer_price` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

/*INSERT INTO `packages` (`id`, `image_path`, `title`, `descriptions`, `price`, `offer_price`, `reg_date`) VALUES
(7, 'images/p1.jpg', 'Cox Bazar', 'Cox Bazar is consists of miles of golden sands, towering cliffs, surfing waves, rare conch shells, colourful pagodas, Buddhist temples and tribes.', '100.00$', '99.00$', '2022-04-11 20:26:15'),
(8, 'images/p2.jpg', 'Sonargaon', 'Sonargaon is one of the best touristic places for a day tour with all in one package including Bengali culture, countryside, archaeology and full of adventure. ', '100.00$', '99.00$', '2022-04-11 20:27:54'),
(9, 'images/p3.jpg', 'Sundarbans', 'Sundarbans, The biggest single square of flowing halophytic mangrove woods on the planet, situated in the southwestern piece of Bangladesh. ', '100.00$', '99.00$', '2022-04-11 20:29:43'),
(13, 'images/p7.jpg', 'Nilgiri Tourist Spot', 'Nilgiri or Nil Giri is one of the tallest peaks and beautiful tourist spot in Bangladesh. It is about 3500 feet high and situated at Thanci Thana.', '100.00$', '99.00$', '2022-04-11 20:37:40');*/

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

/*INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `email`) VALUES

(10, 'admin', '$2y$10$9jkxQos83swk3PrYQ1cADOnZMJqZ5Xu/XsgdaiAIluj6IlGxOqsWm', '2022-04-12 02:18:35', 'admin@gmail.com');*/

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
