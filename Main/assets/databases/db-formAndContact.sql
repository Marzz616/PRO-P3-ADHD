-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 02 apr 2024 om 18:44
-- Serverversie: 8.0.31
-- PHP-versie: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_p3`
--
CREATE DATABASE IF NOT EXISTS `project_p3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `project_p3`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Message` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contact_info`
--

INSERT INTO `contact_info` (`id`, `Name`, `Email`, `Message`) VALUES
(4, 'tester1', 'iets@test.com', 'dit laat zien wat er gebeurt');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project_p3`
--

DROP TABLE IF EXISTS `project_p3`;
CREATE TABLE IF NOT EXISTS `project_p3` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `S` smallint NOT NULL,
  `N` smallint NOT NULL,
  `Z` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `project_p3`
--

INSERT INTO `project_p3` (`id`, `Name`, `Email`, `S`, `N`, `Z`) VALUES
(1, 'test03', 'test3@tester.com', 3, 4, 3),
(2, 'test03', 'test3@tester.com', 3, 4, 3),
(3, 'test04', 'test4@tester.com', 6, 3, 1),
(4, 'test04', 'test4@tester.com', 6, 3, 1),
(5, 'test04', 'test4@tester.com', 6, 4, 0),
(8, 'test 5', 'test5@tester.com', 3, 6, 1),
(9, 'test 5', 'test5@tester.com', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
