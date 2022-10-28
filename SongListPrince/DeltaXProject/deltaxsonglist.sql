-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 11:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deltaxsonglist`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist_tb`
--

CREATE TABLE `artist_tb` (
  `artist_id` int(10) NOT NULL,
  `artist_name` varchar(30) NOT NULL,
  `artist_dob` date DEFAULT NULL,
  `artist_bio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist_tb`
--

INSERT INTO `artist_tb` (`artist_id`, `artist_name`, `artist_dob`, `artist_bio`) VALUES
(67, 'Olivia Rodrigo', '2022-10-14', 'Born in Peninsula'),
(68, 'Nathan Evans', '2022-10-03', 'Austria Singer'),
(69, '220kid', '2022-10-13', 'Austria Singer'),
(70, 'Billen ted', '2022-10-15', 'Austria Singer'),
(71, 'Tiesto', '2022-10-14', 'African'),
(72, 'Li Nas X', '2022-10-13', 'Arctic Singer'),
(73, 'Weeknd', '2022-10-08', 'African Singer'),
(74, 'Dua Lipa', '2022-10-13', 'Female Singer'),
(75, 'Riton', '2022-10-16', 'Austria Singer'),
(76, 'Nightcrawlers', '2022-10-02', 'USA Singer'),
(77, 'Mufasa', '2022-10-26', 'Iran Singer'),
(78, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `rel_song_artist`
--

CREATE TABLE `rel_song_artist` (
  `relation_id` int(11) NOT NULL,
  `artist_id` int(10) NOT NULL,
  `song_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rel_song_artist`
--

INSERT INTO `rel_song_artist` (`relation_id`, `artist_id`, `song_id`) VALUES
(16, 67, 17),
(17, 68, 18),
(18, 69, 18),
(19, 70, 18),
(20, 71, 19),
(21, 72, 20),
(22, 73, 21),
(23, 74, 22),
(24, 75, 23),
(25, 76, 23),
(26, 77, 23),
(27, 67, 24),
(28, 73, 25);

-- --------------------------------------------------------

--
-- Table structure for table `song_tb`
--

CREATE TABLE `song_tb` (
  `song_id` int(10) NOT NULL,
  `song_name` varchar(50) NOT NULL,
  `date_of_release` date NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  `song_rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song_tb`
--

INSERT INTO `song_tb` (`song_id`, `song_name`, `date_of_release`, `cover_image`, `song_rating`) VALUES
(17, 'Drivers license', '2022-10-08', 'driversLicense.jpeg', '5.0'),
(18, 'Wellerman', '2022-10-14', 'wellerman.jpg', '3.0'),
(19, 'The Business', '2022-10-16', 'thebusiness.jpeg', '4.0'),
(20, 'Montero', '2022-10-06', 'montero.jpg', '3.5'),
(21, 'Save Your Tears', '2022-02-02', 'TheWeekend.jpg', '5.0'),
(22, 'Levitating', '2022-10-20', 'levitating.jpg', '5.0'),
(23, 'Friday', '2022-10-14', 'RitonFriday.png', '5.0'),
(24, 'Good for You', '2022-10-14', 'goodForYou.png', '5.0'),
(25, 'Blinding Lights', '2022-10-14', 'TheWeekend.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'prince', 'pri1999.m.pm@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(2, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist_tb`
--
ALTER TABLE `artist_tb`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `rel_song_artist`
--
ALTER TABLE `rel_song_artist`
  ADD PRIMARY KEY (`relation_id`),
  ADD KEY `artsong_con` (`artist_id`),
  ADD KEY `songart_con` (`song_id`);

--
-- Indexes for table `song_tb`
--
ALTER TABLE `song_tb`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist_tb`
--
ALTER TABLE `artist_tb`
  MODIFY `artist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `rel_song_artist`
--
ALTER TABLE `rel_song_artist`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `song_tb`
--
ALTER TABLE `song_tb`
  MODIFY `song_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rel_song_artist`
--
ALTER TABLE `rel_song_artist`
  ADD CONSTRAINT `artsong_con` FOREIGN KEY (`artist_id`) REFERENCES `artist_tb` (`artist_id`),
  ADD CONSTRAINT `songart_con` FOREIGN KEY (`song_id`) REFERENCES `song_tb` (`song_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
