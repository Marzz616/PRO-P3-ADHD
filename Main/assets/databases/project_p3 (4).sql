-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 03 apr 2024 om 14:32
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
  `vraag 1` varchar(2) NOT NULL,
  `vraag 2` varchar(2) NOT NULL,
  `vraag 3` varchar(2) NOT NULL,
  `vraag 4` varchar(2) NOT NULL,
  `vraag 5` varchar(2) NOT NULL,
  `vraag 6` varchar(2) NOT NULL,
  `vraag 7` varchar(2) NOT NULL,
  `vraag 8` varchar(2) NOT NULL,
  `vraag 9` varchar(2) NOT NULL,
  `vraag 10` varchar(2) NOT NULL,
  `totale punten` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `project_p3`
--

INSERT INTO `project_p3` (`id`, `Name`, `Email`, `vraag 1`, `vraag 2`, `vraag 3`, `vraag 4`, `vraag 5`, `vraag 6`, `vraag 7`, `vraag 8`, `vraag 9`, `vraag 10`, `totale punten`) VALUES
(19, 'newTest3', 'newTest3@tester.com', 'S', 'N', 'Z', 'N', 'S', 'N', 'Z', 'N', 'S', 'N', 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
