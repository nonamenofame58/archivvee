-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2025 at 12:01 PM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archivve`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `Id` int(6) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Games` json DEFAULT NULL,
  `Movies` json DEFAULT NULL,
  `Musics` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`Id`, `Username`, `Games`, `Movies`, `Musics`) VALUES
(14, 'kratosc2', '[{"ID": "56", "Name": "Crash Bandicoot", "Index": "1", "Description": "Crash Bandicoot ROM Download for Playstation (PSX). Crash Ba"}, {"ID": "55", "Name": "Tekken 3", "Index": "1", "Description": "Tekken 3"}, {"ID": "54", "Name": "Need for Speed 3: Hot Pursuit", "Index": "1", "Description": "Need for Speed 3: Hot Pursuit"}, {"ID": "44", "Name": "Assassin\'s Creed: Bloodlines", "Index": "1", "Description": "Assassin\'s Creed: Bloodlines"}, {"ID": "43", "Name": "Grand Theft Auto: Vice City Stories", "Index": "1", "Description": "Grand Theft Auto: Vice City Stories"}]', '[{}]', '[{}]'),
(15, 'kratosc3', '[{"ID": "57", "Name": "Metal Slug X", "Index": "1", "Description": "Metal Slug X ROM Download for Playstation (PSX). Metal Slug "}, {"ID": "58", "Name": "LEGO Batman - The Video Game", "Index": "1", "Description": "LEGO Batman - The Video Game ROM Download for Playstation Po"}, {"ID": "59", "Name": "Grand Theft Auto: Chinatown Wars", "Index": "1", "Description": "Grand Theft Auto: Chinatown Wars ROM Download for Playstation Portable (PSP). Grand Theft Auto: Chinatown Wars game is available to play online and download only on Roms Games. Grand Theft Auto: Chinatown Wars ROM for Playstation Portable download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available."}, {"ID": "48", "Name": "God of War: Ghost of Sparta", "Index": "1", "Description": "God of War: Ghost of Sparta"}, {"ID": "44", "Name": "Assassin\'s Creed: Bloodlines", "Index": "1", "Description": "Assassin\'s Creed: Bloodlines"}, {"ID": "51", "Name": "Sims 2, The - Dr. Dominic No Inbou", "Index": "1", "Description": "Sims 2, The - Dr. Dominic No Inbou"}, {"ID": "52", "Name": "Fat Princess: Fistful of Cake", "Index": "1", "Description": "Fat Princess: Fistful of Cake"}, {"ID": "56", "Name": "Crash Bandicoot", "Index": "1", "Description": "Crash Bandicoot ROM Download for Playstation (PSX). Crash Ba"}, {"ID": "55", "Name": "Tekken 3", "Index": "1", "Description": "Tekken 3"}, {"ID": "42", "Name": "Ben 10: Ultimate Alien - Cosmic Destruction", "Index": "1", "Description": "Ben 10: Ultimate Alien - Cosmic Destruction"}, {"ID": "43", "Name": "Grand Theft Auto: Vice City Stories", "Index": "1", "Description": "Grand Theft Auto: Vice City Stories"}, {"ID": "53", "Name": "Hot Shots Tennis: Get a Grip", "Index": "1", "Description": "Hot Shots Tennis: Get a Grip"}, {"ID": "54", "Name": "Need for Speed 3: Hot Pursuit", "Index": "1", "Description": "Need for Speed 3: Hot Pursuit"}, {"ID": "49", "Name": "Naruto Shippuden: Ultimate Ninja Impact", "Index": "1", "Description": "Naruto Shippuden: Ultimate Ninja Impact"}, {"ID": "47", "Name": "Metal Slug XX", "Index": "1", "Description": "Metal Slug XX"}]', '[{}]', '[{}]'),
(16, 'kratosc4', '[{}]', '[{}]', '[{}]'),
(17, 'kratosc5', '[{}]', '[{}]', '[{}]');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `ID` int(6) NOT NULL,
  `Name` varchar(16535) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Owner` varchar(60) NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL,
  `archivedUsers` int(6) NOT NULL,
  `releaseDate` date NOT NULL,
  `developer` varchar(100) NOT NULL,
  `keywords` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`ID`, `Name`, `Description`, `Owner`, `isConfirmed`, `archivedUsers`, `releaseDate`, `developer`, `keywords`) VALUES
(42, 'Ben 10: Ultimate Alien - Cosmic Destruction', 'Ben 10: Ultimate Alien - Cosmic Destruction', 'kratosc2', 0, 74, '0000-00-00', '', ''),
(43, 'Grand Theft Auto: Vice City Stories', 'Grand Theft Auto: Vice City Stories', 'kratosc2', 0, 59, '0000-00-00', '', ''),
(44, 'Assassin\'s Creed: Bloodlines', 'Assassin\'s Creed: Bloodlines', 'kratosc2', 0, 69, '0000-00-00', '', ''),
(45, 'Scud: The Disposable Assassin', 'Scud: The Disposable Assassin', 'kratosc2', 0, 3, '0000-00-00', '', ''),
(46, 'Resident Evil', 'Resident Evil', 'kratosc2', 0, 40, '0000-00-00', '', ''),
(47, 'Metal Slug XX', 'Metal Slug XX', 'kratosc2', 0, 69, '0000-00-00', '', ''),
(48, 'God of War: Ghost of Sparta', 'God of War: Ghost of Sparta', 'kratosc2', 0, 214, '0000-00-00', '', ''),
(49, 'Naruto Shippuden: Ultimate Ninja Impact', 'Naruto Shippuden: Ultimate Ninja Impact', 'kratosc2', 0, 30, '0000-00-00', '', ''),
(50, 'Mortal Kombat: Unchained', 'Mortal Kombat: Unchained', 'kratosc2', 0, 28, '0000-00-00', '', ''),
(51, 'Sims 2, The - Dr. Dominic No Inbou', 'Sims 2, The - Dr. Dominic No Inbou', 'kratosc3', 0, 19, '0000-00-00', '', ''),
(52, 'Fat Princess: Fistful of Cake', 'Fat Princess: Fistful of Cake', 'kratosc2', 0, 26, '0000-00-00', '', ''),
(53, 'Hot Shots Tennis: Get a Grip', 'Hot Shots Tennis: Get a Grip', 'kratosc2', 0, 15, '0000-00-00', '', ''),
(54, 'Need for Speed 3: Hot Pursuit', 'Need for Speed 3: Hot Pursuit', 'kratosc2', 0, 40, '0000-00-00', '', ''),
(55, 'Tekken 3', 'Tekken 3', 'kratosc2', 0, 10, '0000-00-00', '', ''),
(56, 'Crash Bandicoot', 'Crash Bandicoot ROM Download for Playstation (PSX). Crash Ba', 'kratosc2', 0, 9, '0000-00-00', '', ''),
(57, 'Metal Slug X', 'Metal Slug X ROM Download for Playstation (PSX). Metal Slug ', 'kratosc2', 0, -1, '0000-00-00', '', ''),
(58, 'LEGO Batman - The Video Game', 'LEGO Batman - The Video Game ROM Download for Playstation Po', 'kratosc2', 0, 29, '0000-00-00', '', ''),
(59, 'Grand Theft Auto: Chinatown Wars', 'Grand Theft Auto: Chinatown Wars ROM Download for Playstation Portable (PSP). Grand Theft Auto: Chinatown Wars game is available to play online and download only on Roms Games. Grand Theft Auto: Chinatown Wars ROM for Playstation Portable download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available.', 'kratosc2', 0, 13, '0000-00-00', '', ''),
(60, 'LEGO Star Wars II: The Original Trilogy', 'LEGO Star Wars II: The Original Trilogy ROM Download for Playstation Portable (PSP). LEGO Star Wars II: The Original Trilogy game is available to play online and download only on Roms Games. LEGO Star Wars II: The Original Trilogy ROM for Playstation Portable download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available.', 'kratosc2', 0, 0, '0000-00-00', '', ''),
(61, 'LEGO Island 2: The Brickster\'s Revenge', 'LEGO Island 2: The Brickster\'s Revenge ROM Download for Playstation (PSX). LEGO Island 2: The Brickster\'s Revenge game is available to play online and download only on Roms Games. LEGO Island 2: The Brickster\'s Revenge ROM for Playstation download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available.', 'kratosc2', 0, 0, '0000-00-00', '', ''),
(62, 'Resident Evil 2: Dual Shock Ver.', 'Resident Evil 2: Dual Shock Ver. ROM Download for Playstation (PSX). Resident Evil 2: Dual Shock Ver. game is available to play online and download only on Roms Games. Resident Evil 2: Dual Shock Ver. ROM for Playstation download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available.', 'kratosc2', 0, 0, '0000-00-00', '', ''),
(63, ' Resident Evil Archives: Resident Evil Zero', 'Resident Evil Archives: Resident Evil Zero ROM Download for Nintendo Wii (WII). Resident Evil Archives: Resident Evil Zero game is available to play online and download only on Roms Games. Resident Evil Archives: Resident Evil Zero ROM for Nintendo Wii download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available.', 'kratosc2', 0, 0, '0000-00-00', '', ''),
(64, '007 - Russia Yori Ai O Komete', '007 - Russia Yori Ai O Komete ROM Download for Playstation Portable (PSP). 007 - Russia Yori Ai O Komete game is available to play online and download only on Roms Games. 007 - Russia Yori Ai O Komete ROM for Playstation Portable download requires an emulator to play the game offline. This Game is English (USA) Version and is the highest quality available.', 'kratosc2', 0, 0, '2006-03-02', 'EA Redwood Shores', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(39, 'kratosc2', '96ac9a11d94d8f982ba476aa4b5ef503'),
(40, 'kratosc3', '96ac9a11d94d8f982ba476aa4b5ef503'),
(41, 'kratosc4', '96ac9a11d94d8f982ba476aa4b5ef503'),
(42, 'kratosc5', '96ac9a11d94d8f982ba476aa4b5ef503');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
