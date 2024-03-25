-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 25 mrt 2024 om 14:55
-- Serverversie: 8.0.31
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faq`
--
CREATE DATABASE IF NOT EXISTS `faq` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `faq`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `qa_table`
--

DROP TABLE IF EXISTS `qa_table`;
CREATE TABLE IF NOT EXISTS `qa_table` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `qa_table`
--

INSERT INTO `qa_table` (`id`, `question`, `answer`) VALUES
(99, '\"Geef jij antwoord op de vraag die ik stel?\"', 'Ja, ik zal mijn best doen om je vraag te beantwoorden. Wat wil je weten?'),
(100, '\"Hoe kan ik PHP en Python met elkaar linken zodat het werkt op de WAMP server?\"', 'Om PHP en Python met elkaar te verbinden op een WAMP-server, kun je gebruikmaken van een zogenaamde \"bridge\" of communicatiekanaal tussen de twee talen. Er zijn verschillende manieren om dit te bereiken:\n\n1. **Gebruik van shell_exec**: Dit is een eenvoudige methode waarbij je PHP kunt gebruiken om Python-scripts uit te voeren door shell_exec te gebruiken. Je kunt Python-scripts vanuit PHP starten en de output ervan ophalen. Bijvoorbeeld:\n\n```php\n$output = shell_exec(\'python script.py\');\necho $output;\n```\n\n2. **Python extensie voor PHP**: Er zijn extensies beschikbaar die het mogelijk maken om Python-scripts rechtstreeks vanuit PHP uit te voeren. Een populaire extensie is PHP-Exec-Py, waarmee je Python-scripts vanuit PHP kunt starten.\n\n3. **Gebruik van API\'s**: Je kunt een API (Application Programming Interface) maken in Python die communiceert met PHP via HTTP-verzoeken. Op deze manier kunnen PHP en Python met elkaar communiceren door middel van het uitwisselen van data via API-aanroepen.\n\nZorg ervoor dat je de juiste configuraties instelt op je WAMP-server om het uitvoeren van Python vanuit PHP mogelijk te maken. Het kan ook handig zijn om de benodigde Python-modules te installeren die je wilt gebruiken in je Python-scripts.\n\nHet is belangrijk om te onthouden dat het linken van PHP en Python op deze manier wat complex kan zijn en het kan extra stappen vereisen afhankelijk van de specifieke vereisten van je project. Het is raadzaam om de documentatie van de specifieke methoden die je wilt gebruiken grondig door te nemen en eventueel professionele hulp te zoeken als dat nodig is.'),
(98, '\"Hoe weet ik of ik ADHD heb?\"', 'Als je vermoedt dat je ADHD hebt, is het belangrijk om een ​​gekwalificeerde professional te raadplegen voor een formele diagnose. Een goede eerste stap is om met je huisarts te praten. Zij kunnen je doorverwijzen naar een specialist zoals een psycholoog of psychiater die gespecialiseerd is in ADHD. \n\nDiagnose van ADHD omvat meestal het bespreken van je symptomen, medische geschiedenis en het uitvoeren van bepaalde tests. Een formele diagnose kan je helpen om de juiste behandelingsopties te verkennen en effectief om te gaan met ADHD. Het is belangrijk om te onthouden dat alleen een professional een officiële diagnose kan stellen, dus probeer niet zelf een diagnose te stellen.'),
(101, '\"Antwoord jij deze vraag?\"', 'Ja, ik kan deze vraag beantwoorden. Wat wil je weten?'),
(102, 'Is de wereld plat?', 'Nee, de wereld is niet plat. In werkelijkheid is de aarde een bolvormige planeet. Deze wetenschappelijke feiten zijn vastgesteld door middel van verschillende observaties, metingen en'),
(114, 'Hoe weet ik of ik ADHD heb?', ''),
(113, 'Hoe weet ik of ik ADHD heb?', ''),
(112, 'Hoe weet ik of ik ADHD heb?', ''),
(111, 'Hoe weet ik of ik ADHD heb?', ''),
(110, 'Hoe weet ik of ik ADHD heb?', ''),
(109, 'Hoe weet ik of ik ADHD heb?', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;